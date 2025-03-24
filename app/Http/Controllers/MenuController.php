<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display all menus.
     */
    public function index()
    {
        // $menus = Menu::with('items')->get();
        // return response()->json($menus);
        $menus = Menu::all();
        return view('admin.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function edit($id)
    {
        //dd($id);

        $menus = Menu::find($id);

        if (!$menus) {
            return redirect()->route('menu.index')->with('error', 'Menu not found.');
        }

        $pages = Page::all();
        return view('admin.menu.edit', compact('menus', 'pages'));
    }

    
    // public function store(Request $request)
    // {
    //     // Validate the incoming request
    //     $request->validate([
    //         'menuData' => 'required|json', // Ensure menuData is a valid JSON string
    //     ]);

    //     // Decode JSON data
    //     $menuData = json_decode($request->menuData, true);

    //     // Validate each menu item individually
    //     foreach ($menuData as $item) {
    //         $validatedData = validator($item, [
    //             'menu_id' => 'required|exists:menus,id',
    //             'title' => 'required|string|max:255',
    //             'type' => 'required|in:page,category,service,custom',
    //             'item_id' => 'nullable|integer',
    //             'url' => 'nullable|url|max:2048',
    //             'parent_id' => 'nullable|exists:menu_items,id',
    //             'order' => 'nullable|integer'
    //         ])->validate();

    //         // Create or update the menu item
    //         MenuItem::updateOrCreate(
    //             ['id' => $item['id'] ?? null], // If 'id' exists, update; otherwise, create new
    //             [
    //                 'menu_id'   => $validatedData['menu_id'],
    //                 'title'     => $validatedData['title'],
    //                 'type'      => $validatedData['type'],
    //                 'item_id'   => $validatedData['item_id'] ?? null,
    //                 'url'       => $validatedData['url'] ?? null,
    //                 'parent_id' => $validatedData['parent_id'] ?? null,
    //                 'order'     => $validatedData['order'] ?? 0,
    //             ]
    //         );
    //     }

    //     return response()->json(['message' => 'Menu items saved successfully']);
    // }
    public function store(Request $request)
{
    // Validate JSON format
    $request->validate([
        'menuData' => 'required|json',
    ]);

    $menuData = json_decode($request->menuData, true);
    $createdItems = [];

    // First pass: Insert items without parent_id
    foreach ($menuData as $item) {
        $validatedData = validator($item, [
            'menu_id' => 'required|exists:menus,id',
            'title' => 'required|string|max:255',
            'type' => 'required|in:page,category,service,custom',
            'item_id' => 'nullable|integer',
            'url' => 'nullable|url|max:2048',
            'order' => 'nullable|integer',
        ])->validate();

        $createdItems[$item['id']] = MenuItem::updateOrCreate(
            ['id' => $item['id'] ?? null], // If 'id' exists, update; otherwise, create new
            [
                'menu_id'   => $validatedData['menu_id'],
                'title'     => $validatedData['title'],
                'type'      => $validatedData['type'],
                'item_id'   => $validatedData['item_id'] ?? null,
                'url'       => $validatedData['url'] ?? null,
                'order'     => $validatedData['order'] ?? 0,
            ]
        );
    }

    // Second pass: Update parent_id now that all items exist
    foreach ($menuData as $item) {
        if (!empty($item['parent_id']) && isset($createdItems[$item['parent_id']])) {
            $createdItems[$item['id']]->update(['parent_id' => $createdItems[$item['parent_id']]->id]);
        }
    }

    return response()->json(['message' => 'Menu items saved successfully']);
}

    // Recursive function to save menu items
    private function saveMenuItems($items, $menuId, $parentId = null)
    {
        foreach ($items as $index => $item) {
            $menuItem = MenuItem::create([
                'menu_id' => $menuId,
                'parent_id' => $parentId,
                'title' => $item['title'] ?? 'Untitled',
                'type' => $item['type'] ?? 'custom',
                'item_id' => $item['item_id'] ?? null,
                'url' => $item['url'] ?? null,
                'order' => $index,
            ]);

            if (!empty($item['children'])) {
                $this->saveMenuItems($item['children'], $menuId, $menuItem->id);
            }
        }
    }

    // Fetch menu items
    public function getMenu($menuId)
    {
        $menuItems = MenuItem::where('menu_id', $menuId)->orderBy('order')->get();
        return response()->json($this->formatMenu($menuItems));
    }

    // Format menu for frontend
    private function formatMenu($items, $parentId = null)
    {
        return $items->where('parent_id', $parentId)->map(function ($item) use ($items) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'type' => $item->type,
                'item_id' => $item->item_id,
                'url' => $item->url,
                'children' => $this->formatMenu($items, $item->id)
            ];
        })->values();
    }
}
