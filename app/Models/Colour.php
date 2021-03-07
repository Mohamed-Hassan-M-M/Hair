<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    protected $table = 'colours';
    protected $fillable = [
        'id', 'colour_name', 'colour_hash', 'link_url'
    ];
    public function Skin()
    {
        return $this->hasOne(Skin_tone::class, 'skin_tone_colour_id');
    }
}
