<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>OCR-COVID 19 | Register</title>
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
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class=" login-form-head">
                        <h4>Register For Vaccination</h4>
                        {{-- <p></p> --}}
                    </div>
                    <div class="login-form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-gp">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="alphabet @error('name') is-invalid @enderror"
                                        required name="name" value="{{ old('name') }}">
                                    <i class="ti-user"></i>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-gp">
                                    <label for="phone">Phone No #</label>
                                    <input type="text" id="phone" class="phone-no @error('phone') is-invalid @enderror"
                                        required name="phone" value="{{ old('phone') }}">
                                    <i class="ti-mobile"></i>
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-gp">
                                    <label for="cnic">CNIC</label>
                                    <input type="text" id="cnic" class="@error('cnic') is-invalid @enderror" required
                                        name="cnic" value="{{ old('cnic') }}">
                                    <i class="ti-credit-card"></i>
                                    @error('cnic')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-gp">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input onfocus="(this.type='date')" onblur="(this.type='text')" id="date_of_birth"
                                        class="@error('date_of_birth') is-invalid @enderror" required
                                        name="date_of_birth" value="{{ old('date_of_birth') }}">
                                    <i class="ti-calendar"></i>
                                    @error('date_of_birth')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-gp">
                                    <label for="email">Email address</label>
                                    <input type="email" id="email" class="@error('email') is-invalid @enderror" required
                                        name="email" value="{{ old('email') }}">
                                    <i class="ti-email"></i>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-gp">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password"
                                        class="@error('password') is-invalid @enderror" required value="{{ old('password') }}">
                                    <i class="ti-lock"></i>
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="color: #7e74ff">Gender </label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="male" name="gender"
                                            class="custom-control-input gender @error('gender') is-invalid @enderror"
                                            value="1" required @if (old('gender') == 1) checked @endif>
                                        <label class="custom-control-label" for="male">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="female" name="gender"
                                            class="custom-control-input gender @error('gender') is-invalid @enderror"
                                            value="2" required @if (old('gender') == 2) checked @endif>
                                        <label class="custom-control-label" for="female">Female</label>
                                    </div>
                                    @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="color: #7e74ff">Marital Status </label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="unmarried" name="marital_status"
                                            class="custom-control-input marital_status @error('marital_status') is-invalid @enderror" value="1"
                                             @if (old('marital_status') == 1) checked @endif>
                                        <label class="custom-control-label" for="unmarried">Unmarried</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="married" name="marital_status"
                                            class="custom-control-input marital_status @error('marital_status') is-invalid @enderror" value="2"
                                             @if (old('marital_status') == 2) checked @endif>
                                        <label class="custom-control-label" for="married">Married</label>
                                    </div>
                                    @error('marital_status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-gp guardian">
                                    <label for="guardian_cnic" id="guardian_cnic_label">Husband/Father CNIC</label>
                                    <input type="text" id="guardian_cnic" name="guardian_cnic"
                                        class="@error('guardian_cnic') is-invalid @enderror" required value="{{ old('guardian_cnic') }}">
                                    <i class="ti-credit-card"></i>
                                    @error('guardian_cnic')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-gp">
                                    <label for="state">State</label>
                                    <input type="text" id="state" class="alphabet @error('state') is-invalid @enderror"
                                        required name="state" value="{{ old('state') }}">
                                    <i class="ti-map"></i>
                                    @error('state')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-gp">
                                    <label for="city">City</label>
                                    <input type="text" id="city" class="alphabet @error('city') is-invalid @enderror"
                                        required name="city" value="{{ old('city') }}">
                                    <i class="ti-map-alt"></i>
                                    @error('city')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-gp">
                                    <label for="address">Address</label>
                                    <input type="text" id="address"
                                        class="alphabet @error('address') is-invalid @enderror" required name="address" value="{{ old('address') }}">
                                    <i class="ti-location-pin"></i>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="submit-btn-area col-md-6 offset-md-3">
                            <button id="form_submit" type="submit" disabled>Register <i
                                    class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Already Registered?<a href="{{ route('login') }}">Login Here</a>
                            </p>
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
        <script>
            let gender = 0;
            let maritalStatus = 0;
            $(document).ready(function(event) {
                gender = $('input[name="gender"]:checked').val();
                maritalStatus = $('input[name="marital_status"]:checked').val();
                displaySection();
                $(document).on('change', '.gender', function(e) {
                    gender = $(this).val();
                    displaySection();
                });
                $(document).on('change', '.marital_status', function(e) {
                    maritalStatus = $(this).val();
                    displaySection();
                });
            });

            function displaySection() {
                if (gender == 1 && maritalStatus == 1 || gender == 2 && maritalStatus == 1) {
                    $('.guardian').show();
                    $('#guardian_cnic').prop('required',true);
                    $('#guardian_cnic_label').text('Father CNIC');
                    $('#form_submit').attr('disabled', false);
                } else if (gender == 1 && maritalStatus == 2) {
                    $('.guardian').hide();
                    $('#guardian_cnic').prop('required',false);
                    $('#form_submit').attr('disabled', false);
                } else if (gender == 2 && maritalStatus == 2) {
                    $('.guardian').show();
                    $('#guardian_cnic').prop('required',true);
                    $('#guardian_cnic_label').text('Husband CNIC')
                    $('#form_submit').attr('disabled', false);
                }
            }
        </script>
</body>

</html>
