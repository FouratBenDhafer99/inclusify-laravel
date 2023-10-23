@extends('frontoffice.base')
@section('content')

<div class="row">
            <div class="col-md-12">
                <div class="card ">
                <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                            <div
                                    class="card p-md-5 p-4 bg-primary-gradiant rounded-3 shadow-xss bg-pattern border-0 overflow-hidden">
                                    <div class="bg-pattern-div"></div>
                                    <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0">
                                       Applications for your job offer
                                    </h2>
                                </div>
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
                                <th scope="col">Job </th>
                                <th scope="col">Delete </th>
                              
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($jobApplications as $job)
                            <tr>
                                <td>{{ $job->resume_path }}</td>
                                <td>{{ $job->motivation }}</td>
                                <td><button class="btn btn-sm  @if ($job->status === 'pending')
                                                     bg-primary
                                                    @elseif ($job->status === 'accepted')
                                                        bg-success
                                                    @elseif ($job->status === 'rejected')
                                                        bg-danger
                                                    @endif text-white font-xss rounded-xl">{{ $job->status }}</button></td>
                                
                                <td>{{ $job->job->title }}</td>
                                <td><Button  class="btn btn-sm btn-primari" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash fa-lg"></i></Button></td>
                            </tr>
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="delJobModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="padding: 20px; display: flex; justify-content: center;">
                        <form style=" display: flex; justify-content: center; flex-direction:column" method="POST" action="{{ route('jobApp.destroyFront', $job->id) }}">
                            @csrf
                            @method('DELETE')
                            <p style="color: #808080;" >Are you sure you want to delete this job?</p>
                            <button type="submit" class="btn btn-sm btn-danger rounded-xl m-1 ">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>


    @endsection