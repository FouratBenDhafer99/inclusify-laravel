
@extends('frontoffice.base')


@section('content')

<link rel="stylesheet" href="resources/css/app.css">

<div class="main-content" style="padding:16px;">
    <div class="content">
    <div class="container-fluid">
    <div class="card border-0 mb-3 shadow-xss bg-white rounded-3 p-4">
        <div class="font-weight-bold font-xss mb-2">Job Title:</div>
        <h4 class="font-xl">{{ $jobs->title }}</h4>

        <div class="font-weight-bold font-xss mt-4 mb-2">Job Description:</div>
        <p class="font-md">{{ $jobs->description }}</p>

        <div class="font-weight-bold font-xss mt-4 mb-2">Job Salary:</div>
        <p class="font-md">{{ $jobs->salaryRange }}</p>

        <div class="font-weight-bold font-xss mt-4 mb-2">Job Company:</div>
        <p class="font-md">{{ $jobs->company }}</p>

        <div class="font-weight-bold font-xss mt-4 mb-2">Job Address:</div>
        <p class="font-md">{{ $jobs->address }}</p>

        <div class="font-weight-bold font-xss mt-4 mb-2">Job Created At:</div>
        <p class="font-md">{{ $jobs->created_at }}</p>
    </div>
</div>
            

        <<div
                                    class="card p-md-5 p-4 bg-primary-gradiant rounded-3 shadow-xss bg-pattern border-0 overflow-hidden mb-2">
                                    <div class="bg-pattern-div"></div>
                                    <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0">
                                       Apply for this job
                                    </h2>
                                </div>
                            </div>
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
            <button type="submit" class="btn btn-primary font-xss text-white rounded-xl ">Submit Application</button>
        </form>
    </div>
</div>

@endsection