<div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
    <div class="card-body p-0 d-flex">
        <figure class="avatar me-3"><img src="{{ asset('frontoffice') }}/images/user.png" alt="avater"
                                         class="shadow-sm rounded-circle w45"/></figure>
        <h4 class="fw-700 text-grey-900 font-xssss mt-1"> {{$post->createdBy->name}} <span
                class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"> {{$post->created_at}}</span></h4>
        <div class="ms-auto pointer"><i
                class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></div>

    </div>
    <div class="card-body p-0 me-lg-5">
        <p class="fw-500 text-grey-500 lh-26 font-xssss w-100 mb-2">{{$post->description}}
{{--            <a href="/defaultvideo" class="fw-600 text-primary ms-2">See more</a></p>--}}
    </div>
    <div class="card-body d-block p-0 mb-3">
        <div class="row ps-2 pe-2">
{{--            <div class="col-sm-12 p-1"><img src="{{ asset('frontoffice') }}/images/{{$post->postimage}}"--}}
{{--                                            class="rounded-3 w-100" alt="post"/></div>--}}
        </div>
    </div>
    <div class="card-body d-flex p-0">

        <a href="/defaultvideo"
           class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i
                class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i><span
                class="d-none-xss">{{sizeof($post->comments)}} Comment</span></a>
        <div
            class="pointer ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss ${menuClass}"
            id={`dropdownMenu${id}`} data-bs-toggle="dropdown" aria-expanded="false" onClick={toggleOpen}>
            <i class="feather-share-2 text-grey-900 text-dark btn-round-sm font-lg"></i><span
                class="d-none-xs">Share</span></div>
        <div
            class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg right-0 ${menuClass}"
            aria-labelledby={`dropdownMenu${id}`}>
            <h4 class="fw-700 font-xss text-grey-900 d-flex align-items-center">Share <i
                    class="feather-x ms-auto font-xssss btn-round-xs bg-greylight text-grey-900 me-2"></i></h4>
            <div class="card-body p-0 d-flex">
                <ul class="d-flex align-items-center justify-content-between mt-2">
                    <li class="me-1"><span class="btn-round-lg pointer bg-facebook"><i
                                class="font-xs ti-facebook text-white"></i></span></li>
                    <li class="me-1"><span class="btn-round-lg pointer bg-twiiter"><i
                                class="font-xs ti-twitter-alt text-white"></i></span></li>
                    <li class="me-1"><span class="btn-round-lg pointer bg-linkedin"><i
                                class="font-xs ti-linkedin text-white"></i></span></li>
                    <li class="me-1"><span class="btn-round-lg pointer bg-instagram"><i
                                class="font-xs ti-instagram text-white"></i></span></li>
                    <li><span class="btn-round-lg pointer bg-pinterest"><i
                                class="font-xs ti-pinterest text-white"></i></span></li>
                </ul>
            </div>
            <div class="card-body p-0 d-flex">
                <ul class="d-flex align-items-center justify-content-between mt-2">
                    <li class="me-1"><span class="btn-round-lg pointer bg-tumblr"><i
                                class="font-xs ti-tumblr text-white"></i></span></li>
                    <li class="me-1"><span class="btn-round-lg pointer bg-youtube"><i
                                class="font-xs ti-youtube text-white"></i></span></li>
                    <li class="me-1"><span class="btn-round-lg pointer bg-flicker"><i
                                class="font-xs ti-flickr text-white"></i></span></li>
                    <li class="me-1"><span class="btn-round-lg pointer bg-black"><i
                                class="font-xs ti-vimeo-alt text-white"></i></span></li>
                    <li><span class="btn-round-lg pointer bg-whatsup"><i
                                class="font-xs feather-phone text-white"></i></span></li>
                </ul>
            </div>
            <h4 class="fw-700 font-xssss mt-4 text-grey-500 d-flex align-items-center mb-3">Copy Link</h4>
            <i class="feather-copy position-absolute right-35 mt-3 font-xs text-grey-500"></i>
            <input type="text" placeholder="https://socia.be/1rGxjoJKVF0"
                   class="bg-grey text-grey-500 font-xssss border-0 lh-32 p-2 font-xssss fw-600 rounded-3 w-100 theme-dark-bg"/>
        </div>
    </div>
</div>

