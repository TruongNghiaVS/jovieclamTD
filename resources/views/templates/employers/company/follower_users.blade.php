@extends('templates.employers.layouts.app')
@section('content') 
<!-- Header start --> 

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
                    <h3>{{__('Company Followers')}}</h3>
                    <div class="searchList jobs-apply-list">
                        <!-- job start --> 
                        @if(isset($users) && count($users))
                        @foreach($users as $user)
                        <div class="item-job">
                            <div class="card-news card-news-applied-jobs gap-16 mb-2">
                                <div class="card-news__icon">
                                    {{$user->printUserImage(100, 100)}}
                                </div>
                                <div class="card-news__content">
                                    
                                    <div class="card-news__content-footer card-news__content-footer-applied-jobs">
                                        <div class="applied-jobs-information">
                                            <h6 class="card-news__content-title"><a href="{{route('user.profile', $user->id)}}">{{$user->getName()}}</a></h6>
                                                <p class="card-news__content-detail mb-1"><span class="iconmoon icon-recruiter-phone-call"></span> {{$user->phone}} </p>
                                                <p class="card-news__content-detail mb-1"><span class="iconmoon icon-recruiter-email"></span> {{$user->email}}  </p>
                                                <p class="card-news__content-detail mb-1"> <span class="iconmoon icon-recruiter-location"></span> {{$user->getLocation()}} - {{$user->street_address}}</p>
                                        </div>
                                        
                                        <div class="card-news__content-footer__salary">
                                            <p class="card-news__content-detail mb-2">
                                                @if($user->gender_id == 2)
                                                {{_('Male')}}
                                                @endif
                                                @if($user->gender_id == 1)
                                                {{_('Female')}}
                                                @endif
                                            </p>
                                            <div class="rank-salary">
                                                {{$user->current_salary}} {{$user->salary_currency}} - {{$user->expected_salary}} {{$user->salary_currency}}
                                            </div>
                                           <div>
                                                <a class="btn-veiw-profile"  href="{{route('user.profile', $user->id)}}">{{_('View Profile')}}</a>
                                           </div>
                                           
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        <!-- job end --> 
                        @endforeach
                        @endif
                    </div>
                </div>
            </div> 
</div>
@include('templates.employers.includes.footer')
@endsection