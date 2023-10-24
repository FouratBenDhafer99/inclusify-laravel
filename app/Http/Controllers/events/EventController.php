<?php
namespace App\Http\Controllers\events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\CategoryEvent;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    public function index()
    {
        $categories = CategoryEvent::all();
        $events = Event::all();
        $data = [
            'categories' => $categories,
            'events' => $events,
        ];
        return view('events.index', compact('data'));
    }


    public function create()
    {
        $users = User::all();
        $categories = CategoryEvent::all();
        return view('events.create', ['users' => $users, 'categories' => $categories]);
    }

    public function store(EventRequest $request) 
    {
        try {
            $data = $request->validated(); 

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('event_images', 'public');
                $data['image'] = $imagePath;
            }

            $event = Event::create($data);

            return redirect()->route('admin.events')
                ->with('success', 'Event created successfully');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', compact('event'));
    }

    public function edit($id)
    {
        $users = User::all();
        $categories = CategoryEvent::all();
        $event = Event::findOrFail($id);
        return view('events.edit',  ['event'=>$event, 'users' => $users, 'categories' => $categories]);
    }

    public function update(EventRequest $request, $id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->update($request->validated());
    
            if ($request->hasFile('image')) {
                $newImage = $request->file('image');
    
                $imagePath = $newImage->store('images', 'public');
                $event->image = $imagePath;
                $event->save();
            }
            return redirect()->route('admin.events')
                ->with('success', 'Event updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while updating the event.');
        }
    }
    
    


    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.events')
            ->with('success', 'Event deleted successfully.');
    }


    public function search(Request $request)
    {
        $query = $request->input('search');
        $events = Event::where('name', 'like', '%' . $query . '%')->get();
    
        return view('events.search_results', compact('events'));
    }

    
    public function deleteAll()
    {
        Event::query()->delete();

        return redirect()->route('admin.events')
            ->with('success', 'All events have been deleted.');
    }
    
    

    public function generateGoogleMeetLink()
    {
        try {
            $client = new Google_Client();
            $client->setAuthConfig(storage_path('app/inclusify-402519-954fb7ca73eb.json'));
            $client->setSubject('oumaima.ayachi@esprit.tn');
            $client->setAccessType('offline');
            $client->setApprovalPrompt('force');
            $client->fetchAccessTokenWithAssertion();
            $service = new Google_Service_Calendar($client);
            $event = new Google_Service_Calendar_Event();
            $calendarId = 'primary';
            $event = $service->events->insert($calendarId, $event);
            $meetLink = $event->getConferenceData()->getEntryPoints()[0]->getUri();
            Log::info($meetLink);
            return $meetLink;
        } catch (\Exception $e) {
            Log::error('Error in generateGoogleMeetLink: ' . $e->getMessage());
            return response('Internal Server Error', 500);
        }
    }
    
    
    
    

}
