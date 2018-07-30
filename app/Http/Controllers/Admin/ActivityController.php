<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function index()
    {
        $user = User::orderBy('role')->paginate(4);
        return view('admin.homeadmin',compact('user'));
    }

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

    public function user()
    {
        $result = null;
        return view('admin.user', compact('result'));
    }

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

    public function account()
    {
        return view('admin.akun');
    }

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
