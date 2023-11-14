<div class="col-md-3 col-sm-6">
	<div class="jobreqbtn">
{{--
@if (Request::get('search') != '' || Request::get('functional_area_id') != '' || Request::get('country_id') != ''|| Request::get('state_id') != '' || Request::get('city_id') != ''|| Request::get('city_id') != '')
<a class="btn btn-job-alert" href="javascript:;">
<i class="fa fa-bell" style="font-size:1.125rem;"></i> {{__('Save Job Alert')}} </a>
@else
<a class="btn btn-job-alert-disabled" disabled href="javascript:;">
<i class="fa fa-bell" style="font-size:1.125rem;"></i> {{__('Save Job Alert')}}</a>
@endif
--}}

@if(Auth::guard('company')->check())
    <a href="{{ route('post.job') }}" class="btn"><i class="fa fa-file-text iconawesome" aria-hidden="true"></i> {{__('Post Job')}}</a>
@else
    <a href="{{url('my-profile#cvs')}}" class="btn"><i class="fas fa-cloud-upload iconawesome"></i> {{__('Upload Your Resume')}}</a>
    @endif
    </div>
    <!-- Side Bar start -->
    <div class="sidebar">
        <input type="hidden" name="search" value="{{Request::get('search', '')}}"/>

        <!-- Jobs By Title -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Title')}}</h4>
            @if(isset($jobTitlesArray) && count($jobTitlesArray))
                @php
                    $jobTitlesArray = array_combine($jobTitlesArray, $jobTitlesArray);
                @endphp
                {{ Form::select('job_title[]', $jobTitlesArray, Request::get('job_title'), ['class' => 'form-control', 'id' => 'job_title', 'multiple' => 'multiple']) }}
            @endif
        </div>
        <!-- Jobs By Country -->
    {{-- <div class="widget">
        <h4 class="widget-title">{{__('Jobs By Country')}}</h4>
        <ul class="optionlist view_more_ul">
            @if(isset($countryIdsArray) && count($countryIdsArray))
            @foreach($countryIdsArray as $key=>$country_id)
            @php
            $country = App\Country::where('country_id','=',$country_id)->lang()->active()->first();
            @endphp
            @if(null !== $country)
            @php
            $checked = (in_array($country->country_id, Request::get('country_id', array())))? 'checked="checked"':'';
            @endphp
            <li>
                <input type="checkbox" name="country_id[]" id="country_{{$country->country_id}}" value="{{$country->country_id}}" {{$checked}}>
                <label for="country_{{$country->country_id}}"></label>
                {{$country->country}} <span>{{App\Job::countNumJobs('country_id', $country->country_id)}}</span> </li>
            @endif
            @endforeach
            @endif
        </ul>
        <span class="text text-primary view_more hide_vm">{{__('View More')}}</span> </div>
        --}}
    <!-- Jobs By Country end-->


        <!-- Jobs By State -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By State')}}</h4>
            @if(isset($stateIdsArray) && count($stateIdsArray))
                @php($states = App\State::whereIn('state_id', $stateIdsArray)->lang()->active()->pluck('state', 'state_id')->toArray())
                {{ Form::select('state_id[]', $states, Request::get('state_id'), ['class' => 'form-control', 'id' => 'state_id', 'multiple' => 'multiple']) }}
            @endif
        </div>
        <!-- Jobs By State end-->


        <!-- Jobs By City -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By City')}}</h4>
            @if(isset($cityIdsArray) && count($cityIdsArray))
                @php($cities = App\City::whereIn('city_id', $cityIdsArray)->lang()->active()->pluck('city', 'city_id')->toArray())
                {{ Form::select('city_id[]', $cities, Request::get('city_id'), ['class' => 'form-control', 'id' => 'city_id', 'multiple' => 'multiple']) }}
            @endif
        </div>
        <!-- Jobs By City end-->

        <!-- Jobs By Experience -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Experience')}}</h4>
            @if(isset($jobExperienceIdsArray) && count($jobExperienceIdsArray))
                @php($jobExperiences = App\JobExperience::whereIn('job_experience_id', $jobExperienceIdsArray)->lang()->active()->pluck('job_experience', 'job_experience_id')->toArray())
                {{ Form::select('job_experience_id[]', $jobExperiences, Request::get('job_experience_id'), ['class' => 'form-control', 'id' => 'job_experience_id', 'multiple' => 'multiple']) }}
            @endif
        </div>
        <!-- Jobs By Experience end -->

        <!-- Jobs By Job Type -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Job Type')}}</h4>
            @if(isset($jobTypeIdsArray) && count($jobTypeIdsArray))
                @php($jobTypes = App\JobType::whereIn('job_type_id', $jobTypeIdsArray)->lang()->active()->pluck('job_type', 'job_type_id')->toArray())
                {{ Form::select('job_type_id[]', $jobTypes, Request::get('job_type_id'), ['class' => 'form-control', 'id' => 'job_type_id', 'multiple' => 'multiple']) }}
            @endif
        </div>
        <!-- Jobs By Job Type end -->

        <!-- Jobs By Job Shift -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Job Shift')}}</h4>
            @if(isset($jobShiftIdsArray) && count($jobTypeIdsArray))
                @php($jobShifts = App\JobShift::whereIn('job_shift_id', $jobShiftIdsArray)->lang()->active()->pluck('job_shift', 'job_shift_id')->toArray())
                {{ Form::select('job_shift_id[]', $jobShifts, Request::get('job_shift_id'), ['class' => 'form-control', 'id' => 'job_shift_id', 'multiple' => 'multiple']) }}
            @endif
        </div>
        <!-- Jobs By Job Shift end -->

        <!-- Jobs By Career Level -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Career Level')}}</h4>
            @if(isset($careerLevelIdsArray) && count($careerLevelIdsArray))
                @php($careerLevels = App\CareerLevel::whereIn('career_level_id', $careerLevelIdsArray)->lang()->active()->pluck('career_level', 'career_level_id')->toArray())
                {{ Form::select('career_level_id[]', $careerLevels, Request::get('career_level_id'), ['class' => 'form-control', 'id' => 'career_level_id', 'multiple' => 'multiple']) }}
            @endif
        </div>
        <!-- Jobs By Career Level end -->
        <!-- Jobs By Degree Level -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Degree Level')}}</h4>
            @if(isset($degreeLevelIdsArray) && count($degreeLevelIdsArray))
                @php($degreeLevels = App\DegreeLevel::whereIn('degree_level_id', $degreeLevelIdsArray)->lang()->active()->pluck('degree_level', 'degree_level_id')->toArray())
                {{ Form::select('degree_level_id[]', $degreeLevels, Request::get('degree_level_id'), ['class' => 'form-control', 'id' => 'degree_level_id', 'multiple' => 'multiple']) }}
            @endif
        </div>
        <!-- Jobs By Degree Level end -->
        <!-- Jobs By Gender -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Gender')}}</h4>
            @if(isset($genderIdsArray) && count($genderIdsArray))
                @php($genders = App\Gender::whereIn('gender_id', $genderIdsArray)->lang()->active()->pluck('gender','gender_id')->toArray())
                {{ Form::select('gender_id[]', $genders, Request::get('gender_id'), ['class' => 'form-control', 'id' => 'gender_id', 'multiple' => 'multiple']) }}
            @endif
        </div>
        <!-- Jobs By Gender end -->
        <!-- Jobs By Industry -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Industry')}}</h4>
            @if(isset($industryIdsArray) && count($industryIdsArray))
                @php($industries = App\Industry::whereIn('industry_id', $industryIdsArray)->lang()->active()->pluck('industry', 'industry_id')->toArray())
                {{ Form::select('industry_id[]', $industries, Request::get('industry_id'), ['class' => 'form-control', 'id' => 'industry_id', 'multiple' => 'multiple']) }}
            @endif
        </div>
        <!-- Jobs By Industry end -->

        <!-- Jobs By Skill -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Skill')}}</h4>
            @if(isset($skillIdsArray) && count($skillIdsArray))
                @php($skills = App\JobSkill::whereIn('job_skill_id', $skillIdsArray)->lang()->active()->pluck('job_skill', 'job_skill_id')->toArray())
                {{ Form::select('skill_id[]', $skills, Request::get('skill_id'), ['class' => 'form-control', 'id' => 'skill_id', 'multiple' => 'multiple']) }}
            @endif
        </div>

        <!-- Jobs By Industry end -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Functional Area')}}</h4>
            @if(isset($departmentIdsArray) && count($departmentIdsArray))
                @php($departments = App\Department::whereIn('department_id', $departmentIdsArray)->lang()->active()->pluck('department', 'department_id')->toArray())
                {{ Form::select('department_id[]', $departments, Request::get('department_id'), ['class' => 'form-control', 'id' => 'department_id', 'multiple' => 'multiple']) }}
            @endif
        </div>

        <!-- Top Công ty -->
        <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Company')}}</h4>
            @if(isset($companyIdsArray) && count($companyIdsArray))
                @php($companies = App\Company::whereIn('id', $companyIdsArray)->active()->pluck('name', 'id')->toArray())
                {{ Form::select('company_id[]', $companies, Request::get('company_id'), ['class' => 'form-control', 'id' => 'company_id', 'multiple' => 'multiple']) }}
            @endif
        </div>

        <!-- Top Công ty end -->

        <!-- Salary -->
        <div class="widget">
            <h4 class="widget-title">{{__('Salary Range')}}</h4>

            <div class="form-group mb-1">
                {!! Form::number('salary_from', Request::get('salary_from', null), array('class'=>'form-control', 'id'=>'salary_from', 'placeholder'=>__('Salary From'))) !!}
            </div>
            <div class="form-group mb-1">
                {!! Form::number('salary_to', Request::get('salary_to', null), array('class'=>'form-control', 'id'=>'salary_to', 'placeholder'=>__('Salary To'))) !!}
            </div>
            <div class="form-group mb-1">
                {!! Form::select('salary_currency', ['' =>__('Select Salary Currency')]+$currencies, Request::get('salary_currency'), array('class'=>'form-control', 'id'=>'salary_currency')) !!}
            </div>
            <!-- Salary end -->

            <!-- button -->
            <div class="searchnt">
                <button type="submit" class="btn" onclick="window.location='{{ route('job.list') }}'"><i class="fa fa-search iconawesome" aria-hidden="true"></i> {{__('Tìm việc')}}</button>
            </div>
            <!-- button end-->
        </div>
        <!-- Side Bar end -->
    </div>
    </div>


    @push('scripts')
        <script type="text/javascript" src="{{ asset('vietstar/js/chosen/chosen.jquery.min.js') }}"></script>
        <script>

            $(document).ready(function(){
                $("#job_title").chosen({
                    allow_single_deselect: true,
                    no_results_text: "{{ __('No results') }}",
                    placeholder_text_single: "{{__('Select one') }}",
                    placeholder_text_multiple: "{{__('Select some options') }}"
                });
                $("#job_type, #job_experience_id, #state_id, #city_id, #job_type_id, #salary_currency," +
                    "#company_id, #department_id, #skill_id, #industry_id, #gender_id, #degree_level_id," +
                    "#career_level_id, #job_shift_id, #job_type_id").chosen({
                    allow_single_deselect: true,
                    no_results_text: "{{ __('No results') }}",
                    placeholder_text_single: "{{__('Select one') }}",
                    placeholder_text_multiple: "{{__('Select some options') }}"
                });

            });
        </script>
    @endpush
    @push('styles')
        <link rel="stylesheet" type="text/css" href="{{ asset('vietstar/css/chosen/chosen.css') }}">
    @endpush
