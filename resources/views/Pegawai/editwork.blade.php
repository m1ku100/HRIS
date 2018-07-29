@extends('layouts.global')
@section('tittle')
    Form - Pengalaman Kerja
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
                            <form action="{{route('work-update')}}" method="post"
                                  class="form-horizontal">
                                {{ csrf_field() }}

                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="nf-email" class="form-control-label">Nama
                                                    Perusahaan </label>
                                                <input type="text" id="nf-email" name="company"
                                                        value="{{$exp->company}}"
                                                       class="form-control">
                                                <input type="hidden" name="user_id"
                                                       value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="id"
                                                       value="{{ $exp->id }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="nf-email" class="form-control-label">Posisi </label>
                                                <input type="text" id="nf-email" name="job_title" value="{{$exp->job_title}}"
                                                       class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="nf-email" class="form-control-label">Jabatan</label>
                                                <input type="text" id="nf-email" name="position"
                                                       class="form-control" value="{{$exp->position}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="nf-email" class="form-control-label">Industri</label>
                                                <select class="form-control" name="industri_id">
                                                    <option value="{{$exp->industri_id}}">{{App\Industri::find($exp->industri_id)->nama}}</option>
                                                    @foreach(App\Industri::all() as $idus)
                                                        <option value="{{$idus->id}}">{{$idus->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="nf-email" class="form-control-label">Tahun
                                                    Masuk </label>
                                                <input type="text" name="work_from"
                                                       onkeypress="return isNumberKey(event)"
                                                       class="form-control" value="{{$exp->work_from}}"> -
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nf-email" class="form-control-label">Hingga
                                                </label>
                                                <input type="text" name="work_till"
                                                       onkeypress="return isNumberKey(event)"
                                                       class="form-control" value="{{$exp->work_till}}">
                                            </div>

                                            <div class="col-md-2">
                                                <label for="nf-email" class="form-control-label">Gaji
                                                    Perbulan
                                                </label>
                                                <select name="jenis_gaji" class="form-control">
                                                    <option value="{{$exp->jenis_gaji}}">{{$exp->jenis_gaji}}</option>
                                                    <option value="USD">USD</option>
                                                    <option value="EUR">EUR</option>
                                                    <option value="IDR">IDR</option>
                                                    <option value="JPY">JPY</option>
                                                    <option value="SGD">SGD</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="nf-email" class="form-control-label">Nominal
                                                </label>
                                                <input type="text" name="salary"
                                                       placeholder="Nominal Gaji Anda"
                                                       onkeypress="return isNumberKey(event)"
                                                       class="form-control" value="{{$exp->salary}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="nf-email" class="form-control-label">Deskripsi
                                                    Pekerjaan</label>
                                                <textarea class="form-control use-tinymce"
                                                          name="des_pos"> {!! $exp->des_pos!!}</textarea>

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

