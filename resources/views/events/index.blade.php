@extends('backoffice.layouts.app') <!-- Include your app's layout template -->

@section('content')
<div class="container">
    <h1>Events</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <!-- Add more table headers for other attributes -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->date }}</td>
                <!-- Add more table cells for other attributes -->
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
