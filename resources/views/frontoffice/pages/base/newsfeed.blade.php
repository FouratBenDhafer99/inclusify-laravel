@extends('frontoffice.base')
@section('page_title', 'Newsfeed')
@section('content')
<div class="">
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <div class="row feed-body">
                <div class="col-xl-8 col-xxl-9 col-lg-8">
                    @include('frontoffice.components.postview', ['post'=>$posts])
                </div>
                <div class="col-xl-4 col-xxl-3 col-lg-4 ps-lg-0">
                    @include('frontoffice.components.friends')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
