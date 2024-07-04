<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeadlineBerita;
use App\Models\OtherBerita;

class BeritaController extends Controller
{
    public function index()
    {
        // Mengambil semua berita dari kedua tabel
        $headlineBerita = HeadlineBerita::all();
        $otherBerita = OtherBerita::all();

        // Menggabungkan kedua koleksi berita
        $allBerita = $headlineBerita->merge($otherBerita);

        // Mengembalikan tampilan dengan data berita
        // return view('berita.berita_content', ['allBerita' => $allBerita]);
        return view('berita.listberita', ['allBerita' => $allBerita]);
    }

    

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required|string|in:kota,lainnya',
        ]);

        // Upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Simpan data berita ke tabel yang sesuai
        if ($request->type == 'kota') {
            HeadlineBerita::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'content' => $request->content,
                'author' => $request->author,
                'date' => $request->date,
                'image' => $imagePath,
            ]);
        } else {
            OtherBerita::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'content' => $request->content,
                'author' => $request->author,
                'date' => $request->date,
                'image' => $imagePath,
            ]);
        }

        // Redirect ke halaman index berita dengan pesan sukses
        return redirect()->route('berita.listberita')->with('success', 'Berita berhasil diupload!');
    }
}