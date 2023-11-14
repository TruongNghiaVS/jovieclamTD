@extends('templates.vietstar.layouts.app')
@section('content') 
<!-- Header start --> 
@include('templates.employers.includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('templates.employers.includes.inner_page_title', ['page_title'=>__('My Messages')]) 
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <div class="row"> @include('templates.employers.includes.user_dashboard_menu')
            <div class="col-md-9">
                <div class="myads">
                    <h3>{{__('My Messages')}}</h3>
                    <ul class="searchList">
                        <!-- job start --> 
                        @if(isset($messages) && count($messages))
                        @foreach($messages as $message)

                        @php
                        $style = (!(bool)$message->is_read)? 'border: 2px solid #FFB233;':'';
                        @endphp

                        <li style="{{$style}}">
                            <a href="{{route('applicant.message.detail', $message->id)}}" title="{{$message->subject}}">
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
    </div>
    @include('templates.employers.includes.footer')
    @endsection
    @push('scripts')
    @include('templates.employers.includes.immediate_available_btn')
    @endpush