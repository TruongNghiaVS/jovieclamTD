{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">
    <h3>Kéo và thả để sắp xếp</h3>
    {!! Form::select('lang', ['' => __('Select')]+$languages, 'en', array('class'=>'form-control', 'id'=>'lang', 'onchange'=>'refreshLanguageLevelSortData();')) !!}
    <div id="languageLevelSortDataDiv"></div>
</div>
@push('scripts') 
<script>
    $(document).ready(function () {
        refreshLanguageLevelSortData();
    });
    function refreshLanguageLevelSortData() {
        var language = $('#lang').val();
        $.ajax({
            type: "GET",
            url: "{{ route('language.level.sort.data') }}",
            data: {lang: language},
            success: function (responseData) {
                $("#languageLevelSortDataDiv").html('');
                $("#languageLevelSortDataDiv").html(responseData);
                /**************************/
                $('#sortable').sortable({
                    update: function (event, ui) {
                        var languageLevelOrder = $(this).sortable('toArray').toString();
                        $.post("{{ route('language.level.sort.update') }}", {languageLevelOrder: languageLevelOrder, _method: 'PUT', _token: '{{ csrf_token() }}'})
                    }
                });
                $("#sortable").disableSelection();
                /***************************/
            }
        });
    }
</script> 
@endpush
