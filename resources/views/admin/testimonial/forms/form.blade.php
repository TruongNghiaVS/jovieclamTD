<?php
$lang = config('default_lang');
if (isset($testimonial))
    $lang = $testimonial->lang;
$lang = MiscHelper::getLang($lang);
$direction = MiscHelper::getLangDirection($lang);
$queryString = MiscHelper::getLangQueryStr();
?>
{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">        
    {!! Form::hidden('id', null) !!}
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'lang') !!}" id="lang_div">
        {!! Form::select('lang', ['' => __('Select')]+$languages, $lang, ['class'=>'form-control', 'id'=>'lang', 'onchange'=>'setLang(this.value);']) !!}
        {!! APFrmErrHelp::showErrors($errors, 'lang') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'testimonial_by') !!}">
        {!! Form::label('testimonial_by', 'Đánh giá bởi', ['class' => 'bold']) !!}
        {!! Form::text('testimonial_by', null, array('class'=>'form-control', 'id'=>'testimonial_by', 'placeholder'=>'Đánh giá bởi', 'dir'=>$direction)) !!}
        {!! APFrmErrHelp::showErrors($errors, 'testimonial_by') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'testimonial') !!}">
        {!! Form::label('testimonial', 'Nội dung đánh giá', ['class' => 'bold']) !!}
        {!! Form::textarea('testimonial', null, array('class'=>'form-control', 'id'=>'testimonial', 'placeholder'=>'Nội dung đánh giá', 'dir'=>$direction)) !!}
        {!! APFrmErrHelp::showErrors($errors, 'testimonial') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'company') !!}">
        {!! Form::label('company', 'Công ty và Vị trí', ['class' => 'bold']) !!}
        {!! Form::text('company', null, array('class'=>'form-control', 'id'=>'company', 'placeholder'=>'Công ty và Vị trí', 'dir'=>$direction)) !!}
        {!! APFrmErrHelp::showErrors($errors, 'company') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_default') !!}">
        {!! Form::label('is_default', 'Mặc định?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_default_1 = 'checked="checked"';
            $is_default_2 = '';
            if (old('is_default', ((isset($testimonial)) ? $testimonial->is_default : 1)) == 0) {
                $is_default_1 = '';
                $is_default_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="default" name="is_default" type="radio" value="1" {{$is_default_1}} onchange="showHideTestimonialId();">
                Yes </label>
            <label class="radio-inline">
                <input id="not_default" name="is_default" type="radio" value="0" {{$is_default_2}} onchange="showHideTestimonialId();">
                No </label>
        </div>			
        {!! APFrmErrHelp::showErrors($errors, 'is_default') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'testimonial_id') !!}" id="testimonial_id_div">
        {!! Form::label('testimonial_id', 'Default Testimonial', ['class' => 'bold']) !!}                    
        {!! Form::select('testimonial_id', ['' => 'Select Default Testimonial']+$testimonials, null, array('class'=>'form-control', 'id'=>'testimonial_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'testimonial_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_active') !!}">
        {!! Form::label('is_active', 'Hiển thị?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_active_1 = 'checked="checked"';
            $is_active_2 = '';
            if (old('is_active', ((isset($testimonial)) ? $testimonial->is_active : 1)) == 0) {
                $is_active_1 = '';
                $is_active_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="active" name="is_active" type="radio" value="1" {{$is_active_1}}>
                Hiển thị </label>
            <label class="radio-inline">
                <input id="not_active" name="is_active" type="radio" value="0" {{$is_active_2}}>
                Không Hiển thị </label>
        </div>			
        {!! APFrmErrHelp::showErrors($errors, 'is_active') !!}
    </div>	
    <div class="form-actions">
        {!! Form::button(__('Update'). ' ', array('class'=>'btn btn-large btn-primary', 'type'=>'submit')) !!}
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    function setLang(lang) {
        window.location.href = "<?php echo url(Request::url()) . $queryString; ?>" + lang;
    }
    function showHideTestimonialId() {
        $('#testimonial_id_div').hide();
        var is_default = $("input[name='is_default']:checked").val();
        if (is_default == 0) {
            $('#testimonial_id_div').show();
        }
    }
    showHideTestimonialId();
</script>
@endpush
