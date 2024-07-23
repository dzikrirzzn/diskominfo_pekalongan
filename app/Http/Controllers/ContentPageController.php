<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentPage;

class ContentPageController extends Controller
{
    public function index()
    {
        $contentPages = ContentPage::all();
        return view('admin.content.index', compact('contentPages'));
    }

    public function create()
    {
        return view('admin.content.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        ContentPage::create($request->all());
        return redirect()->route('content.index')->with('success', 'Content page created successfully.');
    }

    public function edit(ContentPage $contentPage)
    {
        return view('admin.content.edit', compact('contentPage'));
    }

    public function update(Request $request, ContentPage $contentPage)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $contentPage->update($request->all());
        return redirect()->route('content.index')->with('success', 'Content page updated successfully.');
    }

    public function destroy(ContentPage $contentPage)
    {
        $contentPage->delete();
        return redirect()->route('content.index')->with('success', 'Content page deleted successfully.');
    }
    public function show(ContentPage $contentPage)
{
    return view('content.show', compact('contentPage'));
}

}