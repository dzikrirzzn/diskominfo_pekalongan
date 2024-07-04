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
        return view('berita.listberita', ['allBerita' => $allBerita]);
    }

    public function home()
    {
        // Retrieve all news items
        $headlineBerita = HeadlineBerita::latest();
        $otherBerita = OtherBerita::latest();
    
        return view('home', [
            'headlineBerita' => $headlineBerita,
            'otherBerita' => $otherBerita,
        ]);
    }

    public function show($id)
    {
        // Attempt to find the news item in both CityNews and OtherNews
        $berita = HeadlineBerita::find($id) ?? OtherBerita::find($id);

        // Check if the news item was found
        if (!$berita) {
            return redirect()->route('listberita')->with('error', 'Berita tidak ditemukan.');
        }

        // Pass the news item to the view
        return view('berita.berita_content', compact('berita'));
    }
    

    

    public function store(Request $request)
    {
        try {
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
    
            // Redirect back to form with success message
            return redirect()->back()->with('success', 'Berita berhasil diupload!');
    
        } catch (\Exception $e) {
            // Redirect back to form with error message
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupload berita: ' . $e->getMessage());
        }
    }
    
}