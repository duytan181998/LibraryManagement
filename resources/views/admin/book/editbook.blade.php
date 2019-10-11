@extends('admin.mater')
@section('namepage',"Cập nhật mới sách")
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        @include('admin.block.alert')
        <div class="x_panel">
            <div class="x_title">
                <h2>Cập Nhật Mới Sách </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form name="frmedit"  action="{!! route('admin.book.postedit',['id'=>$book['id']]) !!}"  class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tên Sách <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{!! $book['tensach'] !!}" name="tensach"  class="form-control col-md-7 col-xs-12">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Số Lượng <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number"  min="1" value="{!! $book['quantity'] !!}" name="quantity"  class="form-control col-md-7 col-xs-12">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tác Giả <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="tacgia">
                                    <option>Chọn Tác Giả</option>
                                    @foreach($tacgia as $item)
                                        <option value="{!! $item['id'] !!}"
                                            {!! $item['id']===$book['matacgia'] ? 'selected':null !!}>{!! $item['tentacgia'] !!}</option>
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
                                        <option value="{!! $item['id'] !!}"
                                            {!! $item['id']===$book['matheloai'] ? 'selected':null !!}>{!! $item['tentheloai'] !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nhà Xuất Bản <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="nhaxuatban">
                                    <option >Chọn Nhà Xuất Bản</option>
                                    @foreach($nxb as $item)
                                        <option value="{!! $item['id'] !!}"
                                            {!! $item['id']===$book['manxb'] ? 'selected':null !!}>{!! $item['tennxb'] !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Năm Xuất Bản <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{!! $book['namxb'] !!}" name="namxb"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 25px" for="last-name">Ảnh Bìa <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12" id="box-load-image" style="position: relative" >
                            @if($book['anhbia']==null)
                                <div class="update-image" style="display: block">
                                    <input type="file"
                                           onchange="document.getElementById('preview_image').src=window.URL.createObjectURL(this.files[0])" name="image" style=" display: none" id="image-choice">
                                    <label class="btn btn-primary  col-md-12 col-sm-12 col-xs-12" for="image-choice" id="lable-choice"> Chọn Ảnh</label>
                                </div>
                                <div class="content-box-pre" style="display: none">
                                    <img class="img-fluid" src="" height="100px" width="auto" id="preview_image" name="image" id_book="{!! $book['id'] !!}"  >
                                    <div style="width: 30px;height: 30px;border-radius:50%;background: red;position: absolute;top:-10%;right: 5%;cursor: pointer" class="remove-image-pre">
                                        <span style="padding-left:12px;line-height:30px;color: white">X</span>
                                    </div>
                                </div>
                            @else
                                <div class="box-image-book">
                                    <div class="content-box">
                                        <img  class="img-fluid"  src="{!! asset('assets/admin/images/'.$book['anhbia']) !!}" id="image-book" id_book="{!! $book['id'] !!}" alt="{!! $book['anhbia'] !!}" width="auto" height="150px">
                                        <div style="width: 30px;height: 30px;border-radius:50%;background: red;position: absolute;top:-10%;right: 5%;cursor: pointer" class="remove-image">
                                            <span style="padding-left:12px;line-height:30px;color: white;display: block">X</span>
                                        </div>
                                    </div>

                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
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

