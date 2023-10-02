@extends('backoffice.layouts.app')

@section('content')
<div class="container">
    <h1>Events</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Location</th>
                <th>Organizer</th>
                <th>Status</th>
                <th>Capacity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <td>{{ $event->date }}</td>
                <td>{{ $event->location }}</td>
                <td>{{ $event->organizer }}</td>
                <td>{{ $event->status }}</td>
                <td>{{ $event->capacity }}</td>
                <td>
                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
