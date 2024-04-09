
<div class="section-head" bis_skin_checked="1">
        <div class="section-head__figure" bis_skin_checked="1">
                <div class="figure__image" bis_skin_checked="1"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/University_Diploma_or_Certificate_Flat_Icon_Vector.svg/1024px-University_Diploma_or_Certificate_Flat_Icon_Vector.svg.png" alt=""></div>
                <div class="figure__caption" bis_skin_checked="1">
                        <h5 class="" onclick="">{{__('Education')}}</h5>
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
                <div class="right-action__link-edit" bis_skin_checked="1"><a a="" href="javascript:;" onclick="showProfileEducationModal();"><i class="bi bi-pen"></i>Thêm mới</a></div>
                <div class="right-action__link-edit-mobile" bis_skin_checked="1"><a a="" href="javascript:;" onclick="showProfileEducationModal();"><i class="bi bi-pen"></i></a></div>
        </div>
</div>
<div class="section-body"> 

<div class="row">
    <div class="col-md-12">
        <div class="" id="show_education_div">
                
        </div>
    </div>
</div>

</div>




<div class="modal" id="add_education_modal" role="dialog"></div>
@push('styles')
<style type="text/css">
    .datepicker>div {
        display: block;
    }
</style>
@endpush
@push('scripts') 
<script type="text/javascript">
    /**************************************************/
    function showProfileEducationModal(){
    $("#add_education_modal").modal();
    loadProfileEducationForm();
    }
    function loadProfileEducationForm(){
    $.ajax({
    type: "POST",
            url: "{{ route('get.front.profile.education.form', $user->id) }}",
            data: {"_token": "{{ csrf_token() }}"},
            datatype: 'json',
            success: function (json) {
            $("#add_education_modal").html(json.html);
            initdatepicker();
            filterLangStatesEducation(0, 0);
            }
    });
    }
    function showProfileEducationEditModal(education_id, state_id, city_id, degree_type_id){
    $("#add_education_modal").modal();
    loadProfileEducationEditForm(education_id, state_id, city_id, degree_type_id);
    }
    function loadProfileEducationEditForm(education_id, state_id, city_id, degree_type_id){
    $.ajax({
    type: "POST",
            url: "{{ route('get.front.profile.education.edit.form', $user->id) }}",
            data: {"education_id": education_id, "_token": "{{ csrf_token() }}"},
            datatype: 'json',
            success: function (json) {
            $("#add_education_modal").html(json.html);
            initdatepicker();
            filterLangStatesEducation(state_id, city_id);
        //     filterDegreeTypes(degree_type_id);
            }
    });
    }
    function submitProfileEducationForm() {
    var form = $('#add_edit_profile_education');
    $.ajax({
    url     : form.attr('action'),
            type    : form.attr('method'),
            data    : form.serialize(),
            dataType: 'json',
            success : function (json){
            $ ("#add_education_modal").html(json.html);
            showEducationDiv();
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
    function delete_profile_education(id) {
    var msg = "{{__('Are you sure! you want to delete?')}}";
    if (confirm(msg)) {
    $.post("{{ route('delete.front.profile.education') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            if (response == 'ok')
            {
            $('#education_' + id).remove();
            } else
            {
            alert('Request Failed!');
            }
            });
    }
    }
    function initdatepicker(){
    $(".datepicker").datepicker({
        autoclose: true,
        format:'dd-mm-yyyy',
        locale:'vi',
language: 'vi',
    });
    /*****/
    $('.select2-multiple').select2({
    placeholder: "{{__('Select Danh sách chuyên ngành')}}",
            allowClear: true
    });
    }
    $(document).ready(function(){
    showEducationDiv();
    initdatepicker();
    $(document).on('change', '#degree_level_id', function (e) {
    e.preventDefault();
//     filterDegreeTypes(0);
    });
    $(document).on('change', '#education_country_id', function (e) {
    e.preventDefault();
    filterLangStatesEducation(0, 0);
    });
    $(document).on('change', '#education_state_id', function (e) {
    e.preventDefault();
    filterLangCitiesEducation(0);
    });
    });
    function showEducationDiv()
    {
    $.post("{{ route('show.front.profile.education', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
                console.log(response);
            $('#show_education_div').html(response);
            });
    }
//     function filterDegreeTypes(degree_type_id)
//     {
//     var degree_level_id = $('#degree_level_id').val();
//     if (degree_level_id != ''){
//     $.post("{{ route('filter.degree.types.dropdown') }}", {degree_level_id: degree_level_id, degree_type_id: degree_type_id, _method: 'POST', _token: '{{ csrf_token() }}'})
//             .done(function (response) {
//             $('#degree_types_dd').html(response);
//             });
//     }
//     }
    function filterLangStatesEducation(state_id, city_id)
    {
    var country_id = $('#education_country_id').val();
    if (country_id != ''){
    $.post("{{ route('filter.default.states.dropdown') }}", {country_id: country_id, state_id: state_id, new_state_id: 'education_state_id', _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#default_state_education_dd').html(response);
            filterLangCitiesEducation(city_id);
            });
    }
    }
    function filterLangCitiesEducation(city_id)
    {
    var state_id = $('#education_state_id').val();
    if (state_id != ''){
    $.post("{{ route('filter.default.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#default_city_education_dd').html(response);
            });
    }
    }
</script> 
@endpush
