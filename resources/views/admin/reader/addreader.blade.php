@extends('admin.mater')
@section('namepage',"Thêm mới nhà xuất bản")
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        @include('admin.block.alert')
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm Mới Nhà Xuất Bản </h2>
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
                <form  action="{!! route('admin.reader.postadd') !!}"  class="form-horizontal form-label-left" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tên Độc Giả<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text"  name="tendocgia"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Số Điện Thoại <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text"  name="sodienthoai"  class="form-control col-md-7 col-xs-12">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Địa Chỉ <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="diachi"  class="form-control col-md-7 col-xs-12">

                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a class="btn btn-danger" href="{!! route('admin.reader.getall') !!}">Quay Lại</a>
                            <button class="btn btn-primary" type="reset">Nhập Lại</button>
                            <button type="submit" class="btn btn-success">Xác Nhận</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection