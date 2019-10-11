@extends('admin.mater')
@section('namepage','Độc Giả Mượn Sách')
@section('content')
    <div class="container">
        <h3 align="center">Thống Kê Độc Giả Mượn Sách </h3><br />
        <div class="row">
            <div class="col-md-7" align="right">
            </div>
            <div class="col-md-5" align="right">
                <a href="{{ route('admin.pdf.getdocgiapdf') }}" class="btn btn-danger">Convert into PDF</a>
            </div>
        </div>
        <br />
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Tên Độc Giả</th>
                    <th>Chi Tiết Sách Mượn</th>
                    <th>Tổng Số Sách Mượn</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($docgia as $reader)
                        <?php $total=0?>
                        <tr>
                            <td>{!! $reader['tendocgia'] !!}</td>
                            <td>
                                @foreach($data as $muon)
                                    @if($reader['sothe']==$muon['sothe'])
                                        <?php $total+=$muon['ctmuontra']['quantity'];?>
                                        <span>Tên Sách:
                                            {!! $muon['ctmuontra']['sach']['tensach'] !!}
                                            - Số Lượng :
                                            {!! $muon['ctmuontra']['quantity'] !!}
                                            -
                                            Ngày Mượn : {!! date('d/m/Y',strtotime($muon['ngaymuon'])) !!}
                                        </span>
                                        <br>
                                    @endif
                                @endforeach
                            </td>
                            <td> <span > Tổng Số Sách Mượn: {!! $total !!}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
