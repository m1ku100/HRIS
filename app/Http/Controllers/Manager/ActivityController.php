<?php

namespace App\Http\Controllers\Manager;


use App\Posisi;
use App\Sertificate;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ActivityController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('manajer.homemanajer');
    }

    public function posisi()
    {
        $posisi = Posisi::orderBy('created_at', 'DESC')->get();
        return view('manajer.posisi', compact('posisi'));
    }

    public function posisiform()
    {
        return view('manajer.formposisi');
    }

    public function posisisave(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        Posisi::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/manajer/posisi')->with([
            'success' => 'Data Posisi baru berhasil ditambahkan!'
        ]);


    }

    public function posisidelete(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        $posisi = Posisi::find($request->id);
        $posisi->delete();

        return back()->with('delete', '');
    }

    public function posisiupdate(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'deskripsi' => 'required',
            'nama' => 'required',
        ]);
        $posisi = Posisi::find($request->id);


        $posisi->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);

        return back()->with('update', 'Berhasil Memperbarui Data!!');
    }

    public function lamaran()
    {
        $posisi = Posisi::orderBy('created_at', 'DESC')->get();
        return view('manajer.lamaran', compact('posisi'));
    }

    public function detail(Request $request)
    {
        $user = User::findOrFail(decrypt($request->id));
        return view('manajer.pelamar', compact('user'));
    }

    public function certificate(Request $request)
    {
        $serti = Sertificate::findOrFail(decrypt($request->id));
        return view('manajer.certificate', compact('serti'));
    }

    public function account()
    {
        return view('manajer.akun');
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
}
