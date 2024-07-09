<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeadlineBerita;
use App\Models\OtherBerita;
use App\Models\Pengumuman;
use App\Models\TravelRecommendation;

class BeritaController extends Controller
{
    public function index()
    {
        $headlineBerita = HeadlineBerita::all();
        $otherBerita = OtherBerita::all();

        $allBerita = $headlineBerita->merge($otherBerita);

        return view('berita.listberita', ['allBerita' => $allBerita]);
    }

    public function home()
    {
        $headlineBerita = HeadlineBerita::latest()->get();
        $otherBerita = OtherBerita::latest()->get();
        $pengumuman = Pengumuman::all();
        $travelRecommendations = TravelRecommendation::all();

        
        
        return view('home', [
            'headlineBerita' => $headlineBerita,
            'otherBerita' => $otherBerita,
            'pengumuman' => $pengumuman,
            'travelRecommendations' => $travelRecommendations
        ]);
    }

    public function show($id)
    {
        $berita = HeadlineBerita::find($id) ?? OtherBerita::find($id);
    
        if (!$berita) {
            return redirect()->route('listberita')->with('error', 'Berita tidak ditemukan.');
        }
    
        $otherBerita = OtherBerita::latest()->take(5)->get();
    
        return view('berita.berita_content', compact('berita', 'otherBerita'));
    }
    
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'subtitle' => 'required|string|max:255',
                'content' => 'required|string',
                'author' => 'required|string|max:255',
                'date' => 'required|date',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'type' => 'required|string|in:kota,lainnya',
            ]);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
            }

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

            return redirect()->back()->with('success', 'Berita berhasil diupload!');
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupload berita: ' . $e->getMessage());
        }
    }
}