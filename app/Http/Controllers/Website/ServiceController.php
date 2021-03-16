<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Colour;
use App\Models\Face_shape;
use App\Models\Hair_length;
use App\Models\Hair_style;
use App\Models\Product;
use App\Models\Product_color;
use App\Models\Skin_tone;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function clothesAll()
    {
        $categories = Category::get();
        $products = Product::get();
        $categories_choose = null;
        return view('website.clothes',compact(['products','categories','categories_choose']));
    }

    public function clothesCategory($cat_id)
    {
        $categories = Category::get();
        $categories_choose = Category::find($cat_id);
        $products = $categories_choose->Product;
        return view('website.clothes',compact(['products','categories','categories_choose']));
    }

    public function getProduct(Request $request)
    {
        $product_no = Product::find($request->product_id);
        return response()->json([
            'status'=>true,
            'colors'=> $product_no->Color,
            'sizes'  => $product_no->Color->first()->Size
        ]);
    }

    public function getSize(Request $request)
    {
        $color = Product_color::find($request->colorID);
        return response()->json([
            'status'=>true,
            'sizes'=> $color->Size
        ]);
    }

}
