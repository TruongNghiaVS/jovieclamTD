<?php
$lang = config('default_lang');
if (isset($functionalArea))
    $lang = $functionalArea->lang;
$lang = MiscHelper::getLang($lang);
$direction = MiscHelper::getLangDirection($lang);
$queryString = MiscHelper::getLangQueryStr();
?>
{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'lang') !!}">
        {!! Form::label('lang', 'Ngôn ngữ', ['class' => 'bold']) !!}
        {!! Form::select('lang', ['' => __('Select')]+$languages, $lang, array('class'=>'form-control', 'id'=>'lang', 'onchange'=>'setLang(this.value)')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'lang') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'functional_area') !!}">
        {!! Form::label('functional_area', '{{__('Functional Area')}}', ['class' => 'bold']) !!}
        {!! Form::text('functional_area', null, array('class'=>'form-control', 'id'=>'functional_area', 'placeholder'=>'{{__('Functional Area')}}', 'dir'=>$direction)) !!}
        {!! APFrmErrHelp::showErrors($errors, 'functional_area') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_default') !!}">
        {!! Form::label('is_default', 'Mặc định?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_default_1 = 'checked="checked"';
            $is_default_2 = '';
            if (old('is_default', ((isset($functionalArea)) ? $functionalArea->is_default : 1)) == 0) {
                $is_default_1 = '';
                $is_default_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="default" name="is_default" type="radio" value="1" {{$is_default_1}} onchange="showHideFunctionalAreaId();">
                Yes </label>
            <label class="radio-inline">
                <input id="not_default" name="is_default" type="radio" value="0" {{$is_default_2}} onchange="showHideFunctionalAreaId();">
                No </label>
        </div>
        {!! APFrmErrHelp::showErrors($errors, 'is_default') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'functional_area_id') !!}" id="functional_area_id_div">
        {!! Form::label('functional_area_id', '{{__('Functional Area')}} mặc định', ['class' => 'bold']) !!}
        {!! Form::select('functional_area_id', ['' => 'Lựa chọn']+$functionalAreas, null, array('class'=>'form-control', 'id'=>'functional_area_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'functional_area_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_active') !!}">
        {!! Form::label('is_active', 'Hiển thị', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_active_1 = 'checked="checked"';
            $is_active_2 = '';
            if (old('is_active', ((isset($functionalArea)) ? $functionalArea->is_active : 1)) == 0) {
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
    function showHideFunctionalAreaId() {
        $('#functional_area_id_div').hide();
        var is_default = $("input[name='is_default']:checked").val();
        if (is_default == 0) {
            $('#functional_area_id_div').show();
        }
    }
    showHideFunctionalAreaId();
</script>
@endpush
