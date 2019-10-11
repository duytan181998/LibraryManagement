@extends('admin.mater')
@section('namepage',"Thêm mới mượn sách")
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        @include('admin.block.alert')
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm Mới Mượn Sách </h2>
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
                <form  action="{!! route('admin.muontra.postadd') !!}"  class="form-horizontal form-label-left" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tên Độc Giả <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="sothe" class="form-control">
                                <option> Chọn Độc Giả</option>
                                @foreach($reader as $item)
                                   @if(date('Y/m/d',strtotime($item['thuvien']['ngayhethan']))>=date('Y/m/d',strtotime(\Carbon\Carbon::now())))
                                        <option value="{!! $item['thuvien']['id'] !!}">{!! $item['tendocgia'] !!}</option>
                                   @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tên Sách <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="masach" class="form-control">
                                <option> Chọn Sách</option>
                                @foreach($book as $item)
                                    <option value="{!! $item['id'] !!}">{!! $item['tensach'] !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ngày Trả <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" name="ngaytra" min="{!! \Illuminate\Support\Carbon::now() !!}"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ghi Chú <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea  name="ghichu"  class="form-control col-md-7 col-xs-12">
                            </textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a class="btn btn-danger" href="{!! route('admin.muontra.getall') !!}">Quay Lại</a>
                            <button class="btn btn-primary" type="reset">Nhập Lại</button>
                            <button type="submit" class="btn btn-success">Xác Nhận</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
