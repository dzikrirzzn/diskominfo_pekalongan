<?php

namespace App\Http\Controllers;

use App\Models\NavItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NavItemController extends Controller
{
    public function index()
    {
        $navItems = NavItem::whereNull('parent_id')->with('children')->get();
        $parentItems = NavItem::whereNull('parent_id')->get();
        return view('admin_navbar', compact('navItems', 'parentItems'));
    }

    public function create()
    {
        $parentItems = NavItem::whereNull('parent_id')->get();
        return view('admin_navbar_create', compact('parentItems'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:nav_items,id',
            'is_dropdown' => 'nullable|boolean',
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

        return redirect()->route('navItems.index')->with('success', 'Navigation item added successfully');
    }

    public function edit(NavItem $navItem)
    {
        $parentItems = NavItem::whereNull('parent_id')->where('id', '!=', $navItem->id)->get();
        return view('admin_navbar_create', compact('navItem', 'parentItems'));
    }

    public function update(Request $request, NavItem $navItem)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:nav_items,id',
            'is_dropdown' => 'nullable|boolean',
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

        return redirect()->route('navItems.index')->with('success', 'Navigation item updated successfully');
    }

    public function destroy(NavItem $navItem)
    {
        $navItem->delete();
        return redirect()->route('navItems.index')->with('success', 'Navigation item deleted successfully');
    }
}