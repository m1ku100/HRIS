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
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ActivityController extends Controller
{

    /**
     * set middleware
     *
     * ActivityController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get index page for manager
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('manajer.homemanajer');
    }

    /**
     * Get Posisi Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function posisi()
    {
        $posisi = Posisi::orderBy('created_at', 'DESC')->paginate(10);
        return view('manajer.posisi', compact('posisi'));
    }

    /**
     * Get form Posisi Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function posisiform()
    {
        return view('manajer.formposisi');
    }

    /**
     * Create Posisi Data
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
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

    /**
     * Update Posisi Record for actif period
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
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

    /**
     * Delete Posisi Record
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function posisidelete(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        $posisi = Posisi::find($request->id);
        $posisi->delete();

        return back()->with('delete', '');
    }


    /**
     * Update Posisi Record
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Get Lamaran Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function lamaran()
    {
        $degree = null;

        $lamaran = Lamaran::wherehas('getPosisi', function ($query) {
            $query->where('is_over', false);
        })->paginate(10);

        $posisi = Posisi::whereHas('pelamar')->paginate(10);

        return view('manajer.lamaran', compact('posisi', 'degree', 'lamaran'));
    }

    /**
     * Update Lamraan
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function proses(Request $request)
    {
        $lamaran = Lamaran::find($request->id);
        $lamaran->update([
            'is_atasi' => true,
        ]);

        return back()->with('update', 'Berhasil Memperbarui Data!!');
    }

    /**
     * Filter lamaaran Page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function search(Request $request)
    {

        try {
            Carbon::parse($request->start)->addDay(-1);
            Carbon::parse($request->end);
        } catch (\Exception $exception) {
            return back()->with('success', '');
        }

        $posisi = $request->posisi;

        $lamaran = Lamaran::when($request->degree, function ($query) use ($request) {
            $query->wherehas('getUser', function ($query) use ($request) {//filter Jenjang Pendidikan
                $query->wherehas('getPendidikan', function ($pend) use ($request) {
                    $pend->where('edu_id', $request->degree);
                });
            });
        })->when($request->start, function ($query) use ($request) {//filter Tanggal Dibuat
            $query->when($request->end, function ($query) use ($request) {
                $query->where('created_at', '>=', Carbon::parse($request->start))
                    ->where('created_at', '<=', Carbon::parse($request->end)->addDay(+1));
            });
        })->when($request->posisi, function ($query) use ($request) {//Filter Untuk Posisi Tertentu
            $query->where('posisi_id', $request->posisi);
        })->when($request->exp, function ($query) use ($request){//Filter Pengalaman
            $query->wherehas('getUser', function ($query) use ($request){
                $query->wherehas('getPegawai', function ($query) use ($request){
                    $query->where('exp_total','>=',$request->exp);
                });
            });
        })->paginate(10)->appends($request->only([
            'posisi',
            'start',
            'end',
            'degree',
            'exp'
        ]));

        return view('manajer.lamaran', compact('lamaran'));

    }

    /**
     * Get Detail Palamar
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * Get list pegawai Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function user()
    {
        $nama = null;
        $degree = null;

        $user = User::where('role', 'pegawai')->paginate(10);
        return view('manajer.user', compact( 'user','nama','degree'));
    }


    /**
     * Search Pegawai By Name
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function pegawaisearch(Request $request)
    {
        $nama = $request->nama;
        $degree = $request->degree;

        $user = User::when($request->degree, function ($query) use ($request) {
            $query->wherehas('getPendidikan', function ($pend) use ($request) {
                $pend->where('edu_id', $request->degree);
            });
        })->when($request->nama, function ($query) use($request){
            $query->whereRaw('(name LIKE \'%' . $request->nama . '%\')')->where('role', 'pegawai');
        })->where('role','pegawai')->paginate(10);

        if ($user == null) {
            return back()->with('error', '');
        } else {
            return view('manajer.user', compact('user','nama','degree'));
        }
    }

    /**
     * Get Detail Pegawai Page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * Get Account Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account()
    {
        return view('manajer.akun');
    }

    /**
     * Update Username and Password
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

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
