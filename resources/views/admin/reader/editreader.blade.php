@extends('admin.mater')
@section('namepage',"Cập nhật độc giả")
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        @include('admin.block.alert')
        <div class="x_panel">
            <div class="x_title">
                <h2>Cập Nhật Độc Giả </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br/>
                <form action="{!! route('admin.reader.postedit',['id'=>$reader['id']]) !!}"
                      class="form-horizontal form-label-left" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nhà Độc Giả <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="{!! $reader['tendocgia'] !!}" name="tendocgia"
                                   class="form-control col-md-7 col-xs-12">
                            <br/>
                            <span style="color: red">{{ $errors->first('tennxb') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Địa Chỉ <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="{!! $reader['diachi'] !!}" name="diachi"
                                   class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Số Điện Thoại <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="{!! $reader['sodienthoai'] !!}" name="sodienthoai"
                                   class="form-control col-md-7 col-xs-12">

                        </div>
                    </div>
                    @if($reader['sothe']!=0)
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ngày Bắt Đầu <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date"
                                       value="{!! date("Y-m-d",strtotime($reader['thuvien']['ngaybatdau'])) !!}"
                                       name="ngaybatdau" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" >Ngày Hết Hạn <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" min="{!! date("Y-m-d",strtotime($reader['thuvien']['ngaybatdau'])) !!}"
                                       value="{!! date("Y-m-d",strtotime($reader['thuvien']['ngayhethan'])) !!}"
                                       name="ngayhethan" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ghi Chú <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="ghichu" value="{!! $reader['thuvien']['ghichu'] !!}" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    @endif
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a class="btn btn-danger" href="{!! route('admin.reader.getall') !!}">Quay Lại</a>
                            <button type="submit" class="btn btn-success">Xác Nhận</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
