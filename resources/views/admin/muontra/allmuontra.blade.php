@extends('admin.mater')
@section('namepage',"Danh Sách Thể Loại")
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        @include('admin.block.alert')
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh Sách Mượn Trả </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <form action="{!! route('admin.pdf.getindex') !!}" method="post">
                            {!! csrf_field() !!}
                            <span >Từ Ngày</span>
                            <input type="date" name="fordate">
                            <span>&nbsp;Đến Ngày&nbsp;</span>
                            <input type="date" name="todate">
                            <button type="submit" class="btn btn-primary">Thống Kê</button>
                        </form>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <?php $i=0;?>
                        <th>#</th>
                        <th>Tên Độc Giả</th>
                        <th>Tên Sách</th>
                        <th>Ngày Mượn</th>
                        <th>Ngày Trả</th>
                        <th>Trạng Thái</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <?php $i++;?>
                        <tr>
                            <td>{!! $i; !!}</td>
                            <td>{!! $item['thethuvien']['docgia']['tendocgia']!!}</td>
                            <td>{!! $item['ctmuontra']['sach']['tensach']!!}</td>
                            <td>{!! date('d/m/Y',strtotime($item['ngaymuon'])) !!}</td>
                            <td>{!! date('d/m/Y',strtotime($item['ctmuontra']['ngaytra'])) !!}</td>
                            <td>
                                @if($item['trangthai']==0)
                                    <span class="label label-primary">Đang Mượn Sách <i class="fa fa-exchange"></i></span> |
                                    <a href="{!! route('admin.muontra.getchangestatus',['id'=>$item['id']]) !!}"><span class="label label-success">Trả Sách</span></a>
                                @else
                                    <span class="label label-success">Đã Trả Sách <i class="fa fa-check"></i></span>
                                @endif
                            </td>
                            <td>
                                <a href="{!! route('admin.muontra.getedit',['id'=>$item['id']]) !!}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Sửa</a>
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
                                        <h4>Bạn Có Muốn Xóa Thông Tin Này ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                        <a href="{!! route('admin.muontra.getdelete',['id'=>$item['id']]) !!}"  class="btn btn-primary">Xác Nhận</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
                <a href="{!! route('admin.muontra.getadd') !!}" class="btn btn-primary"> <i class="fa fa-plus"></i> Thêm Mới Mượn</a>
            </div>
        </div>
    </div>

@endsection
