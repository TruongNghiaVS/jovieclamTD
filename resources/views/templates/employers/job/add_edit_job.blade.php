@extends('templates.employers.layouts.app')
@section('content') 
<!-- Header start --> 
<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->
   
<!-- Header end --> 
@include('templates.employers.includes.company_dashboard_menu') 
@include('templates.employers.includes.mobile_dashboard_menu')
<div class="company-wrapper">     
             
            <div class="company-content container addjob"> 
                @include('flash::message') 
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="formpanel-recuiter"> @include('flash::message')
                                @include('templates.employers.job.inc.job')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
@include('templates.employers.includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .userccount p{ text-align:left !important;}
</style>
@endpush
