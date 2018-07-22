<?php

namespace App\Http\Controllers\Pegawai;

use App\Employee;
use App\Lamaran;
use App\Pendidikan;
use App\Posisi;
use App\Sertificate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{

    //halaman dashboard
    public function index()
    {
        return view('Pegawai.home');
    }

    public function deletelamaran(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        $lamaran = Lamaran::find($request->id);
        $lamaran->delete();

        return back()->with('success', '');
    }

    //halaman Posisi
    public function posisi()
    {
        $posisi = Posisi::orderBy('created_at', 'DESC')->get();
        return view('pegawai.posisipeg', compact('posisi'));
    }

    public function posisiadd(Request $request)
    {
        $request->validate([
            'posisi_id' => 'required',
            'user_id' => 'required',

        ]);

        Lamaran::create([
            'posisi_id' => $request->posisi_id,
            'user_id' => $request->user_id,
            'masuk_lamaran' => Carbon::now(),
        ]);

        return redirect('/emp/posisi')->with([
            'success' => 'Berhasil Mengajukan Lamaran Untuk Posisi Ini!'
        ]);

    }


    //halaman Account
    public function account()
    {
        return view('pegawai.akunpeg');
    }

    public function add()
    {
        return view('pegawai.formakun');
    }

    public function edit()
    {
        return view('pegawai.formedit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'telp' => 'required',
            'email' => 'required',
            'user_id' => 'required',

        ]);

        $emplo = Employee::find($request->id);

        $emplo->update([
            'nama' => $request->nama,
            'tmp_lahir' => $request->tmp_lahir,
            'user_id' => $request->user_id,
            'tgl_lahir' => $request->tgl_lahir,
            'gender' => $request->gender,
            'telp' => $request->telp,
            'email' => $request->email,
        ]);

        return redirect('/emp/account')->with([
            'success' => 'Data Diri Berhasil Diubah!'
        ]);


    }

    public function addpro(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'telp' => 'required',
            'email' => 'required',
            'user_id' => 'required',

        ]);

        Employee::create([
            'nama' => $request->nama,
            'tmp_lahir' => $request->tmp_lahir,
            'user_id' => $request->user_id,
            'tgl_lahir' => $request->tgl_lahir,
            'gender' => $request->gender,
            'telp' => $request->telp,
            'email' => $request->email,
        ]);

        return redirect('/emp/account')->with([
            'success' => 'Data Diri Berhasil Diubah!'
        ]);


    }

    public function updateuser(Request $request)
    {
        if (!Hash::check($request->passlama, Auth::user()->password)) {
            return back()->with([
                'error' => 'Your Current Password is wrong !'
            ]);
        } else {
            if ($request->passbaru !== $request->pass_confirm) {
                return back()->with([
                    'error' => 'Your New Password Doesn`t Match!'
                ]);
            } else {

                Auth::user()->update([
                    'name' => $request->name,
                    'password' => bcrypt($request->passbaru)
                ]);
            }

            return back()->with([
                'success' => 'Berhasil Memperbarui Profile !'
            ]);
        }

    }

    public function edu()
    {
        return view('pegawai.edu');
    }

    public function eduadd(Request $request)
    {
        $request->validate([
            'edu_id' => 'required',
            'instansi' => 'required',
            'user_id' => 'required',


        ]);

        Pendidikan::create([
            'edu_id' => $request->edu_id,
            'instansi' => $request->instansi,
            'user_id' => $request->user_id,

        ]);

        return redirect('/emp/account')->with([
            'success' => 'Data Diri Berhasil Diubah!'
        ]);


    }

    public function sertificate()
    {
        return view('pegawai.sertiifikat');
    }

    public function sertificateadd(Request $request)
    {
        $request->validate([
            'keahlian' => 'required',
            'setifikat' => 'required',
            'ket_setifikat' => 'required',
            'dir_setifikat' => 'required',
            'user_id' => 'required',
        ]);

        if ($request->hasFile('dir_setifikat')) {

            $fillnames2 = $request->dir_setifikat->getClientOriginalName() . '' . str_random(4);
            $filename = 'upload/photo/'
                . str_slug($fillnames2, '-') . '.' . $request->dir_setifikat->getClientOriginalExtension();
            $request->dir_setifikat->storeAs('public', $filename);
            $berkas = new Sertificate();
            $berkas->dir_setifikat = $filename;
            $berkas->keahlian = $request->keahlian;
            $berkas->setifikat = $request->setifikat;
            $berkas->ket_setifikat = $request->ket_setifikat;
            $berkas->user_id = $request->user_id;
            $berkas->save();
            $dir = $fillnames2;
        }
        return redirect('/emp/account')->with([
            'success' => 'Data Diri Berhasil Diubah!'
        ]);
    }

}
