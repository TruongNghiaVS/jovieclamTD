@extends('templates.employers.layouts.app')
@section('content') 

    <!-- Header start -->
    @include('templates.employers.includes.header')
    <!-- Header end -->

<!-- Inner Page Title start --> 
@include('templates.employers.includes.company_dashboard_menu') 
<!-- Inner Page Title end -->
<div class="company-wrapper">
            @include('templates.employers.includes.mobile_dashboard_menu')
            <div class="container company-content">
               
                @include('flash::message') 
                <!-- Personal Information -->
                @include(config('app.THEME_PATH').'.company.inc.profile')
            </div>
 
</div>
@include('templates.employers.includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .userccount p{ text-align:left !important;}
</style>
@endpush