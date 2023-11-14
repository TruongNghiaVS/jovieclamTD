<div class="modal-body" id="botienxunhano">
    <div class="form-body">
        <div class="formrow" id="div_language_id">
            @php($language_id = (isset($profileLanguage) ? $profileLanguage->language_id : null))
            {!! Form::select('language_id', [''=>__('Select language')] + $languages, $language_id, array('class'=>'form-control', 'id'=>'language_id')) !!} <span class="help-block language_id-error"></span> </div>
        <div class="formrow" id="div_language_level_id">
            {!! Form::select('language_level_id', [''=>__('Select Language Level')], null, array('class'=>'form-control', 'id'=>'language_level_id')) !!} <span class="help-block language_level_id-error"></span> </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#add_language_modal').on('show.bs.modal', function () {
                alert('hoooooooooooooooooo');
                var language_id = $('#language_id').val();
                filterLangLevel(language_id);
            });
            $('body').on('change','#language_id', function () {
                alert('ssssssssssss');
                var language_id = $(this).val();
                if (language_id) {
                    var url = "{{ route('candidate.language.levels', [':language_id']) }}";
                    url = url.replace(':language_id',language_id);
                    $('#div_language_level_id').empty();
                    $.ajax({
                        url: url,
                        method: 'get',
                        beforeSend: function(){
                        },
                        success: function(response){
                            $('#div_language_level_id').html(response);
                        }
                    });
                } else {
                    //$('#div_language_level_id').empty();
                }
            });
        });
        function filterLangLevel(lang_id) {
            alert('blalala');
            $.get("{{ route('candidate.language.levels', "") }}"+"/"+lang_id)
            .done(function (response) {
                $('#div_language_level_id').html(response)
            });
        }

        $('#add_language_modal').on('show.bs.modal', function () {
            var language_id = $('#language_id').val();
            filterLangLevel(language_id);
        });
    </script>
@endpush
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#add_language_modal').on('show.bs.modal', function () {
                alert('hoooooooooooooooooo');
                var language_id = $('#language_id').val();
                filterLangLevel(language_id);
            });
            $('body').on('change','#language_id', function () {
                alert('ssssssssssss');
                var language_id = $(this).val();
                if (language_id) {
                    var url = "{{ route('candidate.language.levels', [':language_id']) }}";
                    url = url.replace(':language_id',language_id);
                    $('#div_language_level_id').empty();
                    $.ajax({
                        url: url,
                        method: 'get',
                        beforeSend: function(){
                        },
                        success: function(response){
                            $('#div_language_level_id').html(response);
                        }
                    });
                } else {
                    //$('#div_language_level_id').empty();
                }
            });
        });
        function filterLangLevel(lang_id) {
            alert('blalala');
            $.get("{{ route('candidate.language.levels', "") }}"+"/"+lang_id)
            .done(function (response) {
                $('#div_language_level_id').html(response)
            });
        }

        $('#add_language_modal').on('show.bs.modal', function () {
            var language_id = $('#language_id').val();
            filterLangLevel(language_id);
        });
    </script>
@endpush
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#add_language_modal').on('show.bs.modal', function () {
                alert('hoooooooooooooooooo');
                var language_id = $('#language_id').val();
                filterLangLevel(language_id);
            });
            $('body').on('change','#language_id', function () {
                alert('ssssssssssss');
                var language_id = $(this).val();
                if (language_id) {
                    var url = "{{ route('candidate.language.levels', [':language_id']) }}";
                    url = url.replace(':language_id',language_id);
                    $('#div_language_level_id').empty();
                    $.ajax({
                        url: url,
                        method: 'get',
                        beforeSend: function(){
                        },
                        success: function(response){
                            $('#div_language_level_id').html(response);
                        }
                    });
                } else {
                    //$('#div_language_level_id').empty();
                }
            });
        });
        function filterLangLevel(lang_id) {
            alert('blalala');
            $.get("{{ route('candidate.language.levels', "") }}"+"/"+lang_id)
            .done(function (response) {
                $('#div_language_level_id').html(response)
            });
        }

        $('#add_language_modal').on('show.bs.modal', function () {
            var language_id = $('#language_id').val();
            filterLangLevel(language_id);
        });
    </script>
@endpush
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#add_language_modal').on('show.bs.modal', function () {
                alert('hoooooooooooooooooo');
                var language_id = $('#language_id').val();
                filterLangLevel(language_id);
            });
            $('body').on('change','#language_id', function () {
                alert('ssssssssssss');
                var language_id = $(this).val();
                if (language_id) {
                    var url = "{{ route('candidate.language.levels', [':language_id']) }}";
                    url = url.replace(':language_id',language_id);
                    $('#div_language_level_id').empty();
                    $.ajax({
                        url: url,
                        method: 'get',
                        beforeSend: function(){
                        },
                        success: function(response){
                            $('#div_language_level_id').html(response);
                        }
                    });
                } else {
                    //$('#div_language_level_id').empty();
                }
            });
        });
        function filterLangLevel(lang_id) {
            alert('blalala');
            $.get("{{ route('candidate.language.levels', "") }}"+"/"+lang_id)
            .done(function (response) {
                $('#div_language_level_id').html(response)
            });
        }

        $('#add_language_modal').on('show.bs.modal', function () {
            var language_id = $('#language_id').val();
            filterLangLevel(language_id);
        });
    </script>
@endpush