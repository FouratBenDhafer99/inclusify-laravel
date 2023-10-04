@extends('backoffice.layouts.app')

@section('content')
<div class="container">
    <h1>{{ $event->name }}</h1>
    <p>Date: {{ $event->date }}</p>
    <p>Description: {{ $event->description }}</p>
    <p>Location: {{ $event->location }}</p>
    <p>Organizer: {{ $event->organizer }}</p>
    <p>Status: {{ $event->status }}</p>
    <p>Capacity: {{ $event->capacity }}</p>
    <p>registration_deadline: {{ $event->registration_deadline }}</p>
    <p>image: {{ $event->image }}</p>
    <p>Creation_date: {{ $event->creation_date }}</p>

    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
</div>
@endsection
