{{-- resources/views/job.blade.php --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('frontoffice/js/jobSearch.js') }}"></script>


<div class="main-content list" style="width: 100%; padding: 16px;">
    <input type="text" id="searchInput" class="form-control" placeholder="Search Jobs">

                            @if (count($jobs) === 0)
                            <div class="alert alert-info" role="alert">
                                No jobs found.
                            </div>
                        @endif

                        @foreach($jobs as $index => $value)
                        <div class="row job-listing" id="joblist">
                       
                        <div class="card border-0 mb-3 shadow-xss bg-white rounded-3 pe-4 pt-4 pb-4 " style="padding-left: 20px; width:100% margin:20px;">
                            <div class="d-column item">
                                <i class="feather-bookmark font-md text-grey-500 position-absolute right-0 me-3"></i>
                                <h4 class="font-xss fw-700 text-grey-900 mb-3 pe-4">{{ $value['title'] }} <span class="font-xssss fw-500 text-grey-500 ms-4">Posted :{{ $value['created_at']->format('Y-m-d') }}</span></h4>
                                <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span class="text-grey-900 font-xssss text-dark">Location : </span> {{ $value['address'] }}</h5>
                                <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span class="text-grey-900 font-xssss text-dark">Company : </span>{{ $value['company'] }}</h5>
                                <h5 class="font-xssss text-grey-500 fw-600 mb-3"><span class="text-grey-900 font-xssss text-dark">Salary : </span> {{ $value['salaryRange'] }}</h5>
                                <a href="{{ route('jobs.showFront', ['id' => $value['id']]) }}" class="position-absolute bottom-15 mb-3 right-15 rounded-xl font-xss btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#applyModal">Apply</a>
                            </div>   
                            </div> 
                            </div> 
                        @endforeach

                        
                                 
    </div>



