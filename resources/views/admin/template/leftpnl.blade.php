<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="{!! route('admin.getdashboard') !!}"><i class="fa fa-home"></i> Trang Chủ</a>

            </li>
            <li><a><i class="fa fa-folder"></i> Thể Loại <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{!! route('admin.category.getall') !!}">Danh Sách Thể Loại</a></li>
                    <li><a href="{!! route('admin.category.getadd') !!}">Thêm Thể Loại</a></li>

                </ul>
            </li>
            <li><a><i class="fa fa-graduation-cap"></i> Tác Giả <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{!! route('admin.author.getall') !!}">Danh Sách Tác Giả</a></li>
                    <li><a href="{!! route('admin.author.getadd') !!}">Thêm Tác Giả</a></li>

                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> Nhà Xuất Bản <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{!! route('admin.publisher.getall') !!}">Danh Sách Nhà Xuất Bản</a></li>
                    <li><a href="{!! route('admin.publisher.getadd') !!}">Thêm Nhà Xuất Bản</a></li>

                </ul>
            </li>
            <li><a><i class="fa fa-book"></i> Sách <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{!! route('admin.book.getall') !!}">Danh Sách Sách</a></li>
                    <li><a href="{!! route('admin.book.getadd') !!}">Thêm Sách</a></li>

                </ul>
            </li>
            <li><a><i class="fa fa-users"></i> Độc Giả <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{!! route('admin.reader.getall') !!}">Danh Sách Đọc Giả</a></li>
                    <li><a href="{!! route('admin.reader.getadd') !!}">Thêm Độc Giả</a></li>
                </ul>
            </li>

            <li><a><i class="fa fa-exchange"></i> Mượn Sách <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{!! route('admin.muontra.getall') !!}">Danh Sách Mượn</a></li>
                    <li><a href="{!! route('admin.muontra.getadd') !!}">Thêm Mượn Sách</a></li>

                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> Thống Kê<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{!! route('admin.pdf.getsachton') !!}">Sách Tồn</a></li>
                    <li><a href="{!! route('admin.pdf.getdocgia') !!}">Độc Giả Mượn Sách</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Đăng Xuất" href="{!! route('admin.getlogoutadmin') !!}">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->
