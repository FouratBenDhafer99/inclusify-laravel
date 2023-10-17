@extends('frontoffice.base')
@section('page_title', $quiz->skill->name.' Quiz Result')
@section('content')
    <div class="">
        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left pe-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card w-100 border-0 shadow-none p-5 rounded-xxl bg-lightblue2 mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img
                                        src="{{ asset('frontoffice') }}/images/quiz_{{$quiz->isSuccessful?'success.jpg':'lose.png'}}"
                                        alt="banner" class="w-100"/>
                                </div>
                                <div class="col-lg-6 ps-lg-5">
                                    <h2 class="display1-size d-block mb-2 text-grey-900 fw-700">{{$quiz->skill->name}}</h2>
                                    <p class="font-xssss fw-500 text-grey-500 lh-26">
                                        {{$quiz->isSuccessful?'You passed the quiz! Congratulation!'
                                            :'Unfortunately you did succeed this time. Review some stuff and try again!'}}
                                    </p>
                                    <div class="col pe-2 ps-2">
                                        <div class="card w-100 border-0 shadow-none p-4 rounded-xxl mb-3"
                                             style="background:{{$quiz->isSuccessful?'#e2f6e9':'#fff0e9'}}">
                                            <div class="card-body d-flex p-0">
                                                <i class="btn-round-lg d-inline-block me-3 font-md text-white {{$quiz->isSuccessful?'bg-success feather-check ':'bg-danger feather-x'}} "></i>
                                                <h4 class="font-xl fw-700 {{$quiz->isSuccessful?'text-success ':'text-danger'}}">
                                                    <span class="fw-500 mt-0 d-block text-grey-500 font-xssss">Your score is:</span>
                                                    {{$quiz->score}}%
                                                </h4>
                                            </div>
                                        </div>
                                        <a href="{{ route('skill.list') }}" class="btn w200 border-0 bg-primary-gradiant p-3 text-white fw-600 rounded-3 d-inline-block font-xssss">Go back to skills</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
