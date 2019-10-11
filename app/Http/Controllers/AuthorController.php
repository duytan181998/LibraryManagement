<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\TacGiaModel;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function getAll()
    {
        $data=TacGiaModel::select('id','tentacgia','website','ghichu')->get();
        return view('admin.author.allauthor',compact('data'));
    }

    public function getAdd()
    {
       return view('admin.author.addauthor');
    }

    public function postAdd(AuthorRequest $request)
    {
        $newAurth=new TacGiaModel();
        $newAurth['tentacgia']=$request['tentacgia'];
        $newAurth['website']=$request['website'];
        $newAurth['ghichu']=$request['note'];
        $newAurth->save();
        return redirect()->route('admin.author.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Thêm Tác Giả Thành Công']);
    }

    public function getDelete($id)
    {
        $author=TacGiaModel::findOrFail($id);
        $author->delete();
        return redirect()->route('admin.author.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Xóa Tác Giả Thành Công']);
    }

    public function getEdit($id)
    {
        $author=TacGiaModel::findOrFail($id);
       return view('admin.author.editauthor',compact('author'));
    }

    public function postEdit($id,Request $request)
    {
        $author=TacGiaModel::findOrFail($id);
        if ($author['tentacgia']==$request['tentacgia']){
            $author['tentacgia']=$request['tentacgia'];
            $author['website']=$request['website'];
            $author['ghichu']=$request['note'];
            $author->save();
            return redirect()->route('admin.author.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Cập Nhật Tác Giả Thành Công']);
        }else{
            return redirect()->route('admin.author.getall');
        }
    }
}
