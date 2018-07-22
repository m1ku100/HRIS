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
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{App\User::all()->count()}}</h2>
                                        <span>Users</span>
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
                <div class="row">
                    <div class="col-lg-7">
                        <!-- USER DATA-->
                        <div class="user-data m-b-30">
                            <h3 class="title-3 m-b-30">
                                <i class="zmdi zmdi-account-calendar"></i>user data</h3>
                            <div class="filters m-b-45">
                                {{--<div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">--}}
                                {{--<select class="js-select2" name="property">--}}
                                {{--<option selected="selected">All Properties</option>--}}
                                {{--<option value="">Products</option>--}}
                                {{--<option value="">Services</option>--}}
                                {{--</select>--}}
                                {{--<div class="dropDownSelect2"></div>--}}
                                {{--</div>--}}
                                {{--<div class="rs-select2--dark rs-select2--sm rs-select2--border">--}}
                                {{--<select class="js-select2 au-select-dark" name="time">--}}
                                {{--<option selected="selected">All Time</option>--}}
                                {{--<option value="">By Month</option>--}}
                                {{--<option value="">By Day</option>--}}
                                {{--</select>--}}
                                {{--<div class="dropDownSelect2"></div>--}}
                                {{--</div>--}}
                            </div>
                            <div class="table-responsive table-data">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>name</td>
                                        <td>role</td>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $num=1;?>
                                    @foreach($user as $users)
                                        <tr>
                                            <td>{{$num}}</td>
                                            <?php $num++?>
                                            <td>
                                                <div class="table-data__info">
                                                    <h6>{{$users->name}}</h6>
                                                    <span>
                                                        <a href="#">{{$users->email}}</a>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                @if($users->role == 'admin')
                                                    <span class="role admin">Admin</span>
                                                @elseif($users->role == 'manajer')
                                                    <span class="role member">Manajer</span>
                                                @elseif($users->role == 'pegawai')
                                                    <span class="role user">Pegawai</span>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="filters m-b-45">
                                    {{ $user->links() }}
                                </div>
                            </div>
                        </div>
                        <!-- END USER DATA-->
                    </div>
                    <div class="col-lg-5">
                        <h2 class="title-1 m-b-25">Add Manager</h2>
                        <div class="card">
                            <form action="{{route('add-admin')}}" method="post" class="">
                                {{ csrf_field() }}
                                <div class="card-header">
                                    <i class="fa fa-file-text"></i>
                                    <strong class="card-title pl-2">Manager Data Form</strong>
                                </div>
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label for="nf-email" class="form-control-label">Name</label>
                                        <input type="text" id="nf-email" name="name"
                                               placeholder="Username...."
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nf-email" class="form-control-label">Email</label>
                                                <input type="email" id="nf-email" name="email"
                                                       placeholder="User Email..."
                                                       class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nf-email" class="form-control-label">Password For User</label>
                                                <input type="password" id="nf-email" name="password" placeholder="Min. 6 character"
                                                       class="form-control">
                                                <input type="hidden" id="nf-email" name="role" value="manajer"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>

                                </div>
                            </form>
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
@push('js')
    <script>
        @if(Session::has('success'))
        swal({
            title: 'Data Manajer ',
            text: 'Berhasil Ditambahkan',
            type: 'success',
            timer: '3500'
        })
        @endif
        @if(Session::has('error'))
        swal({
            title: 'Oops...',
            type: 'error',
            timer: '3500',
            text: '{{ Session::get('error') }}'
        })
        @endif
    </script>
@endpush