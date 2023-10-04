<?php

namespace App\Http\Controllers\events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryEvent;

class CategoryEventController extends Controller
{
    public function index()
    {
        $categoryEvents = CategoryEvent::all();

        return view('categoryevents.index', compact('categoryEvents'));
    }

    public function create()
    {
        return view('categoryevents.create');
    }

    public function store(Request $request)
    {
        $categoryEvent = CategoryEvent::create($request->all());

        return redirect()->route('categoryevents.index')
            ->with('success', 'Category Event created successfully.');
    }

    public function show($id)
    {
        $categoryEvent = CategoryEvent::findOrFail($id);

        return view('categoryevents.show', compact('categoryEvent'));
    }

    public function edit($id)
    {
        $categoryEvent = CategoryEvent::findOrFail($id);

        return view('categoryevents.edit', compact('categoryEvent'));
    }

    public function update(Request $request, $id)
    {
        $categoryEvent = CategoryEvent::findOrFail($id);
        $categoryEvent->update($request->all());

        return redirect()->route('categoryevents.index')
            ->with('success', 'Category Event updated successfully.');
    }

    public function destroy($id)
    {
        $categoryEvent = CategoryEvent::findOrFail($id);
        $categoryEvent->delete();

        return redirect()->route('categoryevents.index')
            ->with('success', 'Category Event deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = CategoryEvent::query();
        $categoryEvents = $query->get();

        return view('categoryevents.index', compact('categoryEvents'));
    }
}
