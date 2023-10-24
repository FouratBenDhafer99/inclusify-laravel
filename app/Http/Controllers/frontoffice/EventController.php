<?php

namespace App\Http\Controllers\frontoffice;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Notifications\EventJoined;
use App\Models\CategoryEvent;

class EventController extends Controller
{
    
    public function listEvents()
    {
        $events = Event::all();
        $currentUser = auth()->user();
        $attendedEvents = $currentUser->eventsAttended;
        $categoryAttendanceCounts = [];
        if ($attendedEvents->isNotEmpty()) {
            foreach ($attendedEvents as $event) {
                $category = $event->category;
                if ($category) {
                    if (!isset($categoryAttendanceCounts[$category->name])) {
                        $categoryAttendanceCounts[$category->name] = 0;
                    }
                    $categoryAttendanceCounts[$category->name]++;
                }
            }
            arsort($categoryAttendanceCounts);
            $topCategory = key($categoryAttendanceCounts);
            $topCategoryModel = CategoryEvent::where('name', $topCategory)->first();
            if ($topCategoryModel) {
                $topEvents = Event::where('category_id', $topCategoryModel->id)
                    ->withCount('attendees')
                    ->orderBy('attendees_count', 'desc')
                    ->take(9)
                    ->get();
                $recommandEvents = $topEvents->reject(function ($event) use ($attendedEvents) {
                    return $attendedEvents->contains('id', $event->id);
                });
                return view('frontoffice.pages.base.events', compact('events', 'recommandEvents'));
            }
        }
        return view('frontoffice.pages.base.events', ['events'=> $events, 'recommandEvents' => null]);
    }

    

    public function joinEvent(Event $event)
    {
        auth()->user()->eventsAttended()->attach($event);
        auth()->user()->notify(new EventJoined($event,"join"));
        return redirect()->route('event.list')->with('success', 'You have successfully joined the event.');
    }

    public function cancelJoin(Event $event)
    {
        auth()->user()->eventsAttended()->detach($event);
        auth()->user()->notify(new EventJoined($event,"cancel"));
        return redirect()->route('event.list')->with('success', 'You have out from the event.');
    }

    

    public function search(Request $request)
    {
        $search = $request->input('search');

        $events =  Event::where('name', 'like', '%' . $search . '%')->get();

        return view('frontoffice.pages.base.events', ['events'=> $events, 'recommandEvents' => null]);
    }

    public function detail(Event $event)
    {
        $event = Event::with('comments')->find($event->id);
    
        return view('frontoffice.event.detailEvent', compact('event'));
    }
    

}