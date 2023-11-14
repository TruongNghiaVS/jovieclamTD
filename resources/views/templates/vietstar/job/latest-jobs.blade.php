@extends('templates.vietstar.layouts.app')
@section('content') 
<!-- Header start --> 
@include('templates.vietstar.includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('Danh sách Việc làm')])
@include('flash::message')
@include('templates.vietstar.includes.inner_top_search')
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <form action="{{route('job.list')}}" method="get">
            <!-- Search Result and sidebar start -->
            <div class="row"> 
                @include('templates.vietstar.includes.job_list_side_bar')
                <div class="col-lg-6 col-sm-12"> 
                    <!-- Search List -->
                    <ul class="searchList">
                        <!-- job start -->
                        <ul class="jobslist newjbox row">
                        @if(isset($latestJobs) && count($latestJobs))
                            @foreach($latestJobs as $latestJob)
                                <?php $company = $latestJob->getCompany(); ?>
                                @if(null !== $company)
                                    <!--Job start-->
                                        <li class="col-md-12">
                                            <div class="jobint">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4">
                                                        <a href="{{route('job.detail', [$latestJob->slug])}}" title="{{$latestJob->title}}">
                                                            {{$company->printCompanyImage(96,96)}}
                                                        </a>
                                                    </div>
                                                    <div class="col-md-8 col-sm-8">
                                                        <h4><a href="{{route('job.detail', [$latestJob->slug])}}" title="{{$latestJob->title}}">{{$latestJob->title}}</a></h4>
                                                        <div class="company"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a> - <span>{{$latestJob->getCity('city')}}</span></div>
                                                        <div class="jobloc">
                                                            <label class="fulltime" title="{{$latestJob->getJobType('job_type')}}">{{$latestJob->getJobType('job_type')}}</label> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!--Job end-->
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                        <!-- job end -->
                    </ul>
                    <!-- Pagination Start -->

                    <!-- Pagination end --> 
                </div>
				
                    <!-- Sponsord By -->
                    <div class="sidebar">
                        <h4 class="widget-title">{{__('Sponsord By')}}</h4>
                        <div class="gad">{!! $siteSetting->listing_page_vertical_ad !!}</div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="show_alert" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="submit_alert">
                @csrf
                <input type="hidden" name="search" value="{{ Request::get('search') }}">
                <input type="hidden" name="country_id" value="@if(isset(Request::get('country_id')[0])) {{ Request::get('country_id')[0] }} @endif">
                <input type="hidden" name="state_id" value="@if(isset(Request::get('state_id')[0])){{ Request::get('state_id')[0] }} @endif">
                <input type="hidden" name="city_id" value="@if(isset(Request::get('city_id')[0])){{ Request::get('city_id')[0] }} @endif">
                <input type="hidden" name="functional_area_id" value="@if(isset(Request::get('functional_area_id')[0])){{ Request::get('functional_area_id')[0] }} @endif">
                <div class="modal-header">
                    <h4 class="modal-title">Job Alert</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
					<h3>Get the latest <strong>{{ ucfirst(Request::get('search')) }}</strong> jobs  @if(Request::get('location')!='') in <strong>{{ ucfirst(Request::get('location')) }}</strong>@endif sent straight to your inbox</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email"
                            value="@if( Auth::check() ) {{Auth::user()->email}} @endif">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('templates.vietstar.includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .searchList li .jobimg {
        min-height: 80px;
    }
    .hide_vm_ul{
        height:100px;
        overflow:hidden;
    }
    .hide_vm{
        display:none !important;
    }
    .view_more{
        cursor:pointer;
    }
</style>
@endpush
@push('scripts') 
<script>
$('.btn-job-alert').on('click', function() {
    @if(Auth::user())
    $('#show_alert').modal('show');
    @else
    swal({
        title: "Lưu Thông báo Việc làm",
        text: "Để lưu Thông báo Việc làm bạn phải đăng ký và đăng nhập",
        icon: "error",
        buttons: {
        Login: "Login",
        register: "Đăng ký",
        hello: "OK",
      },
});
    @endif
})
     $(document).ready(function ($) {
        $("#search-job-list").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("#search-job-list").find(":input").prop("disabled", false);
        $(".view_more_ul").each(function () {
            if ($(this).height() > 100)
            {
                $(this).addClass('hide_vm_ul');
                $(this).next().removeClass('hide_vm');
            }
        });
        $('.view_more').on('click', function (e) {
            e.preventDefault();
            $(this).prev().removeClass('hide_vm_ul');
            $(this).addClass('hide_vm');
        });
    });
    if ($("#submit_alert").length > 0) {
    $("#submit_alert").validate({
        rules: {
            email: {
                required: true,
                maxlength: 5000,
                email: true
            }
        },
        messages: {
            email: {
                required: "Email is required",
            }
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('subscribe.alert')}}",
                type: "GET",
                data: $('#submit_alert').serialize(),
                success: function(response) {
                    $("#submit_alert").trigger("reset");
                    $('#show_alert').modal('hide');
                    swal({
                        title: "Success",
                        text: response["msg"],
                        icon: "success",
                        button: "OK",
                    });
                }
            });
        }
    })
}
 $(document).on('click','.swal-button--Login',function(){
        window.location.href = "{{route('login')}}";
     })
     $(document).on('click','.swal-button--register',function(){
        window.location.href = "{{route('register')}}";
     })
</script>
@include('templates.vietstar.includes.country_state_city_js')
@endpush
