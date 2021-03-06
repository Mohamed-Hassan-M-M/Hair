<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
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
            'colour_name'=>['string','unique:colours,colour_name,'.$this->id],
            'link_url'=>['image']
        ];
    }
    public function messages()
    {
        return [
            'unique' => 'The :attribute has already been taken.',
            'image' => 'The :attribute must be an image.',
            'string' => 'The :attribute must be a string.',
        ];
    }
}
