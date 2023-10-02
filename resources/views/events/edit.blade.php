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
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" value="{{ $event->location }}" required>
        </div>
        <div class="form-group">
            <label for="organizer">Organizer</label>
            <input type="text" name="organizer" class="form-control" value="{{ $event->organizer }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="{{ App\Models\Event::STATUS_UPCOMING}}" {{ $event->status == App\Models\Event::STATUS_UPCOMING ? 'selected' : '' }}>Upcoming</option>
                <option value="{{ App\Models\Event::STATUS_ONGOING }}" {{ $event->status == App\Models\Event::STATUS_ONGOING ? 'selected' : '' }}>Ongoing</option>
                <option value="{{ App\Models\Event::STATUS_PAST }}" {{ $event->status == App\Models\Event::STATUS_PAST ? 'selected' : '' }}>Past</option>
                <option value="{{ App\Models\Event::STATUS_CANCELED }}" {{ $event->status == App\Models\Event::STATUS_CANCELED ? 'selected' : '' }}>Canceled</option>
            </select>
        </div>

        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" name="capacity" class="form-control" value="{{ $event->capacity }}" required>
        </div>
        <div class="form-group">
            <label for="registration_deadline">Registration Deadline</label>
            <input type="date" name="registration_deadline" class="form-control" value="{{ $event->registration_deadline }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" name="image" class="form-control" value="{{ $event->image }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
@endsection
