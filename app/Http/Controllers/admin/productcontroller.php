<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\TypeProduct;
use App\Model\Comment;
use RealRashid\SweetAlert\Facades\Alert;


class productcontroller extends Controller
{
    public function index()
    {
        $listproduct = Product::all();
        $listtypeproduct = TypeProduct::all();
        return view('admin.list-admin.ds-product.product', compact('listproduct', 'listtypeproduct'));
    }
    public function create()
    {
        $listtypeproduct = TypeProduct::all();
        return view('admin.list-admin.ds-product.actionproduct', compact('listtypeproduct'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:product',
            'description' => 'required',
            'unit_price' => 'required|numeric|integer|min:0',
            'promotion_price' => 'required|numeric|min:0',
            'unit' => 'required',
            'origin' => 'required',
            'raw_material' => 'required'
        ], [
            'product_name.unique' => 'Tên sản phẩm tồn tại',
            'product_name.required' => 'Chưa nhập tên',
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
        ]);
        if ($request->promotion_price < $request->unit_price) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->getClientOriginalExtension('image') == "png" || "jpg" || "PNG" || "JPG") {
                    $fileName = $file->getClientOriginalName('image');
                    $file->move('admin/image/product', $fileName);
                    $product = new Product();
                    $product->type_product_id  = $request->type_product_id;
                    $product->product_name = $request->product_name;
                    $product->description = $request->description;
                    $product->unit_price = $request->unit_price;
                    $product->promotion_price = $request->promotion_price;
                    $product->unit = $request->unit;
                    $product->image = $fileName;
                    $product->origin = $request->origin;
                    $product->raw_material = $request->raw_material;
                    $product->save();
                    if ($product->save()) {
                        toast('Thêm thành công!', 'success', 'top-right');
                    }
                    return redirect()->route('list-admin.ds-product.list');
                } else {
                    echo "errors";
                }
            } else {
                return "errors";
            }
        } else {
            $errorss = "Giá khuyến mãi không được lớn hơn giá";
            $listtypeproduct = TypeProduct::all();
            return view('admin.list-admin.ds-product.actionproduct', compact('listtypeproduct', 'errorss'));
        }
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $listtypeproduct = TypeProduct::all();
        return view('admin.list-admin.ds-product.actionproduct', compact('product', 'listtypeproduct'));
    }
    public function update(Request $request, $id)
    {
        // alert()->success('Title','Lorem Lorem Lorem');
        $request->validate([
            'product_name' => 'required|unique:product',
            'description' => 'required',
            'unit_price' => 'required|numeric|integer|min:0',
            'promotion_price' => 'required|numeric|min:0',
            'unit' => 'required',
            'origin' => 'required',
            'raw_material' => 'required'
        ], [
            'product_name.unique' => 'Tên sản phẩm tồn tại',
            'product_name.required' => 'Chưa nhập tên',
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
        ]);

        $updataproduct = Product::find($id);
        if ($request->promotion_price < $request->unit_price) {
            if ($request->hasFile('image')) {
                $destinationPath = 'admin/image/product/'. $updataproduct->image;
                if (file_exists($destinationPath)) {
                    unlink($destinationPath);
                }
                $file = $request->file('image');
                if ($file->getClientOriginalExtension('image') == "png" || "jpg" || "PNG" || "JPG") {
                    $fileName = $file->getClientOriginalName('image');
                    $file->move('admin/image/product', $fileName);
                    if ($request->type_product_id) {
                        $updataproduct->type_product_id  = $request->type_product_id;
                    }
                    $updataproduct->product_name = $request->product_name;
                    $updataproduct->description = $request->description;
                    $updataproduct->unit_price = $request->unit_price;
                    $updataproduct->promotion_price = $request->promotion_price;
                    $updataproduct->unit = $request->unit;
                    $updataproduct->image = $fileName;
                    $updataproduct->origin = $request->origin;
                    $updataproduct->raw_material = $request->raw_material;
                    $updataproduct->save();
                    return redirect()->route('list-admin.ds-product.list');
                } else {
                    echo "eo phai jpg";
                }
            } else {
                if ($request->type_product_id) {
                    $updataproduct->type_product_id  = $request->type_product_id;
                }
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
        } else {
            $errorss = "Giá khuyến mãi không được lớn hơn giá";
            $product = Product::find($id);
            $listtypeproduct = TypeProduct::all();
            return view('admin.list-admin.ds-product.actionproduct', compact('product', 'listtypeproduct', 'errorss'));
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
        $destinationPath = 'admin/image/product/'. $deleteproduct->image;
        if (file_exists($destinationPath)) {
            unlink($destinationPath);
        }
        // dd( $deleteproduct->delete());
        return redirect()->route('list-admin.ds-product.list');
    }
}
