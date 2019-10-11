<?php

namespace App\Http\Controllers;

use App\NhaXuatBanModel;
use App\SachModel;
use App\TacGiaModel;
use App\TheLoaiModel;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getAll()
    {
        $data=SachModel::all();
        return view('admin.book.allbook',compact('data'));
    }

    public function getAdd()
    {
        $tacgia=TacGiaModel::select('id','tentacgia')->get();
        $theloai=TheLoaiModel::select('id','tentheloai')->get();
        $nxb=NhaXuatBanModel::select('id','tennxb')->get();
        return view('admin.book.addbook',compact('tacgia','theloai','nxb'));
    }

    public function postAdd(Request $request)
    {
        $newBook=new SachModel();
        $image="";
        if ($request->hasFile('anhbia')){
            $file=$request->file('anhbia');
            $image=$file->getClientOriginalName();
            $file->move('assets/admin/images/',$image);
        }
        $newBook['quantity']=$request['quantity'];
        $newBook['tensach']=$request['tensach'];
        $newBook['matacgia']=$request['tacgia'];
        $newBook['matheloai']=$request['theloai'];
        $newBook['manxb']=$request['nhaxuatban'];
        $newBook['namxb']=$request['namxb'];
        $newBook['anhbia']=$image;
        $newBook->save();
        return redirect()->route('admin.book.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Thêm Tác Giả Thành Công']);
    }

    public function getDelete($id)
    {
        $book=SachModel::findOrFail($id);
        $book->delete();
        return redirect()->route('admin.book.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Xóa Tác Giả Thành Công']);
    }

    public function getEdit($id)
    {
        $tacgia=TacGiaModel::select('id','tentacgia')->get();
        $theloai=TheLoaiModel::select('id','tentheloai')->get();
        $nxb=NhaXuatBanModel::select('id','tennxb')->get();
        $book=SachModel::findOrFail($id);
        return view('admin.book.editbook',compact('book','tacgia','theloai','nxb'));
    }

    public function postEdit($id,Request $request)
    {
        $book=SachModel::findOrFail($id);
        $book['tensach']=$request['tensach'];
        $book['quantity']=$request['quantity'];
        $book['matacgia']=$request['tacgia'];
        $book['matheloai']=$request['theloai'];
        $book['manxb']=$request['nhaxuatban'];
        $book['namxb']=$request['namxb'];
        $book->save();
        return redirect()->route('admin.book.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Cập Nhật Tác Giả Thành Công']);
    }

    public function getDeleteImage(Request $request)
    {
        if ($request->ajax()){
            $id_book=$request['id_book'];
            $book=SachModel::findOrFail($id_book);
            $book['anhbia']="";
            $book->save();
            return "OK";
        }
    }
    public function getAddImage(Request $request)
    {
        $id_book=$request['id_book'];
        $book=SachModel::findOrFail($id_book);
        $name_img=$request['name_img'];
        $book['anhbia']=$name_img;
        if ($request->hasFile('anhbia')){
        $file=$request->file('anhbia');
        $image=$file->getClientOriginalName();
        $file->move('assets/admin/images/',$image);
    }
        $book->save();
        return response()->json(['image'=>$name_img]);
    }
}
