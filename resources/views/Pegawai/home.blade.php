@extends('layouts.global')
@section('tittle')
    Dashboard
@endsection

@section('content')
    {{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
    {{--<div class="col-md-8">--}}
    {{--<div class="card">--}}
    {{--<div class="card-header">Dashboard</div>--}}

    {{--<div class="card-body">--}}
    {{--@if (session('status'))--}}
    {{--<div class="alert alert-success" role="alert">--}}
    {{--{{ session('status') }}--}}
    {{--</div>--}}
    {{--@endif--}}

    {{--You are logged in!--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    @if( App\Employee::where('user_id',Auth::user()->id)->get()->count() < 1 )
                        <div class="col-lg-12">
                            <div class="alert alert-danger" role="alert">
                                Segera Lengkapi Biodata Anda!!
                                <a href="{{route('resume-pegawai')}}" class="alert-link">Klik Disini!</a> Untuk Melengkapi
                                Biodata Anda
                            </div>
                        </div>
                    @else
                        <div class="col-lg-12">
                            <h3 class="title-5 m-b-35">Lamaran yang Telah anda kirim</h3>
                        </div>
                        @foreach(App\Lamaran::where('user_id',Auth::user()->id)->get() as $lamaran)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-suitcase"></i>
                                        <strong class="card-title pl-2">Lamaran</strong>
                                        <form class="pull-right" method="post" action="{{route('delete-lamaran')}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$lamaran->id}}">
                                            <button class="btn btn-danger btn-sm" data-toggle="tooltip" type="submit"
                                                    data-placement="top"
                                                    title="Hapus Lamaran">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="card-body">
                                        <div class="mx-auto d-block">

                                            {{--<img class="rounded-circle mx-auto d-block" src="images/icon/avatar-01.jpg" alt="Card image cap">--}}
                                            <h5 class="text-sm-center mt-2 mb-1">
                                                    {{App\Posisi::withTrashed()->where('id',$lamaran->posisi_id)->first()->nama}}
                                            </h5>
                                            <div class="location text-sm-center">
                                                Tanggal Masuk Lamaran : <b>{{$lamaran->masuk_lamaran}}</b>
                                            </div>

                                        </div>
                                        <hr>
                                        <div class="card-text text-sm-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        @if(Session::has('success'))
        swal({
            title: 'Lamaran Anda',
            text: 'Berhasil Dihapus, Silahkan Memilih Posisi yang Tersedia',
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