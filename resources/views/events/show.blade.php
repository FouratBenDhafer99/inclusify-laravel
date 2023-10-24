@extends('backoffice.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- Display the event image with a larger size -->
            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}" class="img-fluid img-large">
        </div>
        <div class="col-md-8">
            <!-- Event details displayed on the right -->
            <h1>{{ $event->name }}</h1>
            <p>Date: {{ $event->date }}</p>
            <p>Description: {{ $event->description }}</p>
            <p>Location: {{ $event->location }}</p>
            <p>Organizer: {{ $event->organizer->name }}</p>
            <p>Status: {{ $event->status }}</p>
            <p>Capacity: {{ $event->capacity }}</p>
            <p>Registration Deadline: {{ $event->registration_deadline }}</p>
            <p>Category: {{ $event->category->name }}</p>

    
            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>

<style>
    /* Custom CSS to make the image larger */
    .img-large {
        width: 100%;
        max-height: 400px; /* Adjust this value to control the maximum height of the image */
    }
</style>
@endsection
