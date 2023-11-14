@extends('templates.vietstar.layouts.app')
@section('content') 
    @if(Auth::guard('company')->check())
    <!-- Header start -->
    @include('templates.employers.includes.header')
    <!-- Header end -->
    @else
    @include('templates.vietstar.includes.header')
    @endif
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
@include('templates.vietstar.includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .userccount p{ text-align:left !important;}
</style>
@endpush