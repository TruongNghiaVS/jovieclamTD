@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end -->


<!-- Dashboard start -->
@include('templates.vietstar.includes.mobile_dashboard_menu')
<!-- Dashboard end -->

@include('templates.vietstar.includes.blog')


@include('templates.vietstar.includes.footer')
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

    .postimg img {
        max-width: 100px;
        max-height: 150px;
    }

    .list {
        max-width: 1400px;
        margin: 20px auto;
    }

    .img-list a {
        text-decoration: none;
    }

    .li-sub p {
        margin: 0;
    }

    .list li {
        border-bottom: 1px solid #ccc;
        display: table;
        border-collapse: collapse;
        width: 100%;
    }

    .inner {
        display: table-row;
        overflow: hidden;
    }

    .li-img {
        display: table-cell;
        vertical-align: middle;
        width: 30%;
        padding-right: 1em;
    }

    .li-img img {
        display: block;
        width: 100%;
        height: auto;

    }

    .li-text {
        display: table-cell;
        vertical-align: middle;
        width: 70%;
    }

    .li-head {
        margin: 10px 0 0 0;
    }

    .li-sub {
        margin: 0;
    }

    @media all and (min-width: 45em) {
        .list li {
            float: left;
            width: 50%;
        }
    }

    @media all and (min-width: 75em) {
        .list li {
            width: 33.33333%;
        }
    }

    /* for flexbox */
    @supports(display: flex) {
        .list {
            display: flex;
            flex-wrap: wrap;
        }

        .li-img,
        .li-text,
        .list li {
            display: block;
            float: none;
        }

        .li-img {
            align-self: center;
            /* to match the middle alignment of the original */
        }

        .inner {
            display: flex;
        }
    }

    /* for grid */
    @supports(display: grid) {
        .list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
        }

        .list li {
            width: auto;
            /* this overrides the media queries */
        }
    }
</style>
@endpush
@push('scripts')
@include('templates.vietstar.includes.immediate_available_btn')
<script>
</script>
@endpush