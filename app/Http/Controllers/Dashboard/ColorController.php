<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\Colour;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Colour::all();
        return view('dashboard.color.index',compact(['colors']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorRequest $request)
    {
        try{
            $color = new Colour();
            $color->colour_name = $request->colour_name;
            $color->colour_hash = $request->colour_hash;
            $color->link_url = saveImage('colors',$request->link_url);
            $color->save();
            return redirect()->route('color.index')->with(['success'=>'This color created successfully']);
        }catch (\Exception $ex){
            return redirect()->route('color.index')->with(['error'=>'Error, Try again later']);
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
        $color = Colour::find($id);
        if(!$color){
            return redirect()->route('color.index')->with(['error'=>'This color does not exist']);
        }
        return view('dashboard.color.edit',compact(['color']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ColorRequest $request, $id)
    {
        try{
            $color = Colour::find($id);
            if(!$color){
                return redirect()->route('color.index')->with(['error'=>'This color does not exist']);
            }
            $color->colour_name = $request->colour_name;
            $color->colour_hash = $request->colour_hash;
            if($request->has('link_url')){
                $oldimage = $color->link_url;
                $color->link_url = saveImage('colors',$request->link_url);
                unlink(base_path('/public/dashboard/images/' . $oldimage));
            }
            $color->save();
            return redirect()->route('color.index')->with(['success'=>'This color updated successfully']);
        }catch (\Exception $ex){
            return redirect()->route('color.index')->with(['error'=>'Error, Try again later']);
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
            $color = Colour::find($id);
            if(!$color){
                return redirect()->route('color.index')->with(['error'=>'This color does not exist']);
            }
            $oldimage = $color->link_url;
            $color->delete();
            unlink(base_path('/public/dashboard/images/' . $oldimage));
            return redirect()->route('color.index')->with(['success'=>'This color deleted successfully']);
        }catch (\Exception $ex){
            return redirect()->route('color.index')->with(['error'=>'Error, Try again later']);
        }
    }
}
