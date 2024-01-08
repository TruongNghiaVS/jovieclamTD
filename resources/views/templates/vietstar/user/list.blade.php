@extends('templates.employers.layouts.app')
@section('content')

<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->



@include('templates.employers.includes.mobile_dashboard_menu')

<!-- Inner Page Title start -->
<!-- Inner Page Title end -->
<!-- <a class="btn btn-primary applyCV-btn" href="http://jobvieclam.com/login#cvs">Nộp CV</a> -->
@include('flash::message')

<!-- <form action="{{route('job.seeker.list')}}" method="get"> -->
<!-- Page Title start -->
<!-- <div class="pageSearch">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    @if(Auth::guard('company')->check())
                    <a href="{{ route('post.job') }}" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i>
                        {{__('Post Job')}}</a>
                    @else
                    <a href="{{url('my-profile#cvs')}}" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i>
                        {{__('Upload Your Resume')}}</a>
                    @endif

                </div>
                <div class="col-lg-10">
                    <div class="searchform">
                        <div class="row">
                            <div class="col-md-{{((bool)$siteSetting->country_specific_site)? 5:3}}">
                                <input type="text" name="search" value="{{Request::get('search', '')}}"
                                    class="form-control" placeholder="{{__('Enter Skills or job seeker details')}}" />
                            </div>
                            <div class="col-md-2"> {!! Form::select('functional_area_id[]', ['' => __('Lựa chọn Bộ phận
                                chức năng')]+$functionalAreas, Request::get('functional_area_id', null),
                                array('class'=>'form-control', 'id'=>'functional_area_id')) !!} </div>


                            @if((bool)$siteSetting->country_specific_site)
                            {!! Form::hidden('country_id[]', Request::get('country_id[]',
                            $siteSetting->default_country_id), array('id'=>'country_id')) !!}
                            @else
                            <div class="col-md-2">
                                {!! Form::select('country_id[]', ['' => __('Select Country')]+$countries,
                                Request::get('country_id', $siteSetting->default_country_id),
                                array('class'=>'form-control', 'id'=>'country_id')) !!}
                            </div>
                            @endif

                            <div class="col-md-2">
                                <span id="state_dd">
                                    {!! Form::select('state_id[]', ['' => __('Select State')], Request::get('state_id',
                                    null), array('class'=>'form-control', 'id'=>'state_id')) !!}
                                </span>
                            </div>
                            <div class="col-md-2">
                                <span id="city_dd">
                                    {!! Form::select('city_id[]', ['' => __('Select City')], Request::get('city_id',
                                    null), array('class'=>'form-control', 'id'=>'city_id')) !!}
                                </span>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!-- Page Title end -->
<!-- </form> -->

<!-- Dashboard menu start -->

<!-- Dashboard menu end -->
@include('templates.employers.user.inc.filters_job_wrapper')
<div class="job-seekers-page listpgWraper">

    <div class="container Jobpage">
        <form action="{{route('job.seeker.list')}}" method="get">
            
            <!-- Search Result and sidebar start -->
            <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                    <!-- Sponsord By -->
                        <div class="sidebar shadow">
                            @include('templates.employers.job.inc.advanced_filtering')
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 ">
                        <div class="searchList jobs-side-list" bis_skin_checked="1">
                            @if(isset($jobSeekers) && count($jobSeekers))
                            @foreach($jobSeekers as $jobSeeker)
                            <div  class="item-job-search mb-3" bis_skin_checked="1">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                                    <strong class="item-job-search__name">
                                                        Nguyen Thanh Minh 
                                                    </strong>   
                                                    <span>
                                                        (29 tuổi)
                                                    </span>

                                           
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="d-flex  justify-content-end-rp">
                                            <a href="#" class="btn btn-outline btn-sm  mx-1"><i class="fa-regular fa-heart"></i></a>
                                            <a href="#" class="btn btn-secondary btn-sm">Xem</a>

                                        </div>
                                     
                                    </div>

                                </div>
                                <div class="row my-2">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                            
                                           
                                                <span class="item-job-search__industry">
                                                    Nhân Viên Kinh Doanh
                                                </span>
                                            
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                       
                                        <div class="d-flex justify-content-end-rp align-items-center h-100">
                                            Thời gian cập nhật: 05/01/2024
                                        </div>
                                       
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                            <div class="d-flex">
                                                <div>

                                                    <i class="fa-solid fa-circle-dollar-to-slot mx-1"></i> 7 triệu
                                                </div>
                                                <div class="mx-3">

                                                    <i class="fa-solid fa-briefcase mx-1"></i>Dưới 1 năm
                                                </div>

                                                <div>

                                                    <i class="fa-solid fa-map-location-dot mx-1"></i> Hà Nội
                                                </div>

                                            </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                      
                                        <div class="d-flex justify-content-end-rp">
                                            NTD quan tâm : 36
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <!-- Search List -->
                        
    
                        <!-- Pagination Start -->
                        <div class="pagiWrap">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="showreslt">
                                        {{__('Showing Pages')}} : {{ $jobSeekers->firstItem() }} -
                                        {{ $jobSeekers->lastItem() }} {{__('Total')}} {{ $jobSeekers->total() }}
                                    </div>
                                </div>
                                <div class="col-md-7 text-right">
                                    @if(isset($jobSeekers) && count($jobSeekers))
                                    {{ $jobSeekers->appends(request()->query())->links() }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Pagination end -->
                        <!-- <div class=""><br />{!! $siteSetting->listing_page_horizontal_ad !!}</div> -->
    
                    </div>
             </div>

                
            </div>
        </form>
    </div>
</div>

@include('templates.employers.includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .job-seekers-page {
        padding-top: 76px;
    }
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
    .jobs-side-list .item-job-search {
        background-color: #FFFFFF;
        padding: 20px;
        margin-bottom: 2 0px;
        border-radius: 10px;
       
    }
    .item-job-search__name{
        margin-right: 10px;
        font-size: 20px;
        font-weight: 700;
        color: var(--bs-primary);
    }
    .item-job-search__industry {
        font-size: 16px;
        margin: 7px 0;
        font-weight: 600;
    }
    .justify-content-end-rp{
        justify-content: end;
        text-align: end;
    }




</style>
@endpush
@push('scripts')
<script>
    $(document).ready(function($) {
        $("form").submit(function() {
            $(this).find(":input").filter(function() {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("form").find(":input").prop("disabled", false);

        $(".view_more_ul").each(function() {
            if ($(this).height() > 100) {
                $(this).addClass('hide_vm_ul');
                $(this).next().removeClass('hide_vm');
            }
        });
        $('.view_more').on('click', function(e) {
            e.preventDefault();
            $(this).prev().removeClass('hide_vm_ul');
            $(this).addClass('hide_vm');
        });
    });
</script>
@include('templates.employers.includes.country_state_city_js')
@endpush