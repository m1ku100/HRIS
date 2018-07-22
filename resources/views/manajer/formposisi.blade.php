@extends('layouts.global')
@section('tittle')
    Form - Posisi
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
                        <form action="{{route('posisi-save')}}" method="post" class="">
                            {{ csrf_field() }}
                            <div class="card-header">
                                <i class="fa fa-file-text"></i>
                                <strong class="card-title pl-2">Posisi Form</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="nf-email" class="form-control-label">Nama Posisi </label>
                                    <input type="text" id="nf-email" name="nama" placeholder="Posisi yang Dibutuhkan"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nf-email" class="form-control-label">Deskripsi Posisi yang Dibutuhkan</label>
                                    <textarea class="form-control use-tinymce" name="deskripsi" placeholder="Deskripsi Posisi yang Dibutuhkan...."> </textarea>
                                    {{--<input type="email" id="nf-email" name="nf-email" placeholder="Enter Email.."--}}
                                           {{--class="form-control" >--}}
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
        </div>
    </div>
</div>

@endsection
