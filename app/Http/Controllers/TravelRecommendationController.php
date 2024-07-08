<?php

namespace App\Http\Controllers;

use App\Models\TravelRecommendation;
use Illuminate\Http\Request;

class TravelRecommendationController extends Controller
{
    public function index()
    {
        $travelRecommendations = TravelRecommendation::all();
        return view('admin.travel_recommendations.index', compact('travelRecommendations'));
    }

    public function create()
    {
        return view('admin.travel_recommendations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'judul' => 'required',
            'sub_judul' => 'required',
            'isi' => 'required',
            'map' => 'required',
            'author' => 'required',
            'date' => 'required|date',
        ]);

        TravelRecommendation::create($request->all());

        return redirect()->route('admin_travel')->with('success', 'Travel Recommendation created successfully.');
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required',
            'judul' => 'required',
            'sub_judul' => 'required',
            'isi' => 'required',
            'map' => 'required',
            'author' => 'required',
            'date' => 'required|date',
        ]);

        $travelRecommendation = TravelRecommendation::findOrFail($id);
        $travelRecommendation->update($request->all());

        return redirect()->route('admin_travel')->with('success', 'Travel Recommendation updated successfully.');
    }

    public function destroy($id)
    {
        $travelRecommendation = TravelRecommendation::findOrFail($id);
        $travelRecommendation->delete();

        return redirect()->route('admin_travel')->with('success', 'Travel Recommendation deleted successfully.');
    }
}