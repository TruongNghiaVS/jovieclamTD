{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
@if(isset($user))
{!! Form::model($user, array('method' => 'put', 'route' => array('update.user', $user->id), 'class' => 'form', 'files'=>true)) !!}
{!! Form::hidden('id', $user->id) !!}
@else
{!! Form::open(array('method' => 'post', 'route' => 'store.user', 'class' => 'form', 'files'=>true)) !!}
@endif
<div class="form-body">    
    <input type="hidden" name="front_or_admin" value="admin" />
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'image') !!}">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <img src="{{ asset('/') }}admin_assets/no-image.jpg" alt="" /> </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                    <div> <span class="btn default btn-file"> <span class="fileinput-new"> Lựa chọn ảnh Hồ sơ </span> <span class="fileinput-exists"> Thay đổi </span> {!! Form::file('image', null, array('id'=>'image')) !!} </span> <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Gỡ bỏ </a> </div>
                </div>
                {!! APFrmErrHelp::showErrors($errors, 'image') !!} </div>
        </div>
        @if(isset($user))
        <div class="col-md-6">
            {{ ImgUploader::print_image("user_images/$user->image") }}        
        </div>    
        @endif  
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'first_name') !!}">
        {!! Form::label('first_name', 'Họ', ['class' => 'bold']) !!}
        {!! Form::text('first_name', null, array('class'=>'form-control', 'id'=>'first_name', 'placeholder'=>'Họ')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'first_name') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'middle_name') !!}">
        {!! Form::label('middle_name', 'Tên lót/đệm', ['class' => 'bold']) !!}
        {!! Form::text('middle_name', null, array('class'=>'form-control', 'id'=>'middle_name', 'placeholder'=>'Tên lót/đệm')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'middle_name') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'last_name') !!}">
        {!! Form::label('last_name', 'Tên', ['class' => 'bold']) !!}
        {!! Form::text('last_name', null, array('class'=>'form-control', 'id'=>'last_name', 'placeholder'=>'Tên')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'last_name') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'email') !!}">
        {!! Form::label('email', 'Email', ['class' => 'bold']) !!}                    
        {!! Form::text('email', null, array('class'=>'form-control', 'id'=>'email', 'placeholder'=>'Email')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'email') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'password') !!}">
        {!! Form::label('password', 'Mật khẩu', ['class' => 'bold']) !!}
        {!! Form::password('password', array('class'=>'form-control', 'id'=>'password', 'placeholder'=>'Mật khẩu')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'password') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'father_name') !!}">
        {!! Form::label('father_name', 'Họ tên cha', ['class' => 'bold']) !!}
        {!! Form::text('father_name', null, array('class'=>'form-control', 'id'=>'father_name', 'placeholder'=>'Họ tên cha')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'father_name') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'date_of_birth') !!}">
        {!! Form::label('date_of_birth', 'Ngày sinh', ['class' => 'bold']) !!}
        {!! Form::text('date_of_birth', null, array('class'=>'form-control datepicker', 'id'=>'date_of_birth', 'placeholder'=>'Ngày sinh', 'autocomplete'=>'off')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'date_of_birth') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'gender_id') !!}">
        {!! Form::label('gender_id', 'Giới Tính', ['class' => 'bold']) !!}
        {!! Form::select('gender_id', [''=>'Lựa chọn']+[1=>'Nữ', 2=>'Nam'], null, array('class'=>'form-control', 'id'=>'gender_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'gender_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'marital_status_id') !!}">
        {!! Form::label('marital_status_id', 'Tình trạng hôn nhân', ['class' => 'bold']) !!}
        {!! Form::select('marital_status_id', [''=>'Lựa chọn']+$maritalStatuses, null, array('class'=>'form-control', 'id'=>'marital_status_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'marital_status_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'nationality_id') !!}">
        {!! Form::label('nationality_id', 'Quốc tịch', ['class' => 'bold']) !!}
        {!! Form::select('nationality_id', [''=>'Lựa chọn']+$nationalities, null, array('class'=>'form-control', 'id'=>'nationality_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'nationality_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'national_id_card_number') !!}">
        {!! Form::label('national_id_card_number', 'CMND/CCCD/Mã định danh#', ['class' => 'bold']) !!}
        {!! Form::text('national_id_card_number', null, array('class'=>'form-control', 'id'=>'national_id_card_number', 'placeholder'=>'CMND/CCCD/Mã định danh#')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'national_id_card_number') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'country_id') !!}">
        {!! Form::label('country_id', 'Quốc Gia', ['class' => 'bold']) !!}
        {!! Form::select('country_id', [''=>'Lựa chọn']+$countries, old('country_id', (isset($user))? $user->country_id:$siteSetting->default_country_id), array('class'=>'form-control', 'id'=>'country_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'country_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'state_id') !!}">
        {!! Form::label('state_id', 'Vùng miền', ['class' => 'bold']) !!}
        <span id="default_state_dd">
            {!! Form::select('state_id', [''=>'Lựa chọn'], null, array('class'=>'form-control', 'id'=>'state_id')) !!}
        </span>
        {!! APFrmErrHelp::showErrors($errors, 'state_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'city_id') !!}">
        {!! Form::label('city_id', 'Tỉnh/Thành', ['class' => 'bold']) !!}
        <span id="default_city_dd">
            {!! Form::select('city_id', [''=>'Lựa chọn'], null, array('class'=>'form-control', 'id'=>'city_id')) !!}
        </span>
        {!! APFrmErrHelp::showErrors($errors, 'city_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'phone') !!}">
        {!! Form::label('phone', 'Điện thoại', ['class' => 'bold']) !!}
        {!! Form::text('phone', null, array('class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Điện thoại')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'phone') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'mobile_num') !!}">
        {!! Form::label('mobile_num', 'Di động', ['class' => 'bold']) !!}
        {!! Form::text('mobile_num', null, array('class'=>'form-control', 'id'=>'mobile_num', 'placeholder'=>'Di động')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'mobile_num') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'job_experience_id') !!}">
        {!! Form::label('job_experience_id', 'Experience', ['class' => 'bold']) !!}                    
        {!! Form::select('job_experience_id', [''=>'Lựa chọn']+$jobExperiences, null, array('class'=>'form-control', 'id'=>'job_experience_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'job_experience_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'career_level_id') !!}">
        {!! Form::label('career_level_id', 'Cấp bậc Nghề', ['class' => 'bold']) !!}
        {!! Form::select('career_level_id', [''=>'Lựa chọn']+$careerLevels, null, array('class'=>'form-control', 'id'=>'career_level_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'career_level_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'industry_id') !!}">
        {!! Form::label('industry_id', 'Ngành Nghề', ['class' => 'bold']) !!}
        {!! Form::select('industry_id', [''=>'Lựa chọn']+$industries, null, array('class'=>'form-control', 'id'=>'industry_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'industry_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'functional_area_id') !!}">
        {!! Form::label('functional_area_id', __('Functional Area'), ['class' => 'bold']) !!}
        {!! Form::select('functional_area_id', [''=>'Lựa chọn']+$functionalAreas, null, array('class'=>'form-control', 'id'=>'functional_area_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'functional_area_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'current_salary') !!}">
        {!! Form::label('current_salary', 'Mức lương hiện tại', ['class' => 'bold']) !!}
        {!! Form::text('current_salary', null, array('class'=>'form-control', 'id'=>'current_salary', 'placeholder'=>'Mức lương hiện tại')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'current_salary') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'expected_salary') !!}">
        {!! Form::label('expected_salary', 'Mức lương kỳ vọng', ['class' => 'bold']) !!}
        {!! Form::text('expected_salary', null, array('class'=>'form-control', 'id'=>'expected_salary', 'placeholder'=>'Mức lương kỳ vọng')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'expected_salary') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'salary_currency') !!}">
        {!! Form::label('salary_currency', 'Đồng tiền trả lương', ['class' => 'bold']) !!}
        {!! Form::text('salary_currency', null, array('class'=>'form-control', 'id'=>'salary_currency', 'placeholder'=>'Đồng tiền trả lương', 'autocomplete'=>'off')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'salary_currency') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'street_address') !!}">
        {!! Form::label('street_address', 'Địa Chỉ Chi Tiết', ['class' => 'bold']) !!}
        {!! Form::textarea('street_address', null, array('class'=>'form-control', 'id'=>'street_address', 'placeholder'=>'Địa Chỉ chi tiết')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'street_address') !!}                                       
    </div>

    @if((bool)config('jobseeker.is_jobseeker_package_active'))
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'job_seeker_package_id') !!}"> {!! Form::label('job_seeker_package_id', 'Gói đăng ký', ['class' => 'bold']) !!}
        {!! Form::select('job_seeker_package_id', ['' => 'Lựa chọn']+$packages, null, array('class'=>'form-control', 'id'=>'job_seeker_package_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'job_seeker_package_id') !!} </div>

    @if(isset($user) && $user->package_id > 0)
    <div class="form-group">
        {!! Form::label('package', 'Package : ', ['class' => 'bold']) !!}         
        <strong>{{$user->getPackage('package_title')}}</strong>
    </div>
    <div class="form-group">
        {!! Form::label('package_Duration', 'Khoảng thời gian đăng ký : ', ['class' => 'bold']) !!}
        <strong>{{$user->package_start_date->format('d M, Y')}}</strong> - <strong>{{$user->package_end_date->format('d M, Y')}}</strong>
    </div>
    <div class="form-group">
        {!! Form::label('package_quota', 'Hạn mức : ', ['class' => 'bold']) !!}
        <strong>{{$user->availed_jobs_quota}}</strong> / <strong>{{$user->jobs_quota}}</strong>
    </div>
    <hr/>
    @endif
    @endif


    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_immediate_available') !!}">
        {!! Form::label('is_immediate_available', 'Có mức trung gian?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_immediate_available_1 = 'checked="checked"';
            $is_immediate_available_2 = '';
            if (old('is_immediate_available', ((isset($user)) ? $user->is_immediate_available : 1)) == 0) {
                $is_immediate_available_1 = '';
                $is_immediate_available_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="immediate_available" name="is_immediate_available" type="radio" value="1" {{$is_immediate_available_1}}>
                Có </label>
            <label class="radio-inline">
                <input id="not_immediate_available" name="is_immediate_available" type="radio" value="0" {{$is_immediate_available_2}}>
                Không </label>
        </div>
        {!! APFrmErrHelp::showErrors($errors, 'is_immediate_available') !!}
    </div>


    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_active') !!}">
        {!! Form::label('is_active', 'Hiển thị?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_active_1 = 'checked="checked"';
            $is_active_2 = '';
            if (old('is_active', ((isset($user)) ? $user->is_active : 1)) == 0) {
                $is_active_1 = '';
                $is_active_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="active" name="is_active" type="radio" value="1" {{$is_active_1}}>
                Hiển thị </label>
            <label class="radio-inline">
                <input id="not_active" name="is_active" type="radio" value="0" {{$is_active_2}}>
                Ẩn </label>
        </div>
        {!! APFrmErrHelp::showErrors($errors, 'is_active') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'verified') !!}">
        {!! Form::label('verified', 'Đã xác nhận?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $verified_1 = 'checked="checked"';
            $verified_2 = '';
            if (old('verified', ((isset($user)) ? $user->verified : 1)) == 0) {
                $verified_1 = '';
                $verified_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="verified" name="verified" type="radio" value="1" {{$verified_1}}>
                Đã xác nhận </label>
            <label class="radio-inline">
                <input id="not_verified" name="verified" type="radio" value="0" {{$verified_2}}>
                Chưa xác nhận </label>
        </div>
        {!! APFrmErrHelp::showErrors($errors, 'verified') !!}
    </div> 
    {!! Form::button('Cập Nhật Thông Tin ', array('class'=>'btn btn-large btn-primary', 'type'=>'submit')) !!}
</div>
{!! Form::close() !!}
@push('css')
<style type="text/css">
    .datepicker>div {
        display: block;
    }
</style>
@endpush
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        initdatepicker();
        $('#salary_currency').typeahead({
            source: function (query, process) {
                return $.get("{{ route('typeahead.currency_codes') }}", {query: query}, function (data) {
                    console.log(data);
                    data = $.parseJSON(data);
                    return process(data);
                });
            }
        });

        $('#country_id').on('change', function (e) {
            e.preventDefault();
            filterDefaultStates(0);
        });
        $(document).on('change', '#state_id', function (e) {
            e.preventDefault();
            filterDefaultCities(0);
        });
        filterDefaultStates(<?php echo old('state_id', (isset($user)) ? $user->state_id : 0); ?>);
    });
    function filterDefaultStates(state_id)
    {
        var country_id = $('#country_id').val();
        if (country_id != '') {
            $.post("{{ route('filter.default.states.dropdown') }}", {country_id: country_id, state_id: state_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#default_state_dd').html(response);
                        filterDefaultCities(<?php echo old('city_id', (isset($user)) ? $user->city_id : 0); ?>);
                    });
        }
    }
    function filterDefaultCities(city_id)
    {
        var state_id = $('#state_id').val();
        if (state_id != '') {
            $.post("{{ route('filter.default.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#default_city_dd').html(response);
                    });
        }
    }
    function initdatepicker() {
        $(".datepicker").datepicker({
            autoclose: true,
            format:'dd-mm-yyyy',
            locale:'vi',
language: 'vi',
orientation: "bottom auto",
        });
    }
</script>
@endpush
