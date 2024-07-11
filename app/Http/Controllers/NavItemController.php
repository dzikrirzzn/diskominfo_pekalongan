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
        $navItem = new NavItem;
        $navItem->title = $request->input('title');
        $navItem->url = $request->input('url');
        $navItem->is_dropdown = $request->input('is_dropdown') ? true : false;
        $navItem->parent_id = $request->input('parent_id') ? $request->input('parent_id') : null;
        $navItem->save();

        if ($navItem->is_dropdown && $request->input('child_title')) {
            $childItem = new NavItem;
            $childItem->title = $request->input('child_title');
            $childItem->url = $request->input('child_url');
            $childItem->parent_id = $navItem->id;
            $childItem->save();
        }

        return redirect()->route('navItems.index');
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
