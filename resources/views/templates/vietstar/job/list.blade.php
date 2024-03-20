
@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end -->

<!-- Inner Page Title start -->


<!-- Dashboard menu start -->
@include('templates.vietstar.includes.mobile_dashboard_menu')
<!-- Dashboard menu end -->

<!-- Inner Page Title end -->
<div class="listpgWraper Jobpage">

    @include('templates.vietstar.job.inc.filters_job_wrapper')

    <div class="container Jobpage__content">
        <form action="{{route('job.list')}}" method="get">
            <!-- Search Result and sidebar start -->
            <div class="row">
                <div class="col-lg-9 col-sm-12">
                    <div class="job-sorting-section">
                        <div class="sort-wrapped">
                            <div class="title sort-label">Sắp xếp theo</div>
                            <div class="sort-item-wrapped">
                                <div class="sort-item-wrapped__item active">Mặc định</div>
                                <div class="sort-item-wrapped__item">Lương &lpar; cao - thấp &rpar; </div>
                                <div class="sort-item-wrapped__item">Ngày Đăng &lpar; mới nhất &rpar;</div>
                                <div class="sort-item-wrapped__item">Ngày Đăng &lpar; cũ nhất &rpar;</div>
                                <div class="sort-item-wrapped__item">Làm việc từ xa</div>
                            </div>
                        </div>
                    </div>
                    @include('flash::message')
                    <!-- Search List -->
                    <div class="searchList jobs-side-list">
                        <!-- job start -->
                        @if(isset($jobs) && count($jobs)) <?php $count_1 = 1; ?> @foreach($jobs as $job) @php $company =
                        $job->getCompany(); @endphp
                        <?php if (isset($company)) {
                        ?>
                            <?php if ($count_1 == 7) { ?>
                                <div class="inpostad">
                                    <img src="https://png.pngtree.com/thumb_back/fh260/back_pic/00/02/44/5056179b42b174f.jpg" alt="">
                                </div>
                            <?php } else { ?>
                                @php
                                $props = ["title", "job_type", "job_experience_id", "state_id", "city_id", "job_type_id",
                                "salary_currency", "salary_from", "salary_to",
                                "company_id", "department_id", "skill_id", "industry_id", "gender_id", "degree_level_id",
                                "career_level_id", "job_shift_id", "job_type_id" ];
                                $attrs = "";
                                foreach ($props as $prop) {
                                $attrs .= !empty($job->{$prop}) ? "data-{$prop}-id={$job->{$prop}} " : '';
                                }
                                @endphp
                                <div data-job-id="{{$job->id}}" {{$attrs}} class="item-job mb-3">
                                    <div class="logo-company">
                                        <a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}" class="pic">{{$company->printCompanyImage(140, 140)}}</a>
                                    </div>
                                    <div class="jobinfo">
                                        <div class="info">
                                            <!-- Title  Start-->
                                            <div class="info-item job-title-box">
                                                <div class="job-title">
                                                    <span>Mới</span>
                                                    <h3 class="job-title-name"><a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}">{{$job->title}}</a></h3>
                                                </div>
                                                @if(Auth::check() && Auth::user()->isFavouriteJob($job->slug))
                                                <a class="save-job active" href="{{route('remove.from.favourite', $job->slug)}}"><i class="far fa-heart"></i>
                                                </a>
                                                @elseif(Auth::check() && !Auth::user()->isFavouriteJob($job->slug))
                                                <a class="save-job" href="{{route('add.to.favourite', $job->slug)}}"><i class="far fa-heart"></i>
                                                </a>
                                                @else
                                                <a class="save-job" href="#" data-toggle="modal" data-target="#user_login_Modal"><i class="far fa-heart"></i>
                                                </a>
                                                @endif
                                                </a>
                                            </div>
                                            <!-- Title  End-->

                                            <!-- companyName Start-->
                                            <div class="info-item companyName"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></div>
                                            <!-- companyName End-->
                                            <!--rank-salary and place Start-->
                                            <div class="info-item box-meta">
                                                <div class="rank-salary">
                                                    @php($from = round($job->salary_from/1000000,0))
                                                    @php($to = round($job->salary_to/1000000,0))
                                                    @if($job->salary_type == \App\Job::SALARY_TYPE_FROM)
                                                    <span class="fas fa-dollar-sign"></span> {{__('From: ')}} {{$from}}
                                                    {{__('million')}} ({{$job->salary_currency}})
                                                    @elseif($job->salary_type == \App\Job::SALARY_TYPE_TO)
                                                    <span class="fas fa-dollar-sign"></span> {{__('Up To: ')}} {{$to}}
                                                    {{__('million')}} ({{$job->salary_currency}})
                                                    @elseif($job->salary_type == \App\Job::SALARY_TYPE_RANGE)
                                                    <span class="fas fa-dollar-sign"></span> {{$from}} - {{$to}}
                                                    {{__('million')}} ({{$job->salary_currency}})
                                                    @elseif($job->salary_type == \App\Job::SALARY_TYPE_NEGOTIABLE)
                                                    <span class="fas fa-money-bill"></span> {{__('Negotiable')}}
                                                    @else
                                                    <span class="fas fa-dollar-sign"></span> {{__('Salary Not provided')}}
                                                    @endif
                                                </div>
                                                <div class="navbar__link-separator" bis_skin_checked="1"></div>
                                                <!--meta-city-->
                                                <div class="meta-city">
                                                    <!-- <i class="far fa-map-marker-alt"></i> -->
                                                    {{$job->getCity('city')}}
                                                </div>


                                                <!-- {{$job->getJobType('job_type')}} -->
                                            </div>
                                            <!--Rank-salary and place End-->

                                            <!--Day update and place Start-->
                                            <div class="info-item day-update">
                                                Hôm Nay
                                            </div>
                                            <!--Day update and place End-->

                                            <!-- <div class="short-description">{{\Illuminate\Support\Str::limit(strip_tags($job->description), 150, '...')}}</div> -->
                                        </div>

                                        <div class="caption">
                                            <div class="welfare">
                                                <div class="box-meta">
                                                    <!-- <i class="fas fa-dollar-sign"></i>  -->
                                                    <span>
                                                        <!-- {{__('Rewards')}} -->
                                                        Automative
                                                    </span>

                                                </div>
                                                <div class="box-meta">
                                                    <!-- <i class="fas fa-graduation-cap"></i> -->
                                                    <span>
                                                        <!-- {{__('Training')}} -->
                                                        Automative Infomation
                                                    </span>
                                                </div>

                                            </div>


                                        </div>
                                    </div>


                                </div>
                            <?php } ?>
                            <?php $count_1++; ?>
                        <?php } ?>
                        <!-- job end -->
                        @endforeach @endif
                        <!-- job end -->
                    </div>
                    <!-- Pagination Start -->
                    <div class="pagiWrap">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="showreslt">
                                    {{__('Showing Pages')}} : {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }}
                                    {{__('Total')}} {{ $jobs->total() }}
                                </div>
                            </div>
                            <div class="col-md-7 text-right">
                                @if(isset($jobs) && count($jobs))
                                {{ $jobs->appends(request()->query())->links() }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Pagination end -->
                </div>
                <div class="col-lg-3 col-sm-12 pull-right">
                    <!-- Sponsord By -->
                    <div class="sidebar">
                        @include('templates.vietstar.job.inc.ads')
                    </div>
                </div>
            </div>

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
                    <h3>Get the latest <strong>{{ ucfirst(Request::get('search')) }}</strong> jobs
                        @if(Request::get('location')!='') in
                        <strong>{{ ucfirst(Request::get('location')) }}</strong>@endif sent straight to your inbox
                    </h3>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" value="@if( Auth::check() ) {{Auth::user()->email}} @endif">
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

    .hide_vm_ul {
        height: 100px;
        overflow: hidden;
    }

    .hide_vm {
        display: none !important;
    }

    .view_more {
        cursor: pointer;
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
    $(document).ready(function($) {
        $("#search-job-list").submit(function() {
            $(this).find(":input").filter(function() {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("#search-job-list").find(":input").prop("disabled", false);
        $(".view_more_ul").each(function() {
            if ($(this).height() > 100) {
                $(this).addClass('hide_vm_ul');
                $(this).next().removeClass('hide_vm');
            }
        });
        $('.view_more').on('click', function(e) {
            e.preventDefault();
            alert('noday');
            $(this).prev().removeClass('hide_vm_ul');
            $(this).addClass('hide_vm');
        });


        //filter on fly
        /*
         $("#job_title, #job_type, #job_experience_id, #state_id, #city_id, #job_type_id, #salary_currency," +
             "#company_id, #department_id, #skill_id, #industry_id, #gender_id, #degree_level_id," +
             "#career_level_id, #job_shift_id, #job_type_id").change(function () {
                 var params = localStorage.getItem('params') ? JSON.parse(localStorage.getItem('params')) : {};
                 var key = $(this).attr('id');
                 var prop = $(this).attr('id');
                 if(key == 'job_title') key = 'title';

                 if(key=='title') params[key] = $("#" + prop + " :selected").map((_,e) => e.text).get();
                 else params[key]= $("#" + prop + " :selected").map((_,e) => e.value).get();
                 localStorage.setItem('params', JSON.stringify(params));
                 $.ajax({
                     url: "",
                     type: "post",
                     data: {'data': params,'_token':""},
                     beforeSend: function () {
                         console.log(params);
                     },
                     success: function (data) {
                        //
                     }
                 });
         });
         */
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
    $(document).on('click', '.swal-button--Login', function() {
        window.location.href = "{{route('login')}}";
    })
    $(document).on('click', '.swal-button--register', function() {
        window.location.href = "{{route('register')}}";
    })



    const buttons = document.querySelectorAll('.sort-item-wrapped__item');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            buttons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>
@include('templates.vietstar.includes.country_state_city_js')
@endpush