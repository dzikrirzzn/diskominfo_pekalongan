<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $allPengumuman = Pengumuman::all();
        return view('pengumuman.list', compact('allPengumuman'));
    }

    public function home()
    {
        $pengumuman = Pengumuman::all();
        return view('home', compact('pengumuman'));
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        if (!$pengumuman) {
            return redirect()->route('pengumuman.index')->with('error', 'Pengumuman tidak ditemukan.');
        }
        $type = 'pengumuman';


        return view('content.detail_content', compact('pengumuman'));
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        try {
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

            return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diupload!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupload pengumuman: ' . $e->getMessage());
        }
    }

    public function adminIndex()
    {
        $allPengumuman = Pengumuman::all();
        foreach ($allPengumuman as $pengumuman) {
            $pengumuman->formatted_date = Carbon::parse($pengumuman->tanggal)->translatedFormat('d F Y');
        }
        return view('admin.pengumuman.index', compact('allPengumuman'));
    }

    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        if (!$pengumuman) {
            return redirect()->route('admin.pengumuman.index')->with('error', 'Pengumuman tidak ditemukan.');
        }

        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $this->validateRequest($request, false);

        try {
            $pengumuman = Pengumuman::findOrFail($id);

            if (!$pengumuman) {
                return redirect()->route('admin.pengumuman.index')->with('error', 'Pengumuman tidak ditemukan.');
            }

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

            return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('admin.pengumuman.index')->with('error', 'Terjadi kesalahan saat memperbarui pengumuman: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $pengumuman = Pengumuman::findOrFail($id);

            if (!$pengumuman) {
                return redirect()->route('admin.pengumuman.index')->with('error', 'Pengumuman tidak ditemukan.');
            }

            $pengumuman->delete();

            return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.pengumuman.index')->with('error', 'Terjadi kesalahan saat menghapus pengumuman: ' . $e->getMessage());
        }
    }

    private function validateRequest(Request $request, $isCreate = true)
    {
        $rules = [
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'penulis' => 'required|string|max:255',
            'isi_pengumuman' => 'required|string',
        ];

        if ($isCreate) {
            $rules['gambar_pengumuman'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
            $rules['link_pdf_pengumuman'] = 'nullable|mimes:pdf|max:2048';
        } else {
            $rules['gambar_pengumuman'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
            $rules['link_pdf_pengumuman'] = 'nullable|mimes:pdf|max:2048';
        }

        $request->validate($rules);
    }
}