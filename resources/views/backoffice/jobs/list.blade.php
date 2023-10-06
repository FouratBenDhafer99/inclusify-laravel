@extends('backoffice.layouts.app', ['page' => __('Jobs'), 'pageSlug' => 'jobs'])

@section('content')


                        <div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Job Offers</h4>
                    </div>
                    <div class="col-4 text-right">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addJobModal">
                        Add Job Offer
                    </button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="addJobModal" tabindex="-1" role="dialog" aria-labelledby="addJobModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addJobModalLabel">Add Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <!-- Job addition form goes here -->
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
</div>
@if(session('success'))
    <div id="myAlert" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
            <div class="card-body">

                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                        <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Salary Range</th>
                                <th scope="col">Company</th>
                                <th scope="col">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->description }}</td>
                                <td>{{ $job->salaryRange }}</td>
                                <td>{{ $job->company }}</td>
                                <td>{{ $job->address }}</td>
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
    <script>
    $(document).ready(function() {
        $("#myAlert").fadeIn();

        setTimeout(function() {
            $("#myAlert").fadeOut();
        }, 3000);
    });
</script>

    @endsection
