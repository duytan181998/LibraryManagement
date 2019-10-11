@extends('admin.mater')
@section('namepage','Trang Chủ')
@section('content')
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-book"></i> Tổng Số Sách Hiện Có</span>
            <div class="count green">{!! \App\SachModel::all()->count(); !!}</div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-exchange"></i> Số Lần Mượn Trong Hôm Nay</span>
            <div class="count blue">{!! \App\MuonTraModel::where('ngaymuon',\Carbon\Carbon::now()->toDateString())->count()!!}</div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-exchange"></i> Số Độc Giả Đang Mượn</span>
            <div class="count red">{!! \App\MuonTraModel::where('trangthai','0')->count() !!}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Độc Giả</span>
            <div class="count">{!! \App\DocGiaModel::all()->count() !!}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Tổng Sách Đã Mượn</span>
            <div class="count">{!! \App\MuonTraModel::all()->count() !!}</div>
        </div>

    </div>
    <!-- /top tiles -->
    <br>

    <div class="row">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-user"></i>
                </div>
                <!--trư 1 tháng so với ngày hiện tại-->
                <?php $week = strtotime(date("Y-m-d", strtotime(\Illuminate\Support\Carbon::now())) . " -1 week");
                $week = strftime("%Y-%m-%d", $week);?>
                <div class="count">{!! \App\DocGiaModel::where('ngaytao','>=',$week)->count() !!}</div>
                <h3>Độc Giả Mới</h3>
                <p>Trong tháng gần nhất.</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-exchange"></i>
                </div>
                <div class="count">{!! \App\MuonTraModel::where('ngaymuon','>=',$week)->count(); !!}</div>

                <h3>Mượn Sách</h3>
                <p>Số lần mượn sách trong 1 tuần.</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-graduation-cap"></i>
                </div>
                <div class="count">{!! \App\TacGiaModel::all()->count() !!}</div>

                <h3>Tác Giả</h3>
                <p>Tổng số tác giả.</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-list-alt"></i>
                </div>
                <div class="count">{!! \App\TheLoaiModel::all()->count() !!}</div>

                <h3>Thể Loại</h3>
                <p>Tổng số thể loại.</p>
            </div>
        </div>
    </div>
    <br />
@endsection
