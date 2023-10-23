@extends('frontoffice.base')

@section('content')
<div class="">
   
            <div class=" row md-col">
                
                <div class="col-xl-8 col-xxl-9 col-lg-8 ">
             
                    @include('frontoffice.components.jobsview', ['job'=>$jobs])
                </div>  
                <div class="col-xl-3 col-xxl-3 col-lg-3 " style="position:fixed; right:0; ml-4 ">
                    <a class="btn btn-sm rounded-xl btn-primary m-4 font-xss text-white" href="{{ route('jobs.goToCreateJob') }}" > Add Offer</a>
                    <a class="btn btn-sm rounded-xl bg-gold-gradiant border-0 btn-primary m-4 font-xss text-white" href="{{ route('jobs.jobsByConnectedUser') }}" > My Offers </a>
                    <a class="btn btn-sm rounded-xl bg-red-gradiant border-0 btn-primary m-4 font-xss text-white" href="{{ route('jobs.ApplicationByConnectedUser') }}" > My Applications </a>

                </div>   
            </div>
     
</div>
@endsection