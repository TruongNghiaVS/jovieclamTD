{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'image') !!}">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <img src="{{ asset('/') }}admin_assets/no-image.jpg" alt="" /> </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                    <div> <span class="btn default btn-file"> <span class="fileinput-new"> Logo </span> <span class="fileinput-exists"> Thay đổi </span> {!! Form::file('image', null, array('id'=>'image')) !!} </span> <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Gỡ bỏ </a> </div>
                </div>
                {!! APFrmErrHelp::showErrors($errors, 'image') !!} </div>
        </div>
        @if(isset($siteSetting))
        <div class="col-md-6">
            {{ ImgUploader::print_image("sitesetting_images/thumb/$siteSetting->site_logo") }}        
        </div>    
        @endif  
    </div>
    
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'favicon') !!}">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <img src="{{ asset('/') }}admin_assets/no-image.jpg" alt="" /> </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 16px; max-height: 16px;"> </div>
                    <div> <span class="btn default btn-file"> <span class="fileinput-new"> Favicon </span> <span class="fileinput-exists"> Thay đổi </span> {!! Form::file('favicon', null, array('id'=>'favicon')) !!} </span> <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Gỡ bỏ </a> </div>
                </div>
                <span id="name-error" class="help-block help-block-error">Ảnh favicon phải có định dạng/đuôi ".ico"</span>
            </div>
        </div>
        @if(isset($siteSetting))
        <div class="col-md-6">
            {{ ImgUploader::print_image("favicon.ico") }}        
        </div>    
        @endif  
    </div>
    
    
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'site_name') !!}">
        {!! Form::label('site_name', 'Tên Website', ['class' => 'bold']) !!}
        {!! Form::text('site_name', null, array('class'=>'form-control', 'id'=>'site_name', 'placeholder'=>'Tên website')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'site_name') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'site_slogan') !!}">
        {!! Form::label('site_slogan', 'Slogan Website', ['class' => 'bold']) !!}
        {!! Form::text('site_slogan', null, array('class'=>'form-control', 'id'=>'site_slogan', 'placeholder'=>'Slogan Website')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'site_slogan') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'site_phone_primary') !!}">
        {!! Form::label('site_phone_primary', 'Số Điện Thoại Chính#', ['class' => 'bold']) !!}
        {!! Form::text('site_phone_primary', null, array('class'=>'form-control', 'id'=>'site_phone_primary', 'placeholder'=>'Số Điện Thoại chính#')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'site_phone_primary') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'site_phone_secondary') !!}">
        {!! Form::label('site_phone_secondary', 'Số Điện Thoại phụ#', ['class' => 'bold']) !!}
        {!! Form::text('site_phone_secondary', null, array('class'=>'form-control', 'id'=>'site_phone_secondary', 'placeholder'=>'Số Điện Thoại phụ#')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'site_phone_secondary') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'mail_from_address') !!}">
        {!! Form::label('mail_from_address', 'Gửi từ địa chỉ email', ['class' => 'bold']) !!}
        {!! Form::text('mail_from_address', null, array('class'=>'form-control', 'id'=>'mail_from_address', 'placeholder'=>'Gửi từ địa chỉ email')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'mail_from_address') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'mail_from_name') !!}">
        {!! Form::label('mail_from_name', 'Tên Email gửi đi', ['class' => 'bold']) !!}
        {!! Form::text('mail_from_name', null, array('class'=>'form-control', 'id'=>'mail_from_name', 'placeholder'=>'Tên Email gửi đi')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'mail_from_name') !!}                                       
    </div>    
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'mail_to_address') !!}">
        {!! Form::label('mail_to_address', 'Gửi tới địa chỉ email', ['class' => 'bold']) !!}
        {!! Form::text('mail_to_address', null, array('class'=>'form-control', 'id'=>'mail_to_address', 'placeholder'=>'Gửi tới địa chỉ email')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'mail_to_address') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'mail_to_name') !!}">
        {!! Form::label('mail_to_name', 'Tên Email gửi tới', ['class' => 'bold']) !!}
        {!! Form::text('mail_to_name', null, array('class'=>'form-control', 'id'=>'mail_to_name', 'placeholder'=>'Tên Email gửi tới')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'mail_to_name') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'default_country_id') !!}">
        {!! Form::label('default_country_id', 'Quốc Gia mặc định', ['class' => 'bold']) !!}
        {!! Form::select('default_country_id',$countries, null, array('class'=>'form-control', 'id'=>'default_country_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'default_country_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'country_specific_site') !!}">
        {!! Form::label('country_specific_site', 'Mặc định website cho Quốc gia này?', ['class' => 'bold']) !!}        <div class="radio-list">
            <label class="radio-inline">{!! Form::radio('country_specific_site', 1, true, ['id' => 'country_specific_site_yes']) !!} Yes </label>
            <label class="radio-inline">{!! Form::radio('country_specific_site', 0, null, ['id' => 'country_specific_site_no']) !!} No </label>
        </div>
        {!! APFrmErrHelp::showErrors($errors, 'country_specific_site') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'default_currency_code') !!}">
        {!! Form::label('default_currency_code', 'Mã tiền tệ mặc định', ['class' => 'bold']) !!}
        {!! Form::select('default_currency_code',$currency_codes, null, array('class'=>'form-control', 'id'=>'default_currency_code')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'default_currency_code') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'site_street_address') !!}">
        {!! Form::label('site_street_address', 'Địa chỉ chi tiết', ['class' => 'bold']) !!}
        {!! Form::textarea('site_street_address', null, array('class'=>'form-control', 'id'=>'site_street_address', 'placeholder'=>'Địa chỉ chi tiết')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'site_street_address') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'site_google_map') !!}">
        {!! Form::label('site_google_map', 'Google Map', ['class' => 'bold']) !!}
        {!! Form::textarea('site_google_map', null, array('class'=>'form-control', 'id'=>'site_google_map', 'placeholder'=>'Google Map')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'site_google_map') !!}                                       
    </div>
</div>
