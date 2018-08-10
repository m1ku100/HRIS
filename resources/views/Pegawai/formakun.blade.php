@extends('layouts.global')
@section('tittle')
    Form - Biodata Akun
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
                            <form action="{{route('pegawai-add')}}" method="post" class=""
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-header">
                                    <i class="fa fa-file-text"></i>
                                    <strong class="card-title pl-2">Personal Data Form</strong>
                                </div>
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label for="nf-email" class="form-control-label">Nama </label>
                                        <input type="text" id="nf-email" name="nama" value="{{ Auth::user()->name }}"
                                               placeholder="Nama Lengkap Anda...."
                                               class="form-control">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nf-email" class="form-control-label">Tempat lahir </label>
                                                <input type="text" id="nf-email" name="tmp_lahir"
                                                       placeholder="Tempat Lahir..."
                                                       class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nf-email" class="form-control-label">Tanggal Lahir </label>
                                                <input type="date" id="nf-email" name="tgl_lahir"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="nf-email" class="form-control-label">Gender </label>
                                                <select name="gender" id="select" class="form-control">
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="nf-email" class="form-control-label">No. Telp. </label>
                                                <input type="text" id="nf-email" name="telp"
                                                       onkeypress="return isNumberKey(event)"
                                                       class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="nf-email" class="form-control-label">Email </label>
                                                <input type="email" id="nf-email" name="email"
                                                       value="{{ Auth::user()->email }}"
                                                       class="form-control disabled" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="nf-email" class="form-control-label">Foto Diri
                                                    <small>Maks. 2mb (.PNG/.JPG/.JPEG)</small>
                                                </label>
                                                <input type="file" class="form-control disabled" name="dir_foto"
                                                       readonly>
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
            <br><br><br>
        </div>
    </div>

@endsection

