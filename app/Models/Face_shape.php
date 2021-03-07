<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Face_shape extends Model
{
    protected $table = 'face_shapes';
    protected $fillable = [
        'id', 'shape_name', 'link_url'
    ];
}
