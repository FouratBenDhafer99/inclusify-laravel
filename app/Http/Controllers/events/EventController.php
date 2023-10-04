<?php
namespace App\Http\Controllers\events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all(); 

        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event = Event::create($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Event created successfully.');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Event deleted successfully.');
    }


    public function search(Request $request)
    {
        $query = $request->input('search');
        $events = Event::where('name', 'like', '%' . $query . '%')->get();
    
        return view('events.search_results', compact('events'));
    }
    
    public function deleteAll(Request $request)
    {
        $selectedEventIds = explode(',', $request->input('selectedEvents'));

        // Log the selected IDs for debugging
        \Log::info('Selected Event IDs: ' . json_encode($selectedEventIds));

        if (!is_array($selectedEventIds)) {
            return redirect()->back()->with('error', 'No events selected for deletion.');
        }

        // Use the `destroy` method to delete events by their IDs
        Event::destroy($selectedEventIds);

        return redirect()->route('events.index')->with('success', 'Selected events have been deleted.');
    }

    
    
    
}
