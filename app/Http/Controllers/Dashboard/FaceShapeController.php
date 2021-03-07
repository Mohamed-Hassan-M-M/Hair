<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaceShapeRequest;
use App\Models\Face_shape;
use Illuminate\Http\Request;

class FaceShapeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faceShapes = Face_shape::all();
        return view('dashboard.faceShape.index',compact(['faceShapes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.faceShape.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaceShapeRequest $request)
    {
        try{
            $faceShape = new Face_shape();
            $faceShape->shape_name = $request->shape_name;
            $faceShape->link_url = saveImage('faceShapes',$request->link_url);
            $faceShape->save();
            return redirect()->route('face_shape.index')->with(['success'=>'This shape created successfully']);
        }catch (\Exception $ex){
            return redirect()->route('face_shape.index')->with(['error'=>'Error, Try again later']);
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
        $faceShape = Face_shape::find($id);
        if(!$faceShape){
            return redirect()->route('face_shape.index')->with(['error'=>'This shape does not exist']);
        }
        return view('dashboard.faceShape.edit',compact(['faceShape']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaceShapeRequest $request, $id)
    {
        try{
            $faceShape = Face_shape::find($id);
            if(!$faceShape){
                return redirect()->route('face_shape.index')->with(['error'=>'This shape does not exist']);
            }
            $faceShape->shape_name = $request->shape_name;
            if($request->has('link_url')){
                $oldimage = $faceShape->link_url;
                $faceShape->link_url = saveImage('faceShapes',$request->link_url);
                unlink(base_path('/public/dashboard/images/' . $oldimage));
            }
            $faceShape->save();
            return redirect()->route('face_shape.index')->with(['success'=>'This shape updated successfully']);
        }catch (\Exception $ex){
            return redirect()->route('face_shape.index')->with(['error'=>'Error, Try again later']);
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
            $faceShape = Face_shape::find($id);
            if(!$faceShape){
                return redirect()->route('face_shape.index')->with(['error'=>'This shape does not exist']);
            }
            $oldimage = $faceShape->link_url;
            $faceShape->delete();
            unlink(base_path('/public/dashboard/images/' . $oldimage));
            return redirect()->route('face_shape.index')->with(['success'=>'This shape deleted successfully']);
        }catch (\Exception $ex){
            return redirect()->route('face_shape.index')->with(['error'=>'Error, Try again later']);
        }
    }
}
