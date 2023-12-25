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


<div class="job-seekers-page listpgWraper">

    <div class="container Jobpage">
        <form action="{{route('job.seeker.list')}}" method="get">
            @include('templates.employers.user.inc.filters_job_wrapper')
            <!-- Search Result and sidebar start -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="searchList jobs-side-list" bis_skin_checked="1">
                        @if(isset($jobSeekers) && count($jobSeekers))
                        @foreach($jobSeekers as $jobSeeker)
                        <div  class="item-job mb-3" bis_skin_checked="1">
                            <div class="logo-company" bis_skin_checked="1">
                                <a href="/cong-ty/cong-ty-tnhh-buymed-145" title="CÔNG TY TNHH EDUPIA" class="pic">
                                    {{$jobSeeker->printUserImage()}}
                                </a>
                            </div>
                            <div class="jobinfo" bis_skin_checked="1">
                                <div class="info" bis_skin_checked="1">
                                    <!-- Title  Start-->
                                    <div class="info-item job-title-box" bis_skin_checked="1">
                                        <div class="job-title" bis_skin_checked="1">
                                     
                                            <h3 class="job-title-name m-0"><a href="{{route('user.profile', $jobSeeker->id)}}" title="{{$jobSeeker->getName()}}">{{$jobSeeker->getName()}}</a></h3>

                                        </div>
                                        <a class="btn-veiw-profile"  href="{{route('user.profile', $jobSeeker->id)}}">{{__('View Profile')}}</a>

                                        
                                    </div>
                                    <!-- Title  End-->
                                    <!-- companyName Start-->
                                    <div class="info-item companyName" bis_skin_checked="1">{{$jobSeeker->email ?  $jobSeeker->email :" "}}</div>
                                    <!-- companyName End-->
                                    <!--rank-salary and place Start-->
                                    <div class="info-item box-meta" bis_skin_checked="1">
                                        <div class="meta-city" bis_skin_checked="1">
                                            <!-- <i class="far fa-map-marker-alt"></i> -->
                                            {{$jobSeeker->getLocation()}}
                                        </div>
                                    </div>
                                    <!--Rank-salary and place End-->
                                    <!--Day update and place Start-->
                                    @if($jobSeeker->updated_at)
                                    <div class="info-item day-update" bis_skin_checked="1">
                                        Cập nhật:  {{ $jobSeeker->updated_at->format('j F, Y') }}
                                    </div>
                                    @endif
                                    <!--Day update and place End-->
                                </div>
                                <div class="caption" bis_skin_checked="1">
                                    <div class="welfare" bis_skin_checked="1">
                                        <div class="box-meta" bis_skin_checked="1">

                                        </div>

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
                <div class="col-lg-4 col-sm-12 pull-right">
                    <!-- Sponsord By -->
                    <div class="sidebar shadow">
                        @include('templates.employers.job.inc.ads')
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