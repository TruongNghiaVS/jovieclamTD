<?php
$lang = config('default_lang');
if (isset($ownershipType))
    $lang = $ownershipType->lang;
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
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'ownership_type') !!}">
        {!! Form::label('ownership_type', 'Loại hình doanh nghiệp', ['class' => 'bold']) !!}
        {!! Form::text('ownership_type', null, array('class'=>'form-control', 'id'=>'ownership_type', 'placeholder'=>'Loại hình doanh nghiệp', 'dir'=>$direction)) !!}
        {!! APFrmErrHelp::showErrors($errors, 'ownership_type') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_default') !!}">
        {!! Form::label('is_default', 'Mặc định?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_default_1 = 'checked="checked"';
            $is_default_2 = '';
            if (old('is_default', ((isset($ownershipType)) ? $ownershipType->is_default : 1)) == 0) {
                $is_default_1 = '';
                $is_default_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="default" name="is_default" type="radio" value="1" {{$is_default_1}} onchange="showHideOwnershipTypeId();">
                Yes </label>
            <label class="radio-inline">
                <input id="not_default" name="is_default" type="radio" value="0" {{$is_default_2}} onchange="showHideOwnershipTypeId();">
                No </label>
        </div>			
        {!! APFrmErrHelp::showErrors($errors, 'is_default') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'ownership_type_id') !!}" id="ownership_type_id_div">
        {!! Form::label('ownership_type_id', 'Loại hình doanh nghiệp mặc định', ['class' => 'bold']) !!}
        {!! Form::select('ownership_type_id', ['' => 'Lựa chọn']+$ownershipTypes, null, array('class'=>'form-control', 'id'=>'ownership_type_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'ownership_type_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_active') !!}">
        {!! Form::label('is_active', 'Hiển thị?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_active_1 = 'checked="checked"';
            $is_active_2 = '';
            if (old('is_active', ((isset($ownershipType)) ? $ownershipType->is_active : 1)) == 0) {
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
    function showHideOwnershipTypeId() {
        $('#ownership_type_id_div').hide();
        var is_default = $("input[name='is_default']:checked").val();
        if (is_default == 0) {
            $('#ownership_type_id_div').show();
        }
    }
    showHideOwnershipTypeId();
</script>
@endpush
