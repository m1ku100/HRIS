<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    /**
     * Set Middleware for Auth
     *
     * ActivityController constructor.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get Index Page for Admin
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = User::orderBy('role')->paginate(4);
        return view('admin.homeadmin',compact('user'));
    }

    /**
     * Add User Record with Role 'manager'
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adduser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        User::create([
          'name' => $request->name,
          'email' => $request->email,
          'role' => $request->role,
          'password' => bcrypt( $request->password ),
        ]);

        return back()->with('success', '');
    }

    /**
     * Get User Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function user()
    {
        $result = null;
        return view('admin.user', compact('result'));
    }

    /**
     * Search User By the Email
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $key = $request->email;
        $result = User::where('email', $request->email)->first();
        if ($result == null) {
            return back()->with('error', 'Email ' . $key . ' tidak ditemukan');
        } else {
            return view('admin.user', compact('result'));
        }
    }

    /**
     * Get Account Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account()
    {
        return view('admin.akun');
    }

    /**
     * Reset Pass for user
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request)
    {
        $user = User::find($request->id);
        $result = null;

        $user->update([
            'password' => bcrypt('secret')
        ]);

        return redirect('/admin/user')->with('success', '');
    }
}
