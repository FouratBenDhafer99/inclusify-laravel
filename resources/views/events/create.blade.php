@extends('backoffice.layouts.app')

@section('content')
<div class="container">
    <h1>Create New Event</h1>
    <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" >
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4"></textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control @error('date') is-invalid @enderror" >
            @error('date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" >
                <option value="{{ \App\Models\Event::STATUS_UPCOMING }}">Upcoming</option>
                <option value="{{ \App\Models\Event::STATUS_ONGOING }}">Ongoing</option>
                <option value="{{ \App\Models\Event::STATUS_PAST }}">Past</option>
                <option value="{{ \App\Models\Event::STATUS_CANCELED }}">Canceled</option>
            </select>
            @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" class="form-control @error('location') is-invalid @enderror" >
            @error('location')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="form-group">
            <label for="organizer">Organizer</label>
            <select id="organizer_id" name="organizer_id" class="form-control @error('organizer_id') is-invalid @enderror" >
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('organizer_id') == $user->id ? 'selected' : '' }}>
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
            <label for="category">Category</label>
            <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror" >
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" id="capacity" name="capacity" class="form-control @error('capacity') is-invalid @enderror" >
            @error('capacity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="registration_deadline">Registration Deadline</label>
            <input type="date" id="registration_deadline" name="registration_deadline" class="form-control @error('registration_deadline') is-invalid @enderror" >
            @error('registration_deadline')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Event Image</label>
            <input type="file" id="image" name="image" class="form-control-file @error('image') is-invalid @enderror">
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Create Event</button>
    </form>
</div>



@endsection