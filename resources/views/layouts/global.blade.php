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
    <title>@yield('tittle')</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('template/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet"
          media="all">
    <link href="{{asset('template/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet"
          media="all">
    <link href="{{asset('template/vendor/mdi-font/css/material-design-iconic-font.min.css')}}"
          rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('template/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet"
          media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('template/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}"
          rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet"
          media="all">
    <link href="{{asset('template/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet"
          media="all">

    <!-- Main CSS-->
    <link href="{{asset('template/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="index.html">
                        <img src="images/icon/logo.png" alt="CoolAdmin"/>
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="index.html">Dashboard 1</a>
                            </li>
                            <li>
                                <a href="index2.html">Dashboard 2</a>
                            </li>
                            <li>
                                <a href="index3.html">Dashboard 3</a>
                            </li>
                            <li>
                                <a href="index4.html">Dashboard 4</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="chart.html">
                            <i class="fas fa-chart-bar"></i>Charts</a>
                    </li>
                    <li>
                        <a href="table.html">
                            <i class="fas fa-table"></i>Tables</a>
                    </li>
                    <li>
                        <a href="form.html">
                            <i class="far fa-check-square"></i>Forms</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-calendar-alt"></i>Calendar</a>
                    </li>
                    <li>
                        <a href="map.html">
                            <i class="fas fa-map-marker-alt"></i>Maps</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Pages</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="register.html">Register</a>
                            </li>
                            <li>
                                <a href="forget-pass.html">Forget Password</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-desktop"></i>UI Elements</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="button.html">Button</a>
                            </li>
                            <li>
                                <a href="badge.html">Badges</a>
                            </li>
                            <li>
                                <a href="tab.html">Tabs</a>
                            </li>
                            <li>
                                <a href="card.html">Cards</a>
                            </li>
                            <li>
                                <a href="alert.html">Alerts</a>
                            </li>
                            <li>
                                <a href="progress-bar.html">Progress Bars</a>
                            </li>
                            <li>
                                <a href="modal.html">Modals</a>
                            </li>
                            <li>
                                <a href="switch.html">Switchs</a>
                            </li>
                            <li>
                                <a href="grid.html">Grids</a>
                            </li>
                            <li>
                                <a href="fontawesome.html">Fontawesome Icon</a>
                            </li>
                            <li>
                                <a href="typo.html">Typography</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="#">
                <img src="images/icon/logo.png" alt="Cool Admin"/>
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                @if(Auth::check())
                    <ul class="list-unstyled navbar__list">
                        @if(Auth::user()->isManajer())
                            <li>
                                <a href="{{route('home-manajer')}}">
                                    <i class="fas fa-chart-bar"></i>Dashboard</a>
                            </li>
                            <li>
                                <a href="{{route('posisi-manajer')}}">
                                    <i class="fas fa-list-alt"></i>Posisi</a>
                            </li>
                            <li>
                                <a href="{{route('lamaran-manajer')}}">
                                    <i class="fas fa-file"></i>Lamaran</a>
                            </li>
                            <li>
                                <a href="{{route('akun-manajer')}}">
                                    <i class="fas fa-user"></i>Account Setting</a>
                            </li>
                        @elseif(Auth::user()->isPegawai())
                            <li>
                                <a href="{{route('home-pegawai')}}">
                                    <i class="fas fa-chart-bar"></i>Dashboard</a>
                            </li>
                            <li>
                                <a href="{{route('posisi-pegawai')}}">
                                    <i class="fas fa-table"></i>Posisi Yang Tersedia</a>
                            </li>
                            <li>
                                <a href="{{route('akun-pegawai')}}">
                                    <i class="fas fa-user"></i>Setting Akun</a>
                            </li>
                        @elseif(Auth::user()->isAdmin())
                            <li>
                                <a href="{{route('home-admin')}}">
                                    <i class="fas fa-chart-bar"></i>Dashboard</a>
                            </li>
                            <li>
                                <a href="{{route('user-admin')}}">
                                    <i class="fas fa-users"></i>Reset User</a>
                            </li>
                            <li>
                                <a href="{{route('akun-admin')}}">
                                    <i class="fas fa-user"></i>Setting Account</a>
                            </li>
                        @endif
                    </ul>
                @endif
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form class="form-header" action="" method="POST">

                        </form>
                        <div class="header-button">
                            <div class="noti-wrap">
                            </div>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">

                                    <div class="content">
                                        <a class="js-acc-btn" href="#"> {{ Auth::user()->name }}</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">

                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#"> {{ Auth::user()->role }}</a>
                                                </h5>
                                                <span class="email"> {{ Auth::user()->email }}</span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-account"></i>Account</a>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
    </div>
    <!-- END PAGE CONTAINER-->

</div>

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
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script>
    $().ready(function () {
        tinymce.init({
            selector:'.use-tinymce',
            entity_encoding: "raw",
            height: 300,
            theme: 'modern',
            toolbar1: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        });
    });
</script>
{{--Only Numnber--}}
<script>
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }

</script>
<script src="{{ asset('js/app.js') }}"></script>
<!-- Main JS-->
<script src="{{asset('template/js/main.js')}}"></script>

<script SRC="{{asset('js/lib/datatables/datatables.min.js')}}" ></script>
<script SRC="{{asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js')}}" ></script>
<script SRC="{{asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js')}}" ></script>
<script SRC="{{asset('js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')}}" ></script>
<script SRC="{{asset('js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')}}" ></script>
<script SRC="{{asset('js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')}}" ></script>
<script SRC="{{asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')}}" ></script>
<script SRC="{{asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')}}" ></script>
<script SRC="{{asset('js/lib/datatables/datatables-init.js')}}" ></script>

@stack('js')
</body>

</html>
<!-- end document-->