<?php

namespace App\Http\Controllers;

use App\NhaXuatBanModel;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function getAll()
    {
        $data=NhaXuatBanModel::select('id','tennxb','diachi','email','nguoidaidien')->get();
        return view('admin.publisher.allpublisher',compact('data'));
    }

    public function getAdd()
    {
        return view('admin.publisher.addpublisher');
    }

    public function postAdd(Request $request)
    {
        $newPublsiher=new NhaXuatBanModel();
        $newPublsiher['tennxb']=$request['tennxb'];
        $newPublsiher['diachi']=$request['diachi'];
        $newPublsiher['email']=$request['email'];
        $newPublsiher['nguoidaidien']=$request['nguoidaidien'];
        $newPublsiher->save();
        return redirect()->route('admin.publisher.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Thêm Nhà Xuất Bản Thành Công']);
    }

    public function getDelete($id)
    {
        $publisher=NhaXuatBanModel::findOrFail($id);
        $publisher->delete();
        return redirect()->route('admin.publisher.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Xóa Nhà Xuất Bản Thành Công']);
    }

    public function getEdit($id)
    {
        $publisher=NhaXuatBanModel::findOrFail($id);
        return view('admin.publisher.editpublisher',compact('publisher'));
    }

    public function postEdit($id,Request $request)
    {
        $publisher=NhaXuatBanModel::findOrFail($id);
        $publisher['tennxb']=$request['tennxb'];
        $publisher['diachi']=$request['diachi'];
        $publisher['email']=$request['email'];
        $publisher['nguoidaidien']=$request['nguoidaidien'];
        $publisher->save();
        return redirect()->route('admin.publisher.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Xóa Nhà Xuất Bản Thành Công']);
    }
}
