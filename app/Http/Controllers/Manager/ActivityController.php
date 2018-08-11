<?php

namespace App\Http\Controllers\Manager;


use App\Bahasa;
use App\Edu;
use App\Experience;
use App\Lamaran;
use App\Pendidikan;
use App\Posisi;
use App\Sertificate;
use App\Skill;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
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
        $posisi = Posisi::orderBy('created_at', 'DESC')->paginate(10);
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

    public function hide(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        $posisi = Posisi::find($request->id);
        $posisi->update([
            'is_over' => true,
        ]);
        return back()->with('success', '');
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
        $degree = null;

        $lamaran = Lamaran::wherehas('getPosisi', function ($query) {
            $query->where('is_over', false);
        })->paginate(10);

        $posisi = Posisi::whereHas('pelamar')->paginate(10);

        return view('manajer.lamaran', compact('posisi', 'degree', 'lamaran'));
    }

    public function proses(Request $request)
    {
        $lamaran = Lamaran::find($request->id);
        $lamaran->update([
            'is_atasi' => true,
        ]);

        return back()->with('update', 'Berhasil Memperbarui Data!!');
    }

    public function search(Request $request)
    {

        try {
            Carbon::parse($request->start)->addDay(-1);
            Carbon::parse($request->end);
        } catch (\Exception $exception) {
            return back()->with('success', '');
        }

        $posisi = $request->posisi;

        if ($posisi == 'all') {

            $lamaran = Lamaran::wherehas('getPosisi', function ($query) {
                $query->where('is_over', false);
            })->where('created_at', '>=', Carbon::parse($request->start))->where('created_at', '<=', Carbon::parse($request->end)->addDay(+1))->paginate(10);

            return view('manajer.lamaran', compact('lamaran'));
        } else {

            $lamaran = Lamaran::wherehas('getPosisi', function ($query) {
                $query->where('is_over', false);
            })->where('posisi_id', $posisi)->where('created_at', '>=', Carbon::parse($request->start))->where('created_at', '<=', Carbon::parse($request->end)->addDay(+1))->paginate(10);

            return view('manajer.lamaran', compact('lamaran'));
        }
    }

    public function detail(Request $request)
    {
        $user = User::findOrFail(decrypt($request->id));

        $pend = Pendidikan::where('user_id', $user->id)->orderBy('tahun_lulus', 'desc')->get();
        $work = Experience::where('user_id', $user->id)->orderBy('work_from', 'desc')->get();
        $skill = Skill::where('user_id', $user->id)->get();
        $bahasa = Bahasa::where('user_id', $user->id)->get();
        $serti = Sertificate::where('user_id', $user->id)->get();

        return view('manajer.pelamar', compact('user', 'pend', 'work', 'skill', 'bahasa', 'serti'));
    }

    public function certificate(Request $request)
    {
        $serti = Sertificate::findOrFail(decrypt($request->id));
        return view('manajer.certificate', compact('serti'));
    }

    //halaman user

    public function user()
    {
        $user = User::where('role', 'pegawai')->paginate(10);
        return view('manajer.user', compact('posisi', 'user'));
    }

    public function pegawaisearch(Request $request)
    {
        $key = $request->user;

        $user = User::whereRaw('(name LIKE \'%' . $key . '%\')')->where('role', 'pegawai')->paginate(10);

        if ($user == null) {
            return back()->with('error', '');
        } else {
            return view('manajer.user', compact('user'));
        }
    }

    public function pegawai(Request $request)
    {
        $user = User::findOrFail(decrypt($request->id));

        $pend = Pendidikan::where('user_id', $user->id)->orderBy('tahun_lulus', 'desc')->get();
        $work = Experience::where('user_id', $user->id)->orderBy('work_from', 'desc')->get();
        $skill = Skill::where('user_id', $user->id)->get();
        $bahasa = Bahasa::where('user_id', $user->id)->get();
        $serti = Sertificate::where('user_id', $user->id)->get();

        return view('manajer.pegawai', compact('user', 'pend', 'work', 'skill', 'bahasa', 'serti'));
    }


    //halaman akun

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
