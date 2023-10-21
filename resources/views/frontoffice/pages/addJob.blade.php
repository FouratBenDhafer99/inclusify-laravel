@extends('frontoffice.base')
@section('content')
<div class="main-content" style="padding:16px;">
    <div class="content">
        <div class="container-fluid">
        <form  action="{{ route('jobs.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="mymodal" style="color: #808080;" for="title">Title</label>
                                <input type="text" style="color: #808080;" class="form-control" id="title" name="title" required>
                                @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Add more form fields for job details (description, salaryRange, company, address, etc.) -->
                            <div class="form-group">
                                <label style="color: #808080;" for="description">Description</label>
                                <textarea class="form-control" style="color: #808080;" id="description" name="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label style="color: #808080;" for="salaryRange">Salary Range</label>
                                <input type="text" style="color: #808080;" class="form-control" id="salaryRange" name="salaryRange" required>
                            </div>
                            <div class="form-group">
                                <label style="color: #808080;" for="company">Company</label>
                                <input type="text" style="color: #808080;" class="form-control" id="company" name="company" required>
                            </div>
                            <div class="form-group">
                                <label style="color: #808080;" for="address">Address</label>
                                <input style="color: #808080;" class="form-control" id="address" name="address" required></input>
                            </div>
                            
                            <!-- Add more form fields as needed -->
                            <button type="submit" class="btn btn-primary">Add Job</button>
                        </form>

        </div>
     </div>
</div>
@endsection   
    
