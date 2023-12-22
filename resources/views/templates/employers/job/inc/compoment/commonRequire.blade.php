<div class="card card-edit-profile my-3">
    <h2 class="fs-4 card-edit-profile__section">Yêu cầu chung</h2>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="Gender" class="font-weight-bold fs-18px">{{__('Gender')}} <span class="required">*</span></label>
                    <div class="d-flex">
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="gender" id="gender1" checked>
                            <label class="form-check-label" for="gender1">
                                Nam/ Nữ
                            </label>
                        </div>

                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="gender" id="gender2">
                            <label class="form-check-label" for="gender2">
                                Nam
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="gender3">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Nữ
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="Level" class="font-weight-bold fs-18px">{{__('Experience')}} <span class="required">*</span></label>
                    {!! Form::select('job_experience_id', ['' => __('Select Required job experience')]+$jobExperiences, null, array('class'=>'form-control form-select', 'id'=>'job_experience_id')) !!}
                    {!! APFrmErrHelp::showErrors($errors, 'job_experience_id') !!}
                </div>
            </div>
            <div class="col-md-3 col-md-3 col-sm-12">
                <div class="form-group form-group-custom-chosen">
                    <label for="Level" class="font-weight-bold fs-18px">{{__('Career Level')}} <span class="required">*</span></label>
                    {!! Form::select('career_level_id', ['' => __('Select Career Level')] + $careerLevels, null, array('class'=>'form-control form-select', 'id'=>'career_level_id')) !!}
                    {!! APFrmErrHelp::showErrors($errors, 'career_level_id') !!}
                </div>
            </div>

            <div class="col-md-3 col-md-3 col-sm-12">
                <div class="form-group">
                    <label for="industry_id" class="font-weight-bold fs-18px">{{__('Industry')}} <span class="required">*</span></label>
                    {!! Form::select('industry_id', ['' => __('Select Industry')] + $industries, null, array('class'=>'form-control form-select', 'id'=>'industry_id')) !!}
                    {!! APFrmErrHelp::showErrors($errors, 'industry_id') !!}
                </div>
            </div>
        </div>
    </div>

</div>