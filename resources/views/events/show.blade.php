@extends('backoffice.layouts.app') <!-- Include your app's layout template -->

@section('content')
<div class="container">
    <h1>{{ $event->title }}</h1>
    <p>Date: {{ $event->date }}</p>
    <p>Description: {{ $event->description }}</p>
    <p>Location: {{ $event->location }}</p>
    <!-- Add more event details here -->

    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
</div>
@endsection
