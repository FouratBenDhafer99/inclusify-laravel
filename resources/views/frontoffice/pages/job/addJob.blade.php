@extends('frontoffice.base')
@section('content')
<div class="main-content" style="padding:16px;">
    <div class="content">
        <div class="container-fluid">
        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div
                                    class="card p-md-5 p-4 bg-primary-gradiant rounded-3 shadow-xss bg-pattern border-0 overflow-hidden">
                                    <div class="bg-pattern-div"></div>
                                    <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0">
                                       Add your job offer
                                    </h2>
                                </div>
                            </div>
                        </div>
        <form  action="{{ route('jobs.storeFront') }}" method="POST">
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
                            <button type="submit" class="btn btn-primary rounded- fon-xss text-white">Add Job</button>
                        </form>

        </div>
     </div>
</div>
@endsection   
    
