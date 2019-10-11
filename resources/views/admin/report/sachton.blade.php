@extends('admin.mater')
@section('namepage','Sách Tồn')
@section('content')
    <div class="container">
        <h3 align="center">Thống Kê Danh Sách Tồn </h3><br />
        <div class="row">
            <div class="col-md-7" align="right">

            </div>
            <div class="col-md-5" align="right">
                <a href="{{ route('admin.pdf.getsachtonpdf') }}" class="btn btn-danger">Convert into PDF</a>
            </div>
        </div>
        <br />
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Mã Sách</th>
                    <th>Tên Sách</th>
                    <th>Số Lượng</th>
                    <th>Thể Loại</th>
                    <th>Tác Giả</th>
                    <th>Năm XB</th>
                </tr>
                </thead>
                <tbody>
                @if($data!=null)
                    @foreach($data as $book)
                        <tr>
                            <td>{{ $book['id'] }}</td>
                            <td>{{ $book['tensach'] }}</td>
                            <td><span class="label label-primary">Còn Lại: {{ $book['quantity'] }}</span></td>
                            <td>{{ $book['theloai']['tentheloai'] }}</td>
                            <td>{{ $book['tacgia']['tentacgia'] }}</td>
                            <td>{{ date('Y',strtotime($book['namxb'])) }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
