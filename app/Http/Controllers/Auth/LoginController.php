<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        $this->middleware('guest')->except([
            'logout',
            'locked',
            'unlock',
        ]);
        // dd(Auth::user());
        // if(Auth::user() == "1"){
        //     return "success";
        // }

    }

    // function showLoginForm(){
    //     return view('auth.login');
    // }

    public function locked()
    {
        if (!session('lock-expires-at')) {
            return view('lock.lock_screen');
        }

        if (session('lock-expires-at') > now()) {
            return view('lock.lock_screen');
        }
        return view('lock.lock_screen');
    }

    public function unlock(Request $request)
    {

        $check = Hash::check($request->input('password'), $request->user()->password);

        if (!$check) {
            $data['error'] = "Your password does not match your profile.";
            return view('lock.lock_screen',$data);
        }
        session(['lock-expires-at' => now()->addMinutes($request->user()->getLockoutTime())]);
        return redirect('/admin/dashboard');
    }
}
