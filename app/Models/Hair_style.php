<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hair_style extends Model
{
    protected $table = 'hair_styles';
    protected $fillable = [
        'id', 'hair_style_name', 'link_url'
    ];
}
