@extends('templates.vietstar.layouts.app')
@section('content')
@if(Auth::guard('company')->check())
<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->
@else
@include('templates.vietstar.includes.header')
@endif


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




<div class="job-seekers-page listpgWraper">
    @include('templates.vietstar.user.inc.filters_job_wrapper')
    <div class="container Jobpage">
        <form action="{{route('job.seeker.list')}}" method="get">
            <!-- Search Result and sidebar start -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- Search List -->
                    <ul class="searchList">
                        <!-- job start -->
                        @if(isset($jobSeekers) && count($jobSeekers))
                        @foreach($jobSeekers as $jobSeeker)
                        <li>
                            <div class="row">
                                <div class="col-lg-8 col-md-8">
                                    <div class="jobimg">{{$jobSeeker->printUserImage(100, 100)}}</div>
                                    <div class="jobinfo">
                                        <h3><a href="{{route('user.profile', $jobSeeker->id)}}">{{$jobSeeker->getName()}}</a>
                                        </h3>
                                        <div class="location"> {{$jobSeeker->getLocation()}}</div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="listbtn"><a href="{{route('user.profile', $jobSeeker->id)}}">{{__('View Profile')}}</a>
                                    </div>
                                </div>
                            </div>
                            <p>{{\Illuminate\Support\Str::limit(strip_tags($jobSeeker->getProfileSummary('summary')),150,'...')}}
                            </p>
                        </li>
                        <!-- job end -->
                        @endforeach
                        @endif
                    </ul>

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
                <div class="col-lg-4">
                    <!-- Sponsord By -->
                    <div class="sidebar" bis_skin_checked="1">
                        <div id="adbanner" class="carousel slide" data-ride="carousel" bis_skin_checked="1">

                            <!-- Indicators -->

                            <!-- The slideshow -->
                            <div class="carousel-inner" bis_skin_checked="1">

                                <div class="col" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="item" bis_skin_checked="1">
                                            <div class="image loadAds" bis_skin_checked="1">
                                                <a href="#">
                                                    <img src="https://media.istockphoto.com/id/1312091473/vector/we-are-hiring-banner-with-megaphone-flat-illustration.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=03ytHwFjPHCCIIAxR-hplKCQQNFWgZSMUg2HDJ_xTZQ=" alt="#">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" bis_skin_checked="1">
                                        <div class="item" bis_skin_checked="1">
                                            <div class="image loadAds" bis_skin_checked="1">
                                                <a href="#">
                                                    <img src="https://img.freepik.com/free-vector/man-search-hiring-job-online-from-laptop_1150-52728.jpg" alt="#">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" bis_skin_checked="1">
                                        <div class="item" bis_skin_checked="1">
                                            <div class="image loadAds" bis_skin_checked="1">
                                                <a href="#">
                                                    <img src="https://media.istockphoto.com/id/1173054931/photo/jobs-text-on-wooden-blocks-over-keyboard.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=1d3E26tHR7Yf7AUuGomDISXZTQ_u8PxizqTvo3bvSTY=" alt="#">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" bis_skin_checked="1">
                                        <div class="item" bis_skin_checked="1">
                                            <div class="image loadAds" bis_skin_checked="1">
                                                <a href="#">
                                                    <img src="https://elca.vietnamworks.com/assets/images/page/banner/cover.png?r=1689852315" alt="#">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Left and right controls -->
                    </div>
                </div>
            </div>
        </form>
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