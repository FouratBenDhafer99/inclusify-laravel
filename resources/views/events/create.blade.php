@extends('backoffice.layouts.app') <!-- Include your app's layout template -->

@section('content')
<div class="container">
    <h1>Create New Event</h1>
    <form method="POST" action="{{ route('events.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>
        <!-- Add more form fields for event details here -->

        <button type="submit" class="btn btn-primary">Create Event</button>
    </form>
</div>
@endsection
