@if(APAuthHelp::check(['SUP_ADM']))
<li class="heading">
    <h3 class="uppercase">Quản trị viên</h3>
</li>
<li class="nav-item  "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-user"></i> <span class="title">Quản trị viên</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{ route('list.admin.users') }}" class="nav-link "> <i class="icon-user"></i> <span class="title">Danh sách</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.admin.user') }}" class="nav-link "> <i class="icon-users"></i> <span class="title">Thêm mới</span> </a> </li>
    </ul>
</li>
@endif
