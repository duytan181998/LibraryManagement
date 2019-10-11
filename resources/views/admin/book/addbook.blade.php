@extends('admin.mater')
@section('namepage',"Thêm mới sách")
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        @include('admin.block.alert')
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm Mới Sách </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form  action="{!! route('admin.book.postadd') !!}"  class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tên Sách <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="tensach"  class="form-control col-md-7 col-xs-12">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Số Lượng <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" min="1" id="last-name" name="quantity"  class="form-control col-md-7 col-xs-12">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tác Giả <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="tacgia">
                                <option>Chọn Tác giả</option>
                                @foreach($tacgia as $item)
                                    <option value="{!! $item['id'] !!}">{!! $item['tentacgia'] !!}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Thể Loại <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="theloai">
                                <option>Chọn Thể Loại</option>
                                @foreach($theloai as $item)
                                    <option value="{!! $item['id'] !!}">{!! $item['tentheloai'] !!}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nhà Xuất Bản <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="nhaxuatban">
                                <option>Chọn Nhà Xuất Bản</option>
                                @foreach($nxb as $item)
                                    <option value="{!! $item['id'] !!}">{!! $item['tennxb'] !!}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Năm Xuất Bản <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="namxb"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ảnh <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file"  name="anhbia"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a class="btn btn-danger" href="{!! route('admin.book.getall') !!}">Quay Lại</a>
                            <button class="btn btn-primary" type="reset">Nhập Lại</button>
                            <button type="submit" class="btn btn-success">Xác Nhận</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
