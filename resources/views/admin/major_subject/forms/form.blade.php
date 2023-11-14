<?php
$lang = config('default_lang');
if (isset($majorSubject))
    $lang = $majorSubject->lang;
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
        {!! Form::select('lang', ['' => __('Select')]+$languages, $lang, array('class'=>'form-control', 'id'=>'lang', 'onchange'=>'setLang(this.value);')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'lang') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'major_subject') !!}">
        {!! Form::label('major_subject', 'Chuyên ngành', ['class' => 'bold']) !!}
        {!! Form::text('major_subject', null, array('class'=>'form-control', 'id'=>'major_subject', 'placeholder'=>'Chuyên ngành', 'dir'=>$direction)) !!}
        {!! APFrmErrHelp::showErrors($errors, 'major_subject') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_default') !!}">
        {!! Form::label('is_default', 'Mặc định?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_default_1 = 'checked="checked"';
            $is_default_2 = '';
            if (old('is_default', ((isset($majorSubject)) ? $majorSubject->is_default : 1)) == 0) {
                $is_default_1 = '';
                $is_default_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="default" name="is_default" type="radio" value="1" {{$is_default_1}} onchange="showHideMajorSubjectId();">
                Yes </label>
            <label class="radio-inline">
                <input id="not_default" name="is_default" type="radio" value="0" {{$is_default_2}} onchange="showHideMajorSubjectId();">
                No </label>
        </div>			
        {!! APFrmErrHelp::showErrors($errors, 'is_default') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'major_subject_id') !!}" id="major_subject_id_div">
        {!! Form::label('major_subject_id', 'Chuyên ngành mặc định', ['class' => 'bold']) !!}
        {!! Form::select('major_subject_id', ['' => 'Chọn Chuyên ngành']+$majorSubjects, null, array('class'=>'form-control', 'id'=>'major_subject_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'major_subject_id') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_active') !!}">
        {!! Form::label('is_active', 'Hiển thị?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_active_1 = 'checked="checked"';
            $is_active_2 = '';
            if (old('is_active', ((isset($majorSubject)) ? $majorSubject->is_active : 1)) == 0) {
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
    function showHideMajorSubjectId() {
        $('#major_subject_id_div').hide();
        var is_default = $("input[name='is_default']:checked").val();
        if (is_default == 0) {
            $('#major_subject_id_div').show();
        }
    }
    showHideMajorSubjectId();
</script>
@endpush
