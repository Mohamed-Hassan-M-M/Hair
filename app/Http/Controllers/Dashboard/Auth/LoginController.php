<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Models\Hair_style;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function doLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->attempt(['email' => $request->input("email"),'password' => $request->input("password")], $remember_me)) {
            return redirect() -> route('dashboard');
        }
        return redirect()->back()->with(['error'=>'Try another email or password.']);
    }

    public function logout(){
        Auth::logout();
        return view('dashboard.auth.login');
    }
}
