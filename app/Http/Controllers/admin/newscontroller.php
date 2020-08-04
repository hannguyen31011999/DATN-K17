<?php

namespace App\Http\Controllers\admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\News;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use News as GlobalProduct;

class newscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listNews = News::all();
        $listUser = User::all();
        return view('admin.list-admin.ds-news.news',compact('listNews','listUser'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
             $listUser = User::all();
             return view('admin.list-admin.ds-news.actionnews',compact('listUser'));
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
            'title' => 'required|unique:news',
            'content' => 'required',
            'image'=>'image'
        ],[
            'title.required' => 'Chưa nhập tiêu đề',
            'content.required' => 'Chưa nhập nội dung',
            'title.unique'=>'Tiêu đề này đã tồn tại',
            'image.image'=>'không đúng định dạng'
        ]);

        if($request->image){     
            $file = $request->file('image');
            if($file->getClientOriginalExtension('image') == "png"||"jpg"||"PNG"||"JPG"){
               $fileName = $file->getClientOriginalName('image');
               $file->move('img/news',$fileName);
               $News = new News();
               $News->title = $request->title;
               $News->content = $request->content;
               $News->image = $fileName;
               $News->user_id_create = Auth::User()->id;
               $News->save();
               if($News->save()){
                 toast('Thêm bài viết thành công!','success','top-right'); 
               }
               return redirect()->route('list-admin.ds-news.list');
            }else{
                echo"eo phai jpg";
            }
         }else{
            $errorss = "Chưa chọn hinh ảnh !";
            $listNews = News::all();
            return view('admin.list-admin.ds-news.actionnews', compact('listNews', 'errorss'));
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
          $news = News::find($id);
         return view('admin.list-admin.ds-news.actionnews',compact('news')); 
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
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image'=>'image'
        ],[
            'title.required' => 'Chưa nhập tiêu đề',
            'content.required' => 'Chưa nhập nội dung',
            'image.image'=>'không đúng định dạng'
        ]);

        $updataNews = News::find($id);
        if($request->hasFile('image')){    
            $destinationPath = 'img/news/'.$updataNews->image;
            if(file_exists($destinationPath)){
                unlink($destinationPath);
            } 
            $file = $request->file('image');
            if($file->getClientOriginalExtension('image') == "png"||"jpg"||"PNG"||"JPG"){
               $fileName = $file->getClientOriginalName('image');
               $file->move('img/news',$fileName);
               $updataNews->title = $request->title;
               $updataNews->content = $request->content;
               $updataNews->image = $fileName;
               $updataNews->user_id_create = Auth::User()->id;
               $updataNews->save();
               if($updataNews->save()){
                toast('Cập nhật bài viết thành công!','success','top-right'); 
               }
               return redirect()->route('list-admin.ds-news.list');
            }else{
                echo"eo phai jpg";
            }
         }else{
               $updataNews->title = $request->title;
               $updataNews->content = $request->content;
               $updataNews->user_id_create = Auth::User()->id;
               $updataNews->save();
               if($updataNews->save()){
                toast('Cập nhật bài viết thành công!','success','top-right'); 
               }
               return redirect()->route('list-admin.ds-news.list');
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
        $deleteNews = News::find($id);
       
        $destinationPath = 'img/news/'.$deleteNews->image;
         if(file_exists($destinationPath)){
             unlink($destinationPath);
         }
         $deleteNews->delete();
        return redirect()->route('list-admin.ds-news.list');
    }
}
