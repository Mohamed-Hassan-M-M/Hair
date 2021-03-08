<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Combination_feature extends Model
{
    protected $table = 'combination_features';
    protected $fillable = [
        'id', 'face_shape_id', 'skin_tone_id', 'hair_style_id', 'hair_length_id', 'hair_color_id', 'link_url'
    ];
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
