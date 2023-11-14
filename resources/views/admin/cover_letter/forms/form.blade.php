{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">        
    {!! Form::hidden('id', null) !!}
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'country_id') !!}">
        {!! Form::label('country_id', 'Country', ['class' => 'bold']) !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'sort_name') !!}">
        {!! Form::label('sort_name', 'Name Cover Letter', ['class' => 'bold']) !!}
        {!! Form::text('name', null, array('class'=>'form-control', 'id'=>'sort_name', 'placeholder'=>'Name Cover Letter')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'sort_name') !!}
    </div>
    <div class="blogboxint">
        <div class="form-group">
            <label class="control-label bold"
                   for="Upload Image">Image Thumbnail</label>
            <input type="file" class="form-control"
                   name="image_thumbnail"
                   id="image" autofocus>
        </div>
    </div>
    <div class="blogboxint">
        <div class="form-group">
            <label class="control-label bold"
                   for="Upload Image">Image Main</label>
            <input type="file" class="form-control"
                   name="image_main"
                   id="image" autofocus>
        </div>
    </div>
    <div class="blogboxint">
        <div class="form-group">
            <label class="control-label bold"
                   for="Upload Image">File Cover Letter(.docx)</label>
            <input type="file" class="form-control"
                   name="file"
                   id="image" autofocus>
        </div>
    </div>
    <div class="form-actions">
        {!! Form::button(__('Update'). ' ', array('class'=>'btn btn-large btn-primary', 'type'=>'submit')) !!}
    </div>
</div>
