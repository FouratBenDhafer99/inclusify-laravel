@extends('backoffice.layouts.app', ['page' => __('JobApplications'), 'pageSlug' => 'JobApplications'])

@section('content')


        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Job Offers</h4>
                            </div>
                        </div>
                    </div>
                    
            <div class="card-body">

                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                        <tr>
                                <th scope="col">Resume</th>
                                <th scope="col">Motivation</th>
                                <th scope="col">Staus</th>
                                <th scope="col">Applicant </th>
                                <th scope="col">Job </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($jobApplications as $job)
                            <tr>
                                <td>{{ $job->resume_path }}</td>
                                <td>{{ $job->motivation }}</td>
                                <td>{{ $job->status }}</td>
                                <td>{{ $job->user->name }}</td>
                                <td>{{ $job->job->title }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                    </table>
                </div>
            </div>
            
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">

                </nav>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
    $(document).ready(function() {
        $("#myAlert").fadeIn();

        setTimeout(function() {
            $("#myAlert").fadeOut();
        }, 3000);
    });
</script>

    @endsection
