@extends('templates.employers.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->
<!-- Inner Page Title start -->

<!-- Inner Page Title end -->

<!-- Dashboard start -->
@include('templates.employers.includes.mobile_dashboard_menu')
<!-- Dashboard end -->

@include('templates.employers.includes.blog', ['dataDraw' => $data])

@include('templates.employers.includes.footer')
@endsection
@push('styles')
<style>
    .plus-minus-input {
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .plus-minus-input .input-group-field {
        text-align: center;
        margin-left: 0.5rem;
        margin-right: 0.5rem;
        padding: 0rem;
    }

    .plus-minus-input .input-group-field::-webkit-inner-spin-button,
    .plus-minus-input .input-group-field ::-webkit-outer-spin-button {
        -webkit-appearance: none;
        appearance: none;
    }

    .plus-minus-input .input-group-button .circle {
        border-radius: 50%;
        padding: 0.25em 0.8em;
    }
</style>
@endpush
@push('scripts')
@include('templates.employers.includes.immediate_available_btn')
<script>
</script>
@endpush