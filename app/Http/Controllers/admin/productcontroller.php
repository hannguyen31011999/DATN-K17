<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\TypeProduct;
use RealRashid\SweetAlert\Facades\Alert;


class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        alert()->success('Title','Lorem Lorem Lorem');
        toast('Your Post as been submited!','success','top-right');
        $listproduct = Product::all();
        $listtypeproduct = TypeProduct::all();
        return view('admin.list-admin.ds-product.product', compact('listproduct', 'listtypeproduct'));
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listtypeproduct = TypeProduct::all();
        return view('admin.list-admin.ds-product.actionproduct', compact('listtypeproduct'));
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
            'product_name' => 'required|unique:product',
            'description' => 'required',
            'unit_price' => 'required|numeric',
            'promotion_price' => 'required|numeric',
            'unit' => 'required',
            'origin' => 'required',
            'raw_material' => 'required'
        ], [
            'product_name.unique' => 'Tên sản phẩm tồn tại',
            'product_name.required' => 'Chưa nhập tên',
            'description.required' => 'Chưa nhập mô tả',
            'unit_price.required' => 'Chưa nhập giá',
            'unit_price.numeric' => 'Nhập sai giá',
            'unit.required' => 'Chưa nhập đơn vị',
            'origin.required' => 'Chưa nhập nguồn gốc',
            'promotion_price.required' => 'Chưa nhập giá khuyến mãi',
            'promotion_price.numeric' => 'Nhập sai giá khuyến mãi',
            'raw_material.required' => 'Chưa nhập nguyên liệu',

        ]);
        if ($request->promotion_price < $request->unit_price) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->getClientOriginalExtension('image') == "png" || "jpg" || "PNG" || "JPG") {
                    $fileName = $file->getClientOriginalName('image');
                    $file->move('img/product', $fileName);
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
                    return redirect()->route('list-admin.ds-product.list')->with(['flash_message'=>'Thêm thành công !']);
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
        return view('admin.list-admin.ds-product.actionproduct', compact('product', 'listtypeproduct'));
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
        alert()->success('Title','Lorem Lorem Lorem');
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'unit_price' => 'required|numeric',
            'promotion_price' => 'required|numeric',
            'unit' => 'required',
            'origin' => 'required',
            'raw_material' => 'required'
        ], [
            'product_name.required' => 'Chưa nhập tên',
            'description.required' => 'Chưa nhập mô tả',
            'unit_price.required' => 'Chưa nhập giá',
            'unit_price.numeric' => 'Nhập sai giá',
            'unit.required' => 'Chưa nhập đơn vị',
            'origin.required' => 'Chưa nhập nguồn gốc',
            'promotion_price.required' => 'Chưa nhập giá khuyến mãi',
            'promotion_price.numeric' => 'Nhập sai giá khuyến mãi',
            'raw_material.required' => 'Chưa nhập nguyên liệu',
        ]);

        $updataproduct = Product::find($id);
        if ($request->promotion_price < $request->unit_price) {
            if ($request->hasFile('image')) {
                $destinationPath = 'img/product/' . $updataproduct->image;
                if (file_exists($destinationPath)) {
                    unlink($destinationPath);
                }
                $file = $request->file('image');
                if ($file->getClientOriginalExtension('image') == "png" || "jpg" || "PNG" || "JPG") {
                    $fileName = $file->getClientOriginalName('image');
                    $file->move('img/product', $fileName);
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
        $destinationPath = 'img/typeproduct/' . $deleteproduct->image;
        if (file_exists($destinationPath)) {
            unlink($destinationPath);
        }
        $deleteproduct->delete();
        return redirect()->route('list-admin.ds-product.list');
    }
}
