@extends('frontoffice.base')
@section('page_title', 'Newsfeed')
@section('content')
    <div class="">
        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left">
                <div class="row feed-body">
                    <div class="col-xl-8 col-xxl-9 col-lg-8">
                        @include('frontoffice.components.postview', ['post'=>$post])
                    </div>
{{--                    <div class="h200 overflow-scroll ">--}}
                        @foreach($post->comments as $comment)
                            <div class=" card w-75 bg-grey border-0 shadow-none right-scroll-bar pt-4 pb-4">
                                <div class="card-body  p-0 d-flex h-75">
                                    <figure class="avatar me-3">
                                        <img
                                            src='https://via.placeholder.com/1200x250.png'
                                            alt="avater"
                                            class="shadow-sm rounded-circle w40"
                                            style='height: 40px; object-fit: contain'
                                        />
                                    </figure>
                                    <div class="d-flex flex-column">
                                        <h4 class="d-flex fw-700 text-grey-900 font-xssss mt-1"> {{$comment->createdBy->name}}
                                            <span
                                                class="ms-2 font-xssss fw-500 text-grey-700"> {{$comment->created_at}}</span>
                                        </h4>
                                        {{$comment->comment }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
{{--                    </div>--}}
                    <form method="post" action="{{route("newsfeed.addComment",$post->id)}}">
                        @csrf
                        @method("post")
                        <div>
                            <div class="card w-75 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3">
                                <div class="card-body p-0">
                                    <div class="card-body p-0 mt-3 position-relative">
                                        <figure class="avatar position-absolute ps-2 mt-1 top-5 h30 w30">
                                            <img
                                                src='https://via.placeholder.com/1200x250.png'
                                                alt="avater"
                                                class="shadow-sm rounded-circle h40 w40"
                                                style='height: 40px; object-fit: contain'
                                            />
                                        </figure>
                                        <textarea
                                            name="comment"
                                            class="h100 bor-0 w-100 rounded-xxl font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg {{ $errors->has('comment') ? ' is-invalid' : '' }}"
                                            cols="30"
                                            rows="10"
                                            placeholder="What's on your mind?"
                                            style='padding: 0.5rem; padding-left: 4rem'>{{old('comment')}}</textarea>
                                        @include('backoffice.alerts.feedback', ['field' => 'comment'])
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
