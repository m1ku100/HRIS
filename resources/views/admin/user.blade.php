@extends('layouts.global')
@section('tittle')
    Account Search
@endsection

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
                            <span class="badge badge-pill badge-warning"><i class="fa fa-warning"></i></span>
                            Password Akan Berubah Menjadi <i>'secret'</i>
                            <small>(Tanpa Tanda Petik)</small>
                            Setelah Direset
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-search"></i>
                                <strong class="card-title pl-2">Search User Form</strong>
                            </div>
                            <div class="card-body">
                                <form action="{{route('user-cari')}}" method="get" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-12">
                                            <div class="input-group">
                                                <input type="email" id="input2-group2" name="email"
                                                       placeholder="User Email" class="form-control">
                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-primary"><span
                                                                class="fa fa-search"></span>Search
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="card-text text-sm-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-self-center">
                    <div class="col-md-6">
                        @if(is_null($result))
                        @else
                            <center>
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-search"></i>
                                        <strong class="card-title pl-2">Hasil Pencarian Dari '{{$result->email}}
                                            '</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="mx-auto d-block">
                                            <div class="location text-sm-left">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td></td>
                                                        <th>Nama</th>
                                                        <td>{{$result->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <th>Email</th>
                                                        <td>{{$result->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <th>Hak Akses</th>
                                                        <td>{{$result->role}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card-text text-sm-center">
                                            <form action="{{route('reset')}}" method="post">
                                                {{csrf_field()}}
                                                <input value="{{$result->id}}" type="hidden" name="id">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-repeat"></i> Reset Password
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        @endif
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
            title: 'Password User',
            text: 'Berhasil di Reset!!',
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