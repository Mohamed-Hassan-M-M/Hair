<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'id', 'category_name'
    ];
    public function Product(){
        return $this->hasMany(Product::class, 'category_id');
    }
}
