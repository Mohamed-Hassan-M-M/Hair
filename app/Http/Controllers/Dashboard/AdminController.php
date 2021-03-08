<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.account.index');
    }
    public function overview()
    {
        $view = view('dashboard.account.overview')->render();
        return response()->json([
            'status'=>true,
            'view'=>$view
        ]);
    }
    public function editProfile()
    {
        $view = view('dashboard.account.editProfile')->render();
        return response()->json([
            'status'=>true,
            'view'=>$view
        ]);
    }
    public function updateProfile(UserRequest $request)
    {
        Auth::guard('web')->user()->user_name = $request->user_name;
        Auth::guard('web')->user()->first_name = $request->first_name;
        Auth::guard('web')->user()->last_name = $request->last_name;
        Auth::guard('web')->user()->email = $request->email;
        Auth::guard('web')->user()->save();
        $view = view('dashboard.account.overview')->render();
        return response()->json([
            'status'=>true,
            'view'=>$view
        ]);
    }
    public function password()
    {
        $view = view('dashboard.account.password')->render();
        return response()->json([
            'status'=>true,
            'view'=>$view
        ]);
    }
    public function resetPassword(UserRequest $request)
    {

        if(Hash::check($request->old_password ,auth()->user()->password))
        {
            auth('web')->user()->update(['password'=>Hash::make($request->password)]);
            Auth::guard('web')->logout();
            return response()->json([
                'status'=>true,
            ]);
        }
        else{
            $view = view('dashboard.account.password')->render();
            return response()->json([
                'status'=>false,
                'view'=>$view,
                'error'=>'Your password is wrong'
            ]);
        }
    }
}
