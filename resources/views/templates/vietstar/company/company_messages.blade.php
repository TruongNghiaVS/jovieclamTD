@extends('templates.employers.layouts.app')
@section('content') 
<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->


<!-- Inner Page Title start --> 
@include('templates.employers.includes.inner_page_title', ['page_title'=>__('Company Messages')]) 
<!-- Inner Page Title end -->
@include('templates.employers.includes.company_dashboard_menu') 
<div class="company-wrapper">  
             
        @include('templates.employers.includes.mobile_dashboard_menu')
            <div class="container company-content">
            @include('flash::message') 
                <div class="card card-bio">
                    <h3>{{__('Company Messages')}}</h3>
                    <ul class="searchList">
                        <!-- job start --> 
                        @if(isset($messages) && count($messages))
                        @foreach($messages as $message)

                        @php
                        $style = (!(bool)$message->is_read)? 'border: 2px solid #FFB233;':'';
                        @endphp

                        <li style="{{$style}}">
                            <a href="{{route('company.message.detail', $message->id)}}" title="{{$message->subject}}">
                                <div class="row">
                                    <div class="col-md-8">              
                                        <h4>{{$message->from_name}} - {{$message->from_email}}</h4>
                                        {{$message->subject}}
                                    </div>
                                    <div class="col-md-4 text-right">
                                        {{$message->created_at->format('M d,Y')}}                
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- job end --> 
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div> 
</div>
    @include('templates.employers.includes.footer')
    @endsection