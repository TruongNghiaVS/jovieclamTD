@extends('templates.vietstar.layouts.app')
@section('content') 
    @if(Auth::guard('company')->check())
    <!-- Header start -->
    @include('templates.employers.includes.header')
    <!-- Header end -->
    @else
    @include('templates.vietstar.includes.header')
    @endif

<div class="user-wrapper">
    
             
            @include('templates.employers.includes.mobile_dashboard_menu')
    
</div>
@include('templates.employers.includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .userccount p{ text-align:left !important;}
</style>
@endpush
