@extends('layouts.global')
@section('tittle')
    Profile - {{$user->name}}
@endsection

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i>
                                <strong class="card-title pl-2">Current Profile</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    {{--<img class="rounded-circle mx-auto d-block" src="images/icon/avatar-01.jpg" alt="Card image cap">--}}
                                    <h5 class="text-sm-center mt-2 mb-1">{{$user->name }}</h5>
                                    <div class="location text-sm-center">
                                        Email : <b>{{$user->email}}</b>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-file-archive"></i>
                                <strong class="card-title pl-2">certificate</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    @foreach(App\Sertificate::where('user_id',$user->id)->get() as $serti)
                                        <h5 class="text-sm-center mt-2 mb-1">{{$serti->keahlian }}</h5>
                                       <a href="{{ route('certificate-detail', ['id' =>  $es = encrypt($serti->id)]) }}" target="_blank">Click to Preview Certificate</a>
                                    @endforeach
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">

                        <div class="card">

                            <div class="card-header">
                                <i class="fa fa-cog"></i>
                                <strong class="card-title pl-2">Pesonal And Education</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="nf-password" class=" form-control-label">Nama </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nf-password" class=" form-control-label">{{$user->name}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="nf-password" class=" form-control-label">Gender </label>

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nf-password"
                                                   class=" form-control-label">{{App\Employee::where('user_id',$user->id)->first()->gender}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="nf-password" class=" form-control-label">Tempat, Tanggal
                                                Lahir</label>

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nf-password"
                                                   class=" form-control-label">{{App\Employee::where('user_id',$user->id)->first()->tmp_lahir}}
                                                , {{App\Employee::where('user_id',$user->id)->first()->tgl_lahir}}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="nf-password" class=" form-control-label">No. Telp.</label>

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nf-password"
                                                   class=" form-control-label">{{App\Employee::where('user_id',$user->id)->first()->telp}}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="nf-password" class=" form-control-label">Riwayat
                                                Pendidikan</label>

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            @foreach(App\Pendidikan::where('user_id',$user->id)->get() as $pend)
                                                <label for="nf-password"
                                                       class=" form-control-label">{{$pend->instansi}}</label>
                                                <br>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                {{--<button type="submit" class="btn btn-primary btn-sm">--}}
                                {{--<i class="fa fa-dot-circle-o"></i> Submit--}}
                                {{--</button>--}}
                                {{--<button type="reset" class="btn btn-danger btn-sm">--}}
                                {{--<i class="fa fa-ban"></i> Reset--}}
                                {{--</button>--}}
                            </div>
                        </div>
                    </div>
                </div>
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