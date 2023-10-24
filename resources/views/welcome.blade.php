<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" href="/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="theme-color" content="#000000"/>
    <meta
        name="description"
        content="Social Network React Template"
    />
    <link rel="manifest" href="%PUBLIC_URL%/manifest.json"/>

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet"/>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('black') }}/css/nucleo-icons.css" rel="stylesheet"/>
    <!-- CSS -->
    <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet"/>
    <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet"/>

    <title>
        {{ config('app.name', 'Inclusify') }}
    </title>
</head>
<body class="color-theme-blue mont-font loaded theme-light bg-white">
<noscript>You need to enable JavaScript to run this app.</noscript>
<div class="wrapper wrapper-full-page">
    <div class="full-page {{ $contentClass ?? '' }}">
        <div class="content">
            <div class="container">
                <div class="header py-7 py-lg-8">
                    <div class="header-body text-center mb-7">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-6">
                                <h1 class="text-dark">{{ __('Welcome to Inclusify!') }}</h1>
                                <p class="text-lead text-dark">
                                    {{ __('The best work experience.') }}
                                </p>
                                <a href="{{route('login')}}">Login</a>
                                <a href="{{route('register')}}">Register</a>

                                <img src="{{ asset('frontoffice') }}/images/hello.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

