<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Comment;
use App\Model\User;
use App\Model\Product;
use PhpParser\Node\Expr\Cast\String_;

class commentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listComment = Comment::where('deleted_at',null)
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
            $listComment = Comment::where([
                    ['status',$status],
                    ['deleted_at',null]
                ])->orderBy('created_at','desc')->paginate(10);
            return view('admin.list-admin.ds-comment.template.content_comment',compact('listComment','listProduct','listUser'));
        }
        else if($status==1)
        {
            $listComment = Comment::where([
                    ['status',$status]
                ])->paginate(10);
            return view('admin.list-admin.ds-comment.template.content_comment',compact('listComment','listProduct','listUser'));
        }
        else
        {
            return view('admin.list-admin.ds-comment.template.content_comment',compact('listComment','listProduct','listUser'));
        }
        }
        else
        {
        if(!empty($request->keyword))
        {
            if($request->keyword!="")
            {
                //    $listComment= DB::table('user' ) //Lấy bảng user
                   
                //      
                //      ->orWhere('product_name','LIKE',$request->keyword.'%')
                //      ->orWhere('content','LIKE', $request->keyword.'%')
                //      ->orWhere('name','LIKE', $request->keyword.'%')
                //      ->paginate(10);
                  
                $listComment = Comment::where('id','=',(int)$request->keyword)
                        // ->join('comment', 'user.id', '=', 'comment.user_id')
                        // ->join('product', 'product.id', '=', 'comment.product_id')
                        ->orWhere('content','LIKE', $request->keyword.'%')
                        // ->orWhere('email','LIKE', $request->keyword.'%')
                        ->paginate(10);
                        
                return view('admin.list-admin.ds-comment.template.content_comment',compact('listComment','listProduct','listUser'));
            }
            return view('admin.list-admin.ds-comment.template.content_comment',compact('listComment','listProduct','listUser'));
        }
        return view('admin.list-admin.ds-comment.template.content_comment',compact('listComment','listProduct','listUser'));
        }
        }
        return view('admin.list-admin.ds-comment.comment',compact('listComment','listProduct','listUser'));       
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
        {   
    //     dd($id);
        $status = comment::find($id)->status;
        // dd($status);
        if($status == 1)
        {
            DB::statement("UPDATE comment SET status = 0 WHERE id=$id ");
        }
        elseif($status==0)
        {
            DB::statement("UPDATE comment SET status = 1 WHERE id=$id ");
        }
        return redirect()->route('list-admin.ds-comment.list');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //      $deleteComment = Comment::find($id);
    //      $deleteComment->delete();
    //     return redirect()->route('list-admin.ds-comment.list');
    // }
}
