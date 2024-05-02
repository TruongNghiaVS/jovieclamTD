
<div class="section-head">
        <div class="section-head__figure">
                <div class="figure__image"><img src="https://cdn-icons-png.flaticon.com/512/8291/8291209.png" alt=""></div>
                <div class="figure__caption">
                        <h5 class="" onclick="showReferences();">{{__('References')}}</h5>
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
                <div class="right-action__link-edit"><a a href="javascript:;"  onclick="showProfileReferencesModal();"><i class="fa-solid fa-pen"></i>Thêm mới</a></div>
                <div class="right-action__link-edit-mobile"><a a href="javascript:;"  onclick="showProfileReferencesModal();"><i class="fa-solid fa-pen"></i></a></div>
        
            </div>
</div>

<div class="section-body"> 

<div class="row">

    <div class="col-md-12">

        <div class="" id="references_div">

            
        </div>
    </div>
</div>


</div>



<hr class="hr-profile">



<div class="modal" id="add_references_modal" role="dialog"></div>


@push('scripts') 

<script type="text/javascript">

    /**************************************************/

    function showProfileReferencesModal(){

    $("#add_references_modal").modal();

    loadProfileReferencesForm();

    }

    function loadProfileReferencesForm(){

    $.ajax({

    type: "POST",

            url: "{{ route('get.front.profile.references.form', $user->id) }}",

            data: {"_token": "{{ csrf_token() }}"},

            datatype: 'json',

            success: function (json) {

            $("#add_references_modal").html(json.html);

            initdatepicker();

            filterDefaultStatesReferences(0, 0);

            }

    });

    }

    function showProfileReferencesEditModal(profile_references_id, state_id, city_id){

    $("#add_references_modal").modal();

    loadProfileReferencesEditForm(profile_references_id, state_id, city_id);

    }

    function loadProfileReferencesEditForm(profile_references_id, state_id, city_id){

    $.ajax({

    type: "POST",

            url: "{{ route('get.front.profile.references.edit.form', $user->id) }}",

            data: {"profile_references_id": profile_references_id, "_token": "{{ csrf_token() }}"},

            datatype: 'json',

            success: function (json) {

            $("#add_references_modal").html(json.html);

            initdatepicker();

            filterDefaultStatesReferences(state_id, city_id);

            }

    });

    }

    function submitProfileReferencesForm() {
        var ref_name = $('#ref_name').val();
        if (ref_name == '') {
            $('#ref_name_dd').addClass('has-error');
            $('.ref_name-error').html("{{ __('Full name is required')}}");
        } else {
            $('#div_company').removeClass('has-error');
            $('.ref_name-error').html('');
        }

        var ref_position = $('#ref_position').val();
        if (ref_position == '') {
            $('#ref_position_dd').addClass('has-error');
            $('.ref_position-error').html("{{ __('Position is required')}}");
        } else {
            $('#ref_position_dd').removeClass('has-error');
            $('.ref_position-error').html('');
        }

        var ref_company = $('#ref_company').val();
        if (ref_company == '') {
            $('#ref_company_dd').addClass('has-error');
            $('.ref_company-error').html("{{ __('Company is required')}}");
        } else {
            $('#ref_company_dd').removeClass('has-error');
            $('.ref_company-error').html('');
        }

        var ref_phone = $('#ref_phone').val();
        if (ref_phone == '') {
            $('#ref_phone_dd').addClass('has-error');
            $('.ref_phone-error').html("{{ __('Phone is required')}}");
        } else {
            $('#ref_phone_dd').removeClass('has-error');
            $('.ref_phone-error').html('');
        }

        var ref_email = $('#ref_email').val();
        if (ref_email == '') {
            $('#ref_email_dd').addClass('has-error');
            $('.ref_email-error').html("{{ __('Email is required')}}");
        } else {
            $('#ref_email_dd').removeClass('has-error');
            $('.ref_email-error').html('');
        }
        if(ref_name != '' && ref_position != '' && ref_company != '' && ref_phone != '' && ref_email != ''){
            var form = $('#add_edit_profile_references');

            $.ajax({

                url     : form.attr('action'),

                type    : form.attr('method'),

                data    : form.serialize(),

                dataType: 'json',

                success : function (json){

                    $ ("#add_references_modal").html(json.html);

                    showReferences();

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


    }

    function delete_profile_references(id) {

    var msg = "{{__('Are you sure! you want to delete?')}}";

    if (confirm(msg)) {

    $.post("{{ route('delete.front.profile.references') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})

            .done(function (response) {

            if (response == 'ok')

            {

            $('#references_' + id).remove();

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
orientation: "bottom auto",
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

    showReferences();

    initdatepicker();
    

    $(document).on('change', '#references_country_id', function (e) {

    e.preventDefault();

    filterDefaultStatesReferences(0, 0);

    });

    $(document).on('change', '#references_state_id', function (e) {

    e.preventDefault();

    filterDefaultCitiesReferences(0);

    });

    });

    function showReferences()

    {

    $.post("{{ route('show.front.profile.references', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})

            .done(function (response) {

            $('#references_div').html(response);

            });

    }











    function filterDefaultStatesReferences(state_id, city_id)

    {

    var country_id = $('#references_country_id').val();

    if (country_id != ''){

    $.post("{{ route('filter.default.states.dropdown') }}", {country_id: country_id, state_id: state_id, new_state_id: 'references_state_id', _method: 'POST', _token: '{{ csrf_token() }}'})

            .done(function (response) {

            $('#default_state_references_dd').html(response);

            filterDefaultCitiesReferences(city_id);

            });

    }

    }

    function filterDefaultCitiesReferences(city_id)

    {

    var state_id = $('#references_state_id').val();

    if (state_id != ''){

    $.post("{{ route('filter.default.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '{{ csrf_token() }}'})

            .done(function (response) {

            $('#default_city_references_dd').html(response);

            });

    }

    }

</script> 

@endpush
