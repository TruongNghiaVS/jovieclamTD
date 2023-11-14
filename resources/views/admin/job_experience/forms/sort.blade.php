{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">
    <h3>Kéo và thả để Sắp xếp Kinh nghiệm làm việc</h3>
    {!! Form::select('lang', ['' => __('Select')]+$languages, config('default_lang'), array('class'=>'form-control', 'id'=>'lang', 'onchange'=>'refreshJobExperienceSortData();')) !!}
    <div id="jobExperienceSortDataDiv"></div>
</div>
@push('scripts') 
<script>
    $(document).ready(function () {
        refreshJobExperienceSortData();
    });
    function refreshJobExperienceSortData() {
        var language = $('#lang').val();
        $.ajax({
            type: "GET",
            url: "{{ route('job.experience.sort.data') }}",
            data: {lang: language},
            success: function (responseData) {
                $("#jobExperienceSortDataDiv").html('');
                $("#jobExperienceSortDataDiv").html(responseData);
                /**************************/
                $('#sortable').sortable({
                    update: function (event, ui) {
                        var jobExperienceOrder = $(this).sortable('toArray').toString();
                        $.post("{{ route('job.experience.sort.update') }}", {jobExperienceOrder: jobExperienceOrder, _method: 'PUT', _token: '{{ csrf_token() }}'})
                    }
                });
                $("#sortable").disableSelection();
                /***************************/
            }
        });
    }
</script> 
@endpush
