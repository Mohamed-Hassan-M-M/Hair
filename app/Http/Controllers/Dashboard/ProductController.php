<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_color;
use App\Models\Product_color_size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at')->get();
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
        $size = [];
        foreach ((array)$request->size as $var => $val) {
            $size[] =  $val;
        }
        $count = [];
        foreach ((array)$request->count as $var => $val) {
            $count[] =  $val;
        }
        try{
            DB::beginTransaction();
            //save product
            $productID = Product::insertGetId([
                'product_name' => $request->product_name,
                'category_id'  => $request->category_id
            ]);
            //save color
            $countColor = count($request->colour_name);
            for ($i=0; $i<$countColor; $i++)
            {
                $color_ID = Product_color::insertGetId([
                    'productimage'           => saveImage('products',$request->productimage[$i]),
                    'after'             => saveImage('products',$request->after[$i]),
                    'product_color_name'=> $request->colour_name[$i],
                    'product_color_hash'=> $request->colour_hash[$i],
                    'product_barcode'=> $request->product_barcode[$i],
                    'product_id'        => $productID,
                ]);
                //save size
                $countSize = count($size[$i]);
                for($l=0; $l<$countSize; $l++)
                {
                    $productColorSize = new Product_color_size();
                    $productColorSize->product_size_name = $size[$i][$l];
                    $productColorSize->count = $count[$i][$l];
                    $productColorSize->product_color_id = $color_ID;
                    $productColorSize->save();
                }
            }
            DB::commit();
            return redirect()->route('product.index')->with(['success'=>'This product created successfully']);
        }catch (\Exception $ex){
            DB::rollBack();
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
            DB::beginTransaction();
            //delete the old product first
            $pro = Product::find($id);
            foreach ($pro->Color as $col)
            {
                foreach ($col->Size as $siz)
                {
                    $siz->delete();
                }
                $col->delete();
            }
            $pro->delete();

            $size = [];
            foreach ((array)$request->size as $val) {
                $size[] =  $val;
            }

            $count = [];
            foreach ((array)$request->count as $val) {
                $count[] =  $val;
            }

            $colorImageProduct = '';
            $colorImageAfter = '';
            //save product
            $productID = Product::insertGetId([
                'product_name' => $request->product_name,
                'category_id'  => $request->category_id
            ]);
            //save color
            $countColor = count($request->colour_name);
            for ($i=0; $i<$countColor; $i++)
            {
                if(isset($request->productimage[$i])){
                    $colorImageProduct = saveImage('products',$request->productimage[$i]);
                    if(isset($request->producthidden[$i]))
                    {
                        unlink(base_path('/public/dashboard/images/' . $request->producthidden[$i]));
                    }

                }else{
                    $colorImageProduct = $request->producthidden[$i];
                }
                if(isset($request->after[$i])){
                    $colorImageAfter = saveImage('products',$request->after[$i]);
                    if(isset($request->afterhidden[$i]))
                    {
                        unlink(base_path('/public/dashboard/images/' . $request->afterhidden[$i]));
                    }
                }else{
                    $colorImageAfter = $request->afterhidden[$i];
                }
                $color_ID = Product_color::insertGetId([
                    'productimage'      => $colorImageProduct,
                    'after'             => $colorImageAfter,
                    'product_color_name'=> $request->colour_name[$i],
                    'product_barcode'   => $request->product_barcode[$i],
                    'product_color_hash'=> $request->colour_hash[$i],
                    'product_id'        => $productID,
                ]);
                //save size
                $countSize = count($size[$i]);
                for($l=0; $l<$countSize; $l++)
                {
                    $productColorSize = new Product_color_size();
                    $productColorSize->product_size_name = $size[$i][$l];
                    $productColorSize->count = $count[$i][$l];
                    $productColorSize->product_color_id = $color_ID;
                    $productColorSize->save();
                }
            }
            DB::commit();
            return redirect()->route('product.index')->with(['success'=>'This product updated successfully']);
        }catch (\Exception $ex){
            DB::rollBack();
            return redirect()->route('product.index')->with(['error'=>$ex]);
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
            DB::beginTransaction();
            $product = Product::find($id);
            if(!$product){
                return redirect()->route('product.index')->with(['error'=>'This product does not exist']);
            }
            foreach ($product->Color as $col)
            {
                foreach ($col->Size as $siz)
                {
                    $siz->delete();
                }
                try {
                    unlink(base_path('/public/dashboard/images/' . $col->product));
                    unlink(base_path('/public/dashboard/images/' . $col->after));
                }catch (\Exception $e){}

                $col->delete();
            }
            $product->delete();
            DB::commit();
            return redirect()->route('product.index')->with(['success'=>'This product deleted successfully']);
        }catch (\Exception $ex){
            DB::rollBack();
            return redirect()->route('product.index')->with(['error'=>'Error, Try again later']);
        }
    }
    public function validateProduct(ProductRequest $request)
    {
        return response()->json([
            'status' =>true
        ]);
    }
}
