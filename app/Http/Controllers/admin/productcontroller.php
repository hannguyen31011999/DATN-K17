<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\TypeProduct;


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
        $listtypeproduct = TypeProduct::all();
        return view('admin.list-admin.ds-product.product',compact('listproduct','listtypeproduct'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
             $listtypeproduct = TypeProduct::all();
           
             return view('admin.list-admin.ds-product.actionproduct',compact('listtypeproduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'unit_price' => 'required',
            'promotion_price' => 'required',
            'unit' => 'required',
            'origin' => 'required',
            'raw_material'=>'required'
        ],[
            'product_name.required' => 'chưa nhập dữ liệu ',
            'description.required' => 'chưa nhập dữ liệu ',
            'unit_price.required' => 'chưa nhập dữ liệu',
            'unit.required' => 'chưa nhập dữ liệu ',
            'origin.required' => 'chưa nhập dữ liệu ',
            'promotion_price.required' => 'chưa nhập dữ liệu ',
            'raw_material.required'=>'chưa nhập dữ liệu '
        ]);
    
        if($request->hasFile('image')){     
            $file = $request->file('image');
            if($file->getClientOriginalExtension('image') == "png"||"jpg"||"PNG"||"JPG"){
               $fileName = $file->getClientOriginalName('image');
               $file->move('img/product',$fileName);
               $product = new Product();
               $product->type_product_id  = $request->type_product_id;
               $product->product_name = $request->product_name;
               $product->description = $request->description;
               $product->unit_price = $request->unit_price;
               $product->promotion_price = $request->promotion_price;
               $product->unit = $request->unit;
               $product->image = $request->$fileName;
               $product->origin = $request->origin; 
               $product->raw_material = $request->raw_material; 
               $product->save();
               return redirect()->route('admin.ds-product.list');
            }else{
                echo"eo phai jpg";
            }
         }else{
            return '@@@@@@@';
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
          $listtypeproduct = TypeProduct::all();
         return view('admin.list-admin.ds-product.actionproduct',compact('product','listtypeproduct')); 
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
          if($request->hasFile('image')){    
              $destinationPath = 'img/product/'.$updataproduct->image;
              if(file_exists($destinationPath)){
                  unlink($destinationPath);
              } 
              $file = $request->file('image');
              if($file->getClientOriginalExtension('image') == "png"||"jpg"||"PNG"||"JPG"){
                 $fileName = $file->getClientOriginalName('image');
                 $file->move('img/product',$fileName);
                 $updataproduct->type_product_id  = $request->type_product_id;
                 $updataproduct->product_name = $request->product_name;
                 $updataproduct->description = $request->description;
                 $updataproduct->unit_price = $request->unit_price;
                 $updataproduct->promotion_price = $request->promotion_price;
                 $updataproduct->unit = $request->unit;
                 $updataproduct->image = $fileName;
                 $updataproduct->origin = $request->origin; 
                 $updataproduct->raw_material = $request->raw_material; 
                 $updataproduct->save();
                 return redirect()->route('admin.list-admin.ds-product.list');
              }else{
                  echo"eo phai jpg";
              }
           }else{
                $updataproduct->type_product_id  = $request->type_product_id;
                $updataproduct->product_name = $request->product_name;
                $updataproduct->description = $request->description;
                $updataproduct->unit_price = $request->unit_price;
                $updataproduct->promotion_price = $request->promotion_price;
                $updataproduct->unit = $request->unit;
                $updataproduct->origin = $request->origin; 
                $updataproduct->raw_material = $request->raw_material;
                $updataproduct->save();
                return redirect()->route('list-admin.ds-product.list');
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
        $deleteproduct = Product::find($id);
        $destinationPath = 'img/typeproduct/'.$deleteproduct->image;
        if(file_exists($destinationPath)){
            unlink($destinationPath);
        }
        $deleteproduct->delete();
       return redirect()->route('list-admin.ds-product.list');
    }
}
