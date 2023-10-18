@extends('frontoffice.base')
@section('page_title', 'Jobs')
@section('content')
    <div class="">
        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left pe-0 mw-100">
                <div class="row">
                    <div class="col-xl-6 scroll-bar">
                        @include('frontoffice.components.page_title', ['title'=>"Jobs"])

                        @foreach($jobList as $value)

                            <div key={index}
                                 class="card d-block w-100 border-0 mb-3 shadow-xss bg-white rounded-3 pe-4 pt-4 pb-4 pl-10">
                                <img src="{{ asset('frontoffice') }}/images/{{$value->imageUrl}}" alt="job-avater"
                                     class="position-absolute p-2 bg-lightblue2 w65 ms-4 left-0"/>
                                <i class="feather-bookmark font-md text-grey-500 position-absolute right-0 me-3"></i>
                                <h4 class="font-xss fw-700 text-grey-900 mb-3 pe-4">{{$value->title}} <span
                                        class="font-xssss fw-500 text-grey-500 ms-4">({{$value->date}})</span></h4>
                                <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span
                                        class="text-grey-900 font-xssss text-dark">Location : </span> {{$value->employment}}
                                </h5>
                                <h5 class="font-xssss mb-2 text-grey-500 fw-600"><span
                                        class="text-grey-900 font-xssss text-dark">Employment : </span>{{$value->salary}}
                                </h5>
                                <h5 class="font-xssss text-grey-500 fw-600 mb-3"><span
                                        class="text-grey-900 font-xssss text-dark">Salary : </span> {{$value->following}}
                                </h5>
                                <h6 class="d-inline-block p-2 text-success alert-success fw-600 font-xssss rounded-3 me-2">
                                    UX Design</h6>
                                <h6 class="d-inline-block p-2 text-warning alert-warning fw-600 font-xssss rounded-3 me-2">
                                    Andriod</h6>
                                <h6 class="d-inline-block p-2 text-secondary alert-secondary fw-600 font-xssss rounded-3 me-2">
                                    Developer</h6>
                                <a href="#" class="position-absolute bottom-15 mb-3 right-15"><i
                                        class="btn-round-sm bg-primary-gradiant text-white font-sm feather-chevron-right"></i></a>
                            </div>
                        @endforeach


                    </div>

                    <div class="col-xl-6 ps-0 d-none d-xl-block">
                        <div class="card w-100 border-0 shadow-none rounded-3 border-0 mb-4 overflow-hidden ">
                            <div class="w-100 h-75">
                                Here was a map, it can also be used to put some get data about something dynamically.
                                Or it can be removed entirely (if so remove col-xl-6 from the other div)
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
