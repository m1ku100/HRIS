@extends('layouts.global')
@section('tittle')
    Dashboard
@endsection

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">overview</h2>
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-4">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-info"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{App\Lamaran::where('created_at','<=',today())->count()}}</h2>
                                        <span>Lamaran Masuk Hari Ini</span>
                                    </div>
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-file"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{App\Lamaran::all()->count()}}</h2>
                                        <span>Lamaran Masuk</span>
                                    </div>
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{App\Posisi::all()->count()}}</h2>
                                        <span>Posisi</span>
                                    </div>
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                {{--<div class="copyright">--}}
                {{--<p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>

@endsection
