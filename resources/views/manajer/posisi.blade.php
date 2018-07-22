@extends('layouts.global')
@section('tittle')
    Posisi
@endsection

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <div class="rs-select2--light rs-select2--md">
                                    <select class="js-select2" name="property">
                                        <option selected="selected">All Properties</option>
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--light rs-select2--sm">
                                    <select class="js-select2" name="time">
                                        <option selected="selected">Today</option>
                                        <option value="">3 Days</option>
                                        <option value="">1 Week</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <button class="au-btn-filter">
                                    <i class="zmdi zmdi-filter-list"></i>filters
                                </button>
                            </div>
                            <div class="table-data__tool-right">
                                <a href="{{route('posisi-form')}}">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="fa fa-plus"></i>Add Item
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama Posisi</th>
                                    <th>Tanggal Upload</th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $num = 1;
                                ?>
                                @foreach($posisi as $pos)

                                    <tr class="tr-shadow">
                                        <td>{{$num}}</td>
                                        <?php
                                        $num++;
                                        ?>
                                        <td class="desc">{{$pos->nama}}</td>
                                        <td>{{$pos->created_at->format('D,d M Y')}}</td>
                                        <td>
                                            <div class="pull-left">
                                                <div class="table-data-feature">
                                                    <a href="#" id="edit_{{ $pos->id }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                                title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </a>
                                                    <form action="{{route('posisi-delete')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input name="id" value="{{$pos->id}}" type="hidden">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                                title="Hapus Posisi" type="submit">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </form>

                                                    <a href="#" id="show_{{ $pos->id }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                                title="Selengkapnya">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr id="extra_{{ $pos->id }}" class="tr-shadow" style="display: none">
                                        <td><strong> Diskripsi Posisi : </strong></td>
                                        <td colspan="3">{!! $pos->deskripsi !!}</td>
                                    </tr>

                                    <tr id="form_{{ $pos->id }}" class="tr-shadow" style="display: none">
                                        <td><strong> Edit Posisi : </strong></td>
                                        <td colspan="3">
                                            <form action="{{route('posisi-update')}}" method="post">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="nf-email" class="form-control-label">Nama
                                                        Posisi </label>
                                                    <input type="text" id="nf-email" name="nama"
                                                           placeholder="Posisi yang Dibutuhkan" value="{{$pos->nama}}"
                                                           class="form-control">
                                                    <input type="hidden" name="id" value="{{ $pos->id }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nf-email" class="form-control-label">Deskripsi Posisi
                                                        yang
                                                        Dibutuhkan</label>
                                                    <textarea class="form-control use-tinymce" name="deskripsi"
                                                              placeholder="Deskripsi Posisi yang Dibutuhkan...."> {!! $pos->deskripsi !!} </textarea>
                                                    {{--<input type="email" id="nf-email" name="nf-email" placeholder="Enter Email.."--}}
                                                    {{--class="form-control" >--}}
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-md">
                                                    <i class="fa fa-dot-circle-o"></i> Update Data
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <tr class="spacer"></tr>
                                @endforeach
                                </tbody>
                            </table>
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
        @if(Session::has('delete'))
        swal({
            title: 'Data Posisi',
            text: 'Berhasil Dihapus!!',
            type: 'success',
            timer: '3500'
        })
        @endif
        @if(Session::has('update'))
        swal({
            title: 'Data Posisi',
            text: 'Berhasil Diperbaharui!!',
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