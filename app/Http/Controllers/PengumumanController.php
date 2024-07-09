<?php

namespace App\Http\Controllers;

use App\Models\OtherBerita;
use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('home', compact('pengumuman'));
    }

    public function create()
    {
        return view('pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required|date',
            'penulis' => 'required',
            'isi_pengumuman' => 'required',
            'gambar_pengumuman' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link_pdf_pengumuman' => 'mimes:pdf|max:2048',
        ]);

        $pengumuman = new Pengumuman();
        $pengumuman->judul = $request->judul;
        $pengumuman->tanggal = $request->tanggal;
        $pengumuman->penulis = $request->penulis;
        $pengumuman->isi_pengumuman = $request->isi_pengumuman;

        if ($request->hasFile('gambar_pengumuman')) {
            $imagePath = $request->file('gambar_pengumuman')->store('images', 'public');
            $pengumuman->gambar_pengumuman = $imagePath;
        }

        if ($request->hasFile('link_pdf_pengumuman')) {
            $pdfPath = $request->file('link_pdf_pengumuman')->store('pdfs', 'public');
            $pengumuman->link_pdf_pengumuman = $pdfPath;
        }

        $pengumuman->save();

        return redirect()->route('home')->with('success', 'Pengumuman berhasil dibuat');
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $otherBerita = OtherBerita::all(); // Example of fetching other berita

        return view('pengumuman.show', compact('pengumuman', 'otherBerita'));
    }
}