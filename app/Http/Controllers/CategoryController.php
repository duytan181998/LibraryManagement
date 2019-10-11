<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategoryRequest;
use App\TheLoaiModel;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    public function getAll()
    {
       $data=TheLoaiModel::select('id','tentheloai')->get();
       return view('admin.category.allcategory',compact('data'));
    }

    public function getAdd()
    {
        return view('admin.category.addcategory');
    }

    public function postAdd(AddCategoryRequest $request)
    {
        $newTheLoai=new TheLoaiModel();
        $newTheLoai['tentheloai']=$request['tentheloai'];
        $newTheLoai->save();
        return redirect()->route('admin.category.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Thêm Mới Thể Loại Thành Công']);
    }

    public function getDelete($id)
    {
        $item=TheLoaiModel::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.category.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Xóa Thể Loại Thành Công']);
    }

    public function getEdit($id)
    {
        $category=TheLoaiModel::findOrFail($id);
        return view('admin.category.editcategory',compact('category'));
    }

    public function postEdit($id,Request $request)
    {
        $item=TheLoaiModel::findOrFail($id);
        if ($item['tentheloai']==$request['tentheloai']){
            return redirect()->route('admin.category.getall');
        }else{
            $item['tentheloai']=$request['tentheloai'];
            $item->save();
            return redirect()->route('admin.category.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Cập Nhật Thể Loại Thành Công']);
        }

    }
}
