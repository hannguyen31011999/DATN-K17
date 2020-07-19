<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Member;
use App\Model\User;

class membercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listMember = Member::all();
        $listUser = User::all();
        return view('admin.list-admin.ds-member.member', compact('listMember', 'listUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(Request $request)
    // {

    //          return view('admin.list-admin.ds-Member.actionMember');
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
    //            $file->move('img/Member',$fileName);
    //            $Member = new Member();
    //            $Member->type_name = $request->type_name;
    //            $Member->description = $request->description;
    //            $Member->image = $fileName;
    //            $Member->save();
    //            return redirect()->route('list-admin.ds-Member.list');
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
    // public function edit($name)
    // {   
    //     echo $name;
        
    // }

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
            'discount' => 'required|numeric|unique:member',
        ],[
            'discount.required' => 'Chưa nhập dữ liệu',
            'discount.numeric'=>'nhập không đúng',
            'discount.unique'=>'Đã tồn tại'
        ]);
            $updataMember = Member::find($id);
            $updataMember->discount = $request->discount;
            $updataMember->save();
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //      $deleteMember = Member::find($id);
    //      $deleteMember->delete();
    //     return redirect()->route('list-admin.ds-Member.list');
    // }
}
