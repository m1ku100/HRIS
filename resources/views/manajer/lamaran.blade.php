@extends('layouts.global')
@section('tittle')
    Daftar Lamaran
@endsection

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Lamaran yang Masuk</h3>
                        <br>
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <form action="{{route('lamaran-cari')}}" method="get">
                                    <div class="rs-select2--light rs-select2--lg">
                                        <label for="nf-email" class="form-control-label">Posisi Yang Tersedia saat Ini</label>
                                        <select class="js-select2" name="posisi">
                                            <option value="">Semua</option>
                                            @foreach(App\Posisi::where('is_over',false)->get() as $posisi)
                                                <option value="{{$posisi->id}}">{{$posisi->nama}}</option>
                                            @endforeach
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="rs-select2--light rs-select2--lg align-items-center">
                                        <label for="nf-email" class="form-control-label">Start From</label>
                                        <input type="date" id="nf-email" name="start"
                                               class="form-control">
                                    </div>
                                    <div class="rs-select2--light rs-select2--lg">
                                        <label for="nf-email" class="form-control-label">Till</label>
                                        <input type="date" id="nf-email" name="end"

                                               class="form-control">
                                    </div>
                                    <div class="rs-select2--light rs-select2--lg">
                                        <label for="nf-email" class="form-control-label">Pendidikan Pelamar</label>
                                        <select class="js-select2" name="degree">
                                            <option value="">Semua</option>
                                            @foreach(App\Edu::all() as $edu)
                                                <option value="{{$edu->id}}">{{$edu->jenjang}}</option>
                                            @endforeach
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="rs-select2--light rs-select2--lg">
                                        <label for="nf-email" class="form-control-label">Min. Pengalaman</label>
                                        <input type="text" id="nf-email" name="exp" onkeypress="return isNumberKey(event)"
                                               class="form-control" placeholder="Dalam Tahun">
                                    </div>
                                    <button type="submit" class="au-btn-filter">
                                        <i class="zmdi zmdi-filter-list"></i>filters
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
                                    <th>Posisi</th>
                                    <th>Tanggal Masuk Lamaran</th>
                                    <th>Status</th>
                                    <th>Aksi</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $num = 1;
                                ?>
                                @if(is_null($lamaran))
                                @else
                                    @foreach($lamaran as $lamarans)
                                        <tr class="tr-shadow">
                                            <td>{{$num}}</td>
                                            <?php $num++?>
                                            <td>{{App\User::find($lamarans->user_id)->name}}</td>
                                            <td>{{App\Posisi::find($lamarans->posisi_id)->nama}}</td>
                                            <td>{{$lamarans->created_at->format('D,d M Y')}}</td>
                                            <td>

{{--                                                {{App\Pendidikan::where('user_id',App\User::find($lamarans->user_id)->id)->get()}}--}}
                                                @if($lamarans->is_atasi == true)
                                                    <span class="status--process">Sudah Diproses</span>
                                                @else
                                                    <span class="status--denied">Belum Diproses</span>
                                                @endif
                                            </td>
                                            <td >
                                                <div class="table-data-feature align-items-center pull-left">
                                                    @if($lamarans->is_atasi == false)
                                                        <form action="{{route('lamaran-proses')}}"
                                                              method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden"
                                                                   value="{{$lamarans->id}}"
                                                                   name="id">
                                                            <input type="hidden" value="1"
                                                                   name="is_atasi">
                                                            <button type="submit" class="item"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    title="Tandai Sebagai Telah Diproses">
                                                                <i class="zmdi zmdi-check"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                    @endif
                                                    <a target="_blank"
                                                       href="{{ route('lamaran-detail', ['id' =>  $es = encrypt($lamarans->user_id)]) }}">
                                                        <button class="item"
                                                                data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Detail Pelamar">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            <div class="filters m-b-45">
                                {{ $lamaran->links() }}
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