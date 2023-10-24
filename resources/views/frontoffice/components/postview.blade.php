<div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
    <div class="card-body p-0 d-flex">
        <figure class="avatar me-3"><img src="{{ asset('frontoffice') }}/images/user.png" alt="avater"
                                         class="shadow-sm rounded-circle w45"/></figure>
        <h4 class="fw-700 text-grey-900 font-xssss mt-1"> {{$post->createdBy->name}} <span
                class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"> {{$post->created_at}}</span></h4>
        @if ($singlePostDetail)
            <div class="ms-auto pointer">
                <i class="ti-trash text-grey-900 btn-round-md bg-red-gradiant font-xss me-2"></i>
            </div>
        @endif
    </div>
    <div class="card-body p-0 me-lg-5">
        <p class="fw-500 text-grey-500 lh-26 font-xssss w-100 mb-2">{{$post->description}}
            @if(!$singlePostDetail)
                <a href="{{ route('newsfeed.detail', ['id' => $post->id]) }}" class="fw-600 text-primary ms-2">See
                    more</a>
            @endif
        </p>

    </div>
    <div class="card-body d-block p-0 mb-3">
        <div class="row ps-2 pe-2">
        </div>
    </div>
    @if ($singlePostDetail)
    <!-- Update Form -->
        <form method="post" action="{{ route('newsfeed.updatePost', ['id' => $post->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <textarea name="description" class="form-control" rows="3" placeholder="Update your post"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    @endif
    <div class="card-body d-block p-0 mb-3">
        <div class="row ps-2 pe-2">
            <div class="col-sm-12 p-1"><img
                    src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?auto=format&fit=crop&q=80&w=2070&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="rounded-3 w-100" alt="post"/></div>
        </div>
    </div>
    <div class="card-body d-flex p-0">
        <a href="/defaultvideo"
           class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i
                class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i><span
                class="d-none-xss">{{sizeof($post->comments)}} comments</span></a>

        <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg right-0 ${menuClass}">

            <h4 class="fw-700 font-xssss mt-4 text-grey-500 d-flex align-items-center mb-3">Copy Link</h4>
            <i class="feather-copy position-absolute right-35 mt-3 font-xs text-grey-500"></i>
            <input type="text" placeholder="https://socia.be/1rGxjoJKVF0"
                   class="bg-grey text-grey-500 font-xssss border-0 lh-32 p-2 font-xssss fw-600 rounded-3 w-100 theme-dark-bg"/>
        </div>
    </div>

</div>

