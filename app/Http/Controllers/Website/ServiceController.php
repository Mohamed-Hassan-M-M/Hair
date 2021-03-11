<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Colour;
use App\Models\Face_shape;
use App\Models\Hair_length;
use App\Models\Hair_style;
use App\Models\Product;
use App\Models\Skin_tone;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $colors = Colour::all();
        $skinTones = Skin_tone::all();
        $faceShapes = Face_shape::all();
        $hairLengths = Hair_length::all();
        $hairStyles = Hair_style::all();
        return view('website.service',compact(['colors','skinTones','faceShapes','hairLengths','hairStyles']));
    }
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

}
