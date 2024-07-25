<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        $shuffledGalleries = $galleries->shuffle();

        // Bagi item galeri menjadi dua grup dengan masing-masing 3 item
        $chunks = $shuffledGalleries->chunk(3);
        return view('home', compact('galleries'));
    }

    public function adminIndex()
    {
        $galleries = Gallery::all();
        
        return view('admin.galeri.index', compact('galleries'));
    }

    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);

        if (!$gallery) {
            return redirect()->route('admin.galeri.index')->with('error', 'Galeri tidak ditemukan.');
        }

        $type = 'galeri';


        return view('galeri.show', compact('gallery'));
    }

    public function create()
    {
        return view('admin.galeri.create');
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
    
        try {
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
    
            return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diupload!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);

        if (!$gallery) {
            return redirect()->route('admin.galeri.index')->with('error', 'Galeri tidak ditemukan.');
        }

        return view('admin.galeri.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'image' => 'nullable|image',
        'date' => 'required|date',
        'author' => 'required',
        'subtitle' => 'nullable|string',
        'content' => 'required',
        'link' => 'required|url',
    ]);

    try {
        $gallery = Gallery::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $gallery->image = $imagePath;
        }

        $gallery->title = $request->title;
        $gallery->date = $request->date;
        $gallery->author = $request->author;
        $gallery->subtitle = $request->subtitle;
        $gallery->content = $request->content;
        $gallery->link = $request->link;
        $gallery->save();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    } catch (\Exception $e) {
        return redirect()->route('admin.galeri.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

    public function destroy($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);

            if (!$gallery) {
                return redirect()->route('admin.galeri.index')->with('error', 'Galeri tidak ditemukan.');
            }

            $gallery->delete();

            return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.galeri.index')->with('error', 'Terjadi kesalahan saat menghapus galeri: ' . $e->getMessage());
        }
    }

    private function validateRequest(Request $request, $isCreate = true)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'author' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'link' => 'required|url',
        ];

        if ($isCreate) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } else {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        $request->validate($rules);
    }
    
    public function destroyAll(Request $request)
    {
        try {
            $ids = $request->input('ids', []);
    
            if (empty($ids) || !is_array($ids)) {
                return redirect()->route('admin.galeri.index')->with('error', 'Tidak ada galeri yang dipilih untuk dihapus.');
            }
    
            // Validasi ID apakah berupa array angka
            foreach ($ids as $id) {
                if (!is_numeric($id)) {
                    return redirect()->route('admin.galeri.index')->with('error', 'ID galeri tidak valid.');
                }
            }
    
            // Menggunakan whereIn untuk menghapus semua galeri yang dipilih
            Gallery::whereIn('id', $ids)->delete();
    
            return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.galeri.index')->with('error', 'Terjadi kesalahan saat menghapus galeri: ' . $e->getMessage());
        }
    }
    


}