<div class="section-head">
        <div class="section-head__figure">
                <div class="figure__image"><img src="https://cdn-icons-png.flaticon.com/512/3269/3269817.png" alt=""></div>
                <div class="figure__caption">
                        <h5 class=""  onclick="showLanguages();">{{__('Languages')}}</h5>
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
                <div class="right-action__link-edit"><a a href="javascript:;"  onclick="showProfileLanguageModal();"><i class="fa-solid fa-pen"></i>Thêm mới</a></div>
                <div class="right-action__link-edit-mobile"><a a href="javascript:;"  onclick="showProfileLanguageModal();"><i class="fa-solid fa-pen"></i></a></div>
        
            </div>
</div>

<div class="section-body"> 

<div class="row">
    <div class="col-md-12">
        <div class="" id="language_div"></div>
    </div>
</div>

</div>


<hr class="hr-profile">

<div class="modal" id="add_language_modal" role="dialog"></div>
@push('scripts') 
<script type="text/javascript">
    /**************************************************/
    function showProfileLanguageModal(){
        $("#add_language_modal").modal();
        loadProfileLanguageForm();
    }
    function loadProfileLanguageForm(){
        $.ajax({
        type: "POST",
                url: "{{ route('get.front.profile.language.form', $user->id) }}",
                data: {"_token": "{{ csrf_token() }}"},
                datatype: 'json',
                success: function (json) {
                $("#add_language_modal").html(json.html);
                }
        });
        $("#add_language_modal").modal('show').trigger('focus');
    }
    function showProfileLanguageEditModal(profile_language_id){
        $("#add_language_modal").modal();
        loadProfileLanguageEditForm(profile_language_id);
        $("#add_language_modal").modal('show').trigger('focus');
    }
    function loadProfileLanguageEditForm(profile_language_id){
    $.ajax({
        type: "POST",
                url: "{{ route('get.front.profile.language.edit.form', $user->id) }}",
                data: {"profile_language_id": profile_language_id, "_token": "{{ csrf_token() }}"},
                datatype: 'json',
                success: function (json) {
                $("#add_language_modal").html(json.html);
                }
        });
        $("#add_language_modal").modal('show').trigger('focus');
    }
    function submitProfileLanguageForm() {
    var form = $('#add_edit_profile_language');
    $.ajax({
    url     : form.attr('action'),
            type    : form.attr('method'),
            data    : form.serialize(),
            dataType: 'json',
            success : function (json){
            $ ("#add_language_modal").html(json.html);
            showLanguages();
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
    function delete_profile_language(id) {
    var msg = "{{__('Are you sure! you want to delete?')}}";
    if (confirm(msg)) {
    $.post("{{ route('delete.front.profile.language') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            if (response == 'ok')
            {
            $('#language_' + id).remove();
            } else
            {
            alert('Request Failed!');
            }
            });
    }
    }
    $(document).ready(function(){
    showLanguages();
    });
    function showLanguages()
    {
    $.post("{{ route('show.front.profile.languages', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#language_div').html(response);
            });
    }

    $('body').on('change','#language_id', function () {
        var language_id = $(this).val();
        if (language_id) {
            var url = "{{ route('candidate.language.levels', [':language_id']) }}";
            url = url.replace(':language_id',language_id);
            $('#div_language_level_id').empty();
            $.ajax({
                url: url,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                method: 'get',
                beforeSend: function(){
                },
                success: function(response){
                    console.log(response,language_id);
                    $('#div_language_level_id').html(response);
                }
            });
        } else {
            //$('#div_language_level_id').empty();
        }
    });
</script> 
@endpush
