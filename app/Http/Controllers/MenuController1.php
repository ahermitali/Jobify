<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Database\QueryException;

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
    /**
     * Store a new menu.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'status' => 'in:active,inactive'
        ]);

        try {
            $menu = Menu::create([
                'name' => $request->name,
                'status' => $request->status ?? 'active'
            ]);

            return redirect()->route('menu.index')->with('success', 'Menu item added successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Unexpected error: ' . $e->getMessage());
        }
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

    /**
     * Add an item to a menu.
     */
    public function addItem(Request $request, $menuId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:page,category,service,custom',
            'url' => 'nullable|url',
            'parent_id' => 'nullable|exists:menu_items,id',
            'order' => 'required|integer',
            'status' => 'in:active,inactive'
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menuId,
            'parent_id' => $request->parent_id,
            'title' => $request->title,
            'type' => $request->type,
            'item_id' => $request->item_id ?? null,
            'url' => $request->url,
            'order' => $request->order,
            'status' => $request->status ?? 'active'
        ]);

        return response()->json(['success' => true, 'menu_item' => $menuItem]);
    }

    /**
     * Update menu items (positions and parent-child relationships).
     */
    public function update(Request $request)
    {
        $menuItems = $request->input('menu_items');

        foreach ($menuItems as $item) {
            MenuItem::where('id', $item['id'])->update([
                'parent_id' => $item['parent_id'],
                'order' => $item['order']
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Menu updated successfully.']);
    }

    /**
     * Delete a menu item.
     */
    public function destroy($id)
    {
        MenuItem::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Menu item deleted.']);
    }
}
