@extends('frontoffice.base')
@section('page_title', $quiz->skill->name.' Quiz')
@section('content')
    <script>
        console.log(performance.getEntriesByType("navigation")[0])
        if (performance.getEntriesByType("navigation")[0].type === 'reload') {
            //window.location.href = { route('skill.start_quiz',$quiz->skill->id) }};
        }
    </script>
    <div class="">
        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left pe-0">
                <div class="row">
                    <div class="col-xl-12 cart-wrapper mb-4">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div
                                    class="card p-md-5 p-4 bg-primary-gradiant rounded-3 shadow-xss bg-pattern border-0 overflow-hidden">
                                    <div class="bg-pattern-div"></div>
                                    <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0">
                                        {{$quiz->skill->name}} Quiz
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <form method="post" action="{{ route('skill.submit_quiz', $quiz->id) }}">
                            @csrf
                            @method('put')
                            @foreach($questions as $question)
                                <div class="row">
                                    <div class="col-xl-7 offset-xl-1 col-lg-6">
                                        <div class="checkout-payment card border-0 mb-3 bg-greyblue p-lg-5 p-4">
                                            <p class="mb-4 mont-font fw-600 font-md ">
                                                {{$question->description}}
                                            </p>
                                            @foreach($question->answers as $answer)
                                                <div class="payment-group mb-3">
                                                    <div class="payment-radio">
                                                        <input type="checkbox" class="col-sm-2" name="{{$answer->id}}"/>
                                                        <label class="payment-label fw-600 font-xsss text-grey-900 ms-2">{{$answer->text}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="card shadow-none border-0">
                                <button
                                    class="w-100 p-3 mt-3 font-xsss text-center text-white bg-current rounded-3 text-uppercase fw-600 ls-3 border-0">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
