@extends('layouts.global')
@section('tittle')
    Account Setting
@endsection

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-male"></i>
                                <strong class="card-title pl-2">Current Profile</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    {{--<img class="rounded-circle mx-auto d-block" src="images/icon/avatar-01.jpg" alt="Card image cap">--}}
                                    <h5 class="text-sm-center mt-2 mb-1">{{ Auth::user()->name }}</h5>
                                    <div class="location text-sm-center">
                                        Sign-in as : <b>{{Auth::user()->role}}</b>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i>
                                <strong class="card-title pl-2">Personal Profile</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    @if( App\Employee::where('user_id',Auth::user()->id)->get()->count() < 1 )
                                        <div class="location text-sm-center">
                                            <a href="{{route('add-pegawai')}}">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o"></i> Update Profile
                                                </button>
                                            </a>
                                        </div>
                                    @else
                                        @foreach(App\Employee::where('user_id',Auth::user()->id)->get() as $akun)
                                            <div class="location text-sm-left">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td></td>
                                                        <th>Nama</th>
                                                        <td>{{$akun->nama}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <th>Tempat, Tgl Lahir</th>
                                                        <td>{{$akun->tmp_lahir}}, {{$akun->tgl_lahir}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <th>Gender</th>
                                                        <td>{{$akun->gender}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <th>Telp</th>
                                                        <td>{{$akun->telp}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <th>Email</th>
                                                        <td>{{$akun->email}}</td>
                                                    </tr>

                                                </table>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    @if( App\Employee::where('user_id',Auth::user()->id)->get()->count() < 1 )

                                    @else
                                        <a href="{{route('edit-pegawai')}}">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Update Profile
                                            </button>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">

                        <div class="card">
                            <form action="{{route('update-profile')}}" method="post" class="">
                                {{ csrf_field() }}
                                <div class="card-header">
                                    <i class="fa fa-cog"></i>
                                    <strong class="card-title pl-2">Edit Your Profile</strong>
                                </div>
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label for="nf-email" class="form-control-label">Name</label>
                                        <input type="text" id="nf-email" name="name" placeholder="Enter Email.."
                                               value="{{ Auth::user()->name }}"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="nf-email" class="form-control-label disabled">Email</label>
                                        <input type="email" id="nf-email" name="nf-email" placeholder="Enter Email.."
                                               value="{{ Auth::user()->email }}"
                                               class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nf-email" class=" form-control-label">Current Password</label>
                                        <input type="password" id="nf-email" name="passlama"
                                               placeholder="Enter Current Password.."
                                               class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="nf-password" class=" form-control-label">New
                                                    Password</label>
                                                <input type="password" id="nf-password" name="passbaru"
                                                       placeholder="Enter Password.." class="form-control">
                                                <span class="help-block">Please enter your password</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="nf-password" class=" form-control-label">Re-Type New
                                                    Password</label>
                                                <input type="password" id="nf-password" name="pass_confirm"
                                                       placeholder="Enter Password.." class="form-control">
                                                <span class="help-block">Please enter your password</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @if( App\Employee::where('user_id',Auth::user()->id)->get()->count() > 0 )
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-suitcase"></i>
                                    <strong class="card-title pl-2">Your Education</strong>
                                </div>
                                <div class="card-body">
                                    <div class="location text-sm-center">
                                        @if(App\Pendidikan::where('user_id',Auth::user()->id)->get()->count() < 1)
                                            <a href="{{route('edu-pegawai')}}">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-plus"></i> Tambah Riwayat Pendidikan
                                                </button>
                                            </a>
                                        @else
                                            @foreach(App\Pendidikan::where('user_id',Auth::user()->id)->get() as $pend)
                                                <div class="mx-auto d-block">
                                                    {{App\Edu::find($pend->edu_id)->jenjang}} - {{$pend->instansi}}
                                                </div>
                                                <hr>
                                                <div class="card-text text-sm-center">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                </div>
                                <div class="card-footer text-sm-center">
                                    @if(App\Pendidikan::where('user_id',Auth::user()->id)->get()->count() < 1)
                                    @else
                                        <a href="{{route('edu-pegawai')}}">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-plus"></i> Tambah Riwayat Pendidikan
                                            </button>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-folder"></i>
                                    <strong class="card-title pl-2">certificate</strong>
                                </div>
                                <div class="card-body">
                                    <div class="location text-sm-center">
                                        @if(App\Sertificate::where('user_id',Auth::user()->id)->get()->count() < 1)
                                            <a href="{{route('sertificate-pegawai')}}">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-plus"></i> Tambah Sertifikat
                                                </button>
                                            </a>
                                        @else
                                            @foreach(App\Sertificate::where('user_id',Auth::user()->id)->get() as $serti)
                                                <div class="mx-auto d-block">
                                                    {{$serti->keahlian}}
                                                </div>
                                                <hr>
                                                <div class="card-text text-sm-center">
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                    <div class="mx-auto d-block">
                                    </div>
                                    <hr>
                                    <div class="card-text text-sm-center">
                                    </div>
                                </div>
                                <div class="card-footer text-sm-center">
                                    @if(App\Sertificate::where('user_id',Auth::user()->id)->get()->count() < 1)

                                    @else
                                        <a href="{{route('sertificate-pegawai')}}">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-plus"></i> Tambah Sertifikat
                                            </button>
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script>
        @if(Session::has('success'))
        swal({
            title: 'Profile Settings',
            text: 'Update successfully!',
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