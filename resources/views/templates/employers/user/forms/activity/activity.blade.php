<div class="section-head">
        <div class="section-head__figure">
                <div class="figure__image"><img src="https://cdn-icons-png.flaticon.com/512/8291/8291209.png" alt=""></div>
                <div class="figure__caption">
                        <h5 class=""   onclick="showActivity();">{{__('Activity')}}</h5>
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
                <div class="right-action__link-edit"><a a href="javascript:;"  onclick="showProfileActivityModal();"><i class="bi bi-pen"></i>Thêm mới</a></div>
                <div class="right-action__link-edit-mobile"><a a href="javascript:;"  onclick="showProfileActivityModal();"><i class="bi bi-pen"></i></a></div>
        
        </div>
</div>

<div class="section-body"> 

<div class="row">
    <div class="col-md-12">
        <div class="" id="sticker_div">
            <div class="sticker" id="activity_div">         
            </div>
        </div>
    </div>
</div>
</div>


<hr class="hr-profile">


<div class="modal" id="add_activity_modal" role="dialog"></div>


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

    function showProfileActivityModal(){

    $("#add_activity_modal").modal();

    loadProfileActivityForm();

    }

    function loadProfileActivityForm(){

    $.ajax({

    type: "POST",

            url: "{{ route('get.front.profile.activity.form', $user->id) }}",

            data: {"_token": "{{ csrf_token() }}"},

            datatype: 'json',

            success: function (json) {

            $("#add_activity_modal").html(json.html);

            initdatepicker();

            filterDefaultStatesActivity(0, 0);

            }

    });

    }

    function showProfileActivityEditModal(profile_activity_id, state_id, city_id){

    $("#add_activity_modal").modal();

    loadProfileActivityEditForm(profile_activity_id, state_id, city_id);

    }

    function loadProfileActivityEditForm(profile_activity_id, state_id, city_id){

    $.ajax({

    type: "POST",

            url: "{{ route('get.front.profile.activity.edit.form', $user->id) }}",

            data: {"profile_activity_id": profile_activity_id, "_token": "{{ csrf_token() }}"},

            datatype: 'json',

            success: function (json) {

            $("#add_activity_modal").html(json.html);

            initdatepicker();

            filterDefaultStatesActivity(state_id, city_id);

            }

    });

    }

    function submitProfileActivityForm() {

    var form = $('#add_edit_profile_activity');

    $.ajax({

    url     : form.attr('action'),

            type    : form.attr('method'),

            data    : form.serialize(),

            dataType: 'json',

            success : function (json){

            $ ("#add_activity_modal").html(json.html);

            showActivity();

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

    function delete_profile_activity(id) {

    var msg = "{{__('Are you sure! you want to delete?')}}";

    if (confirm(msg)) {

    $.post("{{ route('delete.front.profile.activity') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})

            .done(function (response) {

            if (response == 'ok')

            {

            $('#activity_' + id).remove();

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

    }

    $(document).ready(function(){
        $(document).on('click', '#is_currently_working', function (e) {
            if ($(this).is(':checked')) {
                $('#date_end').attr('disabled', 'disabled')
            } else {
                $('#date_end').removeAttr("disabled");
            }
        })

    showActivity();

    initdatepicker();
    

    $(document).on('change', '#activity_country_id', function (e) {

    e.preventDefault();

    filterDefaultStatesActivity(0, 0);

    });

    $(document).on('change', '#activity_state_id', function (e) {

    e.preventDefault();

    filterDefaultCitiesActivity(0);

    });

    });

    function showActivity()

    {

    $.post("{{ route('show.front.profile.activity', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})

            .done(function (response) {

            $('#activity_div').html(response);

            });

    }











    function filterDefaultStatesActivity(state_id, city_id)

    {

    var country_id = $('#activity_country_id').val();

    if (country_id != ''){

    $.post("{{ route('filter.default.states.dropdown') }}", {country_id: country_id, state_id: state_id, new_state_id: 'activity_state_id', _method: 'POST', _token: '{{ csrf_token() }}'})

            .done(function (response) {

            $('#default_state_activity_dd').html(response);

            filterDefaultCitiesActivity(city_id);

            });

    }

    }

    function filterDefaultCitiesActivity(city_id)

    {

    var state_id = $('#activity_state_id').val();

    if (state_id != ''){

    $.post("{{ route('filter.default.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '{{ csrf_token() }}'})

            .done(function (response) {

            $('#default_city_activity_dd').html(response);

            });

    }

    }

</script> 

@endpush