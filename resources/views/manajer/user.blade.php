@extends('layouts.global')
@section('tittle')
    Data Pegawai
@endsection

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Data Pegawai</h3>
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <form action="{{route('pegawai-cari')}}" method="get">
                                    <div class="rs-select2--light rs-select2--lg">
                                        <label for="nf-email" class="form-control-label"></label>
                                        <input type="text" id="nf-email" name="nama"
                                               @if(!is_null($nama))value="{{$nama}}" @endif
                                               class="form-control" autofocus placeholder="Nama Pegawai...">
                                    </div>
                                    <div class="rs-select2--light rs-select2--lg">
                                        <label for="nf-email" class="form-control-label">Pendidikan Pegawai</label>
                                        <select class="js-select2" name="degree">
                                            @if(!is_null($degree))
                                                <option value="{{$degree}}">{{App\Edu::find($degree)->jenjang}}</option>
                                            @endif
                                            <option value="">Semua</option>
                                            @foreach(App\Edu::all() as $edu)
                                                <option value="{{$edu->id}}">{{$edu->jenjang}}</option>
                                            @endforeach
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <button type="submit" class="au-btn-filter">
                                        <i class="zmdi zmdi-search"></i>Cari
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama Pegawai</th>
                                    <th>Email Pegawai</th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $num = 1;
                                ?>
                                @if(is_null($user))
                                @else
                                    @foreach($user as $row)

                                        <tr class="tr-shadow">
                                            <td>{{$num}}</td>
                                            <?php
                                            $num++;
                                            ?>
                                            <td class="desc">{{$row->name}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>
                                                <div class="pull-left">
                                                    <div class="table-data-feature">
                                                        {{--<a href="#" id="edit_{{ $row->id }}">--}}
                                                        {{--<button class="item" data-toggle="tooltip" data-placement="top"--}}
                                                        {{--title="Edit">--}}
                                                        {{--<i class="zmdi zmdi-edit"></i>--}}
                                                        {{--</button>--}}
                                                        {{--</a>--}}
                                                        <a target="_blank"
                                                           href="{{ route('pegawai-detail', ['id' =>  $es = encrypt($row->id)]) }}">
                                                            <button class="item" data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    title="Detail Pegawai">
                                                                <i class="zmdi zmdi-more"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        {{--<tr id="extra_{{ $row->id }}" class="tr-shadow" style="display: none">--}}
                                        {{--<td colspan="4">--}}
                                        {{--<div class="table-responsive table-responsive-data2">--}}
                                        {{--<table class="table table-data2">--}}
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                        {{--<th colspan="6">--}}
                                        {{--<center>--}}
                                        {{--<h4>Daftar Pelamar Pada Posisi Ini</h4>--}}
                                        {{--</center>--}}
                                        {{--</th>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<td>No</td>--}}
                                        {{--<th>Nama Pelamar</th>--}}
                                        {{--<th>Email Pelamar</th>--}}
                                        {{--<th>Tanggal Masuk Lamaran</th>--}}
                                        {{--<th>status</th>--}}
                                        {{--<th></th>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}
                                        {{--</tbody>--}}
                                        {{--</table>--}}
                                        {{--</div>--}}
                                        {{--</td>--}}
                                        {{--</tr>--}}

                                        <tr class="spacer"></tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            <div class="filters m-b-45">
                                {{ $user->links() }}
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

        $("a[id^=show_]").click(function (event) {
            $("#extra_" + $(this).attr('id').substr(5)).toggle();
            event.preventDefault();
        });

        $("a[id^=edit_]").click(function (event) {
            $("#form_" + $(this).attr('id').substr(5)).toggle();
            event.preventDefault();
        });

        function tambah(id) {
            $(id).append('')
        }
    </script>

    <script>
        @if(Session::has('success'))
        swal({
            title: 'Data Posisi',
            text: 'Berhasil Ditambahkan!!',
            type: 'success',
            timer: '3500'
        })
        @endif
        @if(Session::has('update'))
        swal({
            title: 'Data Pelamar',
            text: 'Berhasil Diproses!!',
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