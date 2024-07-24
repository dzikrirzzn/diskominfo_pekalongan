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
        ]);

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
        ]);

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
}
