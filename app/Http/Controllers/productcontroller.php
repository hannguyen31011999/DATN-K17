<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use product as GlobalProduct;

class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listproduct = Product::all();
        return view('admin.list-admin.ds-product.product',compact('listproduct'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             return view('admin.list-admin.ds-product.actionproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $product = new Product();
         $product->type_product_id  = $request->type_product_id;
         $product->product_name = $request->product_name;
         $product->description = $request->description;
         $product->unit_price = $request->unit_price;
         $product->unit = $request->unit;
         $product->image = $request->image;
         $product->origin = $request->origin; 
         $product->save();
         return redirect()->route('admin.ds-product.list');
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
         return view('admin.list-admin.ds-product.actionproduct',compact('product')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $updataproduct = Product::find($id);
          $updataproduct->type_product_id = $request->type_product_id;
          $updataproduct->product_name = $request->product_name;
          $updataproduct->description = $request->description;
          $updataproduct->unit_price = $request->unit_price;
          $updataproduct->unit = $request->unit;
          $updataproduct->image = $request->image;
          $updataproduct->origin = $request->origin;
          $updataproduct->save();
          return redirect()->route('admin.list-admin.ds-product.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $deleteproduct = Product::find($id);
         $deleteproduct->delete();
        return redirect()->route('admin.list-admin.ds-product.list');
    }
}
