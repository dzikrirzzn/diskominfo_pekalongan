<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.event.index', compact('events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_date' => 'required|date',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'subtitle' => 'nullable|string',
            'location' => 'nullable|string',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required|url'
        ]);
    
        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/images');
            $validated['image'] = basename($imagePath);
        }
    
        Event::create($validated);
        return redirect()->route('admin.event.index');
    }

    public function create()
    {
        $events = Event::all();
        return view('admin.event.create', compact('events'));
    }

    public function show(Event $event)
    {
        return view('admin.event.show', compact('event'));
    }

    public function update(Request $request, Event $event)
{
    $validated = $request->validate([
        'event_date' => 'required|date',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'subtitle' => 'nullable|string',
        'location' => 'nullable|string',
        'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'link' => 'required|url'
    ]);

    // Handle file upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('public/images');
        $validated['image'] = basename($imagePath);
    }

    $event->update($validated);
    return redirect()->route('admin.event.index');
}

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.event.index');
    }
    
    public function adminIndex()
    {
        $events = Event::all();
        return view('admin.event.index', compact('events'));
    }
    public function edit($id)
    {
        $events = Event::findOrFail($id);

        if (!$events) {
            return redirect()->route('admin.event.index')->with('error', 'Event tidak ditemukan.');
        }

        return view('admin.event.edit', compact('events'));
    }
}