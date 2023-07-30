<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Aug 2020 05:06:05 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Inventory</title>
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('AdminAssets')}}/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('AdminAssets')}}/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('AdminAssets')}}/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('AdminAssets')}}/favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{asset('AdminAssets')}}/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('AdminAssets')}}/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="{{asset('AdminAssets')}}/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{asset('AdminAssets')}}/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <img alt="logo" src="{{asset('AdminAssets')}}/images/logo-dark.png" />
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <i class="fa fa-envelope"></i>
                            </span>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                <i class="fa fa-key"></i>
                            </span>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="check" for="remember"> {{ __('Remember Me') }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type='submit' class="btn btn-primary btn-block">{{ __('Sign in') }}</button>
                        </div>
                        <div class="form-group text-center">
                            <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                            </a>
                            <hr/>
                             <span>Don't have an account?</span>
                            <a href="pages_register.html" class="btn btn-block mt-sm">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="{{asset('AdminAssets')}}/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="{{asset('AdminAssets')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset('AdminAssets')}}/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="{{asset('AdminAssets')}}/javascripts/template-script.min.js"></script>
<script src="{{asset('AdminAssets')}}/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Aug 2020 05:06:10 GMT -->
</html>
