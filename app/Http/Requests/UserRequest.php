<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' =>['confirmed'],
            'user_name'=>['string','unique:users,user_name,'.Auth::user()->id],
            'email'    =>['email','unique:users,email,'.Auth::user()->id]
        ];
    }
    public function messages()
    {
        return [
            'confirm'  =>'Confirm password does not match.',
            'unique'   => 'The :attribute has already been taken.',
            'string'   => 'The :attribute must be a string.',
            'email'    => 'The :attribute must be an email.',
        ];
    }
}
