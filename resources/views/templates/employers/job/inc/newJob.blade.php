<form method="POST" action="{{route('store.front.job')}}" accept-charset="UTF-8" id="new-job-form" class="needs-validation" novalidate>
    {{csrf_field()}}
    <div class="card card-edit-profile">
        <h2 class="fs-4 card-edit-profile__section">Thông Tin Tuyển Dụng</h2>
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
                                    Ngành Nghề là bắt buộc
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div lass="col-md-6 col-lg-6 col-sm-12">


                            <label for="City" class="font-weight-bold fs-18px my-2">Địa Điểm Làm Việc<span class="required">*</span></label>





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

                                <input type="text" class="form-control" id="location" name="location" placeholder="Địa chỉ làm việc" value="{{ isset($job) ? $job->location : old('location') }}">

                            </div>
                        </div>


                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description" class="font-weight-bold fs-18px">{{ __('Job description') }}<span class="required">*</span> </label>
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
                                <label for="requirements" class="font-weight-bold fs-18px">{{ __('Job requirements') }}<span class="required">*</span> </label>
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

                        <div class="form-group form-group-custom-chosen">
                            <label for="Job Type" class="font-weight-bold fs-18px">{{__('Job Type')}} </label>
                            <div class="row">
                                @foreach ($jobTypes as $itemType)
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="job_type_id" value="{{$itemType->id}}" id="jobtype{{$itemType->id}}">
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
                                <label for="expiry_date" class="font-weight-bold fs-18px">Hạn Nhận Hồ Sơ  <span class="required">*</span> </label>
                                <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="Deadline" value="{{ $edit && isset($job) ? \Carbon\Carbon::parse($job->expiry_date)->format('d-m-Y') : \Carbon\Carbon::parse(old('expiry_date'))->format('d-m-Y') }}" required>
                            </div>
                        </div>
                    </div>









                </div>
            </div>

        </div>
    </div>

    <div class="card card-edit-profile my-3" id="benefit_section">
        <h2 class="fs-4 card-edit-profile__section">Phúc Lợi</h2>
        <div class="card-body">
                        <div class="row" bis_skin_checked="1">
                                <div class="col-sm-6 col-md-6 col-xl-3" bis_skin_checked="1">
                                    <div class="form-group form-checkbox" bis_skin_checked="1">
                                        <input type="checkbox" class="big-checkbox" id="benefit_id_1" name="benefit_id[]" value="1" >
                                        <label for="benefit_id_1"> <em class="fa fa-medkit"></em>Chế độ bảo hiểm</label>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6 col-xl-3" bis_skin_checked="1">
                                    <div class="form-group form-checkbox" bis_skin_checked="1">
                                        <input type="checkbox" class="" id="benefit_id_2" name="benefit_id[]" value="2" >
                                        <label for="benefit_id_2"> <i class="fas fa-bus"></i>Đi lại</label>
                                    </div>
                                </div>
                          
                                <div class="col-sm-6 col-md-6 col-xl-3" bis_skin_checked="1">
                                    <div class="form-group form-checkbox" bis_skin_checked="1">
                                        <input type="checkbox" class="" id="benefit_id_3" name="benefit_id[]" value="3" >
                                        <label for="benefit_id_3"> <em class="fa fa-usd"></em>Chế độ thưởng</label>
                                    </div>
                                </div>
                                                                <div class="col-sm-6 col-md-6 col-xl-3" bis_skin_checked="1">
                                    <div class="form-group form-checkbox" bis_skin_checked="1">
                                        <input type="checkbox" class="" id="benefit_id_4" name="benefit_id[]" value="4" >
                                        <label for="benefit_id_4"> <em class="fa fa-user-md"></em>Chăm sóc sức khỏe</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-xl-3" bis_skin_checked="1">
                                    <div class="form-group form-checkbox" bis_skin_checked="1">
                                        <input type="checkbox" class="" id="benefit_id_5" name="benefit_id[]" value="5" >
                                        <label for="benefit_id_5"> <em class="fa fa-graduation-cap"></em>Đào tạo</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-xl-3" bis_skin_checked="1">
                                    <div class="form-group form-checkbox" bis_skin_checked="1">
                                        <input type="checkbox" class="" id="benefit_id_6" name="benefit_id[]" value="6">
                                        <label for="benefit_id_6"> <em class="fa fa-laptop"></em>Laptop</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-xl-3" bis_skin_checked="1">
                                    <div class="form-group form-checkbox" bis_skin_checked="1">
                                        <input type="checkbox" class="" id="benefit_id_7" name="benefit_id[]" value="7">
                                        <label for="benefit_id_7"> <i class="fas fa-money-bill-wave"></i>Phụ cấp</label>
                                    </div>
                                </div>
                            
                             
                               
                                <div class="col-sm-6 col-md-6 col-xl-3" bis_skin_checked="1">
                                    <div class="form-group form-checkbox" bis_skin_checked="1">
                                        <input type="checkbox" class="" id="benefit_id_8" name="benefit_id[]" value="8">
                                        <label for="benefit_id_8"> <em class="fa fa-taxi"></em>Xe đưa đón</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-xl-3" bis_skin_checked="1">
                                    <div class="form-group form-checkbox" bis_skin_checked="1">
                                        <input type="checkbox" class="" id="benefit_id_9" name="benefit_id[]" value="9">
                                        <label for="benefit_id_9"> <em class="fa fa-fighter-jet"></em>Du lịch nước ngoài</label>
                                    </div>
                                </div>
                                                  
                                
                                <div class="col-sm-6 col-md-6 col-xl-3" bis_skin_checked="1">
                                    <div class="form-group form-checkbox" bis_skin_checked="1">
                                        <input type="checkbox" class="" id="benefit_id_10" name="benefit_id[]" value="10">
                                        <label for="benefit_id_10"><i class="fas fa-tshirt"></i>Đồng phục</label>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6 col-xl-3" bis_skin_checked="1">
                                    <div class="form-group form-checkbox" bis_skin_checked="1">
                                        <input type="checkbox" class="" id="benefit_id_11" name="benefit_id[]" value="11">
                                        <label for="benefit_id_11"> <em class="fa fa-line-chart"></em>Tăng lương</label>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6 col-xl-3" bis_skin_checked="1">
                                    <div class="form-group form-checkbox" bis_skin_checked="1">
                                        <input type="checkbox" class="" id="benefit_id_12" name="benefit_id[]" value="12">
                                        <label for="benefit_id_12"> <i class="fas fa-suitcase"></i>Nghỉ phép</label>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6 col-xl-3" bis_skin_checked="1">
                                    <div class="form-group form-checkbox" bis_skin_checked="1">
                                        <input type="checkbox" class="" id="benefit_id_13 " name="benefit_id[]" value="13 ">
                                        <label for="benefit_id_13 "><i class="fas fa-money-bill-wave"></i>Thâm niên</label>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6 col-xl-3" bis_skin_checked="1">
                                    <div class="form-group form-checkbox" bis_skin_checked="1">
                                        <input type="checkbox" class="" id="benefit_id_14" name="benefit_id[]" value="14">
                                        <label for="benefit_id_14"> <i class="fas fa-heartbeat"></i>Câu lạc bộ thể thao</label>
                                    </div>
                                </div>
                        </div>
            
        </div>

    </div>



    <div class="card card-edit-profile my-3">
        <h2 class="fs-4 card-edit-profile__section">Yêu Cầu Chung</h2>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="Gender" class="font-weight-bold fs-18px">{{__('Gender')}} </label>
                        <div class="d-flex">
                            <div class="form-check m-2">
                                <input class="form-check-input" type="radio" value="3" name="gender" id="gender3" checked>
                                <label class="form-check-label" for="gender3">
                                    Nam/ Nữ
                                </label>
                            </div>

                            <div class="form-check m-2">
                                <input class="form-check-input" type="radio" value="0" name="gender" id="gender0">
                                <label class="form-check-label" for="gender0">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check m-2">
                                <input class="form-check-input" type="radio" value="1" name="gender" id="gender1">
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


                <div class="col-md-3 col-md-3 col-sm-12">
                    <div class="form-group form-group-custom-chosen">
                        <label for="degree_level_id" class="font-weight-bold fs-18px">Bằng Cấp </label>
                        <select name="degree_level_id" id="degree_level_id" class="form-control form-select">
                            <option value=""> Chọn bằng cấp</option>
                            @foreach ($degreeLevel as $item)
                            <option value="{{$item->id}}"> {{$item->degree_level}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <div class="card card-edit-profile my-3">
        <h2 class="fs-4 card-edit-profile__section">Thông Tin Khác (Không Bắt Buộc)</h2>
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
                    <span> Tick chọn nếu vị trí tuyển dụng này cho phép ứng viên có thể chọn chế độ làm việc tại nhà trong thời điểm hiện tại (Work from home) mà không nhất thiết phải có mặt tại văn phòng công ty. Hệ thống sẽ phân loại và đánh dấu đăng tuyển này vào danh mục Tìm Kiếm loại công việc là “Work from Home”.</span>
                </div>
                @else
                <div class="form-group form-checkbox wfh-chek">
                    <input type="checkbox" name="wfh" id="WFH" class="input_margin">
                    <label for="workfromhome">Work from home</label>
                    <br>
                    <span> Tick chọn nếu vị trí tuyển dụng này cho phép ứng viên có thể chọn chế độ làm việc tại nhà trong thời điểm hiện tại (Work from home) mà không nhất thiết phải có mặt tại văn phòng công ty. Hệ thống sẽ phân loại và đánh dấu đăng tuyển này vào danh mục Tìm Kiếm loại công việc là “Work from Home”.</span>
                </div>
                @endif

                <div class="col-md-6">
                    <div class="container todo-container">
                
                        <div class="form-group">
                            <label for="degree_level_id" class="font-weight-bold fs-18px">Tên Resume Tag</label>
                            <div class="d-flex justify-content-center">
                                <input type="text" id="addtag" class="form-control" placeholder="Tên Resume Tag" aria-label="Add a new task" aria-describedby="addButton">
                                <button class="btn btn-primary mx-2" type="button" id="addButton">Thêm tag</button>
                            </div>
                            
                        </div>
    
                    </div>
                    <div class="welfare" id="todoList">
                        <!-- To-Do items will be added here dynamically -->
                    </div>
                    <input type="hidden" name="tags[]" id="tagsInput">
                </div>





            </div>
        </div>

    </div>

    <div class="row">
        <div class="group-btn-create-job col-md-12 d-flex justify-content-center">
            <button id="clearBtn" class="btn btn-outline m-2" type="button">{{__('Reset form')}} </button>

            <button id="scrollBtn" class="btn btn-croll-top m-2" type="button">{{__('Review recruitment information')}} </button>
            <button class="btn btn-lg btn-primary m-2" type="submit" id="submit_create_job">{{__('Post Job')}} </button>
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
.big-checkbox {width: 15px; height: 15px;}
#benefit_section em,#benefit_section label,#benefit_section i{
    font-size: 17px; 
    margin: 0 8px;
}
</style>
@endpush

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var form = document.getElementById('new-job-form')
        console.log(form);
    // Loop over them and prevent submission  
        form.addEventListener('submit', function (event) {
           
            if (form.checkValidity()) {
                form.classList.remove('was-validated')
                form.submit();
            }
            else {
                
                form.classList.add('was-validated')
                event.preventDefault()
                event.stopPropagation()
            }



        })
    })
    
       
 
    $(document).ready(function () {
        var tagsArray = [];

        // Add a new task to the list
        $("#new-job-form #addButton").click(function () {
            var todoText = $("#new-job-form #addtag").val();
            if (todoText !== "" && !tagsArray.includes(todoText)) {
                var listItem = $("<span>").addClass("box-meta").text(todoText);
                listItem.append('<i class="fa-solid fa-xmark mx-2 text-primary"></i>');
                
                
                $("#new-job-form #todoList").append(listItem);

                tagsArray.push(todoText);

                // Update the hidden input field with the array of tags
                $("#new-job-form #tagsInput").val(JSON.stringify(tagsArray));

                $("#new-job-form #addtag").val("");
            }
            else {
                alert("Tag bị trùng lặp");
            }
        });

        // Remove a task from the list when clicked
        $("#new-job-form #todoList").on("click", "span", function () {
            var removedItem = $(this).text().trim();
            tagsArray = tagsArray.filter(item => item !== removedItem);
            $(this).remove();

            // Update the hidden input field with the updated array of tags
            $("#new-job-form #tagsInput").val(JSON.stringify(tagsArray));
        });
    });
</script>
@endpush



