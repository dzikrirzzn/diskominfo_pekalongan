<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('home', compact('galleries'));
    }

    public function create()
    {
        return view('galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required|date',
            'author' => 'required',
            'subtitle' => 'nullable|string',
            'content' => 'required',
            'link' => 'required|url',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Gallery::create([
            'title' => $request->title,
            'image' => $imagePath,
            'date' => $request->date,
            'author' => $request->author,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'link' => $request->link,
        ]);

        return redirect()->back()->with('success', 'Galeri berhasil diupload!');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.galleries.edit', compact('gallery'));
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'image' => 'nullable|image',
    //         'date' => 'required|date',
    //         'author' => 'required',
    //         'subtitle' => 'nullable|string',
    //         'content' => 'required',
    //         'link' => 'required|url',
    //     ]);

    //     $gallery = Gallery::findOrFail($id);

    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('images', 'public');
    //         $gallery->image = $imagePath;
    //     }

    //     $gallery->title = $request->title;
    //     $gallery->date = $request->date;
    //     $gallery->author = $request->author;
    //     $gallery->subtitle = $request->subtitle;
    //     $gallery->content = $request->content;
    //     $gallery->link = $request->link;
    //     $gallery->save();

    //     return redirect()->route('admin.galleries.index')->with('success', 'Gallery post updated successfully.');
    // }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        return redirect()->route('admin_gallery')->with('success', 'Gallery post deleted successfully.');
    }
}