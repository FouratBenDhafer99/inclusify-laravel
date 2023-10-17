@extends('frontoffice.base')
@section('page_title', 'Skills')
@section('content')
    <div class="">
        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left pe-0">
                <div class="row">
                    <div class="col-xl-12">
                        @include('frontoffice.components.page_title', ['title'=>"Skills"])
                        <div class="row ps-2 pe-2">
                            @foreach($skills as $skill)
                                <div class="col-md-3 col-sm-4 pe-2 ps-2">
                                    <div
                                        class="card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3 {{in_array( $skill->id, $skillsWithBadge)?"bg-gold-gradiant":""}}">
                                        <div class="card-body d-block w-100 ps-3 pe-3 pb-4 text-center">
                                            <div class="clearfix w-100"></div>
                                            <h4 class="fw-700 font-xsss mt-3 mb-0">{{$skill->name}} </h4>
                                            <p class="fw-500 font-xssss text-grey-500 mt-0 mb-3"></p>
                                            @if( in_array( $skill->id, $skillsWithBadge))
                                                <a
                                                    class="mt-0 btn pt-2 pb-2 ps-3 pe-3 lh-24 ms-1 ls-3 d-inline-block rounded-xl font-xsssss fw-700 ls-lg text-white">
                                                    You have this skill</a>
                                            @else
                                                :<a href="{{route("skill.start_quiz", $skill->id)}}"
                                                    class="mt-0 btn pt-2 pb-2 ps-3 pe-3 lh-24 ms-1 ls-3 d-inline-block rounded-xl bg-success font-xsssss fw-700 ls-lg text-white">
                                                    Pass the quiz</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
