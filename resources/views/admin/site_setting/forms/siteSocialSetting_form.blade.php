{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">        
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'facebook_address') !!}">
        {!! Form::label('facebook_address', 'Địa chỉ Facebook', ['class' => 'bold']) !!}
        {!! Form::text('facebook_address', null, array('class'=>'form-control', 'id'=>'facebook_address', 'placeholder'=>'Địa chỉ Facebook')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'facebook_address') !!}                                       
    </div>    
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'google_plus_address') !!}">
        {!! Form::label('google_plus_address', 'Địa chỉ Google+', ['class' => 'bold']) !!}
        {!! Form::text('google_plus_address', null, array('class'=>'form-control', 'id'=>'google_plus_address', 'placeholder'=>'Địa chỉ Google+')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'google_plus_address') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'pinterest_address') !!}">
        {!! Form::label('pinterest_address', 'Địa chỉ Pinterest', ['class' => 'bold']) !!}
        {!! Form::text('pinterest_address', null, array('class'=>'form-control', 'id'=>'pinterest_address', 'placeholder'=>'Địa chỉ Pinterest')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'pinterest_address') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'twitter_address') !!}">
        {!! Form::label('twitter_address', 'Địa chỉ Twitter', ['class' => 'bold']) !!}
        {!! Form::text('twitter_address', null, array('class'=>'form-control', 'id'=>'twitter_address', 'placeholder'=>'Địa chỉ Twitter')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'twitter_address') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'instagram_address') !!}">
        {!! Form::label('instagram_address', 'Địa chỉ Instagram', ['class' => 'bold']) !!}
        {!! Form::text('instagram_address', null, array('class'=>'form-control', 'id'=>'instagram_address', 'placeholder'=>'Địa chỉ Instagram')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'instagram_address') !!}                                       
    </div>    
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'linkedin_address') !!}">
        {!! Form::label('linkedin_address', 'Địa chỉ Linkedin', ['class' => 'bold']) !!}
        {!! Form::text('linkedin_address', null, array('class'=>'form-control', 'id'=>'linkedin_address', 'placeholder'=>'Địa chỉ Linkedin')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'linkedin_address') !!}                                       
    </div>    
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'youtube_address') !!}">
        {!! Form::label('youtube_address', 'Địa chỉ Youtube', ['class' => 'bold']) !!}
        {!! Form::text('youtube_address', null, array('class'=>'form-control', 'id'=>'youtube_address', 'placeholder'=>'Địa chỉ Youtube')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'youtube_address') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'tumblr_address') !!}">
        {!! Form::label('tumblr_address', 'Địa chỉ Tumblr', ['class' => 'bold']) !!}
        {!! Form::text('tumblr_address', null, array('class'=>'form-control', 'id'=>'tumblr_address', 'placeholder'=>'Địa chỉ Tumblr')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'tumblr_address') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'flickr_address') !!}">
        {!! Form::label('flickr_address', 'Địa chỉ Flickr', ['class' => 'bold']) !!}
        {!! Form::text('flickr_address', null, array('class'=>'form-control', 'id'=>'flickr_address', 'placeholder'=>'Địa chỉ Flickr')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'flickr_address') !!}                                       
    </div>
</div>
