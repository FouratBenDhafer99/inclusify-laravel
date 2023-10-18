@extends('frontoffice.base')
@section('page_title', 'Newsfeed')
@section('content')
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left pe-0">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card w-100 border-0 shadow-none rounded-xxl border-0 mb-3 overflow-hidden ">
                        <div class="w-100 h-75">
                            map was here
                        </div>
                    </div>
                </div>

                @foreach($events as $event)
                <div key={index} class="col-lg-4 col-md-6 pe-2 ps-2">
                    <div
                        class="card p-3 bg-white w-100 hover-card border-0 shadow-xss rounded-xxl border-0 mb-3 overflow-hidden ">
                        <div class="card-image w-100">
                            <img src="{{ asset('frontoffice') }}/images/{{$event->image}}" alt="{{$event->image}}" class="w-100 rounded-3"/>
                        </div>
                        <div class="card-body d-flex ps-0 pe-0 pb-0">
                            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg"><h4
                                    class="fw-700 font-lg ls-3 text-grey-900 mb-0"><span
                                        class="ls-3 d-block font-xsss text-grey-500 fw-500">{{$event->month}}</span>{{$event->date}}
                                </h4></div>
                            <h2 class="fw-700 lh-3 font-xss">{{$event->name}}
                                <span class="d-flex font-xssss fw-500 mt-2 lh-3 text-grey-500"> <i
                                        class="ti-location-pin me-1"></i>{{$event->location}} </span>
                            </h2>
                        </div>
                        <div class="card-body p-0">
                            <p class="font-xsss fw-400 text-grey-500 lh-30 pe-5 mt-3 me-5 memberlist mt-4 mb-2 ms-0 d-inline-block">
                                ultrices justo eget,
                                sodales orci. Aliquam egestas libero ac turpis pharetra, in vehicula lacus
                                scelerisque. Vestibulum ut sem laoreet, feugiat tellus at, hendrerit arcu.</p>
                            <a href="/defaultevent"
                               class="font-xsssss fw-700 ps-3 pe-3 lh-32 float-right mt-4 text-uppercase rounded-3 ls-2 bg-success d-inline-block text-white me-1">APPLY</a>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
@endsection
