<div class="modal-body">
    <div class="form-body">
        <div class="form-group" id="div_language_id">
            <label for="language_id" class="bold">{{__('Language')}}</label>
            <?php
            $language_id = (isset($profileLanguage) ? $profileLanguage->language_id : null);
            ?>
            {!! Form::select('language_id', [''=>'Lựa chọn ngôn ngữ']+$languages, $language_id, array('class'=>'form-control', 'id'=>'language_id')) !!} <span class="help-block language_id-error"></span> </div>
        <div class="form-group" id="div_language_level_id">
            <label for="language_level_id" class="bold">Language Level</label>
            <?php
            $language_level_id = (isset($profileLanguage) ? $profileLanguage->language_level_id : null);
            ?>
            {!! Form::select('language_level_id', [''=>('Lựa chọn trình độ ngôn ngữ')]+$languageLevels, $language_level_id, array('class'=>'form-control', 'id'=>'language_level_id')) !!} <span class="help-block language_level_id-error"></span> </div>
    </div>
</div>
