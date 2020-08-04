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
    public function index()
    {
        $listComment = Comment::all();
        $listUser = User::all();
        $listProduct = Product::all();
        return view('admin.list-admin.ds-comment.comment', compact('listComment', 'listUser', 'listProduct'));
    }

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
