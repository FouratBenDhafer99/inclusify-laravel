<?php
namespace App\Http\Controllers\events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Categories;

class EventController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $events = Event::all();
        $data = [
            'categories' => $categories,
            'events' => $events,
        ];
        return view('events.index', compact('data'));
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
        $selectedEventIds = $request->input('selectedEvents');

        if (is_array($selectedEventIds)) {
            // Multiple events selected for deletion
            foreach ($selectedEventIds as $eventId) {
                $event = Event::findOrFail($eventId);
                $event->delete();
            }
        } elseif (!empty($selectedEventIds)) {
            // Single event selected for deletion
            $event = Event::findOrFail($selectedEventIds);
            $event->delete();
        }

        return redirect()->route('events.index')->with('success', 'Event(s) deleted successfully.');
    }

    
}
