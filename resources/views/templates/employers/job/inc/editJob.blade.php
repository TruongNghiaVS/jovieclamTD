{!! Form::model($job, array('method' => 'put', 'route' => array('update.front.job', $job->id), 'class' => 'form')) !!}
{!! Form::hidden('id', $job->id) !!}
<?php
// PHP code goes here

if($job->tags == '')
{
    $test =  [];
}
else 
{
    $test =  json_decode($job->tags);
}

?>

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
                            
            
                            <label for="City" class="font-weight-bold fs-18px my-2">Địa điểm làm việc  <span class="required">*</span> </label>
                    
                  
                          

                 
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
                      
                            <input type="text" class="form-control" id="location" name="location" placeholder="Địa điểm làm việc" value="{{ isset($job) ? $job->location : old('location') }}">
                            
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

                <!-- <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Ownership" class="font-weight-bold fs-18px">{{__('Functional Area')}}  <span class="required">*</span> 
                        
                        </label>
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
                </div> -->
                <div class="row">
               
                        <div class="form-group form-group-custom-chosen">
                            <label for="Job Type" class="font-weight-bold fs-18px">{{__('Job Type')}} </label>
                            <div class="row">
                                     @foreach ($jobTypes as  $itemType)
                                        <div class="col-md-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="job_type_id" value ="{{$itemType->id}}" id ="jobtype{{$itemType->id}}">
                                                <label class="form-check-label" for="job_type_id">
                                                    {{ $itemType->job_type }}
                                                </label>
                                            </div>
                                        </div>
            
                                    @endforeach
                                  
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





              
              
                <!-- <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-custom-multiselect" id="skill_id_dd">
                            <label for="skill_id" class="font-weight-bold fs-18px">{{__('Desired Skills')}} </label>
                            {!! Form::select('skills[]', $jobSkills, null, ['class'=>'form-control form-select shadow-sm multiselect', 'id'=>'skill_id','multiple'=>true,"data-placeholder"=>"Month"], ) !!}
                            {!! APFrmErrHelp::showErrors($errors, 'skill_id') !!}



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
                            <input class="form-check-input" type="radio" value ="3"  name="gender" id="gender3" >
                            <label class="form-check-label" for="gender1">
                                Nam/ Nữ
                            </label>
                        </div>

                        <div class="form-check m-2">
                             <input class="form-check-input" type="radio" value ="0"   name="gender" id="gender0">
                          
                            <label class="form-check-label" for="gender0">
                                Nam
                            </label>
                        </div>
                        <div class="form-check m-2">
                          

                            <input class="form-check-input" type="radio" value ="1"  name="gender" id="gender1">
                            <label class="form-check-label" for="gender1">
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

            
            <div class="col-md-3 col-md-3 col-sm-12">
            <div class="form-group form-group-custom-chosen">
                    <label for="degree_level_id" class="font-weight-bold fs-18px">Bằng cấp </label>
                   <select name ="degree_level_id"  id ="degree_level_id" class ="form-control form-select">
                   <option value=""> Chọn bằng cấp</option> 
                   @foreach ($degreeLevel as $item)
                   @if($job->degree_level_id == $item->id )
                         <option selected value="{{$item->id}}"> {{$item->degree_level}}</option> 
                   @else 
                        <option value="{{$item->id}}"> {{$item->degree_level}}</option> 
                   @endif
                
                   @endforeach
                   </select>
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

                      @if($job->wfh == 1)
                        <input type="checkbox"  name="wfh" id="WFH" checked class="input_margin" >
                      @else
                         <input type="checkbox"  name="wfh" id="WFH" class="input_margin" >
                      @endif
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

            <div class="col-md-6">
                    <div class="container todo-container">
                
                        <div class="form-group">
                            <label for="degree_level_id" class="font-weight-bold fs-18px"> Tên resume tag </label>
                            <div class="d-flex justify-content-center">
                                <input type="text" id="addtag" class="form-control" placeholder="Tên resume tag"  aria-describedby="addButton">
                                <button class="btn btn-primary mx-2" type="button" id="addButton">Thêm tag</button>
                            </div>
                            
                        </div>
    
                    </div>
                    <div class="welfare" id="todoList">
                        <!-- To-Do items will be added here dynamically -->
                        @if($test)
                            @foreach ($test as $item)
                                <span class="box-meta">{{$item}}<i class="fa-solid fa-xmark mx-2 text-primary"></i></span>
                            @endforeach
                        @endif
                        
                    </div>
                    <input type="hidden" name="tags[]" id="tagsInput">
                </div>

         
         </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12 d-flex justify-content-center">
     
  

        <button  id="scrollBtn" class="btn btn-croll-top m-2" type="button" >lên trên đầu </button>
        @if($job->status =="2")
            <button class="btn btn-lg btn-primary m-2" type="submit" id="submit_update_job">Cập nhật </button>
      
        @endif
       
    </div>
</div>


<input type="file" name="image" id="image" style="display:none;" accept="image/*" />
</form>

@push('styles')
<style>
    #addtag {
        flex: 1;
    }
    .welfare {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
    width: 100%;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: start;
    -ms-flex-pack: start;
    justify-content: flex-start;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    }

    .box-meta {
       
        font-size: 15px;
        line-height: 15px;
        color: var(--sub-text);
        text-decoration: none;
        display: flex;
    }
    .welfare span {
    padding: 10px;
    background-color: #D9D9D9;
    color: #000000;
    border-radius: 20px;
    margin-right: 10px;
    margin-bottom: 10px;
    cursor: pointer;
}
.box-meta i {
    margin-top: 2px;
}
</style>
@endpush

@push('scripts')
<script type="text/javascript">
 $(document).ready(function () {
        var tagsArray = [];

        // Add a new task to the list
        $("#addButton").click(function () {
            var todoText = $("#addtag").val();
            if (todoText !== "") {
                var listItem = $("<span>").addClass("box-meta").text(todoText);
                listItem.append('<i class="fa-solid fa-xmark mx-2 text-primary"></i>');
                
                
                $("#todoList").append(listItem);
                
                tagsArray.push(todoText);

                // Update the hidden input field with the array of tags
                $("#tagsInput").val(JSON.stringify(tagsArray));

                $("#addtag").val("");
            }
        });

        // Remove a task from the list when clicked
        $("#todoList").on("click", "span", function () {
            $(this).remove();
        });
    });
</script>
<script>
  window.addEventListener('DOMContentLoaded',function () {
    document.getElementById("gender{{$job->gender_id}}").checked = true;
    document.getElementById("jobtype{{$job->job_type_id}}").checked = true;
});
</script>
@endpush