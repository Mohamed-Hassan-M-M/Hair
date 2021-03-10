<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name'=>['string','unique:products,product_name,'.$this->id],
            'category_id'=>['exists:categories,id'],
            'productimage.*'=>['image'],
            'after.*'=>['image']
        ];
    }
    public function messages()
    {
        return [
            'unique' => 'The :attribute has already been taken.',
            'image' => 'This field must be an image.',
            'string' => 'The :attribute must be a string.',
        ];
    }
}
