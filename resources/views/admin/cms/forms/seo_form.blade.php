{!! APFrmErrHelp::showErrorsNotice($errors) !!}
<div class="form-body">
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'seo_title') !!}">
        {!! Form::label('seo_title', 'Tiêu đề SEO', ['class' => 'bold']) !!}
        {!! Form::text('seo_title', null, array('class'=>'form-control', 'id'=>'seo_title', 'placeholder'=>'Tiêu đề SEO')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'seo_title') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'seo_description') !!}">
        {!! Form::label('seo_description', 'Mô Tả SEO', ['class' => 'bold']) !!}
        {!! Form::textarea('seo_description', null, array('class'=>'form-control', 'id'=>'seo_description', 'placeholder'=>'Mô Tả SEO')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'seo_description') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'seo_keywords') !!}">
        {!! Form::label('seo_keywords', 'Từ Khóa SEO', ['class' => 'bold']) !!}
        {!! Form::textarea('seo_keywords', null, array('class'=>'form-control', 'id'=>'seo_keywords', 'placeholder'=>'Từ Khóa SEO')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'seo_keywords') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'seo_other') !!}">
        {!! Form::label('seo_other', 'Tag/Thẻ SEO khác', ['class' => 'bold']) !!}
        {!! Form::textarea('seo_other', null, array('class'=>'form-control', 'id'=>'seo_other', 'placeholder'=>'SEO Tags')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'seo_other') !!}                                       
    </div>
</div>