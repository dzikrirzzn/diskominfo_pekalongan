<?php

namespace App\Http\Controllers;

use App\Models\TravelRecommendation;
use Illuminate\Http\Request;

class TravelRecommendationController extends Controller
{
    public function index()
    {
        $travelRecommendations = TravelRecommendation::all();
        return view('home', compact('travelRecommendations'));
    }

    public function create()
    {
        return view('travel_recommendations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'sub_judul' => 'required',
            'isi' => 'required',
            'map' => 'required',
            'author' => 'required',
            'date' => 'required|date',
        ]);

        $travelRecommendation = new TravelRecommendation();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $travelRecommendation->image = $imagePath;
        }

        $travelRecommendation->judul = $request->judul;
        $travelRecommendation->sub_judul = $request->sub_judul;
        $travelRecommendation->isi = $request->isi;
        $travelRecommendation->map = $request->map;
        $travelRecommendation->author = $request->author;
        $travelRecommendation->date = $request->date;

        $travelRecommendation->save();

        return redirect()->back()->with('success', 'Travel berhasil diupload!');

    }

    public function show($id)
    {
        $travelRecommendation = TravelRecommendation::findOrFail($id);
        return view('travel_recommendations.show', compact('travelRecommendation'));
    }

    public function edit($id)
    {
        $travelRecommendation = TravelRecommendation::findOrFail($id);
        return view('admin.travel_recommendations.edit', compact('travelRecommendation'));
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'judul' => 'required',
    //         'sub_judul' => 'required',
    //         'isi' => 'required',
    //         'map' => 'required',
    //         'author' => 'required',
    //         'date' => 'required|date',
    //     ]);

    //     $travelRecommendation = TravelRecommendation::findOrFail($id);

    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('images', 'public');
    //         $travelRecommendation->image = $imagePath;
    //     }

    //     $travelRecommendation->judul = $request->judul;
    //     $travelRecommendation->sub_judul = $request->sub_judul;
    //     $travelRecommendation->isi = $request->isi;
    //     $travelRecommendation->map = $request->map;
    //     $travelRecommendation->author = $request->author;
    //     $travelRecommendation->date = $request->date;

    //     $travelRecommendation->save();

    //     return redirect()->route('admin_travel')->with('success', 'Travel Recommendation updated successfully.');
    // }

    public function destroy($id)
    {
        $travelRecommendation = TravelRecommendation::findOrFail($id);
        $travelRecommendation->delete();

        return redirect()->route('admin_travel')->with('success', 'Travel Recommendation deleted successfully.');
    }
}