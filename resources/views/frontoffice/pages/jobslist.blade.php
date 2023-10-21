@extends('frontoffice.base')

@section('content')
<div class="">
   
            <div class=" ">
                <div class="col-xl-8 col-xxl-9 col-lg-8 ">
                <a class="btn btn-sm rounded-xl btn-primary m-4 font-xss text-white" href="{{ route('jobs.goToCreateJob') }}" > Add Offer</a>
                    @include('frontoffice.components.jobsview', ['job'=>$jobs])
                </div>     
            </div>
     
</div>
@endsection