<?php
namespace App\Http\Controllers;

use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\HeadlineBerita;
use App\Models\OtherBerita;
use App\Models\Pengumuman;
use App\Models\TravelRecommendation;

class ContentController extends Controller
{
    public function listBerita()
    {
        $data = HeadlineBerita::all();
    
        foreach ($data as $item) {
            $item->formatted_date = Carbon::parse($item->date)->translatedFormat('d F Y');
        }
    
        return view('content.list_content', ['data' => $data, 'type' => 'berita']);
    }
    
    public function listPengumuman()
    {
        $data = Pengumuman::all();
    
        foreach ($data as $item) {
            $item->formatted_date = Carbon::parse($item->tanggal)->translatedFormat('d F Y');
        }
    
        return view('content.list_content', ['data' => $data, 'type' => 'pengumuman']);
    }
    
    public function listTravel()
    {
        $data = TravelRecommendation::all();
    
        foreach ($data as $item) {
            $item->formatted_date = Carbon::parse($item->date)->translatedFormat('d F Y');
        }
    
        return view('content.list_content', ['data' => $data, 'type' => 'travel']);
    }

    public function listGaleri()
    {
        $data = Gallery::all();
    
        foreach ($data as $item) {
            $item->formatted_date = Carbon::parse($item->date)->translatedFormat('d F Y');
        }
    
        return view('content.list_content', ['data' => $data, 'type' => 'galeri']);
    }

    public function listOtherBerita()
    {
        $data = OtherBerita::all();
    
        foreach ($data as $item) {
            $item->formatted_date = Carbon::parse($item->tanggal)->translatedFormat('d F Y');
        }
    
        return view('content.list_content', ['data' => $data, 'type' => 'otherBerita']);
    }
    
    public function show($type, $id)
    {
        // Helper function to format dates
        $formatDate = function($date) {
            return \Carbon\Carbon::parse($date)->translatedFormat('d F Y');
        };
    
        if ($type === 'berita') {
            $content = HeadlineBerita::findOrFail($id);
            $content->formatted_date = $formatDate($content->date);
        } elseif ($type === 'pengumuman') {
            $content = Pengumuman::findOrFail($id);
            $content->formatted_date = $formatDate($content->tanggal);
        } 
        elseif ($type === 'galeri') {
            $content = Gallery::findOrFail($id);
            $content->formatted_date = $formatDate($content->tanggal);
        } elseif ($type === 'travel') {
            $content = TravelRecommendation::findOrFail($id);
            $content->formatted_date = $formatDate($content->date);
        } elseif ($type === 'otherBerita') {
            $content = OtherBerita::findOrFail($id);
            $content->formatted_date = $formatDate($content->tanggal);
        } else {
            abort(404);
        }

        $otherContent = OtherBerita::all()->map(function($item) use ($formatDate) {
            $item->formatted_date = $formatDate($item->tanggal);
            return $item;
        });
    
        return view('content.detail_content', compact('type', 'content', 'otherContent'));
    }
}