<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_feature extends Model
{
    protected $table = 'user_features';
    protected $fillable = [
        'id', 'user_id', 'face_shape_id', 'skin_tone_id', 'hair_style_id', 'hair_length_id', 'hair_color_id', 'uploaded_image', 'saved_image'
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Face()
    {
        return $this->belongsTo(Face_shape::class, 'face_shape_id');
    }
    public function Skin()
    {
        return $this->belongsTo(Skin_tone::class, 'skin_tone_id');
    }
    public function Style()
    {
        return $this->belongsTo(Hair_style::class, 'hair_style_id');
    }
    public function Length()
    {
        return $this->belongsTo(Hair_length::class, 'hair_length_id');
    }
    public function Color()
    {
        return $this->belongsTo(Colour::class, 'hair_color_id');
    }
}
