<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li class="active ">
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Laravel Examples') }}</span>
                        <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li  class="active ">
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                        <li >
                            <a href="{{ route('admin.user.list')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('User Management') }}</p>
                            </a>
                        </li>
                        <li >
                            <a href="{{ route('jobs.list')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Job Management') }}</p>
                            </a>
                        </li>
                        <li >
                            <a href="{{ route('jobs.jobAppList')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Job Applications Management') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#skills-quizzes" aria-expanded="true">
                    <i class="tim-icons icon-trophy" ></i>
                    <span class="nav-link-text" >{{ __('Skills & Quizzes') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse dropdown" id="skills-quizzes">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('admin.skill.list')  }}">
                                <i class="tim-icons icon-spaceship"></i>
                                <p>{{ __('Skills') }}</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('admin.question.list')  }}">
                                <i class="tim-icons icon-pencil"></i>
                                <p>{{ __('Questions') }}</p>
                            </a>
                        </li>
                        <li >
                            <a>
                                <i class="tim-icons icon-puzzle-10"></i>
                                <p>{{ __('Quizzes') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#products-categories" aria-expanded="true">
                    <i class="tim-icons icon-cart" ></i>
                    <span class="nav-link-text" >{{ __('Products & Categories') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse dropdown" id="products-categories">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('admin.product.list')  }}">
                                <i class="tim-icons icon-basket-simple"></i>
                                <p>{{ __('Products') }}</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('admin.category.list')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Categories') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li >
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li >
                <a href="{{ route('pages.maps') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li >
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li >
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li >
                <a href="{{ route('pages.typography') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            <li >
                <a href="{{ route('pages.rtl') }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ __('RTL Support') }}</p>
                </a>
            </li>
            <li >
                <a href="{{ route('pages.upgrade') }}">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ __('Upgrade to PRO') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
