@extends('layouts.global')
@section('tittle')
    Form - Riwayat Pendidikan
@endsection

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                <span class="badge badge-pill badge-danger">Error</span>
                                <ol>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ol>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        @endif

                        <div class="card">
                            <form action="{{route('edu-add')}}" method="post" class="">
                                {{ csrf_field() }}
                                <div class="card-header">
                                    <i class="fa fa-file-text"></i>
                                    <strong class="card-title pl-2">Education Data Form</strong>
                                </div>
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nf-email" class="form-control-label">Jenjang
                                                    Pendidikan </label>
                                                <select name="edu_id" id="select" class="form-control">
                                                    @foreach(App\Edu::all() as $edu)
                                                        <option value="{{$edu->id}}">{{$edu->jenjang}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nf-email" class="form-control-label">Nama Institusi </label>
                                                <input type="text" id="nf-email" name="instansi"
                                                       placeholder="Nama Instansi Pendidikan yang Anda Tempuh...."
                                                       class="form-control">
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nf-email" class="form-control-label">Tahun Lulus </label>
                                                <select name="jurusan" id="select" class="form-control">
                                                    @foreach(App\Jurusan::all() as $jurusan)
                                                        <option value="{{$jurusan->id}}">{{$jurusan->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nf-email" class="form-control-label">Lokasi </label>
                                                <select name="negara_id" id="select" class="form-control">
                                                    @foreach(App\Negara::all() as $negara)
                                                        <option value="{{$negara->id}}">{{$negara->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nf-email" class="form-control-label">Tahun Lulus </label>
                                                <input type="text" name="tahun_lulus"
                                                       onkeypress="return isNumberKey(event)"
                                                       placeholder="Tahun Lulus Pendidikan Anda..."
                                                       class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nf-email" class="form-control-label">Nilai Kelulusan
                                                    <small>(IPK/NA)</small>
                                                </label>
                                                <input type="text" name="ipk"
                                                       placeholder=""
                                                       class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-md">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script>

    </script>
@endpush
