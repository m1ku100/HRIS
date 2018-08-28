@extends('layouts.global')
@section('tittle')
    Profile - {{$user->name}}
@endsection

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Resume Form</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                           role="tab" aria-controls="home" aria-selected="true">Personal Data</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                           role="tab" aria-controls="profile" aria-selected="false">Work Experience</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                           role="tab" aria-controls="contact" aria-selected="false">Education</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="skill-tab" data-toggle="tab" href="#skill" role="tab"
                                           aria-controls="contact" aria-selected="false">Skill And Language</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="certificate-tab" data-toggle="tab" href="#certificate"
                                           role="tab"
                                           aria-controls="contact" aria-selected="false">Certificate</a>
                                    </li>
                                </ul>
                                <div class="tab-content pl-3 p-1" id="myTabContent">

                                    {{--tab Personal Data--}}
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                         aria-labelledby="home-tab">
                                        <br>
                                        <h3><i class="fas fa-user"></i>Personal Data</h3>
                                        <p></p>
                                        <hr>
                                        <div>
                                            @foreach(App\Employee::where('user_id',$user->id)->get() as $akun)
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="{{asset($akun->dir_foto)}}" style="width: 300px;height:400px ">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="location text-sm-left">
                                                            <table class="table table-borderless">
                                                                <tr>
                                                                    <th>Nama</th>
                                                                    <td>{{$akun->nama}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tempat, Tgl Lahir</th>
                                                                    <td>{{$akun->tmp_lahir}}
                                                                        , {{$akun->tgl_lahir}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Gender</th>
                                                                    <td>{{$akun->gender}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Telp</th>
                                                                    <td>{{$akun->telp}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td>{{$akun->email}}</td>
                                                                </tr>

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    {{--Tab work Exp--}}
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                         aria-labelledby="profile-tab">
                                        <br>
                                        <h3><i class="fas fa-suitcase"></i> Pengalaman Bekerja {{$user->name}}</h3>

                                        <br>
                                        <hr>
                                        <div class="table-responsive table-responsive-data2">
                                            <table class="table table-data2">
                                                <thead>
                                                <tr>
                                                    <th colspan="4">
                                                        <center>

                                                        </center>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($work as $works)
                                                    <tr>
                                                        <td colspan="2">
                                                            <h5>{{$works->work_from}} - {{$works->work_till}}</h5>
                                                        </td>
                                                        <td colspan="2">
                                                            <h3>{{$works->job_title}}</h3>
                                                            <h5>{{$works->company}}</h5><br>

                                                            <h6>Industri</h6>
                                                            <p> {{App\Industri::find($works->industri_id)->nama}}</p>
                                                            <h6>Jabatan</h6>
                                                            <p> {{$works->position}}</p>
                                                            <h6>Gaji Perbulan</h6>
                                                            <p>{{$works->salary}} in {{$works->jenis_gaji}}</p>
                                                            {!! $works->des_pos !!}
                                                        </td>
                                                        <td>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                    {{--Tab Edu--}}
                                    <div class="tab-pane fade" id="contact" role="tabpanel"
                                         aria-labelledby="contact-tab">
                                        <br>
                                        <h3><i class="fas fa-bell"></i> Riwayat Pendidikan {{$user->name}}</h3>

                                        <center>
                                            <div class="table-responsive table-responsive-data2">
                                                <table class="table table-data2">
                                                    <thead>
                                                    <tr>
                                                        <th colspan="4">
                                                            <center>

                                                            </center>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($pend as $pendidikan)
                                                        <tr>
                                                            <td colspan="2"><h5>{{$pendidikan->tahun_lulus}}</h5></td>
                                                            <td colspan="2">
                                                                <h3>{{$pendidikan->instansi}}</h3>
                                                                <p>{{App\Edu::find($pendidikan->edu_id)->jenjang}}
                                                                    @if(App\Edu::find($pendidikan->edu_id)->jenjang == 'Sekolah Dasar' ||
                                                                     App\Edu::find($pendidikan->edu_id)->jenjang == 'Sekolah Menengah Pertama / Sederajat' ||
                                                                     App\Edu::find($pendidikan->edu_id)->jenjang == 'Sekolah Menengah Atas / Sederajat' )
                                                                    @else
                                                                        Jurusan {{App\Jurusan::find($pendidikan->jurusan)->name}}
                                                                    @endif
                                                                    | {{App\Negara::find($pendidikan->negara_id)->nama}}</p>
                                                            </td>
                                                            <td>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </center>
                                    </div>

                                    {{--Tab Skill --}}
                                    <div class="tab-pane fade" id="skill" role="tabpanel" aria-labelledby="contact-tab">
                                        <br>
                                        <h3><i class="fas fa-comments"></i>Kemampuan Berbahasa dan Keterampilan</h3>
                                        <p></p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card shadow">
                                                    <div class="card-header">
                                                        <strong class="card-title">Keterampilan ( Skills )</strong>
                                                    </div>
                                                    <div class="card-body">

                                                        <div class="table-responsive table-responsive-data2">
                                                            <table class="table table-data2">
                                                                <thead>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($skill as $skills)
                                                                    <tr>
                                                                        <td><p>{{$skills->tingkat}}</p></td>
                                                                        <td><h4>{{$skills->deskripsi}}</h4></td>
                                                                        <td>

                                                                        </td>
                                                                    </tr>

                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card shadow">
                                                    <div class="card-header">
                                                        <strong class="card-title">Kemampuan Berbahasa ( Languages
                                                            )</strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text">
                                                        </p>
                                                        <div class="table-responsive table-responsive-data2">
                                                            <table class="table table-data2">
                                                                <thead>
                                                                <tr>
                                                                    <td>Bahasa</td>
                                                                    <td>Berbicara</td>
                                                                    <td>Tulis</td>
                                                                    <td></td>

                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($bahasa as $bhs)
                                                                    <tr>
                                                                        <td><h4>{{$bhs->bhs}}</h4></td>
                                                                        <td><h4>{{$bhs->spoken}}</h4></td>
                                                                        <td><h4>{{$bhs->write}}</h4></td>
                                                                        <td>

                                                                        </td>
                                                                    </tr>

                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{--Tab Certificate--}}
                                    <div class="tab-pane fade" id="certificate" role="tabpanel"
                                         aria-labelledby="contact-tab">
                                        <br>
                                        <h3><i class="fas fa-file"></i> Sertifikat</h3>
                                        <p></p>
                                        <hr>
                                        <div class="row">

                                            <div class="col-md-8">
                                                <div class="card shadow">
                                                    <div class="card-header">
                                                        <strong class="card-title">Sertifikat Yang {{$user->name}} Miliki</strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive table-responsive-data2">
                                                            <table class="table table-data2">
                                                                <thead>
                                                                <tr>
                                                                    <td><h5>Sertifikat</h5></td>
                                                                    <td><h5>Deskripsi</h5></td>
                                                                    <td><h5>Action</h5></td>

                                                                </tr>
                                                                </thead>
                                                                <thead>
                                                                @foreach($serti as $sert)
                                                                    <tr>
                                                                        <td>{{$sert->keahlian}}</td>
                                                                        <td>{!! $sert->ket_setifikat !!}</td>
                                                                        <td>
                                                                            <div class="pull-left">
                                                                                <div class="table-data-feature">
                                                                                    <a href="#"
                                                                                       id="shoh_{{ $sert->id }}">
                                                                                        <button class="btn btn-info"
                                                                                                data-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="Lihat Data Sertifikat">
                                                                                            <i class="zmdi zmdi-eye"></i>
                                                                                        </button>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr id="ektra_{{ $sert->id }}" class="tr-shadow"
                                                                        style="display: none">
                                                                        <td colspan="3">

                                                                            <div class="form-group">
                                                                                <label for="nf-email"
                                                                                       class="form-control-label">Gambar Sertifikat

                                                                                </label>
                                                                                <img src="{{asset($sert->dir_setifikat)}}">

                                                                            </div>

                                                                        </td>
                                                                    </tr>

                                                                @endforeach
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
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

        $("a[id^=shoh_]").click(function (event) {
            $("#ektra_" + $(this).attr('id').substr(5)).toggle();
            event.preventDefault();
        });

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
            title: 'Profile Settings',
            text: 'Update successfully!',
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