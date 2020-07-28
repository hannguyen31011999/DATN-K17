<?php

namespace App\Http\Controllers\admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Order;
use App\Model\Product;
use App\Model\User;
use Order as GlobalProduct;

class ordercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listOrder = Order::all();
        $listProduct = Product::all();
        $listUser = User::all();
        return view('admin.list-admin.ds-order.order',compact('listOrder','listProduct','listUser'));       
    }
    public function indexDetail($id)
    {
        $listDetail = Order::find($id)->OrderDetails;
        $listProduct = Product::all();
        return view('admin.list-admin.ds-order.orderdetail',compact('listDetail','listProduct'));       
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $deleteOrder = Order::find($id);
         $deleteOrder->delete();
        return redirect()->route('list-admin.ds-order.list');
    }
}
