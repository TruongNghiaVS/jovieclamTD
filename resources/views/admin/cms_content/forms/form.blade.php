<?php
$lang = config('default_lang');
if (isset($cmsContent))
    $lang = $cmsContent->lang;
$lang = MiscHelper::getLang($lang);
$direction = MiscHelper::getLangDirection($lang);
$queryString = MiscHelper::getLangQueryStr();
?>
{!! APFrmErrHelp::showErrorsNotice($errors) !!}
<div class="form-body">	
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'lang') !!}">
        {!! Form::label('lang', 'Ngôn ngữ', ['class' => 'bold']) !!}
        {!! Form::select('lang', ['' => 'Lựa chọn']+$languages, $lang, array('class'=>'form-control', 'id'=>'lang', 'onchange'=>'setLang(this.value)')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'lang') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'page_id') !!}">
        {!! Form::label('page_id', 'Trang CMS', ['class' => 'bold']) !!}
        {!! Form::select('page_id', ['' => 'Lựa chọn']+$cmsPages, null, array('class'=>'form-control', 'id'=>'page_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'page_id') !!}                                       
    </div>    
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'page_title') !!}">
        {!! Form::label('page_title', 'Tiêu đề Trang', ['class' => 'bold']) !!}
        {!! Form::text('page_title', null, array('class'=>'form-control', 'id'=>'page_title', 'placeholder'=>'Tiêu đề Trang', 'dir'=>$direction)) !!}
        {!! APFrmErrHelp::showErrors($errors, 'page_title') !!}                                       
    </div>    
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'page_slug') !!}">
        {!! Form::label('page_slug', 'Slug', ['class' => 'bold']) !!}
        {!! Form::text('page_slug', null, array('class'=>'form-control', 'id'=>'page_slug', 'placeholder'=>'Slug', 'dir'=>$direction)) !!}
        {!! APFrmErrHelp::showErrors($errors, 'page_slug') !!}                                       
    </div>
    <div class="blogboxint">
        <div class="form-group">
            <label class="control-label bold"
                   for="Upload Image">Ảnh đại diện</label>
            <input type="file" class="form-control"
                   name="page_image"
                   id="page_image" autofocus>
            <div class="image_append" id="image_append">
                @if(isset($cmsContent) && $cmsContent->page_image!='')
                    <div class='featured-images-main' id='listing_img_{{$cmsContent->id}}'><img  src="{{ asset($cmsContent->page_image) }}"><i onClick='remove_blog_featured_image("{{$cmsContent->id}}");' class='fa fa-times'></i></div>
                @endif
            </div>
        </div>
    </div>    
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'page_content') !!}">
        {!! Form::label('page_content', 'Nội dung Trang', ['class' => 'bold']) !!}
        {!! Form::textarea('page_content', null, array('class'=>'form-control', 'id'=>'page_content', 'placeholder'=>'Nội dung Trang')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'page_content') !!}                                       
    </div>
    <input type="file" name="image" id="image" style="display:none;" accept="image/*"/>
</div>
@push('scripts')
<script type="text/javascript">
    function setLang(lang) {
        window.location.href = "<?php echo url(Request::url()) . $queryString; ?>" + lang;
    }
</script>
@include('admin.shared.cms_form_tinyMCE', array($lang, $direction))
@endpush
