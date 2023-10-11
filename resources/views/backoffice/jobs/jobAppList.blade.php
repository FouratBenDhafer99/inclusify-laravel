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
            <!-- <div class="modal fade" id="delJobModal" tabindex="-1" role="dialog" aria-labelledby="delJobModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="padding: 20px; display: flex; justify-content: center;">
                        <form style=" display: flex; justify-content: center; flex-direction:column" method="POST" action="{{ route('jobs.destroy', $job->id) }}">
                            @csrf
                            @method('DELETE')
                            <p style="color: #808080;" >Are you sure you want to delete this job?</p>
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div> -->
            <!-- Edit Modal -->
            <!-- <div class="modal fade" id="editJobModal" tabindex="-1" role="dialog" aria-labelledby="editJobModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editJobModalLabel">Edit Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('jobs.update', $job->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" value="{{ $job->title }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description">{{ $job->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="salaryRange">Salary Range:</label>
                        <input type="text" id="salaryRange" name="salaryRange" value="{{ $job->salaryRange }}">
                    </div>

                    <div class="form-group">
                        <label for="company">Company:</label>
                        <input type="text" id="company" name="company" value="{{ $job->company }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" value="{{ $job->address }}">
                    </div>

                     

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div> -->
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
