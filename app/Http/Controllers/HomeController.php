<?php

namespace App\Http\Controllers;

// use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\role;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //  public function index()
    //  {
    //   return view('auth.login');  
    //  }

    //  function login_page(Request $req){
    //     $req->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
   
    //     $credentials = $req->only('email', 'password');
    //     if (Auth::attempt($credentials)) {

    //         $user = role::with('user')->first();
    //         dd($user->toArray());

    //     }
    //  }

    

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
