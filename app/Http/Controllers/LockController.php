<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LockController extends Controller
{
    public function lockScreen()
    {
        if (Auth::check()) {
            \Session::put('locked', true);
            return view('lock.lock_screen');
        }

        return redirect('/login');
    }

    // unlock screen
    public function unlock(Request $request)
    {

// if user in not logged in
        if (!\Auth::check()) {
            return redirect('/login');
        }

        $password = $request->input('password');

        if (\Hash::check($password, \Auth::user()->password)) {
            \Session::forget('locked');
            return redirect('/home');
        }

    }
}
