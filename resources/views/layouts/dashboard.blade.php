<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>OCR-COVID-19 |
        @if (Auth::user()->hasRole('citizen'))
            Citizen
        @endif
        | @yield('title')
    </title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('general/images/logo/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('dashboard-partials.styles')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            @if (Auth::user()->hasRole('citizen'))
                @include('layouts.partials.citizen.sideBarMenu')
            @elseif(Auth::user()->hasRole('vaccination-center'))
                @include('layouts.partials.vaccination-center.sideBarMenu')
            @elseif(Auth::user()->hasRole('paramedic'))
                @include('layouts.partials.paramedic.sideBarMenu')
            @endif
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                @if (Auth::user()->hasRole('citizen'))
                    @include('layouts.partials.citizen.headerArea')
                @elseif(Auth::user()->hasRole('vaccination-center'))
                    @include('layouts.partials.vaccination-center.headerArea')
                @elseif(Auth::user()->hasRole('paramedic'))
                    @include('layouts.partials.paramedic.headerArea')
                @endif
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center pt--10 pb--10">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Home</a></li>
                                @yield('breadcrubsList')
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                @yield('pageContent')
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            @include('dashboard-partials.footer')
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    @include('dashboard-partials.scripts')
</body>

</html>
