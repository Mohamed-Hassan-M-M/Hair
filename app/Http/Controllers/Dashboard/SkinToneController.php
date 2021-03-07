<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkinToneRequest;
use App\Models\Colour;
use App\Models\Skin_tone;
use Illuminate\Http\Request;

class SkinToneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skinTones = Skin_tone::all();
        return view('dashboard.skinTone.index',compact(['skinTones']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Colour::all();
        return view('dashboard.skinTone.create',compact(['colors']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkinToneRequest $request)
    {
        try{
            $skinTone = new Skin_tone();
            $skinTone->skin_tone_name = $request->skin_tone_name;
            $skinTone->skin_tone_colour_id = $request->skin_tone_colour_id;
            $skinTone->link_url = saveImage('skinTones',$request->link_url);
            $skinTone->save();
            return redirect()->route('skin_tone.index')->with(['success'=>'This skin tone created successfully']);
        }catch (\Exception $ex){
            return redirect()->route('skin_tone.index')->with(['error'=>'Error, Try again later']);
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
        $skinTone = Skin_tone::find($id);
        if(!$skinTone){
            return redirect()->route('skin_tone.index')->with(['error'=>'This skin tone does not exist']);
        }
        $colors = Colour::all();
        return view('dashboard.skinTone.edit',compact(['skinTone','colors']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SkinToneRequest $request, $id)
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
