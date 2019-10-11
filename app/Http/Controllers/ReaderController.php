<?php

namespace App\Http\Controllers;

use App\DocGiaModel;
use App\TheThuVienModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class ReaderController extends Controller
{
    public function getAll()
    {
        $data=DocGiaModel::all();
        return view('admin.reader.allreader',compact('data'));
    }

    public function getAdd()
    {
        return view('admin.reader.addreader');
    }

    public function postAdd(Request $request)
    {
        $newReader=new DocGiaModel();
        $newReader['tendocgia']=$request['tendocgia'];
        $newReader['diachi']=$request['diachi'];
        $newReader['sodienthoai']=$request['sodienthoai'];
        $newReader['sothe']=0;
        $newReader['ngaytao']=Carbon::now();
        $newReader->save();
        return redirect()->route('admin.reader.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Thêm Nhà Xuất Bản Thành Công']);
    }

    public function getDelete($id)
    {
        $reader=DocGiaModel::findOrFail($id);
        if ($reader['sothe']==null){
            $reader->delete();
        }else{
            $libarycard=TheThuVienModel::findOrFail($reader['sothe']);
            $libarycard->delete();
        }
        return redirect()->route('admin.reader.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Xóa Độc Giả Thành Công']);
    }

    public function getEdit($id)
    {
        $reader=DocGiaModel::findOrFail($id);

        return view('admin.reader.editreader',compact('reader'));
    }

    public function postEdit($id,Request $request)
    {
        $reader=DocGiaModel::findOrFail($id);
        $lbcard=TheThuVienModel::findOrFail($reader['sothe']);
        $reader['tendocgia']=$request['tendocgia'];
        $reader['diachi']=$request['diachi'];
        $reader['sodienthoai']=$request['sodienthoai'];
        $lbcard['ngaybatdau']=$request['ngaybatdau'];
        $lbcard['ngayhethan']=$request['ngayhethan'];
        $lbcard['ghichu']=$request['ghichu'];
        $lbcard->save();
        $reader->save();
        return redirect()->route('admin.reader.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Cập Nhật Độc Giả Thành Công']);
    }

    public function getCreateLibaryCard($id)
    {
        $reader=DocGiaModel::findOrFail($id);
        return view('admin.libarycard.create',compact('readers','reader'));
    }

    public function postCreatelibaryCard($id,Request $request)
    {
        $newLbCard=new TheThuVienModel();
        $reader=DocGiaModel::findOrFail($id);
        $newLbCard['ngaybatdau']=Carbon::now();
        $newLbCard['ngayhethan']=$request['ngayhethan'];
        $newLbCard['ghichu']=$request['ghichu'];
        $newLbCard->save();
        $reader['sothe']=$newLbCard['id'];
        $reader->save();
        return redirect()->route('admin.reader.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Tạo Thẻ Thư Viện Thành Công']);
    }
}
