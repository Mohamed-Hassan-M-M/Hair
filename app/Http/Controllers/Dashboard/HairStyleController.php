<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\HairStyleRequest;
use App\Models\Hair_style;
use Illuminate\Http\Request;

class HairStyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hairStylies = Hair_style::all();
        return view('dashboard.hairStyle.index',compact(['hairStylies']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.hairStyle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HairStyleRequest $request)
    {
        try{
        $hairStyle = new Hair_style();
        $hairStyle->hair_style_name = $request->hair_style_name;
        $hairStyle->link_url = saveImage('hairStylies',$request->link_url);
        $hairStyle->save();
        return redirect()->route('hair_style.index')->with(['success'=>'This style created successfully']);
        }catch (\Exception $ex){
        return redirect()->route('hair_style.index')->with(['error'=>'Error, Try again later']);
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
        $hairStyle = Hair_style::find($id);
        if(!$hairStyle){
            return redirect()->route('hair_style.index')->with(['error'=>'This style does not exist']);
        }
        return view('dashboard.hairStyle.edit',compact(['hairStyle']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HairStyleRequest $request, $id)
    {
        try{
            $hairStyle = Hair_style::find($id);
            if(!$hairStyle){
                return redirect()->route('hair_style.index')->with(['error'=>'This style does not exist']);
            }
            $hairStyle->hair_style_name = $request->hair_style_name;
            if($request->has('link_url')){
                $oldimage = $hairStyle->link_url;
                $hairStyle->link_url = saveImage('hairStylies',$request->link_url);
                unlink(base_path('/public/dashboard/images/' . $oldimage));
            }
            $hairStyle->save();
            return redirect()->route('hair_style.index')->with(['success'=>'This style updated successfully']);
        }catch (\Exception $ex){
            return redirect()->route('hair_style.index')->with(['error'=>'Error, Try again later']);
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
            $hairStyle = Hair_style::find($id);
            if(!$hairStyle){
                return redirect()->route('hair_style.index')->with(['error'=>'This style does not exist']);
            }
            $oldimage = $hairStyle->link_url;
            $hairStyle->delete();
            unlink(base_path('/public/dashboard/images/' . $oldimage));
            return redirect()->route('hair_style.index')->with(['success'=>'This style deleted successfully']);
        }catch (\Exception $ex){
            return redirect()->route('hair_style.index')->with(['error'=>'Error, Try again later']);
        }
    }
}
