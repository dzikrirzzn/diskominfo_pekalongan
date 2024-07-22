<?php
namespace App\Http\Controllers;

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
        return view('content.list_content', ['data' => $data, 'type' => 'berita']);
    }

    public function listPengumuman()
    {
        $data = Pengumuman::all();
        return view('content.list_content', ['data' => $data, 'type' => 'pengumuman']);
    }

    public function listTravel()
    {
        $data = TravelRecommendation::all();
        return view('content.list_content', ['data' => $data, 'type' => 'travel']);
    }

    public function show($type, $id)
    {
        if ($type === 'berita') {
            $content = HeadlineBerita::find($id);
            $otherContent = OtherBerita::all();
        } elseif ($type === 'pengumuman') {
            $content = Pengumuman::find($id);
            $otherContent = Pengumuman::all();
        } elseif ($type === 'travel') {
            $content = TravelRecommendation::find($id);
            $otherContent = TravelRecommendation::all();
        } else {
            abort(404);
        }

        return view('content.detail_content', compact('type', 'content', 'otherContent'));
    }
}