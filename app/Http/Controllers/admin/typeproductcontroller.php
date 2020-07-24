<?php

namespace App\Http\Controllers\admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TypeProduct;
use typeproduct as GlobalProduct;

class typeproductcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listtypeproduct = TypeProduct::all();
        return view('admin.list-admin.ds-typeproduct.typeproduct',compact('listtypeproduct'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
             return view('admin.list-admin.ds-typeproduct.actiontypeproduct')->with(['flash_message'=>'Thêm thành công !']);;
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
            'type_name' => 'required|unique:type_product',
            'description' => 'required',
            'image'=>'image'
        ],[
            'type_name.required' => 'chưa nhập loại sản phẩm',
            'description.required' => 'chưa nhập mô tả',
            'type_name.unique'=>'Loại này đã tồn tại',
            'image.image'=>'không đúng định dạng'
        ]);

        if($request->hasFile('image')){     
            $file = $request->file('image');
            if($file->getClientOriginalExtension('image') == "png"||"jpg"||"PNG"||"JPG"){
               $fileName = $file->getClientOriginalName('image');
               $file->move('img/typeproduct',$fileName);
               $typeproduct = new TypeProduct();
               $typeproduct->type_name = $request->type_name;
               $typeproduct->description = $request->description;
               $typeproduct->image = $fileName;
               $typeproduct->save();
               if($typeproduct->save()){
                toast('Thêm thành công!','success','top-right'); 
               }
               return redirect()->route('list-admin.ds-typeproduct.list');
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
          $typeproduct = TypeProduct::find($id);
          return view('admin.list-admin.ds-typeproduct.actiontypeproduct',compact('typeproduct')); 
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
        $request->validate([
            'type_name' => 'required',
            'description' => 'required',
            'image'=>'image'
        ],[
            'type_name.required' => 'Chưa nhập loại sản phẩm',
            'description.required' => 'Chưa nhập mô tả',
            // 'type_name.unique'=>'Loại này đã tồn tại',
            'image.image'=>'không đúng định dạng'
        ]);
        $updatatypeproduct = TypeProduct::find($id);
        if($request->hasFile('image')){    
            $destinationPath = 'img/typeproduct/'.$updatatypeproduct->image;
            if(file_exists($destinationPath)){
                unlink($destinationPath);
            } 
            $file = $request->file('image');
            if($file->getClientOriginalExtension('image') == "png"||"jpg"||"PNG"||"JPG"){
               $fileName = $file->getClientOriginalName('image');
               $file->move('img/typeproduct',$fileName);
               $updatatypeproduct->type_name = $request->type_name;
               $updatatypeproduct->description = $request->description;
               $updatatypeproduct->image = $fileName;
               $updatatypeproduct->save();
               if($updatatypeproduct->save()){
                toast('Cập nhật thành công!','success','top-right'); 
               }
               return redirect()->route('list-admin.ds-typeproduct.list');
            }else{
                echo"eo phai jpg";
            }
         }else{
            $updatatypeproduct->type_name = $request->type_name;
            $updatatypeproduct->description = $request->description;
            $updatatypeproduct->save();
            if($updatatypeproduct->save()){
                toast('Cập nhật thành công!','success','top-right'); 
            }
              return redirect()->route('list-admin.ds-typeproduct.list');
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
         $deletetypeproduct = TypeProduct::find($id);
         $destinationPath = 'img/typeproduct/'.$deletetypeproduct->image;
         if(file_exists($destinationPath)){
             unlink($destinationPath);
         }
         $deletetypeproduct->delete();
        return redirect()->route('list-admin.ds-typeproduct.list');
    }
}
