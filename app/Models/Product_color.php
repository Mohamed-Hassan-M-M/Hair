<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_color extends Model
{
    protected $table = 'product_colors';
    protected $fillable = [
        'id', 'product_color_name', 'product_color_hash', 'product_barcode', 'productimage', 'after', 'product_id'
    ];
    public function Product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function Size(){
        return $this->hasMany(Product_color_size::class, 'product_color_id');
    }
}
