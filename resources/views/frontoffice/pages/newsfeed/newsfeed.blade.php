@extends('frontoffice.base')
@section('page_title', 'Newsfeed')
@section('content')
    <div class="">
        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left">
                <div class="row feed-body">
                    <div class="col-xl-8 col-xxl-9 col-lg-8">
                        <form method="post" action="{{route("newsfeed.addPost")}}" enctype="multipart/form-data">
                            @csrf
                            @method("post")
                            <div class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3">
                                <div class="card-body p-0">
                                    <button
                                        type="submit"
                                        class="btn font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center"
                                    >
                                        <i
                                            class="btn-round-sm font-xs text-primary feather-edit-3 me-2 bg-greylight"></i>Create
                                        Post
                                    </button>
                                </div>
                                <div class="card-body p-0 mt-3 position-relative  {{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <figure class="avatar position-absolute ps-2 mt-1 top-5 h30 w30">
                                        <img
                                            src='https://via.placeholder.com/1200x250.png'
                                            alt="avater"
                                            class="shadow-sm rounded-circle h40 w40"
                                            style='height:40px; object-fit:contain'
                                        />
                                    </figure>
                                    <textarea
                                        name="description"
                                        class="h100 bor-0 w-100 rounded-xxl font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                        cols="30"
                                        rows="10"
                                        placeholder="What's on your mind?"
                                        style='padding:0.5rem;padding-left:4rem'>{{old('description')}}</textarea>
                                    @include('backoffice.alerts.feedback', ['field' => 'description'])
                                </div>
                                <div class="card-body d-flex p-0 mt-0">
                                    <a href="#video"
                                       class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"><i
                                            class="font-md text-danger feather-video me-2"></i><span
                                            class="d-none-xs">Live Video</span></a>
                                    <input type="file" id="imageInput" name="image" class="d-none" accept="image/*">

                                    <a href="#" id="imageLink" class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4">
                                        <i class="font-md text-success feather-image me-2"></i>
                                        <span class="d-none-xs">Photo/Video</span>
                                    </a>
                                    <a href="#activity"
                                       class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"><i
                                            class="font-md text-warning feather-camera me-2"></i><span
                                            class="d-none-xs">Feeling/Activity</span></a>

                                </div>
                            </div>
                        </form>

                        @for($i =0 ; $i < count($posts); $i++)
                            @include('frontoffice.components.postview', ['post'=>$posts[$i]])
                        @endfor
                    </div>
                    <div class="col-xl-4 col-xxl-3 col-lg-4 ps-lg-0">
                        @include('frontoffice.components.friends')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
