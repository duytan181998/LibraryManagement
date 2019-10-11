@extends('admin.mater')
@section('namepage',"Danh Sách Độc Giả")
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        @include('admin.block.alert')
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh Sách Độc Giả </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <?php $i=0;
                        $date=\Carbon\Carbon::now();?>
                        <th>#</th>
                        <th>Tên Độc Giả</th>
                        <th>Địa Chỉ</th>
                        <th>Số Điện Thoại</th>
                        <th>Số Thẻ</th>
                        <th>Ghi Chú</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <?php $i++;?>
                        <tr>
                            <td>{!! $i; !!}</td>
                            <td>{!! $item['tendocgia'] !!}</td>
                            <td>{!! $item['diachi'] !!}</td>
                            <td>{!! $item['sodienthoai'] !!}</td>
                            <td>
                                @if($item['sothe']==0)
                                    <span class="label label-danger"><i class="fa fa-warning"></i> Chưa Có Thẻ</span> |
                                    <a href="{!! route('admin.libarycard.getadd',['id'=>$item['id']]) !!}" class="label label-success">
                                        <i class="fa fa-plus"></i> Tạo Thẻ Thư Viện</a>
                                    @else
                                        @if(date('Y/m/d',strtotime($item['thuvien']['ngayhethan']))<date('Y/m/d',strtotime($date)))
                                            <span class="label label-danger"><i class="fa fa-warning"></i> Thẻ Thư Viện Hết Hạn</span>
                                            @else
                                            <span class="label label-success"><i class="fa fa-check"></i> Đã Tạo Thẻ Thư Viện</span>
                                        @endif
                                    @endif
                            </td>
                            <td>{!! $item['thuvien']['ghichu'] !!}</td>
                            <td>
                                <a href="{!! route('admin.reader.getedit',['id'=>$item['id']]) !!}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Sửa</a>
                            </td>
                            <td>
                                <button type="button" data-toggle="modal" data-target=".bs-example-modal-sm-{{ $item['id'] }}"  class="btn btn-danger"><i class="fa fa-trash"></i> Xóa</button>
                            </td>
                        </tr>
                        <div class="modal fade bs-example-modal-sm-{{ $item['id'] }} in" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel2"> Thông Báo</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Bạn Có Muốn Xóa Độc Giả ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                        <a href="{!! route('admin.reader.getdelete',['id'=>$item['id']]) !!}"  class="btn btn-primary">Xác Nhận</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
                <a href="{!! route('admin.reader.getadd') !!}" class="btn btn-primary"> <i class="fa fa-plus"></i> Thêm Mới Độc Giả</a>
            </div>
        </div>
    </div>
@endsection

