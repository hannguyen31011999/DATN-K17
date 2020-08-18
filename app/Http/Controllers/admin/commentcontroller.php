<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Comment;
use App\Model\User;
use App\Model\Product;

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
        // vd
    


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
                //    $list= DB::table('user' ) //Lấy bảng user
                //      ->join('comment', 'user.id', '=', 'comment.user_id')
                //      ->join('product', 'product.id', '=', 'comment.product_id')
                //      ->Where('product_name','LIKE',$request->keyword.'%')
                //      ->paginate(10);
                //      dd( $list);
                $listComment = Comment::where('id','=',(int)$request->keyword)
                        ->orWhere('content','LIKE', $request->keyword.'%')
                        ->orWhere('name','LIKE', $request->keyword.'%')
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
    //     if($request->key_st){
    //         // $result= $result ->where('status',(int)$request->key_word_content) ;
    //        dd($request->key_word_content);
    //      }
    //     // $listComment = Comment::all();
      
    //     $listUser = User::all();
    //     $listProduct = Product::all();
    //     $result =DB::table('comment') ;
    //     if($request->key_word){
    //         $result =DB::table('comment') ;
    //         $result= $result ->where('content', 'like', '%' .$request->key_word. '%' ) ;
     
    //      }
    //     //  if($request->key_word_products){
    //     //     $result =DB::table('comment') 
    //     //     ->join('user', 'user.id', '=', 'comment.user_id' ) 
    //     //     ->join('product', 'product.id', '=', 'comment.product_id' );
    //     //     $result= $result ->where('product_name', 'like', '%' .$request->key_word_products. '%' ) ;
    //     //  }
    //     //  if($request->key_word_content){
    //     //     $result =DB::table('comment') ;
    //     //     $result= $result ->where('content', 'like', '%' .$request->key_word_content. '%' ) ;
    //     //  }
      
    //      $listComment=$result->paginate(10);
    //     return view('admin.list-admin.ds-comment.comment', compact('listComment', 'listUser', 'listProduct'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $status = comment::find($id)->status;
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
