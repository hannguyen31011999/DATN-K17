<?php

namespace App\Http\Controllers\admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\User;
use User as GlobalProduct;

class usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listUser = User::where('role',1)->get();
        return view('admin.list-admin.ds-user.user',compact('listUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(Request $request)
    // {

    //          return view('admin.list-admin.ds-User.actionUser');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
        
    //     $request->validate([
    //         'type_name' => 'required',
    //         'description' => 'required',
    //     ],[
    //         'type_name.required' => 'chưa nhập loại sản phẩm',
    //         'description.required' => 'chưa nhập mô tả',
    //     ]);

    //     if($request->hasFile('image')){     
    //         $file = $request->file('image');
    //         if($file->getClientOriginalExtension('image') == "png"||"jpg"||"PNG"||"JPG"){
    //            $fileName = $file->getClientOriginalName('image');
    //            $file->move('img/User',$fileName);
    //            $User = new User();
    //            $User->type_name = $request->type_name;
    //            $User->description = $request->description;
    //            $User->image = $fileName;
    //            $User->save();
    //            return redirect()->route('list-admin.ds-User.list');
    //         }else{
    //             echo"eo phai jpg";
    //         }
    //      }else{
    //         return '@@@@@@@';
    //      }
    // }

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
        $status = User::find($id)->status;
        if($status == 1)
        {
            DB::statement("UPDATE user SET status = 0 WHERE id=$id ");
        }
        elseif($status==0)
        {
            DB::statement("UPDATE user SET status = 1 WHERE id=$id ");
        }
        return redirect()->route('list-admin.ds-user.list');
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
    //     $updataUser = User::find($id);
    //     if($request->hasFile('image')){    
    //         $destinationPath = 'img/User/'.$updataUser->image;
    //         if(file_exists($destinationPath)){
    //             unlink($destinationPath);
    //         } 
    //         $file = $request->file('image');
    //         if($file->getClientOriginalExtension('image') == "png"||"jpg"||"PNG"||"JPG"){
    //            $fileName = $file->getClientOriginalName('image');
    //            $file->move('img/User',$fileName);
    //            $updataUser->type_name = $request->type_name;
    //            $updataUser->description = $request->description;
    //            $updataUser->image = $fileName;
    //            $updataUser->save();
    //            return redirect()->route('list-admin.ds-User.list');
    //         }else{
    //             echo"eo phai jpg";
    //         }
    //      }else{
    //         $updataUser->type_name = $request->type_name;
    //         $updataUser->description = $request->description;
    //         $updataUser->save();
    //           return redirect()->route('list-admin.ds-User.list');
    //      }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $deleteUser = User::find($id);
         $deleteUser->delete();
        return redirect()->route('list-admin.ds-user.list');
    }
}
