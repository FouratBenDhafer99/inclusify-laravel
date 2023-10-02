<?php

namespace App\Http\Controllers\events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryEvent;

class CategoryEventController extends Controller
{
    // Display a listing of category events.
    public function index()
    {
        $categoryEvents = CategoryEvent::all(); // You can customize this query for pagination or filtering.

        return view('categoryevents.index', compact('categoryEvents'));
    }

    // Show the form for creating a new category event.
    public function create()
    {
        return view('categoryevents.create');
    }

    // Store a newly created category event in the database.
    public function store(Request $request)
    {
        $categoryEvent = CategoryEvent::create($request->all());

        return redirect()->route('categoryevents.index')
            ->with('success', 'Category Event created successfully.');
    }

    // Display the specified category event.
    public function show($id)
    {
        $categoryEvent = CategoryEvent::findOrFail($id);

        return view('categoryevents.show', compact('categoryEvent'));
    }

    // Show the form for editing the specified category event.
    public function edit($id)
    {
        $categoryEvent = CategoryEvent::findOrFail($id);

        return view('categoryevents.edit', compact('categoryEvent'));
    }

    // Update the specified category event in the database.
    public function update(Request $request, $id)
    {
        $categoryEvent = CategoryEvent::findOrFail($id);
        $categoryEvent->update($request->all());

        return redirect()->route('categoryevents.index')
            ->with('success', 'Category Event updated successfully.');
    }

    // Remove the specified category event from the database.
    public function destroy($id)
    {
        $categoryEvent = CategoryEvent::findOrFail($id);
        $categoryEvent->delete();

        return redirect()->route('categoryevents.index')
            ->with('success', 'Category Event deleted successfully.');
    }

    // Search and filter category events based on user input.
    public function search(Request $request)
    {
        $query = CategoryEvent::query();

        // Add search and filter conditions here based on user input.
        // Example: $query->where('name', 'like', '%' . $request->input('search_term') . '%');
        
        $categoryEvents = $query->get();

        return view('categoryevents.index', compact('categoryEvents'));
    }
}
