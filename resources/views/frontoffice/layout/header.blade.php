<div class="nav-header bg-white shadow-xs border-0">
    <div class="nav-top">
        <a href="{{url("/newsfeed")}}"><i class="feather-zap text-success display2-size me-3 ms-0"></i><span
                class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">Sociala. </span>
        </a>
        <a to="/defaultmessage" class="mob-menu ms-auto me-2 chat-active-btn"><i
                class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
        <a to="/defaultvideo" class="mob-menu me-2"><i
                class="feather-video text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
        <span class="me-2 menu-search-icon mob-menu"><i
                class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></span>
        <button  class="nav-menu me-0 ms-2 "></button>
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
          data-bs-toggle="dropdown" aria-expanded="false" onClick={toggleNoti}><span
            class="dot-count bg-warning"></span><i class="feather-bell font-xl text-current"></i></span>
    <div class="dropdown-menu p-4 right-0 rounded-xxl border-0 shadow-lg ${notiClass}"
         aria-labelledby="dropdownMenu3">
        <h4 class="fw-700 font-xss mb-4">Notification</h4>
        <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">
            <img src="{{ asset('frontoffice') }}/images/user.png" alt="user" class="w40 position-absolute left-0"/>
            <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Hendrix Stamp <span
                    class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 3 min</span></h5>
            <h6 class="text-grey-500 fw-500 font-xssss lh-4">There are many variations of pass..</h6>
        </div>
        <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">
            <img src="{{ asset('frontoffice') }}/images/user.png" alt="user" class="w40 position-absolute left-0"/>
            <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Goria Coast <span
                    class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 2 min</span></h5>
            <h6 class="text-grey-500 fw-500 font-xssss lh-4">Mobile Apps UI Designer is require..</h6>
        </div>

        <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">
            <img src="{{ asset('frontoffice') }}/images/user.png" alt="user" class="w40 position-absolute left-0"/>
            <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Surfiya Zakir <span
                    class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 1 min</span></h5>
            <h6 class="text-grey-500 fw-500 font-xssss lh-4">Mobile Apps UI Designer is require..</h6>
        </div>
        <div class="card bg-transparent-card w-100 border-0 ps-5">
            <img src="{{ asset('frontoffice') }}/images/user.png" alt="user" class="w40 position-absolute left-0"/>
            <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Victor Exrixon <span
                    class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 30 sec</span></h5>
            <h6 class="text-grey-500 fw-500 font-xssss lh-4">Mobile Apps UI Designer is require..</h6>
        </div>
    </div>
    <a to="/defaultmessage" class="p-2 text-center ms-3 menu-icon chat-active-btn"><i
            class="feather-message-square font-xl text-current"></i></a>
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
                        <li><a href="{{url("/newsfeed")}}"  class="nav-content-bttn open-font"><i
                                    class="feather-tv btn-round-md bg-blue-gradiant me-3"></i><span>Newsfeed</span></a>
                        </li>
                        <li><a href="{{ route('skill.list') }}" class="nav-content-bttn open-font"><i
                                    class="feather-award btn-round-md bg-red-gradiant me-3"></i><span>Skills</span></a>
                        </li>
                        <li><a href="{{route('jobslist')}}" class="nav-content-bttn open-font"><i
                                    class="feather-briefcase btn-round-md bg-gold-gradiant me-3"></i><span>Job board</span></a>
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

                <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2">
                    <div class="nav-caption fw-600 font-xssss text-grey-500"><span>More </span>Pages</div>
                    <ul class="mb-3">
                        <li><a to="/defaultemailbox" class="nav-content-bttn open-font"><i
                                    class="font-xl text-current feather-inbox me-3"></i><span>Email Box</span><span
                                    class="circle-count bg-warning mt-1">584</span></a></li>
                        <li><a to="/defaulthotel" class="nav-content-bttn open-font"><i
                                    class="font-xl text-current feather-home me-3"></i><span>Near Hotel</span></a>
                        </li>
                        <li><a to="/defaultevent" class="nav-content-bttn open-font"><i
                                    class="font-xl text-current feather-map-pin me-3"></i><span>Latest Event</span></a>
                        </li>
                        <li><a to="/defaultlive" class="nav-content-bttn open-font"><i
                                    class="font-xl text-current feather-youtube me-3"></i><span>Live Stream</span></a>
                        </li>
                    </ul>
                </div>
                <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1">
                    <div class="nav-caption fw-600 font-xssss text-grey-500"><span></span> Account</div>
                    <ul class="mb-1">
                        <li class="logo d-none d-xl-block d-lg-block"></li>
                        <li><a to="/defaultsettings" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i
                                    class="font-sm feather-settings me-3 text-grey-500"></i><span>Settings</span></a>
                        </li>
                        <li><a to="/defaultanalytics"
                                  class="nav-content-bttn open-font h-auto pt-2 pb-2"><i
                                    class="font-sm feather-pie-chart me-3 text-grey-500"></i><span>Analytics</span></a>
                        </li>
                        <li><a to="/defaultmessage"
                                  class="nav-content-bttn open-font h-auto pt-2 pb-2"><i
                                    class="font-sm feather-message-square me-3 text-grey-500"></i><span>Chat</span><span
                                    class="circle-count bg-warning mt-0">23</span></a></li>
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
