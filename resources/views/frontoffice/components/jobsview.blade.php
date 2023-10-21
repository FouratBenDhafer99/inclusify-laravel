{{-- resources/views/job.blade.php --}}


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-pzjw8f+ua5xlGGn538O/dzjzQndSyLrU4dOW0hTU6XzIRNIoT6azM4veCP4ME5f3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-csi04FZKZ2e5fO5Q73SLFDpoBA5hrD/tOG76mgt/1z4BxVY5jDVwI95Fib27YELf" crossorigin="anonymous"></script>

                    <div class="main-content scrollbar" style="width: 100%; padding: 16px ; display:flex ; flexDirection :column; jutifyContent:around; ">
                        @foreach($jobs as $index => $value)
                        <div class="card border-0 mb-3 shadow-xss bg-white rounded-3 pe-4 pt-4 pb-4 d-row" style="padding-left: 20px; width:100%">
                            <div class="d-column">
                            </div>
                            <div class="d-column">
                                <i class="feather-bookmark font-md text-grey-500 position-absolute right-0 me-3"></i>
                                <h4 class="font-xss fw-700 text-grey-900 mb-3 pe-4">{{ $value['title'] }} <span class="font-xssss fw-500 text-grey-500 ms-4">({{ $value['date'] }})</span></h4>
                                <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span class="text-grey-900 font-xssss text-dark">Location : </span> {{ $value['address'] }}</h5>
                                <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span class="text-grey-900 font-xssss text-dark">Company : </span>{{ $value['company'] }}</h5>
                                <h5 class="font-xssss text-grey-500 fw-600 mb-3"><span class="text-grey-900 font-xssss text-dark">Salary : </span> {{ $value['salaryRange'] }}</h5>
                                <a href="{{ route('jobs.showFront', ['id' => $value['id']]) }}" class="position-absolute bottom-15 mb-3 right-15 btn btn-sm rounded-xl btn-primary m-4 font-xss text-white" data-bs-toggle="modal" data-bs-target="#applyModal">Apply</a>
                            </div>    
                        @endforeach

                        
                    </div>              
    </div>


