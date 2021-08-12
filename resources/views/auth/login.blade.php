<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>OCR-COVID 19 | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('general/images/logo/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('dashboard/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <style>
        .login-area {
            background: #C4C4C4;
        }
    </style>
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
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class=" login-form-head">
                    <h4>Sign In</h4>
                    {{-- <p></p> --}}
            </div>
            <div class="login-form-body">
                <div class="form-gp">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" id="exampleInputEmail1" class="@error('email') is-invalid @enderror"
                        name="email">
                    <i class="ti-email"></i>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-gp">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" id="exampleInputPassword1" name="password"
                        class="@error('password') is-invalid @enderror">
                    <i class="ti-lock"></i>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    {{-- <span class="invalid-feedback" role="alert">
                        <strong></strong>
                    </span> --}}
                    @enderror
                </div>
                <div class="row mb-4 rmber-area">
                    <div class="col-6">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" type="checkbox" name="remember"
                                id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                        </div>
                    </div>
                    <div class="col-6 text-right">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </div>
                <div class="submit-btn-area">
                    <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                </div>
                <div class="form-footer text-center mt-5">
                    <p class="text-muted">Haven't Registored for Vaccination? <a href="{{ route('register') }}">Registor Now</a></p>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="{{ asset('dashboard/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('dashboard/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/jquery.slicknav.min.js') }}"></script>

    <!-- others plugins -->
    <script src="{{ asset('dashboard/js/plugins.js') }}"></script>
    <script src="{{ asset('dashboard/js/scripts.js') }}"></script>
</body>

</html>
