@extends('frontoffice.base', ['class' => 'login-page', 'page' => __('Login Page'), 'contentClass' => 'login-page'])
@section('page_title', 'Login')
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
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat"
                 style="background-image: url('{{ asset('frontoffice/images/login-bg.jpg') }}')"
            ></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-3">Login into <br/>your account
                        </h2>
                        <form  method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                <input type="text" name="email"
                                       class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       value="{{old('email')}}"
                                       placeholder="Your Email Address"/>
                                @include('backoffice.alerts.feedback', ['field' => 'email'])
                            </div>
                            <div class="form-group icon-input mb-1">
                                <input type="Password" name="password"
                                       class="style2-input ps-5 form-control text-grey-900 font-xss ls-3{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       placeholder="Password"/>
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                                @include('backoffice.alerts.feedback', ['field' => 'password'])
                            </div>
                            <div class="form-check text-left mb-3">
                                <input type="checkbox" class="form-check-input mt-2" id="exampleCheck5"/>
                                <label class="form-check-label font-xsss text-grey-500">Remember me</label>
                                <a href="/forgot" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forgot
                                    your Password?</a>
                            </div>
                            <div class="form-group mb-1">
                                <button type="submit"
                                        class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Login</button>
                            </div>
                        </form>

                        <div class="col-sm-12 p-0 text-left">
                            <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Dont have account <a
                                    href="/register" class="fw-700 ms-1">Register</a></h6>
                        </div>
                        <div class="col-sm-12 p-0 text-center mt-2">

                            <h6 class="mb-0 d-inline-block bg-white fw-500 font-xsss text-grey-500 mb-3">Or,
                                Sign in with your social account </h6>
                            <div class="form-group mb-1"><a href="/register"
                                                                class="form-control text-left style2-input text-white fw-600 bg-facebook border-0 p-0 mb-2"><img
                                        src="{{ asset('frontoffice') }}/images/icon-1.png" alt="icon" class="ms-2 w40 mb-1 me-5"/> Sign
                                    in with Google</a></div>
                            <div class="form-group mb-1"><a href="/register"
                                                                class="form-control text-left style2-input text-white fw-600 bg-twiiter border-0 p-0 "><img
                                        src="{{ asset('frontoffice') }}/images/icon-3.png" alt="icon" class="ms-2 w40 mb-1 me-5"/> Sign
                                    in with Facebook</a></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
