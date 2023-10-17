@extends('frontoffice.base')
@section('page_title', $skill->name.' Quiz')
@section('content')
    <div class="">
        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left pe-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card w-100 border-0 shadow-none p-5 rounded-xxl bg-lightblue2 mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="{{ asset('frontoffice') }}/images/quizImage.jpg" alt="banner" class="w-100" />
                                </div>
                                <div class="col-lg-6 ps-lg-5">
                                    <h2 class="display1-size d-block mb-2 text-grey-900 fw-700">{{$skill->name}}</h2>
                                    <p class="font-xssss fw-500 text-grey-500 lh-26">
                                        You are about to start a quiz for <b>{{$skill->name}}</b>. <br><i>Good luck!</i>
                                    </p>
                                    <a href="{{ route('skill.play_quiz', $skill->id) }}" class="btn w200 border-0 bg-primary-gradiant p-3 text-white fw-600 rounded-3 d-inline-block font-xssss">
                                        Start the quiz
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
