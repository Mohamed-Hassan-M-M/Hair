<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hair_length extends Model
{
    protected $table = 'hair_lengths';
    protected $fillable = [
        'id', 'hair_length_name', 'link_url'
    ];
}
