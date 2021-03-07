<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skin_tone extends Model
{
    protected $table = 'skin_tones';
    protected $fillable = [
        'id', 'skin_tone_name', 'skin_tone_colour_id', 'link_url'
    ];
    public function Color()
    {
        return $this->belongsTo(Colour::class,'skin_tone_colour_id');
    }
}
