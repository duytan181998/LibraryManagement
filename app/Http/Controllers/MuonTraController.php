<?php

namespace App\Http\Controllers;

use App\CTMuonTraModel;
use App\DocGiaModel;
use App\MuonTraModel;
use App\SachModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MuonTraController extends Controller
{
    public function getAll()
    {
        $data=MuonTraModel::all();
        return view('admin.muontra.allmuontra',compact('data'));
    }

    public function getAdd()
    {
        $book=SachModel::where('quantity','>',0)->select('id','tensach')->get();
        $reader=DocGiaModel::sothe()->get();
        return view('admin.muontra.addmuontra',compact('book','reader'));
    }

    public function postAdd(Request $request)
    {
        $newMuon=new MuonTraModel();
        $newCTMuon=new CTMuonTraModel();
        $newMuon['sothe']=$request['sothe'];
        $newMuon['ngaymuon']=Carbon::now();
        $newMuon['trangthai']=0;
        $newMuon->save();
        $newCTMuon['mamuontra']=$newMuon['id'];
        $newCTMuon['masach']=$request['masach'];
        $newCTMuon['ngaytra']=$request['ngaytra'];
        $newCTMuon['ghichu']=$request['ghichu'];

        if ($newCTMuon->save()){
            $book=SachModel::findOrFail($newCTMuon['masach']);
            $book['quantity']-=1;
            $book->save();
            return redirect()->route('admin.muontra.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Thêm Danh Sách Mượn Thành Công']);
        }else{
           $newMuon->delete();
        }
    }
    public function getDelete($id)
    {
        $muon=MuonTraModel::findOrFail($id);
        $idmuon=$muon['id'];
        $ctMuon=CTMuonTraModel::where('mamuontra',$idmuon);
        $muon->delete();
        $ctMuon->delete();
        return redirect()->route('admin.muontra.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Xóa Danh Sách Mượn Thành Công']);

    }
    public function getEdit($id)
    {
        $muontra=MuonTraModel::findOrFail($id);
        $book=SachModel::select('id','tensach')->get();
        $reader=DocGiaModel::sothe()->get();
        return view('admin.muontra.editmuontra',compact('muontra','book','reader'));
    }

    public function postEdit($id,Request $request)
    {
        $muon=MuonTraModel::findOrFail($id);
        $muon['sothe']=$request['sothe'];
        $idmuon=$muon['id'];
        $muon->save();
        $ctMuon=CTMuonTraModel::where('mamuontra',$idmuon)->first();
        $ctMuon['masach']=$request['masach'];
        $ctMuon['ngaytra']=$request['ngaytra'];
        $ctMuon['ghichu']=$request['ghichu'];
        $ctMuon->save();
        return redirect()->route('admin.muontra.getall')->with(['flash_status'=>'success','flash_title'=>'Thành Công','flash_mess'=>'Thêm Danh Sách Mượn Thành Công']);
    }

    public function getChangeStatus($id)
    {
        $muon=MuonTraModel::findOrFail($id);

        $book=SachModel::findOrFail($muon['ctmuontra']['masach']);
        $book['quantity']+=1;
        $book->save();
        $muon['trangthai']=1;
        $muon->save();
        return redirect()->route('admin.muontra.getall');
    }
}
