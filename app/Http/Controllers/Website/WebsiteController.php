<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Colour;
use App\Models\Hair_length;
use App\Models\Hair_style;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        $colors = Colour::all();
        $hairLengths = Hair_length::all();
        $hairStyles = Hair_style::all();
        return view('website.index',compact(['colors','hairLengths','hairStyles']));
    }
}
