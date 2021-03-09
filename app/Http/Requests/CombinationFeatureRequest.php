<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CombinationFeatureRequest extends FormRequest
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
            'face_shape_id'=>['nullable','exists:face_shapes,id'],
            'skin_tone_id'=>['nullable','exists:skin_tones,id'],
            'hair_style_id'=>['nullable','exists:hair_styles,id'],
            'hair_length_id'=>['nullable','exists:hair_lengths,id'],
            'hair_color_id'=>['nullable','exists:colours,id'],
            'link_url'=>['image'],
        ];
    }
}
