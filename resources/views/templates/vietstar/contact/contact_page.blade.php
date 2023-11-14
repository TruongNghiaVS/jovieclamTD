@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->


    @if(Auth::guard('company')->check())
    <!-- Header start -->
    @include('templates.employers.includes.header')
    <!-- Header end -->
    @else
    @include('templates.vietstar.includes.header')
    @endif
<!-- Header end -->
<!-- Inner Page Title start -->
@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('Contact')])
<!-- Inner Page Title end -->
<div class="inner-page">
    <!-- About -->
    <div class="container">
        <div class="contact-wrap shadow">
            <!-- <h5 class="title">
                {{__('Thank you for trusting and choosing Jobvieclam.')}}
                <br>
                {{__('Please contact us when you need assistance')}}
            </h5> -->
            <!-- Contact Info -->
            <div class="contact-now">

                <div class="row">
                    <div class="col-lg-6 column">
                        <div class="contact" style="height: auto">
                            <div class="information"> <strong>{{__('vietstar group joint stock company')}}</strong>
                                <p>{{ $siteSetting->site_street_address }}</p>
                            </div>

                            <div class="information">
                                <p><i class="fa fa-phone mr-2" style="color: #951B1E; margin-right: 10px"></i><a href="tel:{{ $siteSetting->site_phone_primary }}">{{ $siteSetting->site_phone_primary }}</a>
                                </p>
                                <!-- <p><i class="fa fa-phone mr-2" style="color: #951B1E; margin-right: 10px"></i><a href="tel:{{ $siteSetting->site_phone_secondary }}">{{ $siteSetting->site_phone_secondary }}</a></p> -->
                            </div>

                            <div class="information">
                                <p><i class="fa fa-envelope mr-2" style="color: #951B1E; margin-right: 10px"></i><a href="mailto:{{ $siteSetting->mail_to_address }}">{{ $siteSetting->mail_to_address }}</a>
                                </p>
                            </div>
                        </div>
                        <!-- Google Map -->
                        <div class="googlemap">
                            <iframe src="https://maps.google.it/maps?q={{urlencode(strip_tags($siteSetting->site_google_map))}}&output=embed" allowfullscreen></iframe>
                        </div>
                    </div>
                    <!-- Contact form -->
                    <div class="col-lg-6 column">
                        <div class="contact-form">
                            <div id="message"></div>
                            <form method="post" action="{{ route('post.contact.us')}}" name="contactform" id="contactform">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12{{ $errors->has('full_name') ? ' has-error' : '' }}">
                                        {!! Form::text('full_name', null, array('id'=>'full_name',
                                        'placeholder'=>__('Full Name'), 'required'=>'required',
                                        'autofocus'=>'autofocus')) !!}
                                        @if ($errors->has('full_name')) <span class="help-block">
                                            <strong>{{ $errors->first('full_name') }}</strong> </span> @endif
                                    </div>
                                    <div class="col-md-12{{ $errors->has('email') ? ' has-error' : '' }}">
                                        {!! Form::text('email', null, array('id'=>'email', 'placeholder'=>__('Email'),
                                        'required'=>'required')) !!}
                                        @if ($errors->has('email')) <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong> </span> @endif
                                    </div>
                                    <div class="col-md-12{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        {!! Form::text('phone', null, array('id'=>'phone', 'placeholder'=>__('Phone')))
                                        !!}
                                        @if ($errors->has('phone')) <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong> </span> @endif
                                    </div>
                                    <div class="col-md-12{{ $errors->has('subject') ? ' has-error' : '' }}">
                                        {!! Form::text('subject', null, array('id'=>'subject',
                                        'placeholder'=>__('Subject'), 'required'=>'required')) !!}
                                        @if ($errors->has('subject')) <span class="help-block">
                                            <strong>{{ $errors->first('subject') }}</strong> </span> @endif
                                    </div>
                                    <div class="col-md-12{{ $errors->has('message_txt') ? ' has-error' : '' }}">
                                        {!! Form::textarea('message_txt', null, array('id'=>'message_txt',
                                        'placeholder'=>__('Message'), 'required'=>'required', 'rows'=>'5' )) !!}
                                        @if ($errors->has('message_txt')) <span class="help-block">
                                            <strong>{{ $errors->first('message_txt') }}</strong> </span> @endif
                                    </div>
                                    <div class="col-md-12{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                        {!! app('captcha')->display() !!}
                                        @if ($errors->has('g-recaptcha-response')) <span class="help-block">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                                    </div>
                                    <div class="col-md-12">
                                        <button title="" class="btn btn-primary btn-submit" type="submit" id="submit">{{__('Submit Now')}} <i class="far fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@include('templates.vietstar.includes.footer')
@endsection