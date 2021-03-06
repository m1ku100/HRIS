<?php

namespace App\Http\Controllers\Pegawai;

use App\Bahasa;
use App\Employee;
use App\Experience;
use App\Lamaran;
use App\Pendidikan;
use App\Posisi;
use App\Sertificate;
use App\Skill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //halaman dashboard
    public function index()
    {
        return view('pegawai.home');
    }

    /**
     * Delete Lamaran
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
        $posisi = Posisi::orderBy('created_at', 'DESC')->where('is_over', false)->paginate(10);
        return view('pegawai.posisipeg', compact('posisi'));
    }

    /**
     * Create data pelamar
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    //Halaman Resume

    /**
     * get resume page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resume()
    {
        $pend = Pendidikan::where('user_id', Auth::user()->id)->orderBy('tahun_lulus', 'desc')->get();
        $work = Experience::where('user_id', Auth::user()->id)->orderBy('work_from', 'desc')->get();
        $skill = Skill::where('user_id', Auth::user()->id)->get();
        $bahasa = Bahasa::where('user_id', Auth::user()->id)->get();
        $serti = Sertificate::where('user_id', Auth::user()->id)->get();
        return view('pegawai.resume', compact('pend', 'work', 'skill', 'bahasa', 'serti'));
    }

    public function add()
    {
        return view('pegawai.formakun');
    }

    public function edit()
    {
        return view('pegawai.formedit');
    }

    /**
     * edit record pegawai
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
            'dir_foto' => $request->dir_foto_temp,
        ]);

        if (Input::has('dir_foto')) {

            $file = $emplo->dir_foto;
            File::delete($file);

            $file = str_replace(' ', '_', str_random(4) . '' . $request->file('dir_foto')->getClientOriginalName());

            Input::file('dir_foto')->move('photo/', $file);
            $emplo->update([
                'dir_foto' => 'photo/' . $file,
            ]);
        }

        return redirect('/emp/resume')->with([
            'success' => 'Data Diri Berhasil Diubah!'
        ]);


    }

    /**
     * create data pegawai
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

        $emp = Employee::create([
            'nama' => $request->nama,
            'tmp_lahir' => $request->tmp_lahir,
            'user_id' => $request->user_id,
            'tgl_lahir' => $request->tgl_lahir,
            'gender' => $request->gender,
            'telp' => $request->telp,
            'email' => $request->email,
        ]);

        if (Input::has('dir_foto')) {
            $file = str_replace(' ', '_', str_random(4) . '' . $request->file('dir_foto')->getClientOriginalName());

            Input::file('dir_foto')->move('photo/', $file);
            $emp->update([
                'dir_foto' => 'photo/' . $file,
            ]);
        }

        return redirect('/emp/resume')->with([
            'success' => 'Data Diri Berhasil Diubah!'
        ]);


    }

    public function work()
    {
        return view('pegawai.work');
    }

    /**
     * create data work exp
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function workadd(Request $request)
    {
        $request->validate([
            'job_title' => 'required',
            'company' => 'required',
            'industri_id' => 'required',
            'position' => 'required',
            'jenis_gaji' => 'required',
            'salary' => 'required',
            'des_pos' => 'required',
            'work_from' => 'required',
            'work_till' => 'required',
            'user_id' => 'required',

        ]);

        Experience::create([
            'job_title' => $request->job_title,
            'company' => $request->company,
            'industri_id' => $request->industri_id,
            'position' => $request->position,
            'salary' => $request->salary,
            'jenis_gaji' => $request->jenis_gaji,
            'des_pos' => $request->des_pos,
            'email' => $request->email,
            'work_from' => $request->work_from,
            'work_till' => $request->work_till,
            'user_id' => $request->user_id,
        ]);

        $emp = Employee::where('user_id', $request->user_id)->first();
        $exp = Experience::where('user_id', $request->user_id)->get();
        $totalExp = 0;

        foreach ($exp as $row) {
            $start = $row->work_till;
            $end = $row->work_from;
            $totalExp += ($end - $start)*-1;
        }

        $emp->update([
            'exp_total' => $totalExp
        ]);

        return redirect('/emp/resume')->with([
            'success' => 'Data Diri Berhasil Diubah!'
        ]);
    }

    /**
     * Get work exp edit form
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function workedit(Request $request)
    {
        $exp = Experience::findOrFail(decrypt($request->id));
        return view('pegawai.editwork', compact('exp'));
    }

    /**
     * update record work exp
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function workupdate(Request $request)
    {
        $exp = Experience::find($request->id);

        $exp->update([
            'job_title' => $request->job_title,
            'company' => $request->company,
            'industri_id' => $request->industri_id,
            'position' => $request->position,
            'salary' => $request->salary,
            'jenis_gaji' => $request->jenis_gaji,
            'des_pos' => $request->des_pos,
            'email' => $request->email,
            'work_from' => $request->work_from,
            'work_till' => $request->work_till,
            'user_id' => $request->user_id,
        ]);

        $emp = Employee::where('user_id', $request->user_id)->first();
        $expe = Experience::where('user_id', $request->user_id)->get();
        $totalExp = 0;

        foreach ($expe as $row) {
            $end = $row->work_till;
            $start = $row->work_from;
            $totalExp += $end - $start;
        }

        $emp->update([
            'exp_total' => $totalExp
        ]);

        return redirect('/emp/resume')->with([
            'success' => 'Data Diri Berhasil Diubah!'
        ]);

    }

    /**
     * delete Record Riwayat Pekerjaan
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function workdelete(Request $request)
    {
        $user = Auth::user()->id;

        $exp = Experience::find($request->id);
        $exp->delete();

        $emp = Employee::where('user_id', $user)->first();
        $expe = Experience::where('user_id', $user)->get();
        $totalExp = 0;

        foreach ($expe as $row) {
            $end = $row->work_till;
            $start = $row->work_from;
            $totalExp += $end - $start;
        }

        $emp->update([
            'exp_total' => $totalExp
        ]);

        return back()->with([
            'success' => 'Berhasil Memperbarui Profile !'
        ]);
    }


    public function edu()
    {

        return view('pegawai.edu');
    }

    /**
     * create record pendidikan
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function eduadd(Request $request)
    {
        $request->validate([
            'edu_id' => 'required',
            'instansi' => 'required',
            'user_id' => 'required',
            'negara_id' => 'required',
            'tahun_lulus' => 'required',
            'ipk' => 'required',
            'jurusan' => 'required',
        ]);

        Pendidikan::create([
            'edu_id' => $request->edu_id,
            'instansi' => $request->instansi,
            'user_id' => $request->user_id,
            'negara_id' => $request->negara_id,
            'tahun_lulus' => $request->tahun_lulus,
            'ipk' => $request->ipk,
            'jurusan' => $request->jurusan,
        ]);

        return redirect('/emp/resume')->with([
            'success' => 'Data Diri Berhasil Diubah!'
        ]);
    }

    /**
     * Get Pendidikan update Form
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function eduedit(Request $request)
    {
        $pend = Pendidikan::findOrFail(decrypt($request->id));
        return view('pegawai.eduedit', compact('pend'));
    }

    /**
     * Update Record Pendidikan
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function eduupdate(Request $request)
    {
        $pend = Pendidikan::find($request->id);

        $pend->update([
            'edu_id' => $request->edu_id,
            'instansi' => $request->instansi,
            'user_id' => $request->user_id,
            'negara_id' => $request->negara_id,
            'tahun_lulus' => $request->tahun_lulus,
            'ipk' => $request->ipk,
            'jurusan' => $request->jurusan,
        ]);

        return redirect('/emp/resume')->with([
            'success' => 'Data Diri Berhasil Diubah!'
        ]);
    }

    /**
     * Delete Record pendidikan
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function edudelete(Request $request)
    {
        $pend = Pendidikan::find($request->id);
        $pend->delete();

        return back()->with([
            'success' => 'Berhasil Memperbarui Profile !'
        ]);
    }

    /**
     * Create Record Skill
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function skill(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'tingkat' => 'required',
            'user_id' => 'required',

        ]);

        Skill::create([
            'deskripsi' => $request->deskripsi,
            'tingkat' => $request->tingkat,
            'user_id' => $request->user_id,

        ]);

        return redirect('/emp/resume')->with([
            'success' => 'Data Diri Berhasil Diubah!'
        ]);
    }

    /**
     * Update Record Skill
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function skillupdate(Request $request)
    {
        $skill = Skill::find($request->id);

        $skill->update([
            'deskripsi' => $request->deskripsi,
            'tingkat' => $request->tingkat,
            'user_id' => $request->user_id,
        ]);

        return redirect('/emp/resume')->with([
            'success' => 'Data Diri Berhasil Diubah!'
        ]);
    }

    /**
     * Delete Record Skill
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function skilldelete(Request $request)
    {
        $skill = Skill::find($request->id);
        $skill->delete();

        return back()->with([
            'success' => 'Berhasil Memperbarui Profile !'
        ]);
    }

    /**
     * Create Record Bahasa
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bhs(Request $request)
    {
        $request->validate([
            'bhs' => 'required',
            'spoken' => 'required',
            'write' => 'required',
            'user_id' => 'required',

        ]);

        Bahasa::create([
            'bhs' => $request->bhs,
            'spoken' => $request->spoken,
            'write' => $request->write,
            'user_id' => $request->user_id,

        ]);

        return redirect('/emp/resume')->with([
            'success' => 'Data Diri Berhasil Diubah!'
        ]);
    }

    /**
     * update Record bahasa
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bhsupdate(Request $request)
    {
        $bhs = Bahasa::find($request->id);

        $bhs->update([
            'bhs' => $request->bhs,
            'spoken' => $request->spoken,
            'write' => $request->write,
            'user_id' => $request->user_id,

        ]);


        return redirect('/emp/resume')->with([
            'success' => 'Data Diri Berhasil Diubah!'
        ]);
    }

    /**
     * delete bahasa
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bhsdelete(Request $request)
    {
        $bhs = Bahasa::find($request->id);
        $bhs->delete();

        return back()->with([
            'success' => 'Berhasil Memperbarui Profile !'
        ]);
    }

    //halaman Account

    /**
     * get Account page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account()
    {
        return view('pegawai.akunpeg');
    }

    /**
     * Update user data
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


    public function sertificate()
    {
        return view('pegawai.sertiifikat');
    }

    /**
     * Create data Sertifikat
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sertificateadd(Request $request)
    {
        $request->validate([
            'keahlian' => 'required',
            'setifikat' => 'required',
            'ket_setifikat' => 'required',
            'dir_setifikat' => 'required',
            'user_id' => 'required',
        ]);

        $sert = Sertificate::create([
            'keahlian' => $request->keahlian,
            'setifikat' => $request->setifikat,
            'ket_setifikat' => $request->ket_setifikat,
            'user_id' => $request->user_id,

        ]);

        if (Input::has('dir_setifikat')) {
            $file = str_replace(' ', '_', str_random(4) . '' . $request->file('dir_setifikat')->getClientOriginalName());

            Input::file('dir_setifikat')->move('serti/', $file);
            $sert->update([
                'dir_setifikat' => 'serti/' . $file,
            ]);
        }

//
        return redirect('/emp/resume')->with([
            'success' => 'Data Diri Berhasil Diubah!'
        ]);
    }

    /**
     * Update Record sertifikat
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sertificateupdate(Request $request)
    {
        $serti = Sertificate::find($request->id);

        $serti->update([
            'keahlian' => $request->keahlian,
            'setifikat' => $request->setifikat,
            'ket_setifikat' => $request->ket_setifikat,
            'dir_setifikat' => $request->dir_lama,
            'user_id' => $request->user_id,

        ]);

        $file = $serti->dir_setifikat;
        File::delete($file);


        if (Input::has('dir_setifikat')) {
            $file = str_replace(' ', '_', str_random(4) . '' . $request->file('dir_setifikat')->getClientOriginalName());

            Input::file('dir_setifikat')->move('serti/', $file);
            $serti->update([
                'dir_setifikat' => 'serti/' . $file,
            ]);
        }

        return redirect('/emp/resume')->with([
            'success' => 'Data Diri Berhasil Diubah!'
        ]);
    }

    /**
     * Delete Record sertifikat and photo
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sertificatedelete(Request $request)
    {
        $ser = Sertificate::find($request->id);
        $file = $ser->dir_setifikat;
        File::delete($file);

        $ser->delete();

        return back()->with([
            'success' => 'Berhasil Memperbarui Profile !'
        ]);
    }

}
