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
        $rules = [];
        $rules['product_name'] = ['string','unique:products,product_name,'.$this->id];
        $rules['category_id'] = ['exists:categories,id'];
        $rules['productimage.*'] = ['image'];
        $rules['after.*'] = ['image'];
        if($this->isMethod('PUT'))
        {
            foreach ($this->idcolor as $index => $value) {
                $rules['product_barcode.'.$index] = ['numeric','unique:product_colors,product_barcode,'.$value];
            }
        }
        else
        {
            $rules['product_barcode.*'] = ['numeric','unique:product_colors,product_barcode'];
        }
        return $rules;
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
