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
                                <th scope="col">Applicant </th>
                                <th scope="col">Job </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($jobApplications as $job)
                            <tr>
                            <td><a href="{{ route('download.resume', ['filename' => basename($job->resume_path)]) }}" class="btn btn-primary">Download Resume</a></td>

                                <td>{{ $job->motivation }}</td>
                                <td><button class="btn btn-sm  @if ($job->status === 'pending')
                                                     bg-primary
                                                    @elseif ($job->status === 'accepted')
                                                        bg-success
                                                    @elseif ($job->status === 'rejected')
                                                        bg-danger
                                                    @endif text-white font-xss rounded-xl" data-bs-toggle="modal" data-bs-target="#updateModal">{{ $job->status }}</button></td>
                                <td>{{ $job->user->name }}</td>
                                <td>{{ $job->job->title }}</td>
                            </tr>
                            <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="delJobModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="padding: 20px; display: flex; justify-content: center;">
                        <form style=" display: flex; justify-content: center; flex-direction:column" method="POST"  action="{{route('jobApplication.UpdateStatus',['id' => $job->id])}}">
                            @csrf
                            @method('PUT')
                            <p style="color: #808080;" >Update Status</p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status_pending" value="pending" {{ $job->status == 'pending' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_pending">
                                                Pending
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status_accepted" value="accepted" {{ $job->status == 'accepted' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_accepted">
                                                Accepted
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status_rejected" value="rejected" {{ $job->status == 'rejected' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status_rejected">
                                                Rejected
                                            </label>
                                        </div>
                            <button type="submit" class="btn btn-sm btn-primary bg-current-shade rounded-xl m-1 font-xss text-white">Update</button>
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