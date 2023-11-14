<div class="section-head" bis_skin_checked="1">
        <div class="section-head__figure" bis_skin_checked="1">
                <div class="figure__image" bis_skin_checked="1"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/University_Diploma_or_Certificate_Flat_Icon_Vector.svg/1024px-University_Diploma_or_Certificate_Flat_Icon_Vector.svg.png" alt=""></div>
                <div class="figure__caption" bis_skin_checked="1">
                        <h5 class=""onclick="showSkills();">{{__('Skills')}}</h5>
                        <div class="status complete" bis_skin_checked="1">
                                <p>Hoàn thành</p>
                        </div>
                </div>
        </div>
        <div class="section-head__right-action" bis_skin_checked="1">
                <div class="right-action__tips" bis_skin_checked="1">
                        <i class="bi bi-lightbulb"></i>
                        <p>Tips</p>
                </div>
                <div class="right-action__link-edit" bis_skin_checked="1"><a a="" href="javascript:;" onclick="showProfileSkillModal();"><i class="bi bi-pen"></i>Thêm mới</a></div>
                <div class="right-action__link-edit-mobile" bis_skin_checked="1"><a a="" href="javascript:;" onclick="showProfileSkillModal();"><i class="bi bi-pen"></i></a></div>
        </div>
</div>


<div class="section-body"> 

<div class="row pt-4">
    <div class="col-md-12">
        <div class="" id="skill_div"></div>
    </div>
</div>

</div>


<hr class="hr-profile">

<div class="modal" id="add_skill_modal" role="dialog"></div>
@push('scripts') 
<script type="text/javascript">
    /**************************************************/
    function showProfileSkillModal(){
    $("#add_skill_modal").modal();
    loadProfileSkillForm();
    }
    function loadProfileSkillForm(){
    $.ajax({
    type: "POST",
            url: "{{ route('get.front.profile.skill.form', $user->id) }}",
            data: {"_token": "{{ csrf_token() }}"},
            datatype: 'json',
            success: function (json) {
            $("#add_skill_modal").html(json.html);
            }
    });
    }
    function showProfileSkillEditModal(skill_id){
    $("#add_skill_modal").modal();
    loadProfileSkillEditForm(skill_id);
    }
    function loadProfileSkillEditForm(skill_id){
    $.ajax({
    type: "POST",
            url: "{{ route('get.front.profile.skill.edit.form', $user->id) }}",
            data: {"skill_id": skill_id, "_token": "{{ csrf_token() }}"},
            datatype: 'json',
            success: function (json) {
            $("#add_skill_modal").html(json.html);
            }
    });
    }
    function submitProfileSkillForm() {
    var form = $('#add_edit_profile_skill');
    $.ajax({
    url     : form.attr('action'),
            type    : form.attr('method'),
            data    : form.serialize(),
            dataType: 'json',
            success : function (json){
            $ ("#add_skill_modal").html(json.html);
            showSkills();
            },
            error: function(json){
            if (json.status === 422) {
            var resJSON = json.responseJSON;
            $('.help-block').html('');
            $.each(resJSON.errors, function (key, value) {
            $('.' + key + '-error').html('<strong>' + value + '</strong>');
            $('#div_' + key).addClass('has-error');
            });
            } else {
            // Error
            // Incorrect credentials
            // alert('Incorrect credentials. Please try again.')
            }
            }
    });
    }
    function delete_profile_skill(id) {
    var msg = "{{__('Are you sure! you want to delete?')}}";
    if (confirm(msg)) {
    $.post("{{ route('delete.front.profile.skill') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            if (response == 'ok')
            {
            $('#skill_' + id).remove();
            } else
            {
            alert('Request Failed!');
            }
            });
    }
    }
    $(document).ready(function(){
    showSkills();
    });
    function showSkills()
    {
    $.post("{{ route('show.front.profile.skills', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#skill_div').html(response);
            });
    }
</script> 
@endpush
