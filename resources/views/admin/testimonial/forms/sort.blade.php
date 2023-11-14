{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">
    <h3>Kéo và thả để sắp xếp các đánh giá</h3>
    {!! Form::select('lang', ['' => __('Select')]+$languages, config('default_lang'), array('class'=>'form-control', 'id'=>'lang', 'onchange'=>'refreshTestimonialSortData();')) !!}
    <div id="testimonialSortDataDiv"></div>
</div>
@push('scripts') 
<script>
    $(document).ready(function () {
        refreshTestimonialSortData();
    });
    function refreshTestimonialSortData() {
        var language = $('#lang').val();
        $.ajax({
            type: "GET",
            url: "{{ route('testimonial.sort.data') }}",
            data: {lang: language},
            success: function (responseData) {
                $("#testimonialSortDataDiv").html('');
                $("#testimonialSortDataDiv").html(responseData);
                /**************************/
                $('#sortable').sortable({
                    update: function (event, ui) {
                        var testimonialOrder = $(this).sortable('toArray').toString();
                        $.post("{{ route('testimonial.sort.update') }}", {testimonialOrder: testimonialOrder, _method: 'PUT', _token: '{{ csrf_token() }}'})
                    }
                });
                $("#sortable").disableSelection();
                /***************************/
            }
        });
    }
</script> 
@endpush
