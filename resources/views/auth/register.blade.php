@extends('frontoffice.base', ['class' => 'register-page', 'page' => __('Register Page'), 'contentClass' => 'register-page'])
@section('page_title', 'Register')
@section('content')
    <div class="main-wrap">
        <div class="nav-header bg-transparent shadow-none border-0">
            <div class="nav-top w-100">
                <a href="/"><i class="feather-zap text-success display1-size me-2 ms-0"></i><span
                        class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">{{ config('app.name', 'Inclusify') }} </span>
                </a>
                <button class="nav-menu me-0 ms-auto"></button>

                <a href="/login"
                   class="header-btn d-none d-lg-block bg-dark fw-500 text-white font-xsss p-3 ms-auto w100 text-center lh-20 rounded-xl">Login</a>
                <a href="/register"
                   class="header-btn d-none d-lg-block bg-current fw-500 text-white font-xsss p-3 ms-2 w100 text-center lh-20 rounded-xl">Register</a>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat bg-image-center"
                 style="background-image: url('{{ asset('frontoffice/images/register-bg.png') }}')"
            ></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Create <br/>your account</h2>
                        <form class="form" method="post" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                <input type="text" name="name" value="{{old('name')}}"
                                       class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       placeholder="Your Name"/>
                                @include('backoffice.alerts.feedback', ['field' => 'name'])
                            </div>
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                <input type="text" name="email" value="{{old('email')}}"
                                       class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       placeholder="Your Email Address"/>
                                @include('backoffice.alerts.feedback', ['field' => 'email'])
                            </div>
                            <div class="form-group icon-input mb-3">
                                <input type="Password" name="password"
                                       class="style2-input ps-5 form-control text-grey-900 font-xss ls-3{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       placeholder="Password"/>
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                                @include('backoffice.alerts.feedback', ['field' => 'password'])
                            </div>
                            <div class="form-group icon-input mb-1">
                                <input type="Password" name="password_confirmation"
                                       class="style2-input ps-5 form-control text-grey-900 font-xss ls-3"
                                       placeholder="Confirm Password"/>
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            </div>
                            <div class="form-check text-left mb-3">
                                <input type="checkbox" class="form-check-input mt-2" id="exampleCheck2"/>
                                <label class="form-check-label font-xsss text-grey-500">Accept Term and
                                    Conditions</label>

                            </div>
                            <div class="form-group mb-1">
                                <button type="submit"
                                        class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Register</button>
                            </div>
                        </form>

                        <div class="col-sm-12 p-0 text-left">
                            <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Already have
                                account <a href="/login" class="fw-700 ms-1">Login</a></h6>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
