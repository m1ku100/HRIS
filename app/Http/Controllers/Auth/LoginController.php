<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */



    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $request->remember = (is_null($request->remember)) ? false : $request->remember;

        try {
            $user = User::where('email',$request->email)->firstOrFail();

            if(!Hash::check($request->password, $user->password)) {
                return back()->with([
                    'error' => 'Email Atau Password Anda Salah!!.'
                ]);
            }

            Auth::login($user);
            $role = Auth::user()->role;

            if($role == 'manajer'){
                return redirect()->route('home-manajer')->with('signed','You`re now signed in as Root.');
            }
            if($role == 'pegawai'){
                return redirect()->route('home-pegawai')->with('signed','You`re now signed in as Admin.');
            }
            if($role == 'admin'){
                return redirect()->route('home-admin')->with('signed','You`re now signed in as Admin.');
            }
        }
        catch (ModelNotFoundException $e) {

            return back()->with([
                'error' => 'Your email or password is incorrect.'
            ]);

        }
        
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/login');
    }
}
