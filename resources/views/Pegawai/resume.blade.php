@extends('layouts.global')
@section('tittle')
    Resume
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
                                            @if( App\Employee::where('user_id',Auth::user()->id)->get()->count() < 1 )
                                                <br>
                                                <a href="{{route('add-pegawai')}}">
                                                    <button class="btn btn-primary btn-md"><span
                                                                class="fa fa-plus-circle"></span>Tambahkan Biodata
                                                    </button>
                                                </a>
                                            @else
                                                @foreach(App\Employee::where('user_id',Auth::user()->id)->get() as $akun)
                                                    <br>
                                                    <div class="row">
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
                                                                    <tr class="text-sm-center">
                                                                        <td colspan="2">
                                                                            <a href="{{route('edit-pegawai')}}">
                                                                                <button class="btn btn-success btn-sm">
                                                                                    <span class="fa fa-edit"></span>Edit
                                                                                    Data
                                                                                </button>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>

                                    {{--Tab work Exp--}}
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                         aria-labelledby="profile-tab">
                                        <br>
                                        <h3><i class="fas fa-suitcase"></i> Pengalaman Bekerja Anda</h3>
                                        @if(App\Experience::where('user_id',Auth::user()->id)->count()  < 1 )
                                        @else
                                            <a href="{{route('edu-pegawai')}}" class="pull-right">
                                                <button class="btn btn-primary btn-sm rounded pull-right"><span
                                                            class="fa fa-plus-circle"></span>Tambah Data Pengalaman
                                                </button>
                                            </a>
                                        @endif
                                        <small>Ini adalah pengisian opsional, tetapi apabila Anda memiliki pengalaman
                                            magang,
                                            paruh waktu atau pekerja sukarela, kami sarankan agar Anda memasukkannya
                                            disini.
                                        </small>
                                        <br>
                                        <hr>
                                        @if(App\Experience::where('user_id',Auth::user()->id)->count() < 1)
                                            <div class="card">
                                                <form action="{{route('work-add')}}" method="post"
                                                      class="form-horizontal">
                                                    {{ csrf_field() }}

                                                    <div class="card-body card-block">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="nf-email" class="form-control-label">Nama
                                                                        Perusahaan </label>
                                                                    <input type="text" id="nf-email" name="company"

                                                                           class="form-control">
                                                                    <input type="hidden" name="user_id"
                                                                           value="{{ Auth::user()->id }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="nf-email" class="form-control-label">Posisi </label>
                                                                    <input type="text" id="nf-email" name="job_title"
                                                                           class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="nf-email" class="form-control-label">Jabatan</label>
                                                                    <input type="text" id="nf-email" name="position"
                                                                           class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="nf-email" class="form-control-label">Industri</label>
                                                                    <select class="form-control" name="industri_id">
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
                                                                           class="form-control"> -
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="nf-email" class="form-control-label">Hingga
                                                                    </label>
                                                                    <input type="text" name="work_till"
                                                                           onkeypress="return isNumberKey(event)"
                                                                           class="form-control">
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label for="nf-email" class="form-control-label">Gaji
                                                                        Perbulan
                                                                    </label>
                                                                    <select name="jenis_gaji" class="form-control">
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
                                                                           class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <label for="nf-email" class="form-control-label">Deskripsi
                                                                        Pekerjaan</label>
                                                                    <textarea class="form-control use-tinymce"
                                                                              name="des_pos"> </textarea>

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
                                        @else
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
                                                                <div class="pull-left">
                                                                    <div class="table-data-feature">
                                                                        <a href="{{route('work-edit',['id' =>  $es = encrypt($works->id)])}}">
                                                                            <button class="btn btn-info"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    title="Edit Data Pekerjaan">
                                                                                <i class="zmdi zmdi-edit"></i>
                                                                            </button>
                                                                        </a>
                                                                        <form action="{{route('work-delete')}}"
                                                                              method="post"
                                                                              style="margin-left: 5pt">
                                                                            {{csrf_field()}}
                                                                            <input type="hidden" name="id"
                                                                                   value="{{$works->id}}">
                                                                            <button class="btn  btn-danger"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    title="Hapus Data Pekerjaan"
                                                                                    type="submit">
                                                                                <i class="zmdi zmdi-delete"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    </div>

                                    {{--Tab Edu--}}
                                    <div class="tab-pane fade" id="contact" role="tabpanel"
                                         aria-labelledby="contact-tab">
                                        <br>
                                        <h3><i class="fas fa-bell"></i> Riwayat Pendidikan Anda</h3>
                                        @if(App\Pendidikan::where('user_id',Auth::user()->id)->count() >= 2 )
                                        @else
                                            <a href="{{route('edu-pegawai')}}" class="pull-right">
                                                <button class="btn btn-primary btn-sm rounded pull-right"><span
                                                            class="fa fa-plus-circle"></span>Tambah Data Pendidikan
                                                </button>
                                            </a>
                                        @endif
                                        <small>Tambahkan 2 Jenjang Pendidikan Tertinggi</small>

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
                                                                    Jurusan {{App\Jurusan::find($pendidikan->jurusan)->name}}
                                                                    | {{App\Negara::find($pendidikan->negara_id)->nama}}</p>
                                                            </td>
                                                            <td>
                                                                <div class="pull-left">
                                                                    <div class="table-data-feature">
                                                                        <a href="{{route('edu-edit',['id' =>  $es = encrypt($pendidikan->id)])}}">
                                                                            <button class="btn btn-info"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    title="Edit Data pendidikan">
                                                                                <i class="zmdi zmdi-edit"></i>
                                                                            </button>
                                                                        </a>
                                                                        <form action="{{route('edu-delete')}}"
                                                                              method="post" style="margin-left: 5pt">
                                                                            {{csrf_field()}}
                                                                            <input type="hidden" name="id"
                                                                                   value="{{$pendidikan->id}}">
                                                                            <button class="btn  btn-danger"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    title="Hapus Data pendidikan"
                                                                                    type="submit">
                                                                                <i class="zmdi zmdi-delete"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
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
                                                        <form action="{{route('skill-pegawai')}}" method="post">
                                                            {{csrf_field()}}
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="nf-email"
                                                                               class="form-control-label">Keterampilan</label>
                                                                        <input type="text" id="nf-email"
                                                                               name="deskripsi"
                                                                               placeholder=""
                                                                               class="form-control">
                                                                        <input type="hidden" name="user_id"
                                                                               value="{{ Auth::user()->id }}">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="nf-email"
                                                                               class="form-control-label">Tingkat </label>
                                                                        <select class="form-control" name="tingkat">
                                                                            <option value="Pemula">Pemula</option>
                                                                            <option value="Menengah">Menengah</option>
                                                                            <option value="Tingkat Lanjut">Tingkat
                                                                                Lanjut
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-primary btn-md">
                                                                    <i class="fa fa-plus-circle"></i> Tambah Skill
                                                                </button>
                                                            </div>
                                                        </form>
                                                        <small class="card-text">*Form Ini Bersifat Optinal
                                                            tetapi apabila Anda memiliki Keterampilan Tertentu , kami
                                                            sarankan agar Anda memasukkannya disini.
                                                        </small>

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
                                                                            <div class="pull-left">
                                                                                <div class="table-data-feature">
                                                                                    <button class="btn btn-info"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title="Edit Data Keahlian">
                                                                                        <i class="zmdi zmdi-edit"></i>
                                                                                    </button>
                                                                                    <form action="{{route('skill-delete')}}"
                                                                                          method="post"
                                                                                          style="margin-left: 5pt">
                                                                                        {{csrf_field()}}
                                                                                        <input type="hidden" name="id"
                                                                                               value="{{$skills->id}}">
                                                                                        <button class="btn  btn-danger"
                                                                                                data-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="Hapus Data Keahlian"
                                                                                                type="submit">
                                                                                            <i class="zmdi zmdi-delete"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
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
                                                        <form action="{{route('bhs-pegawai')}}" method="post">
                                                            {{csrf_field()}}
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="nf-email"
                                                                               class="form-control-label">Bahasa </label>
                                                                        <select class="form-control" name="bhs">
                                                                            <option value="Indonesia">Indonesia
                                                                            </option>
                                                                            <option value="English">English</option>
                                                                            <option value="Dutch">Dutch</option>
                                                                            <option value="German">German</option>
                                                                            <option value="Japanese">Japanese
                                                                            </option>
                                                                            <option value="French">French</option>
                                                                            <option value="Chinese">Chinese</option>

                                                                        </select>
                                                                        <input type="hidden" name="user_id"
                                                                               value="{{ Auth::user()->id }}">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="nf-email"
                                                                               class="form-control-label">Berbicara </label>
                                                                        <select class="form-control" name="spoken">
                                                                            @for($a=1;$a<11;$a++)
                                                                                <option value="{{$a}}">{{$a}}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="nf-email"
                                                                               class="form-control-label">Menulis </label>
                                                                        <select class="form-control" name="write">
                                                                            @for($a=1;$a<11;$a++)
                                                                                <option value="{{$a}}">{{$a}}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit"
                                                                        class="btn btn-primary btn-md">
                                                                    <i class="fa fa-plus-circle"></i>
                                                                </button>
                                                            </div>
                                                        </form>
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
                                                                            <div class="pull-left">
                                                                                <div class="table-data-feature">
                                                                                    <button class="btn btn-info"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title="Edit Data Bahasa">
                                                                                        <i class="zmdi zmdi-edit"></i>
                                                                                    </button>
                                                                                    <form action="{{route('bhs-delete')}}"
                                                                                          method="post"
                                                                                          style="margin-left: 5pt">
                                                                                        {{csrf_field()}}
                                                                                        <input type="hidden" name="id"
                                                                                               value="{{$bhs->id}}">
                                                                                        <button class="btn  btn-danger"
                                                                                                data-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="Hapus Data Bahasa"
                                                                                                type="submit">
                                                                                            <i class="zmdi zmdi-delete"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
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
                                            <div class="col-md-6">
                                                <div class="card shadow">
                                                    <div class="card-header">
                                                        <i class="fa fa-file-text"></i>
                                                        <strong class="card-title pl-2">certificate Data Form</strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="{{route('sertificate-add')}}" method="post"
                                                              class="" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="card-body card-block">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label for="nf-email"
                                                                                   class="form-control-label">Keahlian</label>
                                                                            <input type="text" id="nf-email"
                                                                                   name="keahlian"
                                                                                   placeholder="Jenis Keahlian Dari Sertifikat yang Akan Anda Upload...."
                                                                                   class="form-control">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="nf-email"
                                                                                   class="form-control-label">Nama
                                                                                Setifikat</label>
                                                                            <input type="text" id="nf-email"
                                                                                   name="setifikat"
                                                                                   placeholder="Nama Sertifikat yang Akan Anda Upload...."
                                                                                   class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nf-email" class="form-control-label">Keterangan
                                                                        Dari Sertifikat</label>
                                                                    <textarea class="form-control use-tinymce"
                                                                              name="ket_setifikat"
                                                                              placeholder="Deskripsi Posisi yang Dibutuhkan...."> </textarea>
                                                                    {{--<input type="email" id="nf-email" name="nf-email" placeholder="Enter Email.."--}}
                                                                    {{--class="form-control" >--}}
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nf-email" class="form-control-label">File
                                                                        Sertifikat
                                                                        <small>(Max. 2mb. Format .jpg/.jpeg/.png)
                                                                        </small>
                                                                    </label>
                                                                    <input type="file" id="nf-email"
                                                                           name="dir_setifikat"
                                                                           class="form-control" readonly>
                                                                    <input type="hidden" name="user_id"
                                                                           value="{{ Auth::user()->id }}">
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary btn-md">
                                                                    <i class="fa fa-upload"></i> Upload
                                                                </button>

                                                            </div>
                                                        </form>
                                                        <small class="card-text">*Form Ini Bersifat Optinal
                                                            tetapi apabila Anda memiliki Keterampilan Tertentu , kami
                                                            sarankan agar Anda memasukkannya disini.
                                                        </small>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card shadow">
                                                    <div class="card-header">
                                                        <strong class="card-title">Sertifikat Yang Anda Miliki</strong>
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
                                                                                    <button class="btn btn-info"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title="Edit Data Sertifikat">
                                                                                        <i class="zmdi zmdi-edit"></i>
                                                                                    </button>
                                                                                    <form action="{{route('sertificate-delete')}}"
                                                                                          method="post"
                                                                                          style="margin-left: 5pt">
                                                                                        {{csrf_field()}}
                                                                                        <input type="hidden" name="id"
                                                                                               value="{{$sert->id}}">
                                                                                        <button class="btn  btn-danger"
                                                                                                data-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="Hapus Data Sertifikat"
                                                                                                type="submit">
                                                                                            <i class="zmdi zmdi-delete"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
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
        @if(Session::has('success'))
        swal({
            title: 'Data Resume ',
            text: 'Berhasil Diperbarui',
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