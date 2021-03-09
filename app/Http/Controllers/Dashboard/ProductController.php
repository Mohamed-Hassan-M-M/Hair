<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.product.index',compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.product.create',compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try{
            $product = new Product();
            $product->product_name = $request->product_name;
            $product->category_id = $request->category_id;
            $product->before = saveImage('products',$request->before);
            $product->product = saveImage('products',$request->product);
            $product->after = saveImage('products',$request->after);
            $product->save();
            return redirect()->route('product.index')->with(['success'=>'This product created successfully']);
        }catch (\Exception $ex){
            return redirect()->route('product.index')->with(['error'=>'Error, Try again later']);
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
        $product = Product::find($id);
        if(!$product){
            return redirect()->route('product.index')->with(['error'=>'This product does not exist']);
        }
        $categories = Category::all();
        return view('dashboard.product.edit',compact(['categories','product']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try{
            $product = Product::find($id);
            if(!$product){
                return redirect()->route('product.index')->with(['error'=>'This product does not exist']);
            }
            $product->product_name = $request->product_name;
            $product->category_id = $request->category_id;
            if($request->has('before')){
                $oldimage = $product->before;
                $product->before = saveImage('products',$request->before);
                unlink(base_path('/public/dashboard/images/' . $oldimage));
            }
            if($request->has('product')){
                $oldimage = $product->product;
                $product->product = saveImage('products',$request->product);
                unlink(base_path('/public/dashboard/images/' . $oldimage));
            }
            if($request->has('after')){
                $oldimage = $product->after;
                $product->after = saveImage('products',$request->after);
                unlink(base_path('/public/dashboard/images/' . $oldimage));
            }
            $product->save();
            return redirect()->route('product.index')->with(['success'=>'This product updated successfully']);
        }catch (\Exception $ex){
            return redirect()->route('product.index')->with(['error'=>'Error, Try again later']);
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
            $product = Product::find($id);
            if(!$product){
                return redirect()->route('product.index')->with(['error'=>'This product does not exist']);
            }
            $oldimagebefore = $product->before;
            $oldimageproduct = $product->product;
            $oldimageafter = $product->after;
            $product->delete();
            unlink(base_path('/public/dashboard/images/' . $oldimagebefore));
            unlink(base_path('/public/dashboard/images/' . $oldimageproduct));
            unlink(base_path('/public/dashboard/images/' . $oldimageafter));
            return redirect()->route('product.index')->with(['success'=>'This product deleted successfully']);
        }catch (\Exception $ex){
            return redirect()->route('product.index')->with(['error'=>'Error, Try again later']);
        }
    }
}
