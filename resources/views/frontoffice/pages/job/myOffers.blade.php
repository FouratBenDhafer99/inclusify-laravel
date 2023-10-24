@extends('frontoffice.base')

@section('content')
<div class="">
@if(session('success'))
                <div id="myAlert" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
   
            <div class=" ">
                <div class="col-xl-8 col-xxl-9 col-lg-8 ">
                <a class="btn btn-sm rounded-xl btn-primary m-4 font-xss text-white" href="{{ route('jobs.goToCreateJob') }}" > Add Offer</a>
                <div class="main-content" style="width: 100%; padding: 16px ; ">
                        @foreach($jobs as $index => $value)
                        <div class="row">
                        <div class="card border-0 mb-3 shadow-xss bg-white rounded-3 pe-4 pt-4 pb-4 " style="padding-left: 20px; width:100% margin:20px;">
                            <div class="d-column">
                                <i class="feather-bookmark font-md text-grey-500 position-absolute right-0 me-3"></i>
                                <h4 class="font-xss fw-700 text-grey-900 mb-3 pe-4">{{ $value['title'] }} <span class="font-xssss fw-500 text-grey-500 ms-4">({{$value['created_at']->format('Y-m-d')  }})</span></h4>
                                <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span class="text-grey-900 font-xssss text-dark">Location : </span> {{ $value['address'] }}</h5>
                                <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span class="text-grey-900 font-xssss text-dark">Company : </span>{{ $value['company'] }}</h5>
                                <h5 class="font-xssss text-grey-500 fw-600 mb-3"><span class="text-grey-900 font-xssss text-dark">Salary : </span> {{ $value['salaryRange'] }}</h5>
                                <a  class="position-absolute bottom-15 mb-3 right-15 rounded-xl font-xss btn btn-primary text-white" href="{{ route('jobApplicationslist', ['jobId' => $value['id']]) }}">see applications</a>
                                <Button class="btn btn-primari " style="margin:10px" data-bs-toggle="modal" data-bs-target="#editModal_{{ $value['id'] }}"><i class="fas fa-edit fa-lg"></i></Button> 
                                <Button  class="btn btn-sm btn-primari" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $value['id'] }}"><i class="fas fa-trash fa-lg"></i></Button>

                            </div>   
                            </div> 
                            </div> 
                            <div class="modal fade" id="deleteModal_{{ $value['id'] }}" tabindex="-1" role="dialog" aria-labelledby="delJobModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="padding: 20px; display: flex; justify-content: center;">
                        <form style=" display: flex; justify-content: center; flex-direction:column" method="POST"  action="{{ route('jobs.destroyFront', $value->id) }}">
                            @csrf
                            @method('DELETE')
                            <p style="color: #808080;" >Are you sure you want to delete this job?</p>
                            <button type="submit" class="btn btn-sm btn-danger rounded-xl m-1 ">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editModal_{{ $value['id'] }}" tabindex="-1" role="dialog" aria-labelledby="editJobModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-gradiant">
                <h5 class="modal-title display2-size display2-md-size fw-700 text-white mb-0 mt-0" id="editJobModalLabel">Edit Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('jobs.updateFront', $value->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input style="color: #808080;" class="form-control" type="text" id="title" name="title" value="{{ $value->title }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea style="color: #808080;" class="form-control" id="description" name="description">{{ $value->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="salaryRange">Salary Range:</label>
                        <input style="color: #808080;" class="form-control" type="text" id="salaryRange" name="salaryRange" value="{{ $value->salaryRange }}">
                    </div>

                    <div class="form-group">
                        <label for="company">Company:</label>
                        <input style="color: #808080;" class="form-control" type="text" id="company" name="company" value="{{ $value->company }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input style="color: #808080;" class="form-control" type="text" id="address" name="address" value="{{ $value->address }}">
                    </div>

                    <!-- Add more fields as needed -->

                    <button type="submit" class="btn btn-primary rounded-xl font-xss text-white m-1">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>  

                        @endforeach                    
                    </div>
                </div>     
            </div>
            
           
</div>
<!-- delete Modal -->
            

               <!-- Edit Modal -->
              


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
    $(document).ready(function() {
        $("#myAlert").fadeIn();

        setTimeout(function() {
            $("#myAlert").fadeOut();
        }, 2000);
    });
</script>

@endsection