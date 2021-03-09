<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.category.index',compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try{
            $category = new Category();
            $category->category_name = $request->category_name;
            $category->save();
            return redirect()->route('category.index')->with(['success'=>'This category created successfully']);
        }catch (\Exception $ex){
            return redirect()->route('category.index')->with(['error'=>'Error, Try again later']);
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
        $category = Category::find($id);
        if(!$category){
            return redirect()->route('category.index')->with(['error'=>'This category does not exist']);
        }
        return view('dashboard.category.edit',compact(['category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try{
            $category = Category::find($id);
            if(!$category){
                return redirect()->route('category.index')->with(['error'=>'This category does not exist']);
            }
            $category->category_name = $request->category_name;
            $category->save();
            return redirect()->route('category.index')->with(['success'=>'This category updated successfully']);
        }catch (\Exception $ex){
            return redirect()->route('category.index')->with(['error'=>'Error, Try again later']);
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
            $category = Category::find($id);
            if(!$category){
                return redirect()->route('category.index')->with(['error'=>'This category does not exist']);
            }
            $category->delete();
            return redirect()->route('category.index')->with(['success'=>'This category deleted successfully']);
        }catch (\Exception $ex){
            return redirect()->route('category.index')->with(['error'=>'Error, Try again later']);
        }
    }
}
