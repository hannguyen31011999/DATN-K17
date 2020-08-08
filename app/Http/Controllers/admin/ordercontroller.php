<?php

namespace App\Http\Controllers\admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Order;
use App\Model\Product;
use App\Model\User;
use App\Model\Member;
use Order as GlobalProduct;

class ordercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listOrder = Order::where('deleted_at',null)
                        ->orderBy('created_at','desc')
                        ->paginate(10);
        $listProduct = Product::all();
        $listUser = User::all();
        if($request->ajax())
        {
            if($request->selectedlist!=null||$request->selectoption!=null)
            {
                $status = $request->selectedlist==null ? $request->selectoption : $request->selectedlist;
                if($status==0)
                {
                    $listOrder = Order::where([
                            ['status',$status],
                            ['deleted_at',null]
                        ])->orderBy('created_at','desc')->paginate(10);
                    return view('admin.list-admin.ds-order.template.content_order',compact('listOrder','listProduct','listUser'));
                }
                else if($status==1)
                {
                    $listOrder = Order::where([
                            ['status',$status],
                            ['deleted_at',null]
                        ])->orderBy('created_at','desc')->paginate(10);
                    return view('admin.list-admin.ds-order.template.content_order',compact('listOrder','listProduct','listUser'));
                }
                else if($status==2)
                {
                    $listOrder = Order::where([
                            ['status',$status],
                            ['deleted_at',null]
                        ])->orderBy('created_at','desc')->paginate(10);
                    return view('admin.list-admin.ds-order.template.content_order',compact('listOrder','listProduct','listUser'));
                }
                else
                {
                    return view('admin.list-admin.ds-order.template.content_order',compact('listOrder','listProduct','listUser'));
                }
            }
            else
            {
                if(!empty($request->keyword))
                {
                    if($request->keyword!="")
                    {
                        $listOrder = Order::where('id','=',(int)$request->keyword)
                                ->orWhere('phone','LIKE', $request->keyword.'%')
                                ->orWhere('name','LIKE', $request->keyword.'%')
                                ->paginate(10);
                        return view('admin.list-admin.ds-order.template.content_order',compact('listOrder','listProduct','listUser'));
                    }
                    return view('admin.list-admin.ds-order.template.content_order',compact('listOrder','listProduct','listUser'));
                }
                return view('admin.list-admin.ds-order.template.content_order',compact('listOrder','listProduct','listUser'));
            }
        }
        return view('admin.list-admin.ds-order.order',compact('listOrder','listProduct','listUser'));       
    }
    public function indexDetail($id)
    {
        $listDetail = Order::find($id)->OrderDetails()->get();
        $listProduct = Product::all();
        return view('admin.list-admin.ds-order.orderdetail',compact('listDetail','listProduct'));       
    }
    public function update(Request $request)
	{
		if($request->ajax()){
			try{
                $order = Order::find($request->id);
                $order->update(['status'=>$request->selected]);
                // if($request->selected==2)
                // {
                //     $member = Member::where('user_id',$order->customer_id)->get();
                //     if(empty($member)){
                //         Member::create([
                //             'user_id'=>$order->customer_id,
                //             'point'=>1,
                //             'discount'=>0
                //         ]);
                //         return "Cập nhật trạng thái thành công";
                //     }
                //     else
                //     {
                //         $user = User::find($order->customer_id);
                //         $user->Members()->update(['point'=>$user->Members()->point++]);
                //         return "Cập nhật trạng thái thành công";
                //     }
                // }
                return "Cập nhật trạng thái thành công";
			}catch(Exception $e){
				return response()->json(['data'=>'Cập nhật thông tin thất bại'],500);
			}
		}
	}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * 
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
