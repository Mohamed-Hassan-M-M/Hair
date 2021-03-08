<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use Auth;
use Illuminate\Http\Request;

class ApiUserAuthController extends Controller
{
    public function register(Request $request)
    {
        //validation
        $rules = [
            'password'=>['confirmed','string'],
            'user_name'=>['string','unique:users,user_name,'. Auth::user()->id],
            'email'=>['email','unique:users,email,'.Auth::user()->id]
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => 'validation error.',
                'data' => $validator->errors()->first()
            ]);
        }
        //save info
        $user = new User();
        $user->user_name = $request->user_name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'status' => true,
            'msg' => 'register successfully',
            'data' => 'register successfully'
        ]);
    }

    public function login(Request $request)
    {
        try {
            //validation
            $rules = [
                "email" => ["required","email"],
                "password" => ["required","string"]
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'msg' => 'validation error.',
                    'data' => $validator->errors()->first()
                ]);
            }
            //login
            $credentials = $request->only(['email', 'password']);
            $token = Auth::guard('api')->attempt($credentials);
            if (!$token){
                return response()->json([
                    'status' => false,
                    'msg' => 'credentials error',
                    'data' => 'Error, your email or password wrong.'
                ]);
            }
            //return user info with his token
            $user = Auth::guard('api')->user();
            $user ->token = $token;
            return response()->json([
                'status' => true,
                'msg' => 'login successfully',
                'data' => $user
            ]);

        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'some thing went wrong',
                'data' => $ex->getMessage()
            ]);
        }
    }

    public function logout(Request $request)
    {
        auth('api')->logout();
        return response()->json([
            'status' => true,
            'msg' => 'logout successfully',
            'data' => 'logout successfully'
        ]);
    }
}
