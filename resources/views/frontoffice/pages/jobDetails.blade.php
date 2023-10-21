
@extends('frontoffice.base')


@section('content')

<link rel="stylesheet" href="resources/css/app.css">

<div class="main-content" style="padding:16px;">
    <div class="content">
        <div class="container-fluid">

        <div class="font-xss">Job Title : {{ $jobs->title}}</div>
        <div>Job Description : {{ $jobs->description}}</div>
        <div>Job Salary Range : {{ $jobs->salaryRange}}</div>
        <div>Job Company : {{ $jobs->company}}</div>
        <div>Job Address : {{ $jobs->address}}</div>
        <div>Job Created at : {{ $jobs->created_at}}</div>

        </div>
            

        <h3 class="font-xss fw-900 text-gray-500 p-4">Apply</h3>
        <!-- Add the job application form here -->
        <form style="width:50%" action="{{ route('job-applications.store', ['job_id' => $jobs->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Include form fields for job application, such as name, email, cover letter, etc. -->
            <!-- For example: -->
        
            <div class="mb-3">
                <label for="resume" class="form-label">Upload your resume:</label>
                <label for="resume" class="custom-file-upload" style="border: 1px solid #ccc; display: inline-block; padding: 6px 12px; cursor: pointer; background-color: #f9f9f9; color: #333; border-radius: 4px; font-weight: bold;">
                  <i class="fa fa-cloud-upload"></i> Choose File
                </label>
                <input type="file" class="form-control" id="resume" name="resume" style="display: none;" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Motivation:</label>
                <textarea class="form-control" id="motivation" name="motivation" required></textarea>
            </div>
            <!-- Add more form fields as needed -->
            <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
    </div>
</div>

@endsection