@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('templates.employers.includes.inner_page_title', ['page_title'=>__('Report Abuse')])
<!-- Inner Page Title endemployers-->
<div class="listpgWraper">
    <div class="container">
        @include('flash::message')
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="userccount">
                    <h5>{{__('Thanks')}}!</h5>
                    <p>{{__('We will check this job')}},<br /><br />{{ $siteSetting->site_name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@include('templates.employers.includes.footer')
@endsection