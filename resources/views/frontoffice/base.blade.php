<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta
        name="description"
        content="Social Network React Template"
    />
    <link rel="manifest" href="%PUBLIC_URL%/manifest.json" />

    <link rel="stylesheet" href="{{ asset('frontoffice') }}/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('frontoffice') }}/css/feather.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontoffice') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontoffice') }}/css/emoji.css">

    <title>Sociala || Social Network React Template</title>
</head>
<body class="color-theme-blue mont-font loaded theme-light">
<noscript>You need to enable JavaScript to run this app.</noscript>
<div id="root"></div>
@auth()
    <div class="wrapper">
        @include('backoffice.layouts.navbars.sidebar')
        <div class="main-panel">
            @include('backoffice.layouts.navbars.navbar')

            <div class="content">
                @yield('content')
            </div>

            @include('backoffice.layouts.footer')
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@else
    @include('backoffice.layouts.navbars.navbar')
    <div class="wrapper wrapper-full-page">
        <div class="full-page {{ $contentClass ?? '' }}">
            <div class="content">
                <div class="container">
                    @yield('content')
                </div>
            </div>
            @include('backoffice.layouts.footer')
        </div>
    </div>
@endauth
</body>
</html>
