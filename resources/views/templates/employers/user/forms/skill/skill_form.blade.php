<div class="modal-body">
    <div class="form-body">
        <div class="form-group" id="div_job_skill_id">
            <?php
            $job_skill_id = (isset($profileSkill) ? $profileSkill->job_skill_id : null);
            ?>
            {!! Form::select('job_skill_id', [''=>__('Select skill')]+$jobSkills, $job_skill_id, array('class'=>'form-select', 'id'=>'job_skill_id')) !!} <span class="help-block job_skill_id-error"></span> </div>
        

         <div class="form-group">
            <label for="job_experience_id">Mức độ <span class="numberExperience">{{ isset($profileSkill->job_experience_id) ? $profileSkill->job_experience_id : 0 }}</span></label>/5</label>
            <div class="group-rank">
                <input type="range" class="form-control-range" name="job_experience_id" id="job_experience_id" min="0" max="5" step="1" value="{{ isset($profileSkill->job_experience_id) ? $profileSkill->job_experience_id : 0 }}">
                <span class="label-rank label-rank-0">0</span>
                <span class="label-rank label-rank-1">1</span>
                <span class="label-rank label-rank-2">2</span>
                <span class="label-rank label-rank-3">3</span>
                <span class="label-rank label-rank-4">4</span>
                <span class="label-rank label-rank-5">5</span>
            </div>
        </div>
    </div>
</div>
