<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_color_size extends Model
{
    protected $table = 'product_colors';
    protected $fillable = [
        'id', 'product_size_name', 'product_color_id'
    ];
    public function ProductColor(){
        return $this->belongsTo(Product_color::class, 'product_color_id');
    }
}
