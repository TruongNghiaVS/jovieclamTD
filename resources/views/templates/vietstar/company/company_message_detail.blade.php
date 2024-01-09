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
                <div class="myads">
                    <h3>{{__('Company Messages')}}</h3>
                    <div class="panel-group"> 
                        <!-- job start --> 
                        @if(isset($message))
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <p class="text-left">
                                <table>
                                    <tr>
                                        <td>{{__('Dated')}} : </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>{{$message->created_at->format('M d,Y')}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{__('From')}} : </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>{{$message->from_name}} - <a href="{{url('user-profile/'.$message->from_id.'#contact_applicant')}}" target="_blank">{{$message->from_email}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>{{__('Subject')}} : </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>{{$message->subject}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{__('Message')}} : </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>{{$message->message_txt}}</td>
                                    </tr>
                                </table>
                                </p>
                            </div>
                        </div>
                        <!-- job end --> 
                        @endif </div>
                </div>
            </div>
      
</div>
    @include('templates.employers.includes.footer')
    @endsection