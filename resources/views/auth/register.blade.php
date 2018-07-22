<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('template/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet"
          media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('template/vendor//bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('template/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor//bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}"
          rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('template/css/theme.css')}}" rel="stylesheet" media="all">

</head>


<body class="animsition">
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            {{--<img src="images/icon/logo.png" alt="CoolAdmin">--}}
                            <h1>SIGN-UP</h1>
                            Human Resource Information System
                        </a>
                    </div>
                    <div class="login-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input name="role" type="hidden" value="pegawai">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="au-input au-input--full form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name" value="{{ old('name') }}" type="text" placeholder="Username"
                                       autofocus required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email" value="{{ old('email') }}" type="email" placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required type="password" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Re-Type Password</label>
                                <input class="au-input au-input--full"
                                       name="password_confirmation" required type="password" placeholder="Re-Type Password">
                            </div>

                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                        </form>
                        <div class="register-link">
                            <p>
                                Sudah Memiliki Akun?re
                                <a href={{ route('login') }}#">Masuk Disini</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Jquery JS-->

<!-- Jquery JS-->
<script src="{{asset('template/vendor/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap JS-->
<script src="{{asset('template/vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="{{asset('template/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
<!-- Vendor JS       -->
<script src="{{asset('template/vendor/slick/slick.min.js')}}">
</script>
<script src="{{asset('template/vendor/wow/wow.min.js')}}"></script>
<script src="{{asset('template/vendor/animsition/animsition.min.js')}}"></script>
<script src="{{asset('template/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
</script>
<script src="{{asset('template/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('template/vendor/counter-up/jquery.counterup.min.js')}}">
</script>
<script src="{{asset('template/vendor/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{asset('template/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('template/vendor/chartjs/Chart.bundle.min.js')}}"></script>
<script src="{{asset('template/vendor/select2/select2.min.js')}}">
</script>

<!-- Main JS-->
<script src="{{asset('template/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->