<!DOCTYPE html>
<html>
<head>
    <title>Thống Kê</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
        }
    </style>
</head>
<body>
<br />
<div class="container">
    <h3 align="center">Thống Kê Danh Sách Độc Giả Mượn Sách </h3><br />

    <div class="row">
        <div class="col-md-7" align="right">
            <h5>Từ Ngày : {!! date("d/m/Y",strtotime(Session::get('fordate')))!!}
                - Đến Ngày : {!! date("d/m/Y",strtotime(Session::get('todate')))!!}
            </h5>
        </div>
        <div class="col-md-5" align="right">
            <a href="{{ route('admin.pdf.getconvert') }}" class="btn btn-danger">Convert into PDF</a>
        </div>
    </div>
    <br />
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Mã Mượn Trả</th>
                <th>Độc Giả</th>
                <th>Tên Sách</th>
                <th>Ngày Mượn</th>
                <th>Ngày Trả</th>
                <th>Trạng Thái</th>
            </tr>
            </thead>
            <tbody>
            @foreach($borrow_data as $borrow)
                <tr>
                    <td>{{ $borrow['id'] }}</td>
                    <td>{{ $borrow['thethuvien']['docgia']['tendocgia'] }}</td>
                    <td>{{ $borrow['ctmuontra']['sach']['tensach'] }}</td>
                    <td>{{ date('d/m/Y',strtotime($borrow['ngaymuon'])) }}</td>
                    <td>{{ date('d/m/Y',strtotime($borrow['ctmuontra']['ngaytra'])) }}</td>
                    <td>{{ $borrow['trangthai']==0?'Đang Mượn Sách':'Đã Trả Sách' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
