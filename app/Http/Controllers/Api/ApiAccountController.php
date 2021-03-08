<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;

class ApiAccountController extends Controller
{
    public function showHistories(Request $request)
    {
        $user = auth('api')->user();
        $histories = User_feature::where('user_id',$user->id)->get();
        $temp = [];
        foreach ($histories as $index => $history)
        {
            if($history->face_shape_id != null){
                $temp[$index]['face_shape']     = $history->Face->shape_name;
            }
            if($history->skin_tone_id != null){
                $temp[$index]['skin_tone']      = $history->Skin->skin_tone_name;
            }
            if($history->hair_style_id != null){
                $temp[$index]['hair_style']     = $history->Style->hair_style_name;
            }
            if($history->hair_length_id != null){
                $temp[$index]['hair_length']    = $history->Length->hair_length_name;
            }
            if($history->hair_color_id != null){
                $temp[$index]['hair_color']     = $history->Color->colour_hash;
            }
            $temp[$index]['uploaded_image']     = $history->uploaded_image;
            $temp[$index]['saved_image']      = $history->saved_image;
            $temp[$index]['created_at']         = $history->created_at;
        }
        return response()->json([
            'status' => true,
            'msg' => 'user histories',
            'data' => $temp
        ]);
    }
    public function saveHistories(Request $request)
    {
        //validation
        $rules = [
            'face_shape_id'=>['nullable','exists:face_shapes,id'],
            'skin_tone_id'=>['nullable','exists:skin_tones,id'],
            'hair_style_id'=>['nullable','exists:hair_styles,id'],
            'hair_length_id'=>['nullable','exists:hair_lengths,id'],
            'hair_color_id'=>['nullable','exists:colours,id'],
            'uploaded_image'=>['image','required'],
            'saved_image'=>['image','required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => 'validation error',
                'data' => $validator->errors()
            ]);
        }
        try {
            $userHistory = new User_feature();
            $userHistory->user_id = auth('api')->user()->id;
            if($request->has('face_shape_id')) {
                $userHistory->face_shape_id = $request->face_shape_id;
            }
            if($request->has('skin_tone_id')) {
                $userHistory->skin_tone_id = $request->skin_tone_id;
            }
            if($request->has('hair_style_id')) {
                $userHistory->hair_style_id = $request->hair_style_id;
            }
            if($request->has('hair_length_id')) {
                $userHistory->hair_length_id = $request->hair_length_id;
            }
            if($request->has('hair_color_id')) {
                $userHistory->hair_color_id = $request->hair_color_id;
            }
            $userHistory->uploaded_image = saveImage('userFeatures',$request->uploaded_image);
            $userHistory->saved_image = saveImage('userFeatures',$request->saved_image);
            $userHistory->save();
            return response()->json([
                'status' => true,
                'msg' => 'saved successfully',
                'data' => 'user history saved successfully'
            ]);
        }catch (\Exception $ex){
            return response()->json([
                'status' => false,
                'msg' => 'some thing went wrong',
                'data' => $ex
            ]);
        }
    }
    public function showProfile(Request $request)
    {
        $user = auth('api')->user();
        $user = User::find($user->id);
        return response()->json([
            'status' => true,
            'msg' => 'profile data',
            'data' => $user
        ]);
    }
    public function updateProfile(Request $request)
    {
        //validation
        $rules = [
            'password'=>['string'],
            'user_name'=>['string','unique:users,user_name,'.auth('api')->user()->id],
            'email'=>['email','unique:users,email,'.auth('api')->user()->id]
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => 'validation error',
                'data' => $validator->errors()
            ]);
        }
        //update info
        $user = auth('api')->user();
        if($request->has('user_name'))
        {
            $user->user_name = $request->user_name;
        }
        if($request->has('email'))
        {
            $user->email = $request->email;
        }
        if($request->has('first_name'))
        {
            $user->first_name = $request->first_name;
        }
        if($request->has('last_name'))
        {
            $user->last_name = $request->last_name;
        }
        if($request->has('password'))
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return response()->json([
            'status' => true,
            'msg' => 'updated successfully',
            'data' => $user
        ]);
    }


}
