<div class="modal-body">
    <div class="form-body">
        <div class="form-group" id="div_name">
            <label for="name" class="bold">Tên Dự án</label>
            <input class="form-control" id="name" placeholder="Tên Dự án" name="name" type="text" value="{{(isset($profileProject)? $profileProject->name:'')}}">
            <span class="help-block name-error"></span> </div>

        @if(isset($profileProject))
        <div class="form-group">
            {{ImgUploader::print_image("project_images/thumb/$profileProject->image")}}
        </div>
        @endif

        <div class="form-group" id="div_image">
            <div class="uploadphotobx dropzone needsclick dz-clickable"  id="dropzone"> <i class="fa fa-upload" aria-hidden="true"></i>
                <div class="dz-message" data-dz-message><span>Kéo thả File vào đây hoặc Click để tải ảnh Dự án lên.</span></div>
                <div class="fallback">
                    <input name="image" type="file" multiple />
                </div>
            </div>
            <span class="help-block image-error"></span> </div>
        <div class="form-group" id="div_url">
            <label for="url" class="bold">Địa Chỉ Website/URL Dự án</label>
            <input class="form-control" id="url" placeholder="Địa Chỉ Website/URL Dự án" name="url" type="text" value="{{(isset($profileProject)? $profileProject->url:'')}}">
            <span class="help-block url-error"></span> </div>
        <div class="form-group" id="div_date_start">
            <label for="date_start" class="bold">Ngày bắt đầu Dự án</label>
            <input class="form-control datepicker" id="date_start" placeholder="Ngày bắt đầu Dự án" name="date_start" type="text" autocomplete="off" value="{{(isset($profileProject)? $profileProject->date_start:'')}}">
            <span class="help-block date_start-error"></span> </div>
        <div class="form-group" id="div_date_end">
            <label for="date_end" class="bold">Ngày kết thúc Dự án</label>
            <input class="form-control datepicker" autocomplete="off" id="date_end" placeholder="Ngày kết thúc Dự án" name="date_end" type="text" value="{{(isset($profileProject)? $profileProject->date_end:'')}}">
            <span class="help-block date_end-error"></span> </div>  

        <div class="form-group" id="div_is_on_going">
            <label for="is_on_going" class="bold">Dự án đang thực hiện?</label>
            <div class="radio-list" style="margin-left:22px;">
                <?php
                $val_1_checked = '';
                $val_2_checked = 'checked="checked"';

                if (isset($profileProject) && $profileProject->is_on_going == 1) {
                    $val_1_checked = 'checked="checked"';
                    $val_2_checked = '';
                }
                ?>

                <label class="radio-inline"><input id="on_going" name="is_on_going" type="radio" value="1" {{$val_1_checked}}> Yes </label>
                <label class="radio-inline"><input id="not_on_going" name="is_on_going" type="radio" value="0" {{$val_2_checked}}> No </label>
            </div>
            <span class="help-block is_on_going-error"></span>
        </div>

        <div class="form-group" id="div_description">
            <label for="name" class="bold">Mô Tả Dự án</label>
            <textarea name="description" class="form-control" id="description" placeholder="Mô Tả Dự án">{{(isset($profileProject)? $profileProject->description:'')}}</textarea>
            <span class="help-block description-error"></span> </div>
    </div>
</div>