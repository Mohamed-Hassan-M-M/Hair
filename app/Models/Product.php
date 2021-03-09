<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'id', 'product_name', 'before', 'product', 'after', 'category_id'
    ];
    public function Category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
