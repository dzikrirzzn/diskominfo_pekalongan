<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelRecommendation;

class TravelRecommendationController extends Controller
{
    public function index()
    {
        $travelRecommendations = TravelRecommendation::all();
        return view('admin.travel.index', compact('travelRecommendations'));
    }

    public function adminIndex()
    {
        $allTravel = TravelRecommendation::all();
        return view('admin.travel.index', compact('allTravel'));
    }

    public function create()
    {
        return view('admin.travel.create');
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        try {
            $travelRecommendation = new TravelRecommendation();

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $travelRecommendation->image = $imagePath;
            }

            $travelRecommendation->judul = $request->judul;
            $travelRecommendation->sub_judul = $request->sub_judul;
            $travelRecommendation->isi = $request->isi;
            $travelRecommendation->map_location = $request->map_location;
            $travelRecommendation->author = $request->author;
            $travelRecommendation->date = $request->date;

            $travelRecommendation->save();

            return redirect()->route('admin.travel.index')->with('success', 'Travel Recommendation uploaded successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to upload travel recommendation: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $travelRecommendation = TravelRecommendation::findOrFail($id);
        return view('admin.travel.edit', compact('travelRecommendation'));
    }
    public function show($id)
    {
        $travelRecommendation = TravelRecommendation::findOrFail($id);

        if (!$travelRecommendation) {
            return redirect()->route('travel.index')->with('error', 'Travel tidak ditemukan.');
        }
        $type = 'travel';


        return view('content.detail_content', compact('travelRecommendation'));
    }

    public function update(Request $request, $id)
    {
        $this->validateRequest($request);

        try {
            $travelRecommendation = TravelRecommendation::findOrFail($id);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $travelRecommendation->image = $imagePath;
            }

            $travelRecommendation->judul = $request->judul;
            $travelRecommendation->sub_judul = $request->sub_judul;
            $travelRecommendation->isi = $request->isi;
            $travelRecommendation->map_location = $request->map_location;
            $travelRecommendation->author = $request->author;
            $travelRecommendation->date = $request->date;

            $travelRecommendation->save();

            return redirect()->route('admin.travel.index')->with('success', 'Travel Recommendation updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update travel recommendation: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $travelRecommendation = TravelRecommendation::findOrFail($id);
            $travelRecommendation->delete();

            return redirect()->route('admin.travel.index')->with('success', 'Travel Recommendation deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete travel recommendation: ' . $e->getMessage());
        }
    }

    private function validateRequest(Request $request)
    {
        $rules = [
            'judul' => 'required|string|max:255',
            'sub_judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'map_location' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'date' => 'required|date',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $request->validate($rules);
    }
}