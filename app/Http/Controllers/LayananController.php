<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('admin.layanan.index', compact('layanans'));
    }

    public function home()
    {
        $layanans = Layanan::all();
        return view('home', compact('layanans'));
    }

    public function show($id)
    {
        $layanan = Layanan::findOrFail($id);

        if (!$layanan) {
            return redirect()->route('admin.layanan.index')->with('error', 'Layanan tidak ditemukan.');
        }

        return view('layanans.show', compact('layanan'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function adminIndex()
    {
        $layanans = Layanan::all();
        return view('admin.layanan.index', compact('layanans'));
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        try {
            $layanan = new Layanan();
            $layanan->title = $request->title;
            $layanan->description = $request->description;

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $layanan->image = $imagePath;
            }

            $layanan->link = $request->link;
            $layanan->save();

            return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diupload!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupload layanan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);

        if (!$layanan) {
            return redirect()->route('admin.layanan.index')->with('error', 'Layanan tidak ditemukan.');
        }

        return view('admin.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $this->validateRequest($request, false);

        try {
            $layanan = Layanan::findOrFail($id);

            if (!$layanan) {
                return redirect()->route('admin.layanan.index')->with('error', 'Layanan tidak ditemukan.');
            }

            $layanan->title = $request->title;
            $layanan->description = $request->description;

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $layanan->image = $imagePath;
            }

            $layanan->link = $request->link;
            $layanan->save();

            return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('admin.layanan.index')->with('error', 'Terjadi kesalahan saat memperbarui layanan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $layanan = Layanan::findOrFail($id);

            if (!$layanan) {
                return redirect()->route('admin.layanan.index')->with('error', 'Layanan tidak ditemukan.');
            }

            $layanan->delete();

            return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.layanan.index')->with('error', 'Terjadi kesalahan saat menghapus layanan: ' . $e->getMessage());
        }
    }

    private function validateRequest(Request $request, $isCreate = true)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|url',
        ];

        if ($isCreate) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } else {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        $request->validate($rules);
    }
}