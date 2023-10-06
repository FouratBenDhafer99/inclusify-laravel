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
                        <a href="#" class="btn btn-sm btn-primary">Add Offer</a>
                    </div>
                </div>
            </div>
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
        <!-- <div class="alert alert-danger">
                <span>
                  <b> </b> This is a <b>PRO</b> feature!</span>
              </div> -->
    </div>
    @endsection
