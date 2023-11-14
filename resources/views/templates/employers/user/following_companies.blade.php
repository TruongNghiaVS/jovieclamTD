@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->
<!-- Inner Page Title start -->
<!-- Inner Page Title end -->
@include('templates.employers.includes.mobile_dashboard_menu')
<div class="user-wrapper">
    @include('flash::message')
    @include('templates.employers.includes.default_sidebar_menu')
    <div class="content">
        <div class="myads">
            <h3>{{__('My Followings')}}</h3>
            <div class="searchList jobs-apply-list">
                <!-- job start -->
                @if(isset($companies) && count($companies))
                @foreach($companies as $company)
                <div class="item-job">
                    <div class="card-news card-news-applied-jobs gap-16 mb-2">
                        <div class="card-news__icon">
                            {{$company->printCompanyImage()}}
                        </div>
                        <div class="card-news__content">

                            <div class="card-news__content-footer card-news__content-footer-applied-jobs">
                                <div class="applied-jobs-information">
                                    <h6 class="card-news__content-title"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></h6>
                                    <p class="card-news__content-detail mb-1"><span class="iconmoon icon-recruiter-website"></span> {{$company->website}} </p>
                                    <p class="card-news__content-detail mb-1"><span class="iconmoon icon-recruiter-phone-call"></span> {{$company->phone}} </p>
                                    <p class="card-news__content-detail mb-1"><span class="iconmoon icon-recruiter-email"></span> {{$company->email}} </p>
                                    <p class="card-news__content-detail mb-1"> <span class="iconmoon icon-recruiter-location"></span> {{$user->getLocation()}} -
                                        {{$user->street_address}}
                                    </p>
                                </div>

                                <div class="card-news__content-footer__salary">

                                    <div>
                                        <a class="btn btn-primary" href="{{route('company.detail', $company->slug)}}"><i class="bi bi-eye"></i> {{__('View Details')}}</a>
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
@push('scripts')
@include('templates.employers.includes.immediate_available_btn')
@endpush