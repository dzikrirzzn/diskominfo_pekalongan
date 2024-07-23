<?php

namespace App\Http\Controllers;

use App\Models\NavItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NavItemController extends Controller
{
    public function index()
    {
        $navItems = NavItem::all(); // Adjust based on your actual logic
        return view('admin.navbar.index', compact('navItems'));
    }


    // NavItemController.php
    public function adminIndex()
    {
        $navItems = NavItem::all(); // Adjust based on your actual logic
        return view('admin.navbar.index', compact('navItems'));
    }



    public function create()
    {
        $parentItems = NavItem::whereNull('parent_id')->get();
        return view('admin.navbar.create', compact('parentItems'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:nav_items,id',
        ]);

        $navItem = NavItem::create($validatedData);

        Log::info('NavItem created', ['navItem' => $navItem]);

        if ($request->filled('child_items')) {
            foreach ($request->input('child_items') as $childItem) {
                $childItem['parent_id'] = $navItem->id;
                Log::info('Child item data', ['childItem' => $childItem]);
                NavItem::create($childItem);
            }
        }

        return redirect()->route('admin.navbar.index')->with('success', 'Navigation item added successfully');
    }

    public function edit($id)
{
    $navItem = NavItem::findOrFail($id);
    $parentItems = NavItem::whereNull('parent_id')->get();

    return view('admin.navbar.edit', compact('navItem', 'parentItems'));
}


    public function update(Request $request, NavItem $navItem, $id)
    {
        $navItem = NavItem::findOrFail($id);
        $navItem->update($request->all());
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:nav_items,id',
        ]);

        $navItem->update($validatedData);

        // Delete existing children if they exist
        $navItem->children()->delete();

        Log::info('NavItem updated', ['navItem' => $navItem]);

        // Add new children if they exist
        if ($request->filled('child_items')) {
            foreach ($request->input('child_items') as $childItem) {
                $childItem['parent_id'] = $navItem->id;
                Log::info('Child item data', ['childItem' => $childItem]);
                NavItem::create($childItem);
            }
        }

        return redirect()->route('admin.navbar.index')->with('success', 'Navigation item updated successfully');
    }

    public function destroy($id)
{
    $navItem = NavItem::findOrFail($id);
    $navItem->delete();

    return redirect()->route('admin.navbar.index')->with('success', 'Item deleted successfully.');
}
public function showNavbar()
{
    $navItems = NavItem::where('parent_id', null)->with('children')->get();

    // Debug logging
    foreach ($navItems as $item) {
        Log::info('Nav Item: ', $item->toArray());
    }

    return view('your_view_name', compact('navItems'));
}
}