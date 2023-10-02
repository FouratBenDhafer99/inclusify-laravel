<?php
namespace App\Http\Controllers\events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Display a listing of events.
    public function index()
    {
        $events = Event::all(); 

        return view('events.index', compact('events'));
    }

    // Show the form for creating a new event.
    public function create()
    {
        return view('events.create');
    }

    // Store a newly created event in the database.
    public function store(Request $request)
    {
        $event = Event::create($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Event created successfully.');
    }

    // Display the specified event.
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', compact('event'));
    }

    // Show the form for editing the specified event.
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('events.edit', compact('event'));
    }

    // Update the specified event in the database.
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Event updated successfully.');
    }

    // Remove the specified event from the database.
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Event deleted successfully.');
    }

    // Search and filter events based on user input.
    public function search(Request $request)
    {
        $query = Event::query();
        
        $events = $query->get();

        return view('events.index', compact('events'));
    }
}
