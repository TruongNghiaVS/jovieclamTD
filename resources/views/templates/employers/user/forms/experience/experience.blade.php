<div class="section-head">
        <div class="section-head__figure">
                <div class="figure__image"><img src="https://cdn-icons-png.flaticon.com/512/3862/3862929.png" alt=""></div>
                <div class="figure__caption">
                        <h5 class="" >{{__('Experience')}}</h5>
                        <div class="status complete" bis_skin_checked="1">
                                <p>Hoàn thành</p>
                        </div>
                </div>
        </div>
        <div class="section-head__right-action" bis_skin_checked="1">
                <div class="right-action__tips" bis_skin_checked="1">
                        <i class="fa-regular fa-lightbulb"></i>
                        <p>Tips</p>
                </div>
                <div class="right-action__link-edit"><a href="javascript:;" onclick="showProfileExperienceModal();"><i class="fa-solid fa-pen"></i>Thêm mới</a></div>
                <div class="right-action__link-edit-mobile"><a a href="javascript:;"  onclick="showProfileExperienceModal();"><i class="fa-solid fa-pen"></i></a></div>
        
        </div>
</div>

<div class="section-body">
        <div class="jobster-candidate-timeline">
                <div class="" id="jobster-candidate_experience_div">

                </div>         
        </div>

</div>


<hr class="hr-profile">



<div class="modal" id="add_experience_modal" role="dialog"></div>

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

    function showProfileExperienceModal(){

    $("#add_experience_modal").modal();

    loadProfileExperienceForm();

    }

    function loadProfileExperienceForm(){

    $.ajax({

    type: "POST",

            url: "{{ route('get.front.profile.experience.form', $user->id) }}",

            data: {"_token": "{{ csrf_token() }}"},

            datatype: 'json',

            success: function (json) {

            $("#add_experience_modal").html(json.html);

            initdatepicker();

            filterDefaultStatesExperience(0, 0);

            }

    });

    }

    function showProfileExperienceEditModal(profile_experience_id, state_id, city_id){

    $("#add_experience_modal").modal();

    loadProfileExperienceEditForm(profile_experience_id, state_id, city_id);

    }

    function loadProfileExperienceEditForm(profile_experience_id, state_id, city_id){

    $.ajax({

    type: "POST",

            url: "{{ route('get.front.profile.experience.edit.form', $user->id) }}",

            data: {"profile_experience_id": profile_experience_id, "_token": "{{ csrf_token() }}"},

            datatype: 'json',

            success: function (json) {

            $("#add_experience_modal").html(json.html);

            initdatepicker();

            filterDefaultStatesExperience(state_id, city_id);

            }

    });

    }

    function submitProfileExperienceForm() {

    var form = $('#add_edit_profile_experience');

    $.ajax({

    url     : form.attr('action'),

            type    : form.attr('method'),

            data    : form.serialize(),

            dataType: 'json',

            success : function (json){

            $ ("#add_experience_modal").html(json.html);

            

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


    showExperiencediv();

    }

    function delete_profile_experience(id) {

    var msg = "{{__('Are you sure! you want to delete?')}}";

    if (confirm(msg)) {

    $.post("{{ route('delete.front.profile.experience') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})

            .done(function (response) {

            if (response == 'ok')

            {

            $('#experience_' + id).remove();

            } else

            {

            alert('Request Failed!');

            }

            })

    }
    showExperiencediv();


    }

    function initdatepicker(){

    $(".datepicker").datepicker({

        autoclose: true,
        format:'dd-mm-yyyy',
        locale:'vi',
language: 'vi',
orientation: "bottom auto",

    });

    }

    $(document).ready(function(){

        showExperiencediv()

    initdatepicker();

    $(document).on('change', '#experience_country_id', function (e) {

    e.preventDefault();

    filterDefaultStatesExperience(0, 0);

    });

    $(document).on('change', '#experience_state_id', function (e) {

    e.preventDefault();

    filterDefaultCitiesExperience(0);

    });

    });
    function showExperiencediv()

    {
  

    $.post("{{ route('show.front.profile.experience', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})

            .done(function (response) {

            $('#jobster-candidate_experience_div').html(response);
            });

    }

    function filterDefaultStatesExperience(state_id, city_id)

    {

    var country_id = $('#experience_country_id').val();

    if (country_id != ''){

    $.post("{{ route('filter.default.states.dropdown') }}", {country_id: country_id, state_id: state_id, new_state_id: 'experience_state_id', _method: 'POST', _token: '{{ csrf_token() }}'})

            .done(function (response) {

            $('#default_state_experience_dd').html(response);

            filterDefaultCitiesExperience(city_id);

            });

    }

    }

    function filterDefaultCitiesExperience(city_id)

    {

    var state_id = $('#experience_state_id').val();

    if (state_id != ''){

    $.post("{{ route('filter.default.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '{{ csrf_token() }}'})

            .done(function (response) {
                console.log(response);
            $('#default_city_experience_dd').html(response);

            });

    }

    }

</script> 

@endpush