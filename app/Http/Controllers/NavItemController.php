<?php

namespace App\Http\Controllers;

use App\Models\NavItem;
use Illuminate\Http\Request;

class NavItemController extends Controller
{
    public function index()
    {
        $navItems = NavItem::whereNull('parent_id')->with('children')->get();
        return view('admin_navbar', compact('navItems'));
    }

    public function create()
    {
        $navItems = NavItem::whereNull('parent_id')->with('children')->get();
        return view('admin_navbar', compact('navItems'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|max:255',
            'is_dropdown' => 'boolean',
            'parent_id' => 'nullable|exists:nav_items,id',
        ]);

        NavItem::create($validatedData);

        return redirect()->route('navItems.index')->with('success', 'Navigation item created successfully.');
    }

    public function show(NavItem $navItem)
    {
        return view('admin_navbar_show', compact('navItem'));
    }

    public function edit(NavItem $navItem)
    {
        $navItems = NavItem::whereNull('parent_id')->with('children')->get();
        return view('admin_navbar_edit', compact('navItem', 'navItems'));
    }

    public function update(Request $request, NavItem $navItem)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|max:255',
            'is_dropdown' => 'boolean',
            'parent_id' => 'nullable|exists:nav_items,id',
        ]);

        $navItem->update($validatedData);

        return redirect()->route('navItems.index')->with('success', 'Navigation item updated successfully.');
    }

    public function destroy(NavItem $navItem)
    {
        $navItem->delete();

        return redirect()->route('navItems.index')->with('success', 'Navigation item deleted successfully.');
    }
}