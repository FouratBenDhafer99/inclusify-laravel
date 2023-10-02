@extends('backoffice.layouts.app') <!-- Include your app's layout template -->

@section('content')
<div class="container">
    <h1>Edit Event</h1>
    <form method="POST" action="{{ route('events.update', $event->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $event->title }}" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" value="{{ $event->date }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $event->description }}</textarea>
        </div>
        <!-- Add more form fields for event details here -->

        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
@endsection
