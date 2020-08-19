<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\TypeProduct;
use App\Model\Comment;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
class productcontroller extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget('request');
        $listproduct = Product::all();
        $listtypeproduct = TypeProduct::all();
        return view('admin.list-admin.ds-product.product', compact('listproduct', 'listtypeproduct'));
    }
    public function create(Request $request)
    {
        $listtypeproduct = TypeProduct::all();
        return view('admin.list-admin.ds-product.actionproduct', compact('listtypeproduct'));
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),
            [
                'product_name' => 'required|unique:product|max:124',
                'type_product_id'=>'numeric',
                'description' => 'required',
                'unit_price' => 'required|numeric|integer|min:0',
                'promotion_price' => 'required|numeric|min:0',
                'unit' => 'required',
                'origin' => 'required',
                'raw_material' => 'required',
                'myFile'=>'image|required|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'product_name.unique' => 'Tên sản phẩm tồn tại',
                'product_name.required' => 'Chưa nhập tên',
                'product_name.max'=>'Tên sản phẩm quá dài',
                'description.required' => 'Chưa nhập mô tả',
                'unit_price.required' => 'Chưa nhập giá',
                'unit_price.numeric' => 'Nhập sai giá',
                'unit_price.min' => 'Giá trị không được âm',
                'unit.required' => 'Chưa nhập đơn vị',
                'origin.required' => 'Chưa nhập nguồn gốc',
                'promotion_price.required' => 'Chưa nhập giá khuyến mãi',
                'promotion_price.numeric' => 'Nhập sai giá khuyến mãi',
                'promotion_price.min' => 'Giá trị không được âm',
                'raw_material.required' => 'Chưa nhập nguyên liệu',
                'myFile.required'=>'Ảnh sản phẩm không được để trống',
                'myFile.image'=>'Ảnh không đúng định dạng',
                'myFile.mimes'=>'Không đúng loại ảnh jpeg,png,jpg,gif,svg',
                'myFile.max'=>'Kích thước ảnh quá lớn',
            ]
        );

        if($validate->passes())
        {
            if ($request->promotion_price < $request->unit_price) {
                if(request()->hasFile('myFile'))
                {
                    $file = $request->file('myFile');
                    $fileName = $file->getClientOriginalName('myFile');
                    $file->move('admin/myFile/product', $fileName);
                    $product = new Product();
                    $product->type_product_id  = $request->type_product_id;
                    $product->product_name = $request->product_name;
                    $product->description = $request->description;
                    $product->unit_price = $request->unit_price;
                    $product->promotion_price = $request->promotion_price;
                    $product->unit = $request->unit;
                    $product->myFile = $fileName;
                    $product->origin = $request->origin;
                    $product->raw_material = $request->raw_material;
                    $product->save();
                    if ($product->save()) {
                        toast('Thêm thành công!', 'success', 'top-right');
                    }
                    $request->session()->forget('request');
                    return redirect()->route('list-admin.ds-product.list');
                }
            }
            else 
            {
                $errorss = "Giá khuyến mãi không được lớn hơn giá";
                $listtypeproduct = TypeProduct::all();
                return view('admin.list-admin.ds-product.actionproduct', compact('listtypeproduct', 'errorss'));
            }
        }
        else
        {
            return back()->withErrors($validate)->withInput();
        }

        
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $listtypeproduct = TypeProduct::all();
        return view('admin.list-admin.ds-product.update_product', compact('product','listtypeproduct'));
    }
    public function update(Request $request, $id)
    {
        // alert()->success('Title','Lorem Lorem Lorem');
        $validate = Validator::make($request->all(),
            [
                'product_name' => 'required|unique:product|max:124',
                'type_product_id'=>'numeric',
                'description' => 'required',
                'unit_price' => 'required|numeric|integer|min:0',
                'promotion_price' => 'required|numeric|min:0',
                'unit' => 'required',
                'origin' => 'required',
                'raw_material' => 'required',
                'myFile'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'product_name.unique' => 'Tên sản phẩm tồn tại',
                'product_name.required' => 'Chưa nhập tên',
                'product_name.max'=>'Tên sản phẩm quá dài',
                'description.required' => 'Chưa nhập mô tả',
                'unit_price.required' => 'Chưa nhập giá',
                'unit_price.numeric' => 'Nhập sai giá',
                'unit_price.min' => 'Giá trị không được âm',
                'unit.required' => 'Chưa nhập đơn vị',
                'origin.required' => 'Chưa nhập nguồn gốc',
                'promotion_price.required' => 'Chưa nhập giá khuyến mãi',
                'promotion_price.numeric' => 'Nhập sai giá khuyến mãi',
                'promotion_price.min' => 'Giá trị không được âm',
                'raw_material.required' => 'Chưa nhập nguyên liệu',
                'myFile.image'=>'Ảnh không đúng định dạng',
                'myFile.mimes'=>'Không đúng loại ảnh jpeg,png,jpg,gif,svg',
                'myFile.max'=>'Kích thước ảnh quá lớn',
            ]
        );

        if($validate->passes())
        {
            $updataproduct = Product::find($id);
            if ($request->promotion_price < $request->unit_price) 
            {
                $updataproduct->type_product_id  = $request->type_product_id;
                $updataproduct->product_name = $request->product_name;
                $updataproduct->description = $request->description;
                $updataproduct->unit_price = $request->unit_price;
                $updataproduct->promotion_price = $request->promotion_price;
                $updataproduct->qty = ($request->qty!=null) ? $request->qty : 0;
                $updataproduct->unit = $request->unit;
                $updataproduct->origin = $request->origin;
                $updataproduct->raw_material = $request->raw_material;
                if ($request->hasFile('myFile')) {
                    $destinationPath = 'admin/myFile/product/'. $updataproduct->myFile;
                    if (file_exists($destinationPath)) {
                        unlink($destinationPath);
                    }
                    $file = $request->file('myFile');
                    $fileName = $file->getClientOriginalName('myFile');
                    $file->move('admin/myFile/product', $fileName);
                   
                    $updataproduct->myFile = $fileName;   
                }
                $updataproduct->save();
                return redirect()->route('list-admin.ds-product.list');
            }
            else
            {
                $errorss = "Giá khuyến mãi không được lớn hơn giá";
                $product = Product::find($id);
                $listtypeproduct = TypeProduct::all();
                return view('admin.list-admin.ds-product.update_product', compact('product', 'listtypeproduct', 'errorss'));
            }
        }
        else
        {
            return back()->withErrors($validate)->withInput();
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
        $deleteproduct->delete();
        $destinationPath = 'admin/myFile/product/'. $deleteproduct->myFile;
        if (file_exists($destinationPath)) {
            unlink($destinationPath);
        }
        // dd( $deleteproduct->delete());
        return redirect()->route('list-admin.ds-product.list');
    }
}
