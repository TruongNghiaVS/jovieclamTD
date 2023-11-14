<?php
$lang = config('default_lang');
if (isset($maritalStatus))
    $lang = $maritalStatus->lang;
$lang = MiscHelper::getLang($lang);
$direction = MiscHelper::getLangDirection($lang);
$queryString = MiscHelper::getLangQueryStr();
?>
{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">        
    {!! Form::hidden('id', null) !!}
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'lang') !!}" id="lang_div">
        {!! Form::label('lang', 'Ngôn ngữ', ['class' => 'bold']) !!}
        {!! Form::select('lang', ['' => __('Select')]+$languages, $lang, array('class'=>'form-control', 'id'=>'lang')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'lang') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'marital_status') !!}">
        {!! Form::label('marital_status', 'Tình trạng hôn nhân', ['class' => 'bold']) !!}
        {!! Form::text('marital_status', null, array('class'=>'form-control', 'id'=>'marital_status', 'placeholder'=>'Tình trạng hôn nhân', 'dir'=>$direction)) !!}
        {!! APFrmErrHelp::showErrors($errors, 'marital_status') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_default') !!}">
        {!! Form::label('is_default', 'Mặc định?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_default_1 = 'checked="checked"';
            $is_default_2 = '';
            if (old('is_default', ((isset($maritalStatus)) ? $maritalStatus->is_default : 1)) == 0) {
                $is_default_1 = '';
                $is_default_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="default" name="is_default" type="radio" value="1" {{$is_default_1}} onchange="showHideMaritalStatusId();">
                Yes </label>
            <label class="radio-inline">
                <input id="not_default" name="is_default" type="radio" value="0" {{$is_default_2}} onchange="showHideMaritalStatusId();">
                No </label>
        </div>			
        {!! APFrmErrHelp::showErrors($errors, 'is_default') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'marital_status_id') !!}" id="marital_status_id_div">
        {!! Form::label('marital_status_id', 'Default Marital Status', ['class' => 'bold']) !!}                    
        {!! Form::select('marital_status_id', ['' => 'Select Default Marital Status']+$maritalStatuses, null, array('class'=>'form-control', 'id'=>'marital_status_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'marital_status_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_active') !!}">
        {!! Form::label('is_active', 'Hiển thị?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_active_1 = 'checked="checked"';
            $is_active_2 = '';
            if (old('is_active', ((isset($maritalStatus)) ? $maritalStatus->is_active : 1)) == 0) {
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
    <div class="form-actions">
        {!! Form::button(__('Update'). ' ', array('class'=>'btn btn-large btn-primary', 'type'=>'submit')) !!}
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    function setLang(lang) {
        window.location.href = "<?php echo url(Request::url()) . $queryString; ?>" + lang;
    }
    function showHideMaritalStatusId() {
        $('#marital_status_id_div').hide();
        var is_default = $("input[name='is_default']:checked").val();
        if (is_default == 0) {
            $('#marital_status_id_div').show();
        }
    }
    showHideMaritalStatusId();
</script>
@endpush
