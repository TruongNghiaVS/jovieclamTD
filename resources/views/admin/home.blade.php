@extends('admin.layouts.admin_layout')
@section('content')
<div class="page-content-wrapper"> 
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="background-color:#eef1f5;"> 
        <!-- BEGIN PAGE HEADER-->     
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li> <a href="index.html">Trang chủ</a> <i class="fa fa-circle"></i> </li>
                <li> <span>{{ $siteSetting->site_name }} Panel dành cho Quản trị viên</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> {{ $siteSetting->site_name }} Panel dành cho Quản trị viên <small>{{ $siteSetting->site_name }} Panel dành cho Quản trị viên</small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                        <div class="visual"> <i class="fa fa-user"></i> </div>
                        <div class="details">
                            <div class="number"> <span data-counter="counterup" data-value="1349">{{ $totalTodaysUsers }}</span> </div>
                            <div class="desc"> Số Ứng viên hôm nay </div>
                        </div>
                    </a> </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                        <div class="visual"> <i class="fa fa-user"></i> </div>
                        <div class="details">
                            <div class="number"> <span data-counter="counterup" data-value="1349">{{ $totalActiveUsers }}</span> </div>
                            <div class="desc"> Ứng viên đang hoạt động</div>
                        </div>
                    </a> </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                        <div class="visual"> <i class="fa fa-user"></i> </div>
                        <div class="details">
                            <div class="number"> <span data-counter="counterup" data-value="1349">{{ $totalVerifiedUsers }}</span> </div>
                            <div class="desc"> Ứng viên đã được xác nhận </div>
                        </div>
                    </a> </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                        <div class="visual"> <i class="fa fa-list"></i> </div>
                        <div class="details">
                            <div class="number"> <span data-counter="counterup" data-value="1349">{{ $totalTodaysJobs }}</span> </div>
                            <div class="desc"> Việc làm hôm nay </div>
                        </div>
                    </a> </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                        <div class="visual"> <i class="fa fa-list"></i> </div>
                        <div class="details">
                            <div class="number"> <span data-counter="counterup" data-value="1349">{{ $totalActiveJobs }}</span> </div>
                            <div class="desc"> Việc làm còn hạn </div>
                        </div>
                    </a> </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                        <div class="visual"> <i class="fa fa-list"></i> </div>
                        <div class="details">
                            <div class="number"> <span data-counter="counterup" data-value="1349">{{ $totalFeaturedJobs }}</span> </div>
                            <div class="desc"> Việc làm nổi bật </div>
                        </div>
                    </a> </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-share font-dark hide"></i> <span class="caption-subject font-dark bold uppercase">Ứng viên đăng ký gần đây</span> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="slimScrol">
                            <ul class="feeds">
                                @foreach($recentUsers as $recentUser)
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info"> <i class="fa fa-check"></i> </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"><a href="{{ route('edit.user', $recentUser->id) }}"> {{ $recentUser->name }} ({{ $recentUser->email }}) </a>  - <i class="fa fa-home" aria-hidden="true"></i> {{ $recentUser->getLocation()}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="scroller-footer">
                            <div class="btn-arrow-link pull-right"> <a href="{{ route('list.users') }}">Xem tất cả các Ứng viên</a> <i class="icon-arrow-right"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-share font-dark hide"></i> <span class="caption-subject font-dark bold uppercase">Việc làm gần đây</span> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="slimScrol">
                            <ul class="feeds">
                                @foreach($recentJobs as $recentJob)
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info"> <i class="fa fa-check"></i> </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"><a href="{{ route('edit.job', $recentJob->id) }}"> {{ \Illuminate\Support\Str::limit(strip_tags($recentJob->title), 50) }} </a>  - <i class="fa fa-list" aria-hidden="true"></i> {{ $recentJob->getCompany('name') }} - <i class="fa fa-home" aria-hidden="true"></i> {{ $recentJob->getLocation() }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach                  
                            </ul>
                        </div>
                        <div class="scroller-footer">
                            <div class="btn-arrow-link pull-right"> <a href="{{ route('list.jobs') }}">Xem tất cả Việc làm</a> <i class="icon-arrow-right"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY --> 
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(function () {
        $('.slimScrol').slimScroll({
            height: '250px',
            railVisible: true,
            alwaysVisible: true
        });
    });
</script>
@endpush
