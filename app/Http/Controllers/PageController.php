<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:pages|max:255',
        ]);
    
        try {
            // Generate slug from title
            $slug = Str::slug($request->title);
    
            // Ensure the slug is unique
            $count = Page::where('slug', 'LIKE', "{$slug}%")->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }
    
            // Create the page with the generated slug
            Page::create([
                'title' => $request->title,
                'slug' => $slug,  // Ensure slug is explicitly set
            ]);
    
            return redirect()->route('page.index')->with('success', 'Page created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Unexpected error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page, $id)
    {
        $pages = Page::findOrFail($id);
        return view('admin.pages.edit', compact('pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:pages,title,' . $page->id,
        ]);

        try {
            // Generate slug from title
            $slug = Str::slug($request->title);
    
            // Ensure the slug is unique (excluding the current page)
            $count = Page::where('slug', 'LIKE', "{$slug}%")
                         ->where('id', '!=', $page->id)
                         ->count();
    
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }
    
            // Update the page
            $page->update([
                'title' => $request->title,
                'slug' => $slug,
            ]);
    
            return redirect()->route('page.index')->with('success', 'Page updated successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Unexpected error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page, $id)
    {
        $pages = Page::findOrFail($id);
        $pages->delete();
        return redirect()->route('page.index')->with('success', 'Qualification deleted successfully!');
    }
}
