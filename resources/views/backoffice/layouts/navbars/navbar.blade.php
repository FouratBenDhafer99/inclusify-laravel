@auth()
    @include('backoffice.layouts.navbars.navs.auth')
@endauth

@guest()
    @include('backoffice.layouts.navbars.navs.guest')
@endguest
