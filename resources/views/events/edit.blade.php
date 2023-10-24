@extends('backoffice.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Event</h1>
    <form method="POST" action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $event->name }}" >
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ $event->date ? date('Y-m-d', strtotime($event->date)) : '' }}" >
            @error('date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" >{{ $event->description }}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ $event->location }}">
            @error('location')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="organizer">Organizer</label>
            <select name="organizer_id" class="form-control @error('organizer_id') is-invalid @enderror">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $event->organizer->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('organizer_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control @error('status') is-invalid @enderror">
                <option value="{{ \App\Models\Event::STATUS_UPCOMING }}" {{ old('status', $event->status) == \App\Models\Event::STATUS_UPCOMING ? 'selected' : '' }}>Upcoming</option>
                <option value="{{ \App\Models\Event::STATUS_ONGOING }}" {{ old('status', $event->status) == \App\Models\Event::STATUS_ONGOING ? 'selected' : '' }}>Ongoing</option>
                <option value="{{ \App\Models\Event::STATUS_PAST }}" {{ old('status', $event->status) == \App\Models\Event::STATUS_PAST ? 'selected' : '' }}>Past</option>
                <option value="{{ \App\Models\Event::STATUS_CANCELED }}" {{ old('status', $event->status) == \App\Models\Event::STATUS_CANCELED ? 'selected' : '' }}>Canceled</option>
            </select>
            @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" name="capacity" class="form-control @error('capacity') is-invalid @enderror" value="{{ $event->capacity }}">
            @error('capacity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="registration_deadline">Registration Deadline</label>
            <input type="date" name="registration_deadline" class="form-control @error('registration_deadline') is-invalid @enderror"
                value="{{ old('registration_deadline', $event->registration_deadline) }}">
            @error('registration_deadline')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="categories">Categories</label>
            <select name="categories[]" class="form-control" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('categories')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror">
            <!-- Display the current image if available -->
            @if ($event->image)
                <div class="mt-2">
                    <strong>Current Image:</strong>
                    <br>
                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="img-thumbnail" style="max-width: 200px;">
                </div>
            @endif
        </div>
        @if (isset($newImage))
            <div class="mt-2">
                <strong>Newly Selected Image:</strong>
                <br>
                <img src="{{ asset('storage/' . $newImage) }}" alt="{{ $event->title }}" class="img-thumbnail" style="max-width: 200px;">
            </div>
        @endif

        
        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
@endsection