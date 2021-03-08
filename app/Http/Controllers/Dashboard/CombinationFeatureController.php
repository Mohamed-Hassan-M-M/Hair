<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CombinationFeatureRequest;
use App\Models\Colour;
use App\Models\Combination_feature;
use App\Models\Face_shape;
use App\Models\Hair_length;
use App\Models\Hair_style;
use App\Models\Skin_tone;
use Illuminate\Http\Request;

class CombinationFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combinations = Combination_feature::all();
        return view('dashboard.combinationFeature.index',compact(['combinations']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Colour::all();
        $skinTones = Skin_tone::all();
        $faceShapes = Face_shape::all();
        $hairLengths = Hair_length::all();
        $hairStyles = Hair_style::all();
        return view('dashboard.combinationFeature.create',compact(['colors','skinTones','faceShapes','hairLengths','hairStyles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CombinationFeatureRequest $request)
    {
        try{
            $combinationFeature = new Combination_feature();
            if($request->has('face_shape_id')) {
                $combinationFeature->face_shape_id = $request->face_shape_id;
            }
            if($request->has('skin_tone_id')) {
                $combinationFeature->skin_tone_id = $request->skin_tone_id;
            }
            if($request->has('hair_style_id')) {
                $combinationFeature->hair_style_id = $request->hair_style_id;
            }
            if($request->has('hair_length_id')) {
                $combinationFeature->hair_length_id = $request->hair_length_id;
            }
            if($request->has('hair_color_id')) {
                $combinationFeature->hair_color_id = $request->hair_color_id;
            }
            $combinationFeature->link_url = saveImage('combinationFeatures',$request->link_url);
            $combinationFeature->save();
            return redirect()->route('combination_feature.index')->with(['success'=>'This feature tone created successfully']);
        }catch (\Exception $ex){
            return redirect()->route('combination_feature.index')->with(['error'=>'Error, Try again later']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $combination = Combination_feature::find($id);
        if(!$combination){
            return redirect()->route('combination_feature.index')->with(['error'=>'This feature tone does not exist']);
        }
        $colors = Colour::all();
        $skinTones = Skin_tone::all();
        $faceShapes = Face_shape::all();
        $hairLengths = Hair_length::all();
        $hairStyles = Hair_style::all();
        return view('dashboard.combinationFeature.edit',compact(['combination','colors','skinTones','faceShapes','hairLengths','hairStyles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CombinationFeatureRequest $request, $id)
    {
        try{
            $skinTone = Skin_tone::find($id);
            if(!$skinTone){
                return redirect()->route('skin_tone.index')->with(['error'=>'This skin tone does not exist']);
            }
            $skinTone->skin_tone_name = $request->skin_tone_name;
            $skinTone->skin_tone_colour_id = $request->skin_tone_colour_id;
            if($request->has('link_url')){
                $oldimage = $skinTone->link_url;
                $skinTone->link_url = saveImage('skinTones',$request->link_url);
                unlink(base_path('/public/dashboard/images/' . $oldimage));
            }
            $skinTone->save();
            return redirect()->route('skin_tone.index')->with(['success'=>'This skin tone updated successfully']);
        }catch (\Exception $ex){
            return redirect()->route('skin_tone.index')->with(['error'=>'Error, Try again later']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $skinTone = Skin_tone::find($id);
            if(!$skinTone){
                return redirect()->route('skin_tone.index')->with(['error'=>'This skin tone does not exist']);
            }
            $oldimage = $skinTone->link_url;
            $skinTone->delete();
            unlink(base_path('/public/dashboard/images/' . $oldimage));
            return redirect()->route('skin_tone.index')->with(['success'=>'This skin tone deleted successfully']);
        }catch (\Exception $ex){
            return redirect()->route('skin_tone.index')->with(['error'=>'Error, Try again later']);
        }
    }
}
