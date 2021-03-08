<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Colour;
use App\Models\Hair_length;
use App\Models\Hair_style;
use Illuminate\Http\Request;

class ApiAccountController extends Controller
{
    public function color()
    {
        $colors = Colour::select(['colour_name','colour_hash','link_url'])->get();
        return response()->json([
            'status' => true,
            'msg' => 'colors',
            'data' => $colors,
        ]);
    }
    public function hair_style()
    {
        $hairStylies = Hair_style::select(['hair_style_name','link_url'])->orderBy('created_at')->get();
        return response()->json([
            'status' => true,
            'msg' => 'hair Stylies',
            'data' => $hairStylies,
        ]);
    }
    public function hair_length()
    {
        $hairLengths = Hair_length::select(['hair_length_name','link_url'])->get();
        return response()->json([
            'status' => true,
            'msg' => 'hair lengths',
            'data' => $hairLengths,
        ]);
    }
    public function saveHistories(Request $request)
    {
        return response()->json([
            'status' => true,
            'msg' => 'uploaded successfully',
            'data' => '',
        ]);
    }

}
