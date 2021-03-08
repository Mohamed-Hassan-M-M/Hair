<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Colour;
use App\Models\Face_shape;
use App\Models\Hair_length;
use App\Models\Hair_style;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function color()
    {
        $colors = Colour::select(['id','colour_name','colour_hash','link_url'])->get();
        return response()->json([
            'status' => true,
            'msg' => 'colors',
            'data' => $colors,
        ]);
    }
    public function hair_style()
    {
        $hairStylies = Hair_style::select(['id','hair_style_name','link_url'])->orderBy('created_at')->get();
        return response()->json([
            'status' => true,
            'msg' => 'hair Stylies',
            'data' => $hairStylies,
        ]);
    }
    public function face_shape()
    {
        $faceShapes = Face_shape::select(['id','shape_name','link_url'])->orderBy('created_at')->get();
        return response()->json([
            'status' => true,
            'msg' => 'face shapes',
            'data' => $faceShapes,
        ]);
    }
    public function hair_length()
    {
        $hairLengths = Hair_length::select(['id','hair_length_name','link_url'])->get();
        return response()->json([
            'status' => true,
            'msg' => 'hair lengths',
            'data' => $hairLengths,
        ]);
    }
    public function skin_tone()
    {
        //
    }
}
