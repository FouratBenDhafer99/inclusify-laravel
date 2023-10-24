@extends('backoffice.jobs.list')
@section('content')

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
