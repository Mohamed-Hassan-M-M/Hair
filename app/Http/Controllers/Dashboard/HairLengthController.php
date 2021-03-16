<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\HairLengthRequest;
use App\Models\Hair_length;
use Illuminate\Http\Request;

class HairLengthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hairLengths = Hair_length::orderBy('created_at')->get();
        return view('dashboard.hairLength.index',compact(['hairLengths']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.hairLength.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HairLengthRequest $request)
    {
        try{
            $hairLength = new Hair_length();
            $hairLength->hair_length_name = $request->hair_length_name;
            $hairLength->link_url = saveImage('hairLengths',$request->link_url);
            $hairLength->save();
            return redirect()->route('hair_length.index')->with(['success'=>'This length created successfully']);
        }catch (\Exception $ex){
            return redirect()->route('hair_length.index')->with(['error'=>'Error, Try again later']);
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
        $hairLength = Hair_length::find($id);
        if(!$hairLength){
            return redirect()->route('hair_length.index')->with(['error'=>'This length does not exist']);
        }
        return view('dashboard.hairLength.edit',compact(['hairLength']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HairLengthRequest $request, $id)
    {
        try{
            $hairLength = Hair_length::find($id);
            if(!$hairLength){
                return redirect()->route('hair_length.index')->with(['error'=>'This length does not exist']);
            }
            $hairLength->hair_length_name = $request->hair_length_name;
            if($request->has('link_url')){
                $oldimage = $hairLength->link_url;
                $hairLength->link_url = saveImage('hairLengths',$request->link_url);
                unlink(base_path('/public/dashboard/images/' . $oldimage));
            }
            $hairLength->save();
            return redirect()->route('hair_length.index')->with(['success'=>'This length updated successfully']);
        }catch (\Exception $ex){
            return redirect()->route('hair_length.index')->with(['error'=>'Error, Try again later']);
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
            $hairLength = Hair_length::find($id);
            if(!$hairLength){
                return redirect()->route('hair_length.index')->with(['error'=>'This length does not exist']);
            }
            $oldimage = $hairLength->link_url;
            $hairLength->delete();
            unlink(base_path('/public/dashboard/images/' . $oldimage));
            return redirect()->route('hair_length.index')->with(['success'=>'This length deleted successfully']);
        }catch (\Exception $ex){
            return redirect()->route('hair_length.index')->with(['error'=>'Error, Try again later']);
        }
    }
}
