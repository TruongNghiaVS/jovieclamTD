<div class="modal-body">
    <div class="form-body form-user-profile">
        <div class="formrow" id="div_degree_level_id">
            <?php
            $degree_level_id = (isset($profileEducation) ? $profileEducation->degree_level_id : null);
            ?>
            {!! Form::select('degree_level_id', [''=>__('Select Degree Level')]+$degreeLevels, $degree_level_id, array('class'=>'form-select', 'id'=>'degree_level_id')) !!}
            <span class="help-block degree_level_id-error"></span> </div>


        <div class="formrow" id="div_degree_type_id">
            <?php
            $degree_type_id = (isset($profileEducation) ? $profileEducation->degree_type_id : null);
            ?>
            <span id="degree_types_dd">
                {!! Form::select('degree_type_id', [''=>__('Select Degree Type')]+$industries, $degree_type_id, array('class'=>'form-select')) !!}
            </span>
            <span class="help-block degree_type_id-error"></span>
        </div>

        <!-- <div class="formrow" id="div_major_subjects">
            <?php
            $profileEducationMajorSubjectIds = old('major_subjects', $profileEducationMajorSubjectIds);
            ?>
            {!! Form::select('major_subjects[]', $majorSubjects, $profileEducationMajorSubjectIds, array('class'=>'form-select chosen-multiple shadow-sm multiselect', 'id'=>'major_subjects', 'multiple'=>true)) !!}
            <span class="help-block major_subjects-error"></span>
        </div> -->

        <div class="formrow" id="div_country_id">
            <?php
            $country_id = (isset($profileEducation) ? $profileEducation->country_id : $siteSetting->default_country_id);
            ?>
            {!! Form::select('country_id', [''=>__('Select Country')]+$countries, $country_id, array('class'=>'form-select', 'id'=>'education_country_id')) !!}
            <span class="help-block country_id-error"></span> </div>

        <div class="formrow" id="div_state_id">
            <span id="default_state_education_dd">
                {!! Form::select('state_id', [''=>__('Select State')], null, array('class'=>'form-select', 'id'=>'education_state_id')) !!}
            </span>
            <span class="help-block state_id-error"></span> </div>

        <div class="formrow" id="div_city_id">
            <span id="default_city_education_dd">
                {!! Form::select('city_id', [''=>__('Select City')], null, array('class'=>'form-select', 'id'=>'city_id')) !!}
            </span>
            <span class="help-block city_id-error"></span> </div>

        <div class="formrow" id="div_institution">
            <input class="form-control" id="institution" placeholder="{{__('Institution')}}" name="institution" type="text" value="{{(isset($profileEducation)? $profileEducation->institution:'')}}">
            <span class="help-block institution-error"></span> </div>


        <div class="formrow" id="div_date_completion">
            <?php
            $date_completion = (isset($profileEducation) ? $profileEducation->date_completion : null);
            ?>
            {!! Form::select('date_completion', [''=>__('Choose graduation year')]+MiscHelper::getEstablishedIn(), $date_completion, array('class'=>'form-select', 'id'=>'date_completion')) !!}
            <span class="help-block date_completion-error"></span>
        </div>
        <div class="formrow" id="div_details">
            <input class="form-control" id="details" placeholder="{{__('Details')}}" name="details" type="text" value="{{(isset($profileEducation)? $profileEducation->details:'')}}">
            <span class="help-block details-error"></span>
        </div>
    </div>
</div>
<script type="text/javascript">
    /*  $('#major_subjects').each(function() {
        $(this).multiselect({
            texts: {
                placeholder: "{{__('Select desired major subjects')}}", // or $(this).prop('title'),
            },
        });
    }); */
    $('.chosen-multiple').chosen({
        allow_single_deselect: true,
        width: '100%',
        no_results_text: "Không tìm thấy kết quả :"
    });
    
</script>
