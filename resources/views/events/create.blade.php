@extends('backoffice.layouts.app')

@section('content')
<div class="container">
    <h1>Create New Event</h1>

    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="organizer">Organizer</label>
            <input type="text" id="organizer" name="organizer" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="{{ \App\Models\Event::STATUS_UPCOMING }}">Upcoming</option>
                <option value="{{ \App\Models\Event::STATUS_ONGOING }}">Ongoing</option>
                <option value="{{ \App\Models\Event::STATUS_PAST }}">Past</option>
                <option value="{{ \App\Models\Event::STATUS_CANCELED }}">Canceled</option>
            </select>
        </div>

        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" id="capacity" name="capacity" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="registration_deadline">Registration Deadline</label>
            <input type="date" id="registration_deadline" name="registration_deadline" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Event Image</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Create Event</button>
    </form>
</div>
@endsection
