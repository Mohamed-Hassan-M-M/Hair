<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_name'=>['string','unique:categories,category_name,'.$this->id],
        ];
    }
    public function messages()
    {
        return [
            'unique' => 'The :attribute has already been taken.',
            'string' => 'The :attribute must be a string.',
        ];
    }
}
