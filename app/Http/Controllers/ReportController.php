<?php

namespace App\Http\Controllers;

use App\CTMuonTraModel;
use App\DocGiaModel;
use App\MuonTraModel;
use App\SachModel;
use Illuminate\Http\Request;
use PDF;
use Session;
class ReportController extends Controller
{

    function index(Request $request)
    {
        if (!is_null($request['todate'])&&!is_null($request['fordate'])){
            Session::put('todate',$request['todate']);
            Session::put('fordate',$request['fordate']);
            $borrow_data =$this->get_borrow($request['fordate'],$request['todate']);
            return view('admin.report.index',compact('borrow_data'));
        }else{
            return redirect()->back();
        }

    }
    public function get_borrow($fordate,$todate)
    {
        $borrow_data = MuonTraModel::where('ngaymuon','>=',$fordate)->where('ngaymuon','<=',$todate)->get();
        return $borrow_data;
    }
    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_borrow_data_to_html());
        return $pdf->stream();
    }

    function convert_borrow_data_to_html()
    {
        $borrows = $this->get_borrow(Session::get('fordate'),Session::get('todate'));
        $output = '
        <h2 align="center">Library Management System</h2>
         <h3 align="center">Borrow Book</h3>
         <h5 align="right">From : '.date('d/m/Y',strtotime(Session::get('fordate'))).' - To: '.date('d/m/Y',strtotime(Session::get('todate'))).'</h5>
         <table width="100%" style="border-collapse: collapse; border: 0px;">
            <tr>
                <th style="border: 1px solid; padding:12px;" width="5%">Id</th>
                <th style="border: 1px solid; padding:12px;" width="20%">Reader</th>
                <th style="border: 1px solid; padding:12px;" width="25%">Book</th>
                <th style="border: 1px solid; padding:12px;" width="15%">Borrow</th>
                <th style="border: 1px solid; padding:12px;" width="15%">Return</th>
                <th style="border: 1px solid; padding:12px;" width="20%">Status</th>
            </tr>';
            foreach($borrows as $borrow)
            {
                $status=$borrow['trangthai']== 0 ? 'Đang Mượn Sách':'Đã Trả Sách';
                $output .= '
                  <tr>
                   <td style="border: 1px solid; padding:12px;">'.$borrow['id'].'</td>
                   <td style="border: 1px solid; padding:12px;">'.$borrow['thethuvien']['docgia']['tendocgia'].'</td>
                   <td style="border: 1px solid; padding:12px;">'.$borrow['ctmuontra']['sach']['tensach'].'</td>
                   <td style="border: 1px solid; padding:12px;">'.date('d/m/Y',strtotime($borrow['ngaymuon'])).'</td>
                   <td style="border: 1px solid; padding:12px;">'.date('d/m/Y',strtotime($borrow['ctmuontra']['ngaytra'])).'</td>
                   <td style="border: 1px solid; padding:12px;">'.$status.'</td>
                  </tr>
                ';
            }
        $output .= '</table>';
        return $output;
    }

    public function getSachTon()
    {
        $countmuon=CTMuonTraModel::select('id')->count();
        $data=null;
        if ($countmuon>0){
            $id_sach=CTMuonTraModel::select('masach')->get();
            $data=SachModel::whereNotIn('id',$id_sach)->get();
        }else{
            $data=SachModel::all();
        }
        return view('admin.report.sachton',compact('data'));

    }
    public function getSachTonPDF()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_book_data_to_html());
        return $pdf->stream();
    }

    public function get_sach_ton()
    {
        $countmuon=CTMuonTraModel::select('id')->count();
        $data=null;
        if ($countmuon>0){
            $id_sach=CTMuonTraModel::select('masach')->get();
            $data=SachModel::whereNotIn('id',$id_sach)->get();
        }else{
            $data=SachModel::all();
        }
        return $data;
    }
    function convert_book_data_to_html()
    {
        $books = $this->get_sach_ton();
        $output = '
        <h2 align="center">Library Management System</h2>
         <h3 align="center">Book In Stock</h3>
  
         <table width="100%" style="border-collapse: collapse; border: 0px;">
            <tr>
                <th style="border: 1px solid; padding:12px;" width="5%">Id</th>
                <th style="border: 1px solid; padding:12px;" width="30%">Name Book</th>
                <th style="border: 1px solid; padding:12px;" width="10%">Quantity</th>
                <th style="border: 1px solid; padding:12px;" width="20%">Category</th>
                <th style="border: 1px solid; padding:12px;" width="20%">Author</th>
                <th style="border: 1px solid; padding:12px;" width="5%">Year</th>
            </tr>';
        foreach($books as $book)
        {
            $output .= '
                  <tr>
                   <td style="border: 1px solid; padding:12px;">'.$book['id'].'</td>
                   <td style="border: 1px solid; padding:12px;">'.$book['tensach'].'</td>
                   <td style="border: 1px solid; padding:12px;">'.$book['quantity'].'</td>
                   <td style="border: 1px solid; padding:12px;">'.$book['theloai']['tentheloai'].'</td>
                   <td style="border: 1px solid; padding:12px;">'.$book['tacgia']['tentacgia'].'</td>
                   <td style="border: 1px solid; padding:12px;">'.date('Y',strtotime($book['namxb'])).'</td>
                
                  </tr>
                ';
        }
        $output .= '</table>';
        return $output;
    }

    public function getDocGia()
    {
        $sothe=MuonTraModel::select('sothe')->distinct()->get();
        $docgia=DocGiaModel::whereIn('sothe',$sothe)->get();
        $data=MuonTraModel::all();
        return view('admin.report.dochiamuon',compact('docgia','data'));
    }

    function convert_reader_data_to_html()
    {
        $sothe=MuonTraModel::select('sothe')->distinct()->get();
        $docgia=DocGiaModel::whereIn('sothe',$sothe)->get();
        $data=MuonTraModel::all();

        $output = '
        <h2 align="center">Library Management System</h2>
         <h3 align="center">Borrow Book</h3>
  
         <table width="100%" style="border-collapse: collapse; border: 0px;">
            <tr>
                <th style="border: 1px solid; padding:12px;" width="23%">Reader</th>
                <th style="border: 1px solid; padding:12px;" width="65%">Name Book</th>
                <th style="border: 1px solid; padding:12px;" width="12%">Total</th>
            </tr>';
        foreach($docgia as $reader)
        {
            $total=0;
            $output .= '
                <tr>
                   <td style="border: 1px solid; padding:12px;">'.$reader['tendocgia'].'</td>
                   <td style="border: 1px solid; padding:12px;">';
                        foreach ($data as $muon){
                            if ($reader['sothe']==$muon['sothe']){
                                $total+=$muon['ctmuontra']['quantity'];
                                $output.='<span>Tên Sách: '.$muon['ctmuontra']['sach']['tensach'].' 
                                - Số Lượng: '.$muon['ctmuontra']['quantity'].' 
                                - Ngày Mượn: '.date('d/m/Y',strtotime($muon['ngaymuon'])).'</span><br>';
                            }
                        }
            $output.='
                    </td>
                    <td style="border: 1px solid; padding:12px;">'.$total.' Cuốn
                    </td>
                </tr>';
        }
        $output .= '</table>';
        return $output;
    }
    public function getDocGiaPDF()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_reader_data_to_html());
        return $pdf->stream();
    }

}
