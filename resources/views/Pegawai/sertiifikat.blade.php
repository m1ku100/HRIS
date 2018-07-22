@extends('layouts.global')
@section('tittle')
    Form - Sertifikat
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
                            <form action="{{route('sertificate-add')}}" method="post" class="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-header">
                                    <i class="fa fa-file-text"></i>
                                    <strong class="card-title pl-2">certificate Data Form</strong>
                                </div>
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nf-email" class="form-control-label">Keahlian</label>
                                                <input type="text" id="nf-email" name="keahlian"
                                                       placeholder="Jenis Keahlian Dari Sertifikat yang Akan Anda Upload...."
                                                       class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nf-email" class="form-control-label">Nama Setifikat</label>
                                                <input type="text" id="nf-email" name="setifikat"
                                                       placeholder="Nama Sertifikat yang Akan Anda Upload...."
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nf-email" class="form-control-label">Keterangan Dari Sertifikat</label>
                                        <textarea class="form-control use-tinymce" name="ket_setifikat"
                                                  placeholder="Deskripsi Posisi yang Dibutuhkan...."> </textarea>
                                        {{--<input type="email" id="nf-email" name="nf-email" placeholder="Enter Email.."--}}
                                        {{--class="form-control" >--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="nf-email" class="form-control-label">File Sertifikat <small>(Max. 2mb. Format .jpg/.jpeg/.png)</small></label>
                                        <input type="file" id="nf-email" name="dir_setifikat"
                                               class="form-control" readonly>
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="fa fa-upload"></i> Upload
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

