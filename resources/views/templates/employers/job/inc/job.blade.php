
<h1 class="fs-2 text-primary">{{__('Recruitment Posting')}}</h1>
@if(isset($job))
{!! Form::model($job, array('method' => 'put', 'route' => array('update.front.job', $job->id), 'class' => 'form')) !!}
{!! Form::hidden('id', $job->id) !!}

<div class="card card-edit-profile">
    <h2 class="fs-4 card-edit-profile__section">Thông tin tuyển dụng</h2>
    <div class="card-body">
        <div class="section-infomation account-infomation">
            <div class="row">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Job_title" class="font-weight-bold fs-18px">{{__('Job title')}}  <span class="required">*</span> </label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="{{__('Job title')}}" value="{{ $edit && isset($job) ? __($job->title) : old('title') }}">
                            {!! APFrmErrHelp::showErrors($errors, 'title') !!}
                        </div>
                    </div>
                </div>
               
             

                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="industry_id" class="font-weight-bold fs-18px">{{__('Industry')}} </label>
                    {!! Form::select('industry_id', ['' => __('Select Industry')] + $industries,  $job->industry_id , array('class'=>'form-control form-select', 'id'=>'industry_id')) !!}
                    {!! APFrmErrHelp::showErrors($errors, 'industry_id') !!}
                </div>
                    </div>
                </div>

      
                <div class="row">
                    <div lass="col-md-6 col-lg-6 col-sm-12">
                            
            
                            <label for="City" class="font-weight-bold fs-18px my-2">{{__('Workplace')}} <span class="required">*</span> </label>
                    
                  
                            <div class="d-flex justify-content-start  align-items-center">

                                    <input type="hidden" name="pow" value="0">
                                    <input class="form-check-input my-2 mx-1" type="checkbox" id="same_add_yes" name="pow" value="1" {{$edit && $job->is_same_company_add == APP\Job::SAME_COMPANY_ADD_YES ? "checked" : ""}} >
                                    <label class="form-check-label font-weight-bold fs-16px my-2 mx-1" for="same_add_yes">
                                        {{__('Same as company address')}}
                                    </label>

                               
                            </div>
                          

                 
                    </div>
                
                   
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group" id="city_dd">
                            {!! Form::select('city_id', ['' => __('Select City')] + $cities, $job->city_id, array('class'=>'form-control form-select shadow-sm', 'id'=>'city_id')) !!}
                            <div class="invalid-feedback">
                                Địa điểm làm việc là bắt buộc
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12" id="place_1">
                        <div class="form-group">
                      
                            <input type="text" class="form-control" id="location" name="location" placeholder="{{__('Address')}}" value="{{ isset($job) ? $job->location : old('location') }}">
                            
                        </div>
                    </div>
                 
                  
                    
                </div>
         



                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description" class="font-weight-bold fs-18px">{{ __('Job description') }} <span class="required">*</span> </label>
                            {!! Form::textarea('description', $job->description, array('class'=>'form-control', 'id'=>'description', 'placeholder'=>__('Job description')))  !!}
                                <div class="invalid-feedback">
                                    Please provide a valid textarea.
                                </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="requirements" class="font-weight-bold fs-18px">{{ __('Job requirements') }} <span class="required">*</span> </label>
                            {!! Form::textarea('requirement', $job->requirement, array('class'=>'form-control', 'id'=>'requirement', 'placeholder'=>__('Job requirements'))) !!}
                            <div class="invalid-feedback">
                                Please provide a valid textarea.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Benefits" class="font-weight-bold fs-18px">{{ __('Job Benefits') }} <span class="required">*</span> </label>
                            {!! Form::textarea('benefits', $job->benefits, array('class'=>'form-control', 'id'=>'benefits', 'placeholder'=>__('Job Benefits'))) !!}
                            <div class="invalid-feedback">
                                Please provide a valid textarea.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6" id="salary_dd">
                        <div class="row">
                            <div class="col-md-12" id="salary_type_dd">
                                <div class="form-group">
                                    <label for="salary_type" class="font-weight-bold fs-18px">{{__('Salary Type')}} </label>
                                    @php($salaryTypes = [''=>__("Select one")] + \App\Job::getSalaryTypes())
                                    {{ Form::select('salary_type', $salaryTypes , $edit && isset($job) ? $job->salary_type : old('salary_type'), array('class'=>'form-control form-select', 'id'=>'salary_type')) }}
                                    {!! APFrmErrHelp::showErrors($errors, 'salary_type') !!}
                                </div>
                            </div>
                            <div class="col-md-12" id="salary_from_dd" style="display:none;">
                                <div class="form-group">
                                    <label for="salary_from" class="font-weight-bold fs-18px">{{__('Salary From')}} </label>
                                    <input type="text" class="form-control currency-mask" id="salary_from" placeholder="{{__('Salary From')}}" value="{{ $edit ? __($job->salary_from) : old('salary_from') }}">
                                    {!! APFrmErrHelp::showErrors($errors, 'salary_from') !!}
                                </div>
                            </div>
                            <div class="col-md-12" id="salary_to_dd" style="display:none;">
                                <div class="form-group">
                                    <label for="salary_range" class="font-weight-bold fs-18px">{{__('Salary To')}} </label>
                                    <input type="text" class="form-control currency-mask" id="salary_to" placeholder="{{__('Salary To')}}" value="{{ $edit ? __($job->salary_to) : old('salary_to') }}">
                                    {!! APFrmErrHelp::showErrors($errors, 'salary_to') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Ownership" class="font-weight-bold fs-18px">{{__('Functional Area')}}  <span class="required">*</span>  </label>
                            <select required class="form-control form-select" id="functional_area_id" name="functional_area_id">
                                <option value="">{{ __('Select one') }}</option>

                                @if(count($functionalAreas) > 0)
                                @foreach($functionalAreas as $key => $value)
                                <option {{ isset($job) && $job->functional_area_id == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                                @endif
                            </select>
                            {!! APFrmErrHelp::showErrors($errors, 'functional_area_id') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-custom-chosen">
                            <label for="Job Type" class="font-weight-bold fs-18px">{{__('Job Type')}} </label>
                            <div class="row">
                            
                                @foreach (array_chunk($jobTypes, 3) as $chunk)
                                    <div class="col-md-4">

                                       
                                        @foreach ($chunk as $key => $jobType)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="job_type_id" value="{{ $key }}" {{isset($job->job_type_id) && $job->job_type_id == $key ? "checked":""}}>
                                                <label class="form-check-label" for="{{ $jobType }}">
                                                    {{ $jobType }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="expiry_date" class="font-weight-bold fs-18px">Hạn nhận hồ sơ </label>
                            <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="Deadline" value="{{ $edit && isset($job) ? \Carbon\Carbon::parse($job->expiry_date)->format('d-m-Y') : \Carbon\Carbon::parse(old('expiry_date'))->format('d-m-Y') }}">
                        </div>
                    </div>
                </div>





              
              
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-custom-multiselect" id="skill_id_dd">
                            <label for="skill_id" class="font-weight-bold fs-18px">{{__('Desired Skills')}} </label>
                            {!! Form::select('skills[]', $jobSkills, null, ['class'=>'form-control form-select shadow-sm multiselect', 'id'=>'skill_id','multiple'=>true,"data-placeholder"=>"Month"], ) !!}
                            {!! APFrmErrHelp::showErrors($errors, 'skill_id') !!}



                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" id="status_dd">
                            <label for="status" class="font-weight-bold fs-18px">{{__('Job Status')}} </label>
                            <select required class="form-control form-select" id="status" name="status">
                                <option value="">{{ __('Select status') }} </option>
                                @foreach(\App\Job::getListStatusJob() as $key => $value)
                                <option {{ isset($job) && $job->status == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            {!! APFrmErrHelp::showErrors($errors, 'status') !!}
                        </div>
                    </div>
                </div> -->






            </div>
        </div>

    </div>
</div>

<div class="card card-edit-profile my-3">
    <h2 class="fs-4 card-edit-profile__section">Yêu cầu chung</h2>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="Gender" class="font-weight-bold fs-18px">{{__('Gender')}} </label>
                    <div class="d-flex">
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="gender" id="gender1" checked>
                            <label class="form-check-label" for="gender1">
                                Nam/ Nữ
                            </label>
                        </div>

                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="gender" id="gender2">
                            <label class="form-check-label" for="gender2">
                                Nam
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="gender3">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Nữ
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="Level" class="font-weight-bold fs-18px">{{__('Experience')}} </label>
                    {!! Form::select('job_experience_id', ['' => __('Select Required job experience')]+$jobExperiences, $job->job_experience_id, array('class'=>'form-control form-select', 'id'=>'job_experience_id')) !!}
                    {!! APFrmErrHelp::showErrors($errors, 'job_experience_id') !!}
                </div>
            </div>
            <div class="col-md-3 col-md-3 col-sm-12">
                <div class="form-group form-group-custom-chosen">
                    <label for="Level" class="font-weight-bold fs-18px">{{__('Career Level')}} </label>
                    {!! Form::select('career_level_id', ['' => __('Select Career Level')] + $careerLevels, $job->career_level_id, array('class'=>'form-control form-select', 'id'=>'career_level_id')) !!}
                    {!! APFrmErrHelp::showErrors($errors, 'career_level_id') !!}
                </div>
            </div>

            
        </div>
    </div>

</div>


<div class="card card-edit-profile my-3">
    <h2 class="fs-4 card-edit-profile__section">THÔNG TIN KHÁC (KHÔNG BẮT BUỘC)</h2>
    <div class="card-body">
        <p>
        Giới thiệu về môi trường làm việc, thời gian thử việc, cơ hội huấn luyện, đồng nghiệp
        </p>
        <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="num_of_positions" class="font-weight-bold fs-18px">{{__('Number of positions')}}   <span class="required">*</span>  </label>&nbsp;&nbsp;&nbsp;<span class="text-danger" id="num_of_positions_error" class="error danger"></span>
                            <input type="text" class="form-control" id="num_of_positions" name="num_of_positions" placeholder="{{__('Number of positions')}}" value="{{ $edit && isset($job) ? $job->num_of_positions : old('num_of_positions') }}" required>

                        </div>
                    </div>
                </div>
        <div class="row">
            @if(isset($job))
            <div class="form-group form-checkbox wfh-chek">
                    <input type="checkbox" value="{{ $job->wfh }}" name="wfh" id="WFH" class="input_margin" {{isset($job->wfh) && $job->wfh == 1 ? "checked" :"" }}>
                    <label for="workfromhome">Work from home</label>
                    <br>
                    <span> Tick chọn nếu vị trí tuyển dụng này cho phép ứng viên có thể chọn chế độ làm việc tại nhà trong thời điểm hiện tại (Work from home) mà không nhất thiết phải có mặt tại văn phòng công ty. Hệ thống sẽ phân loại và đánh dấu đăng tuyển này vào danh mục tìm kiếm loại công việc là “Work from Home”.</span>
             </div>
            @else
             <div class="form-group form-checkbox wfh-chek">
                    <input type="checkbox" name="wfh" id="WFH" class="input_margin">
                    <label for="workfromhome">Work from home</label>
                    <br>
                    <span> Tick chọn nếu vị trí tuyển dụng này cho phép ứng viên có thể chọn chế độ làm việc tại nhà trong thời điểm hiện tại (Work from home) mà không nhất thiết phải có mặt tại văn phòng công ty. Hệ thống sẽ phân loại và đánh dấu đăng tuyển này vào danh mục tìm kiếm loại công việc là “Work from Home”.</span>
             </div>
            @endif
         
         </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12 d-flex justify-content-center">
        <button   id="clearBtn" class="btn btn-outline m-2" type="button" >{{__('Reset form')}} </button>

        <button  id="scrollBtn" class="btn btn-croll-top m-2" type="button" >{{__('Review recruitment information')}} </button>
        <button class="btn btn-lg btn-primary m-2" type="submit" id="submit_update_job">{{__('Post Job')}} </button>
    </div>
</div>


<input type="file" name="image" id="image" style="display:none;" accept="image/*" />
</form>
@else
<form method="POST" action="{{route('store.front.job')}}" accept-charset="UTF-8" id="new-job-form" class="needs-validation" novalidate>
{{csrf_field()}}
<div class="card card-edit-profile">
    <h2 class="fs-4 card-edit-profile__section">Thông tin tuyển dụng</h2>
    <div class="card-body">
        <div class="section-infomation account-infomation">
            <div class="row">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Job_title" class="font-weight-bold fs-18px">{{__('Job title')}} <span class="required">*</span> </label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="{{__('Job title')}}" value="{{ $edit && isset($job) ? __($job->title) : old('title') }}" required>
                            {!! APFrmErrHelp::showErrors($errors, 'title') !!}
                        </div>
                    </div>
                </div>
               


                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="industry_id" class="font-weight-bold fs-18px">{{__('Industry')}} <span class="required">*</span> </label>
                    {!! Form::select('industry_id', ['' => __('Select Industry')] + $industries, null, array('class'=>'form-control form-select', 'id'=>'industry_id' ,'required' => 'required' )) !!}
                    <div class="invalid-feedback">
                         Ngành nghề là bắt buộc
                    </div>
                </div>
                    </div>
                </div>


                <div class="row">
                    <div lass="col-md-6 col-lg-6 col-sm-12">
                            

                            <label for="City" class="font-weight-bold fs-18px my-2">{{__('Workplace')}}<span class="required">*</span></label>
                    
                  
                            <div class="d-flex justify-content-start  align-items-center">

                                    <input type="hidden" name="pow" value="0">
                                    <input class="form-check-input my-2 mx-1" type="checkbox" id="same_add_yes" name="pow" value="1" {{$edit && $job->is_same_company_add == APP\Job::SAME_COMPANY_ADD_YES ? "checked" : ""}} >
                                    <label class="form-check-label font-weight-bold fs-16px my-2 mx-1" for="same_add_yes">
                                        {{__('Same as company address')}}
                                    </label>

                               
                            </div>
                          

                 
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group" id="city_dd">
                            {!! Form::select('city_id', ['' => __('Select City')] + $cities, Request::get('city_id', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'city_id')) !!}
                            <div class="invalid-feedback">
                                Địa điểm làm việc là bắt buộc
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12" id="place_1">
                        <div class="form-group">

                            <input type="text" class="form-control" id="location" name="location" placeholder="{{__('Address')}}" value="{{ isset($job) ? $job->location : old('location') }}">
                            
                        </div>
                    </div>
                  
                    
                </div>
         


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description" class="font-weight-bold fs-18px">{{ __('Job description') }}<span class="required">*</span>  </label>
                            {!! Form::textarea('description', null, array('class'=>'form-control', 'id'=>'description', 'placeholder'=>__('Job description'), 'required' => 'required')) !!}
                            <div class="invalid-feedback">
                                Vui lòng nhập mô tả công việc.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="requirements" class="font-weight-bold fs-18px">{{ __('Job requirements') }}<span class="required">*</span>  </label>
                            {!! Form::textarea('requirement', null, array('class'=>'form-control', 'id'=>'requirement', 'placeholder'=>__('Job requirements'), 'required' => 'required')) !!}
                            <div class="invalid-feedback">
                                Vui lòng nhập yêu cầu công việc.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Benefits" class="font-weight-bold fs-18px">{{ __('Job Benefits') }} <span class="required">*</span> </label>
                            {!! Form::textarea('benefits', null, array('class'=>'form-control', 'id'=>'benefits', 'placeholder'=>__('Job Benefits'), 'required' => 'required')) !!}
                            <div class="invalid-feedback">
                                Vui lòng nhập yêu cầu phúc lợi.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6" id="salary_dd">
                        <div class="row">
                            <div class="col-md-12" id="salary_type_dd">
                                <div class="form-group">
                                    <label for="salary_type" class="font-weight-bold fs-18px">{{__('Salary Type')}} </label>
                                    @php($salaryTypes = \App\Job::getSalaryTypes())
                                    {{ Form::select('salary_type', $salaryTypes , $edit && isset($job) ? $job->salary_type : old('salary_type'), array('class'=>'form-control form-select', 'id'=>'salary_type')) }}
                                    {!! APFrmErrHelp::showErrors($errors, 'salary_type') !!}
                                </div>
                            </div>
                            <div class="col-md-12" id="salary_from_dd" style="display:none;">
                                <div class="form-group">
                                    <label for="salary_from" class="font-weight-bold fs-18px">{{__('Salary From')}} </label>
                                    <input type="text" class="form-control currency-mask" id="salary_from" placeholder="{{__('Salary From')}}" value="{{ $edit ? __($job->salary_from) : old('salary_from') }}" required>
                                    {!! APFrmErrHelp::showErrors($errors, 'salary_from') !!}
                                </div>
                            </div>
                            <div class="col-md-12" id="salary_to_dd" style="display:none;">
                                <div class="form-group">
                                    <label for="salary_range" class="font-weight-bold fs-18px">{{__('Salary To')}} </label>
                                    <input type="text" class="form-control currency-mask" id="salary_to" placeholder="{{__('Salary To')}}" value="{{ $edit ? __($job->salary_to) : old('salary_to') }}" required>
                                    {!! APFrmErrHelp::showErrors($errors, 'salary_to') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Ownership" class="font-weight-bold fs-18px">{{__('Functional Area')}} <span class="required">*</span> </label>
                            <select required class="form-control form-select" id="functional_area_id" name="functional_area_id">
                                <option value="">{{ __('Select one') }}</option>

                                @if(count($functionalAreas) > 0)
                                @foreach($functionalAreas as $key => $value)
                                <option {{ isset($job) && $job->functional_area_id == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                                @endif
                            </select>
                            {!! APFrmErrHelp::showErrors($errors, 'functional_area_id') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-12">
                        <div class="form-group">
                        

                            <label for="Job Type" class="font-weight-bold fs-18px my-3">{{__('Job Type')}} </label>
                            <div class="row">
                                @foreach (array_chunk($jobTypes, 3) as $chunk)
                                    <div class="col-md-4">

                                       
                                        @foreach ($chunk as $key => $jobType)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="job_type_id" value="{{ $key }}">
                                                <label class="form-check-label" for="{{ $jobType }}">
                                                    {{ $jobType }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="expiry_date" class="font-weight-bold fs-18px">Hạn nhận hồ sơ <span class="required">*</span> </label>
                            <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="Deadline" value="{{ $edit && isset($job) ? \Carbon\Carbon::parse($job->expiry_date)->format('d-m-Y') : \Carbon\Carbon::parse(old('expiry_date'))->format('d-m-Y') }}" required>
                        </div>
                    </div>
                </div>





              
              
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-custom-multiselect" id="skill_id_dd">
                            <label for="skill_id" class="font-weight-bold fs-18px">{{__('Desired Skills')}} </label>
                            {!! Form::select('skills[]', $jobSkills, null, ['class'=>'form-control form-select shadow-sm multiselect', 'id'=>'skill_id','multiple'=>true,"data-placeholder"=>"Month"], ) !!}
                            {!! APFrmErrHelp::showErrors($errors, 'skill_id') !!}



                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" id="status_dd">
                            <label for="status" class="font-weight-bold fs-18px">{{__('Job Status')}} </label>
                            <select required class="form-control form-select" id="status" name="status">
                                <option value="">{{ __('Select status') }} </option>
                                @foreach(\App\Job::getListStatusJob() as $key => $value)
                                <option {{ isset($job) && $job->status == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            {!! APFrmErrHelp::showErrors($errors, 'status') !!}
                        </div>
                    </div>
                </div> -->






            </div>
        </div>

    </div>
</div>

<div class="card card-edit-profile my-3">
    <h2 class="fs-4 card-edit-profile__section">Yêu cầu chung</h2>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="Gender" class="font-weight-bold fs-18px">{{__('Gender')}} </label>
                    <div class="d-flex">
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="gender" id="gender1" checked>
                            <label class="form-check-label" for="gender1">
                                Nam/ Nữ
                            </label>
                        </div>

                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="gender" id="gender2">
                            <label class="form-check-label" for="gender2">
                                Nam
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="gender3">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Nữ
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="Level" class="font-weight-bold fs-18px">{{__('Experience')}} </label>
                    {!! Form::select('job_experience_id', ['' => __('Select Required job experience')]+$jobExperiences, null, array('class'=>'form-control form-select', 'id'=>'job_experience_id')) !!}
                    {!! APFrmErrHelp::showErrors($errors, 'job_experience_id') !!}
                </div>
            </div>
            <div class="col-md-3 col-md-3 col-sm-12">
                <div class="form-group form-group-custom-chosen">
                    <label for="Level" class="font-weight-bold fs-18px">{{__('Career Level')}} </label>
                    {!! Form::select('career_level_id', ['' => __('Select Career Level')] + $careerLevels, null, array('class'=>'form-control form-select', 'id'=>'career_level_id')) !!}
                    {!! APFrmErrHelp::showErrors($errors, 'career_level_id') !!}
                </div>
            </div>

            
        </div>
    </div>

</div>


<div class="card card-edit-profile my-3">
    <h2 class="fs-4 card-edit-profile__section">THÔNG TIN KHÁC (KHÔNG BẮT BUỘC)</h2>
    <div class="card-body">
        <p>
        Giới thiệu về môi trường làm việc, thời gian thử việc, cơ hội huấn luyện, đồng nghiệp
        </p>
        <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="num_of_positions" class="font-weight-bold fs-18px">{{__('Number of positions')}} </label>&nbsp;&nbsp;&nbsp;<span class="text-danger" id="num_of_positions_error" class="error danger"></span>
                            <input type="text" class="form-control" id="num_of_positions" name="num_of_positions" placeholder="{{__('Number of positions')}}" value="{{ $edit && isset($job) ? $job->num_of_positions : old('num_of_positions') }}">

                        </div>
                    </div>
                </div>
        <div class="row">
            @if(isset($job))
            <div class="form-group form-checkbox wfh-chek">
                    <input type="checkbox" value="{{ $job->wfh }}" name="wfh" id="WFH" class="input_margin">
                    <label for="workfromhome">Work from home</label>
                    <br>
                    <span> Tick chọn nếu vị trí tuyển dụng này cho phép ứng viên có thể chọn chế độ làm việc tại nhà trong thời điểm hiện tại (Work from home) mà không nhất thiết phải có mặt tại văn phòng công ty. Hệ thống sẽ phân loại và đánh dấu đăng tuyển này vào danh mục tìm kiếm loại công việc là “Work from Home”.</span>
             </div>
            @else
             <div class="form-group form-checkbox wfh-chek">
                    <input type="checkbox" name="wfh" id="WFH" class="input_margin">
                    <label for="workfromhome">Work from home</label>
                    <br>
                    <span> Tick chọn nếu vị trí tuyển dụng này cho phép ứng viên có thể chọn chế độ làm việc tại nhà trong thời điểm hiện tại (Work from home) mà không nhất thiết phải có mặt tại văn phòng công ty. Hệ thống sẽ phân loại và đánh dấu đăng tuyển này vào danh mục tìm kiếm loại công việc là “Work from Home”.</span>
             </div>
            @endif
           
           

                       
         </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12 d-flex justify-content-center">
        <button   id="clearBtn" class="btn btn-outline m-2" type="button" >{{__('Reset form')}} </button>

        <button  id="scrollBtn" class="btn btn-croll-top m-2" type="button" >{{__('Review recruitment information')}} </button>
        <button class="btn btn-lg btn-primary m-2" type="submit" id="submit_create_job">{{__('Post Job')}} </button>
    </div>
</div>


<input type="file" name="image" id="image" style="display:none;" accept="image/*" />
</form>


@endif




@push('styles')
<style type="text/css">
    .font-weight-bold {
	font-weight: bold !important;
 
    }
    .datepicker>div {
        display: block;
    }

    .switch input {
        display: none;
    }

    .switch {
        display: inline-block;
        width: 60px;
        height: 30px;
        margin: 8px;
        transform: translateY(50%);
        position: relative;
    }

    /* Style Wired */
    .slider {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        border-radius: 30px;
        box-shadow: 0 0 0 2px #777, 0 0 4px #777;
        cursor: pointer;
        border: 4px solid transparent;
        overflow: hidden;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        width: 100%;
        height: 100%;
        background: var(--bs-primary);
        border-radius: 30px;
        transform: translateX(-30px);
        transition: .4s;
    }

    input:checked+.slider:before {
        transform: translateX(30px);
        background: var(--bs-primary);
    }

    input:checked+.slider {
        box-shadow: 0 0 0 2px var(--bs-primary), 0 0 2px var(--bs-primary);
    }

    /* Style Flat */
    .switch.flat .slider {
        box-shadow: none;
    }

    .switch.flat .slider:before {
        background: #FFF;
    }

    .switch.flat input:checked+.slider:before {
        background: white;
    }

    .switch.flat input:checked+.slider {
        background: limeGreen;
    }
    .btn-croll-top {
        background-color: #17a2b8;
        color: #ffff;
    } 
    .btn-croll-top:hover {
        opacity: 0.7;
    }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
@include('templates.employers.includes.tinyMCEFront')
<script type="text/javascript">

(function () {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
    })();
    $(document).ready(function () {
            // Show or hide the scroll-to-top button based on scroll position
            var isChecked = $('#same_add_yes').prop('checked');
            console.log(isChecked);
            if (isChecked) {
                $('#location').css("display","none");
                $('#city_id').css("display","none");
                $('#location').attr("required", false);
                $('#city_id').attr("required", false);

            }
            else {
                $('#location').css("display","block");
                $('#location').attr("required", true);
                $('#city_id').css("display","block");
                $('#city_id').attr("required", true);
            }    
    });

    var maxPlaces = 3;  // Set the maximum number of places

function addPlace() {
    // Check the current number of places
    var currentPlaces = $('[id^="place_"]').length;

    // If the maximum is reached, don't add more places
    if (currentPlaces >= maxPlaces) {
        alert('You can add a maximum of ' + maxPlaces + ' places.');
        return;
    }

    // Find the last place
    var lastPlace = $('[id^="place_"]:last-child');

    // Clone the last place
    var newPlace = lastPlace.clone();

    // Increment the ID and clear the value
    var newId = parseInt(newPlace.attr('id').split('_')[1]) + 1;
    newPlace.attr('id', 'place_' + newId);
    newPlace.find('[id^="location_"]').attr('id', 'location_' + newId).val('');

    // Uncheck the "Same as company address" checkbox
    newPlace.find('#same_add_yes').prop('checked', false);

    // Append the new place
    lastPlace.after(newPlace);
}

$(document).on('change', '#same_add_yes', function () {
    var isChecked = $(this).prop('checked');
    console.log(isChecked);
    if (isChecked) {
        $('#location').css("display","none");
        $('#city_id').css("display","none");
        $('#location').prop('required',false);
        $('#city_id').prop('required',false);


    }
    else {
        $('#location').css("display","block");
        $('select#location').attr("required", true);
        $('#city_id').css("display","block");
        $('select#city_id').attr("required", true);
    }
    // Disable or enable the input based on the checkbox

});

   




      $(document).ready(function () {
            // Show or hide the scroll-to-top button based on scroll position
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('#scrollBtn').fadeIn();
                } else {
                    $('#scrollBtn').fadeOut();
                }
            });

            // Scroll to top smoothly when the button is clicked
            $('#scrollBtn').click(function () {
                $('html, body').animate({ scrollTop: 0 }, 500);
            });
            $('#clearBtn').click(function() {
                // Get the form element and reset it
                $('#new-job-form')[0].reset();
              
                $("#skill_id").multiselect('clearSelection');
            });
        });

      

      $(".chosen").chosen();

$(document).ready(function () {
    $('#expiry_date').datepicker({
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });
   

    $('input[name="pow"]').click(function () {
        if ($(this).attr('id') == 'same_add_yes') {
            $('#pow_address').hide();
            $('#location').val('').removeAttr('name');
        } else {
            $('#pow_address').show();
        }
    });
    $('#num_of_positions').on('input keydown keyup mousedown mouseup select contextmenu drop focusout', function () {
        var number_of_posts = $(this).val();
        return /^[0-9]+$/.test(number_of_posts) ? $('#num_of_positions_error').html('').removeAttr('name') : $('#num_of_positions_error').html('Số lượng tuyển phải là số');
    });
});

$('#skill_id').each(function() {
    $(this).multiselect({
        texts: {
            placeholder: "{{__('Select desired skills')}}", // or $(this).prop('title'),
        },
    });
});
$(window).on('load', function () {
    
    if ($('#salary_type').val() == {{APP\Job::SALARY_TYPE_RANGE}}) {
        $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
        $('#salary_range_dd').show();
        $('#salary_from_dd').show();
        $('#salary_from').attr('name', 'salary_from');
        $('#salary_to_dd').show();
        $('#salary_to').attr('name', 'salary_to');
        $('#salary_type_dd').removeClass('col-md-12').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_from_dd').removeClass('col-md-12').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_to_dd').removeClass('col-md-12').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});

    } else if($('#salary_type').val() == {{APP\Job::SALARY_TYPE_FROM}}) {
        $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
        $('#salary_range').show();
        $('#salary_from_dd').show();
        $('#salary_from').attr('name', 'salary_from');
        $('#salary_type_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_from_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
    } else if($('#salary_type').val() == {{APP\Job::SALARY_TYPE_TO}}) {
        $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
        $('#salary_range').show();
        $('#salary_to_dd').show();
        $('#salary_to').attr('name', 'salary_to');
        $('#salary_type_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_to_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
    } else {
        $('#salary_range').show();
        //$('#salary_type_dd').removeClass('col-md-12').addClass('col-md-12').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
    }

});

$('#salary_type').change(function () {
    var salary_type = $(this).val();
    if (salary_type == {{APP\Job::SALARY_TYPE_RANGE}}) {
        $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
        $('#salary_type_dd').removeClass('col-md-12').removeClass('col-md-6').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_from').val('').attr('name', 'salary_from').attr('disabled', false);
        $('#salary_from_dd').removeClass('col-md-12').removeClass('col-md-6').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_to').val('').attr('name', 'salary_to').attr('disabled', false);
        $('#salary_to_dd').removeClass('col-md-12').removeClass('col-md-6').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_from_dd').show();
        $('#salary_to_dd').show();
    } else if(salary_type == {{APP\Job::SALARY_TYPE_FROM}}) {
        $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
        $('#salary_from').val('').attr('name', 'salary_from');
        $('#salary_to').val('').removeAttr('name');
        $('#salary_type_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_from_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_from_dd').show();
        $('#salary_to_dd').hide();
        $('#salary_to_dd input').removeAttr('required');
    } else if(salary_type == {{APP\Job::SALARY_TYPE_TO}}) {
        $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
        $('#salary_from').val('').removeAttr('name');
        $('#salary_to').val('').attr('name', 'salary_to');
        $('#salary_type_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_to_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_from_dd').hide();
        $('#salary_from_dd input').removeAttr('required');

        $('#salary_to_dd').show();
    } else {
        $('#salary_dd').removeClass('col-md-6').removeClass('col-md-4').addClass('col-md-12').css({'display':'inline-block', 'margin':'0px','padding':'10px'});;
        $('#salary_from').val('').removeAttr('name').attr('disabled', true);
        $('#salary_to').val('').removeAttr('name').attr('disabled', true);
        $('#salary_from_dd').hide();
        $('#salary_to_dd').hide();
        $('#salary_from_dd input').removeAttr('required');
        $('#salary_to_dd input').removeAttr('required');

    }

});



</script> 
@endpush