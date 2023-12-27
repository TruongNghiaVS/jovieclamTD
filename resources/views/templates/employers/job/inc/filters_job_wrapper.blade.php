@push('styles')
<style type="text/css">

</style>
@endpush
{{--<?php
dd($funclAreas)
?>--}}
{!! Form::open(['method' => 'get','route' => 'job.list', 'id' => 'job_filter']) !!}
<!-- SEARCH STICKY -->
<div class="page-heading-tool job-detail ">
    <div class="container">
        <div class="tool-wrapper">
            <div class="search-job">
                <div class="form-horizontal">
                    <div class="form-wrap">
                        <div class="form-group form-keyword">
                            <input type="search" class="keyword form-control" id="search" name="search" placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                        </div>
                        <div class="form-group form-select-chosen" id="functional_area_dd">
                        {!! Form::select('functional_area_id[]', ['' => __('Select functional area')]+$funclAreas, Request::get('functional_area_id', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'functional_area_id')) !!}
                        </div>
                        <div class="form-group form-select-chosen" id="city_dd2">
                        {!! Form::select('city_id[]', ['' => __('Select City')]+$cities, Request::get('city_id', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'city_id')) !!}
                        </div>
                        <div class="form-group form-submit">
                            <button class="btn-gradient" type="submit">
                                Tìm kiếm
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mobile-filter toollips">
                <button type="button" class="btn btn-filter" id="atcFilters" title="Lọc">
                    <i class="fa-solid fa-filter"></i> Lọc
                </button>
            </div>
        </div>
    </div>
</div>

<!-- SEARCH STICKY Mobile-->

<div class="page-heading-tool job-detail mobile">
    <div class="container">
        <div class="tool-wrapper">
            <div class="search-job">
                <div class="form-horizontal">
                    <div class="row g-0">
                        <div class="col-12">
                            <input type="search" class="keyword form-control" id="search" name="search" placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-filter toollips">
                <button type="button" class="btn btn-filter" id="#atcFilters-mobile" title="Lọc" onclick="openFilterJob_mobile()">
                    <i class="fa-solid fa-filter"></i> {{__('Filter')}}
                </button>
                <button class="btn btn-primary" type="submit">
                    <i class="fa-solid fa-magnifying-glass text-white mx-1"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- SEARCH ADVANDCE STICKY -->
<div class="filters-job-wrapper job-detail">
    <div class="container">
        <div class="filters-wrapper">
            <form action="{{route('job.list')}}" method="get">
                <div class="row">
                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select">
                            <label>{{__('Salary Level')}}</label>
                            {!! Form::select('salary_from[]',['' => __('Salary Level')]+$salaryFroms, Request::get('salary_from', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'salary_from')) !!}
                    
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="degree_level_dd">
                            <label>Cấp bậc</label>
                            {!! Form::select('degree_level_id[]', ['' => __('Select Degree Level')] + $degreeLevels, Request::get('degree_level_id', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'degree_level_id')) !!}
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="job_type_dd">
                            <label>Theo ngành</label>
                            {!! Form::select('job_type_id[]', ['' => __('Select Job Type')] + $jobTypes, Request::get('job_type_id', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'job_type_id')) !!}
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="benefit_id_dd">
                            <label>{{__('Select desired benefits')}}</label>
                            {!! Form::select('benefit_id[]', $benefits, Request::get('benefit_id', null), ['class'=>'form-control form-select shadow-sm multiselect', 'id'=>'benefit_id','multiple'=>true, "data-placeholder"=>"Month"]) !!}
                        </div>
                    </div>

                </div>
                <div class="close-filter-box">
                    <div class="close-input-filter">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


<div class="filters-job-wrapper-mobile job-detail">
    <div class="container">
        <div class="close-filter-box-mobile" onclick="closeFilterJob_mobile()">
            <div class="close-input-filter-mobile">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </div>
        <div class="filters-wrapper">
            <form action="{{route('job.list')}}" method="get">
                <div class="row">
                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-keyword">
                            <input type="search" class="keyword form-control" id="search" name="search" placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                        </div>
                    </div>


                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select-chosen" id="functional_area_dd">
                        {!! Form::select('functional_area_id[]', ['' => __('Select functional area')]+$funclAreas, Request::get('functional_area_id', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'functional_area_id')) !!}
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select-chosen" id="city_dd2">
                        {!! Form::select('city_id[]', ['' => __('Select City')]+$cities, Request::get('city_id', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'city_id')) !!}
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select-chosen">
                            <label>{{__('Salary')}}</label>
                            {!! Form::select('salary_from[]',['' => __('Salary Level')]+$salaryFroms, Request::get('salary_from', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'salary_from')) !!}
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="degree_level_dd">
                            <label>Cấp bậc</label>
                        
                            {!! Form::select('degree_level_id[]', ['' => __('Select Degree Level')] + $degreeLevels, Request::get('degree_level_id', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'degree_level_id')) !!}
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="job_type_dd">
                            <label>Hình thức việc làm</label>
                            {!! Form::select('job_type_id[]', ['' => __('Select Job Type')] + $jobTypes, Request::get('job_type_id', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'job_type_id')) !!}

                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                            <div class="form-group" id="benefit_id_dd">
                                    <label>{{__('Select desired benefits')}}</label>
                                    {!! Form::select('benefit_id[]', $benefits, Request::get('benefit_id', null), ['class'=>'form-control  shadow-sm multiselect', 'id'=>'benefit_mobile_id','multiple'=>true, "data-placeholder"=>"Month"]) !!}
                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group form-submit">
                        <button class="btn btn-primary filter_submit" type="submit">
                            Tìm kiếm
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

{!! Form::close() !!}
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#benefit_id').multiselect({
            texts: {
                placeholder: "{{__('Select desired benefits')}}"
            }
        });

        $('#benefit_mobile_id').multiselect({
            texts: {
                placeholder: "{{__('Select desired benefits')}}"
            }
        });


        $('#filter_submit').submit(()=>{

            $('#job_filter')[0].reset();
        })
       

      
    });
    $('#benefit_id').each(function() {
        $(this).multiselect({
            texts: {
                placeholder: "{{__('Select desired benefits')}}", // or $(this).prop('title'),
            },
        });
    });

    $('#benefit_mobile_id').multiselect({
            columns: 1,
            placeholder: "{{__('Select desired benefits')}}",
            search: true,
            selectAll: true
            
    });


</script>
@endpush