<div class="nav-header bg-white shadow-xs border-0">
    <div class="nav-top">
        <a href="{{url("/newsfeed")}}"><i class="feather-zap text-success display2-size me-3 ms-0"></i><span
                class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">Inclusify. </span>
        </a>
        <a to="/defaultmessage" class="mob-menu ms-auto me-2 chat-active-btn"><i
                class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
        <a to="/defaultvideo" class="mob-menu me-2"><i
                class="feather-video text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
        <span class="me-2 menu-search-icon mob-menu"><i
                class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></span>
        <button class="nav-menu me-0 ms-2 "></button>
    </div>

    <form action="#" class="float-left header-search ms-3">
        <div class="form-group mb-0 icon-input">
            <i class="feather-search font-sm text-grey-400"></i>
            <input type="text" placeholder="Start typing to search.."
                   class="bg-grey border-0 lh-32 pt-2 pb-2 ps-5 pe-3 font-xssss fw-500 rounded-xl w350 theme-dark-bg"/>
        </div>
    </form>
    <a activeclass="active" href="{{url("/newsfeed")}}" class="p-2 text-center ms-3 menu-icon center-menu-icon"><i
            class="feather-home font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500 "></i></a>
    <a activeclass="active"
       class="p-2 text-center ms-0 menu-icon center-menu-icon"><i
            class="feather-zap font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500 "></i></a>
    <a activeclass="active" to="/defaultvideo"
       class="p-2 text-center ms-0 menu-icon center-menu-icon"><i
            class="feather-video font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500 "></i></a>
    <a activeclass="active" to="/defaultgroup"
       class="p-2 text-center ms-0 menu-icon center-menu-icon"><i
            class="feather-user font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500 "></i></a>
    <a activeclass="active" to="/shop2" class="p-2 text-center ms-0 menu-icon center-menu-icon"><i
            class="feather-shopping-bag font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500 "></i></a>


    <span class="p-2 pointer text-center ms-auto menu-icon ${notiClass}" id="dropdownMenu3"
          data-bs-toggle="dropdown" aria-expanded="false" onClick={toggleNoti}>
        @if(auth()->user()->role=='ADMIN')
            <button class="btn" title="Go to admin page">
                <a href="{{route("admin.user.list")}}">
                    <i class="feather-pie-chart font-xl text-current"></i>
                </a>
            </button>
        @endif
    </span>
    <form method="post" action="{{route('logout')}}">
        @csrf
        <button type="submit" class="btn p-2 text-center ms-3 menu-icon chat-active-btn" title="Logout">
            <i class="feather-log-out font-xl text-current"></i></button>
    </form>
    <a to="/defaultsettings" class="p-0 ms-3 menu-icon"><img src="{{ asset('frontoffice') }}/images/user.png" alt="user"
                                                             class="w40 mt--1"/></a>

    <nav class="navigation scroll-bar ${navClass}">
        <div class="container ps-0 pe-0">
            <div class="nav-content">
                <div
                    class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                    <div class="nav-caption fw-600 font-xssss text-grey-500"><span>New </span>Feeds</div>
                    <ul class="mb-1 top-content">
                        <li class="logo d-none d-xl-block d-lg-block"></li>
                        <li><a href="{{url("/newsfeed")}}" class="nav-content-bttn open-font"><i
                                    class="feather-tv btn-round-md bg-blue-gradiant me-3"></i><span>Newsfeed</span></a>
                        </li>
                        <li><a href="{{ route('skill.list') }}" class="nav-content-bttn open-font"><i
                                    class="feather-award btn-round-md bg-red-gradiant me-3"></i><span>Skills</span></a>
                        </li>
                        <li><a href="{{ route('event.list') }}" class="nav-content-bttn open-font"><i
                                    class="feather-globe btn-round-md bg-gold-gradiant me-3"></i><span>Events</span></a>
                        </li>
                        <li><a href="{{route('jobslist')}}" class="nav-content-bttn open-font"><i
                                    class="feather-briefcase btn-round-md bg-gold-gradiant me-3"></i><span>Job board</span></a>
                        </li>
                        <li><a href="{{ route('product.list') }}" class="nav-content-bttn open-font"><i
                                    class="feather-shopping-bag btn-round-md bg-gold-gradiant me-3"></i><span>Marketplace</span></a>
                        </li>
                        <li><a to="/defaultgroup" class="nav-content-bttn open-font"><i
                                    class="feather-zap btn-round-md bg-mini-gradiant me-3"></i><span>Popular Groups</span></a>
                        </li>
                        <li><a to="/userpage" class="nav-content-bttn open-font"><i
                                    class="feather-user btn-round-md bg-primary-gradiant me-3"></i><span>Author Profile </span></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>

    <div class="app-header-search ${searchClass}">
        <form class="search-form">
            <div class="form-group searchbox mb-0 border-0 p-1">
                <input type="text" class="form-control border-0" placeholder="Search..."/>
                <i class="input-icon">
                    <ion-icon name="search-outline" role="img" class="md hydrated"
                              aria-label="search outline"></ion-icon>
                </i>
                <span class="ms-1 mt-1 d-inline-block close searchbox-close">
                                <i class="ti-close font-xs" onClick={toggleActive}></i>
                            </span>
            </div>
        </form>
    </div>

</div>
