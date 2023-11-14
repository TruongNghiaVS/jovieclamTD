{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">
    <h3>Kéo và thả để sắp xếp {{__('Functional Area')}}</h3>
    {!! Form::select('lang', ['' => __('Select')]+$languages, config('default_lang'), array('class'=>'form-control', 'id'=>'lang', 'onchange'=>'refreshFunctionalAreaSortData();')) !!}
    <div id="functionalAreaSortDataDiv"></div>
</div>
@push('scripts') 
<script>
    $(document).ready(function () {
        refreshFunctionalAreaSortData();
    });
    function refreshFunctionalAreaSortData() {
        var language = $('#lang').val();
        $.ajax({
            type: "GET",
            url: "{{ route('functional.area.sort.data') }}",
            data: {lang: language},
            success: function (responseData) {
                $("#functionalAreaSortDataDiv").html('');
                $("#functionalAreaSortDataDiv").html(responseData);
                /**************************/
                $('#sortable').sortable({
                    update: function (event, ui) {
                        var functionalAreaOrder = $(this).sortable('toArray').toString();
                        $.post("{{ route('functional.area.sort.update') }}", {functionalAreaOrder: functionalAreaOrder, _method: 'PUT', _token: '{{ csrf_token() }}'})
                    }
                });
                $("#sortable").disableSelection();
                /***************************/
            }
        });
    }
</script> 
@endpush
