@extends('templates.vietstar.layouts.app')

@section('content')

<!-- Header start -->

@include('templates.employers.includes.header')

<!-- Header end -->

<!-- Inner Page Title start -->
@include('templates.employers.includes.mobile_dashboard_menu')

<!-- Inner Page Title end -->

<div class="login-form">
    <div class="container">
        <div class="row g-0 ">

            <div class="col-12">
                <div class="useraccountwrap">
                    <div class="userccount-register shadow">
                    {{--  
                        <div id="candidate" class="formpanel">

                            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                <h3>Đăng Ký</h3>
                                {{ csrf_field() }}

                                <input type="hidden" name="candidate_or_employer" value="candidate" />
                                <div class="row">
                                    <div class="formrow col {{ $errors->has('first_name') ? ' has-error' : '' }}">

                                        <input type="text" name="first_name" class="form-control" required="required" placeholder="{{__('First Name')}}" value="{{old('first_name')}}">

                                        @if ($errors->has('first_name')) <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong> </span> @endif
                                    </div>

                                    <!-- <div class="formrow col {{ $errors->has('middle_name') ? ' has-error' : '' }}">

                                        <input type="text" name="middle_name" class="form-control" placeholder="{{__('Middle Name')}}" value="{{old('middle_name')}}">

                                        @if ($errors->has('middle_name')) <span class="help-block">
                                            <strong>{{ $errors->first('middle_name') }}</strong> </span> @endif
                                    </div> -->
                                    <div class="formrow col {{ $errors->has('last_name') ? ' has-error' : '' }}">

                                        <input type="text" name="last_name" class="form-control" required="required" placeholder="{{__('Last Name')}}" value="{{old('last_name')}}">

                                        @if ($errors->has('last_name')) <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong> </span> @endif
                                    </div>
                                </div>


                                <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">

                                    <input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">

                                    @if ($errors->has('email')) <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong> </span> @endif
                                </div>

                                <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">

                                    <input type="password" name="password" class="form-control" required="required" placeholder="{{__('Password')}}" value="">

                                    @if ($errors->has('password')) <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong> </span> @endif
                                </div>

                                <div class="formrow{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                                    <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Password Confirmation')}}" value="">

                                    @if ($errors->has('password_confirmation')) <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong> </span>
                                    @endif
                                </div>



                                <div class="formrow{{ $errors->has('is_subscribed') ? ' has-error' : '' }}">

                                    <?php

                                    $is_checked = '';

                                    if (old('is_subscribed', 1)) {

                                        $is_checked = 'checked="checked"';
                                    }

                                    ?>



                                    <input type="checkbox" value="1" name="is_subscribed" {{$is_checked}} />
                                    {{__('Subscribe to Newsletter')}}

                                    @if ($errors->has('is_subscribed')) <span class="help-block">
                                        <strong>{{ $errors->first('is_subscribed') }}</strong> </span> @endif
                                </div>





                                <div class="formrow{{ $errors->has('terms_of_use') ? ' has-error' : '' }}">

                                    <input type="checkbox" value="1" name="terms_of_use" />

                                    <a href="{{url('cms/terms-of-use')}}">{{__('I accept Terms of Use')}}</a>



                                    @if ($errors->has('terms_of_use')) <span class="help-block">
                                        <strong>{{ $errors->first('terms_of_use') }}</strong> </span> @endif
                                </div>

                                <div class="form-group col-12 col-sm-12 col-md-10 text-center mx-auto mobile-padding-no {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                    {!! app('captcha')->display() !!}
                                    @if ($errors->has('g-recaptcha-response')) <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                                </div>

                                <input type="submit" class="btn" value="{{__('Đăng Ký')}}">

                            </form>

                        </div> --}}
                        <div id="employer" class="formpanel">

                            <form class="form-horizontal" method="POST" action="{{ route('company.register') }}">
                                <h3>{{__('Employers')}} / {{__('Logup')}}</h3>
                                {{ csrf_field() }}

                                <input type="hidden" name="candidate_or_employer" value="employer" />

                                <div class="formrow{{ $errors->has('name') ? ' has-error' : '' }}">

                                    <input type="text" name="name" class="form-control" required="required" placeholder="{{__('Name')}}" value="{{old('name')}}">

                                    @if ($errors->has('name')) <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong> </span> @endif
                                </div>

                                <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">

                                    <input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">

                                    @if ($errors->has('email')) <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong> </span> @endif
                                </div>

                                <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">

                                    <input type="password" name="password" class="form-control" required="required" placeholder="{{__('Password')}}" value="">

                                    @if ($errors->has('password')) <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong> </span> @endif
                                </div>

                                <div class="formrow{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                                    <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Password Confirmation')}}" value="">

                                    @if ($errors->has('password_confirmation')) <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong> </span>
                                    @endif
                                </div>

                                <div class="formrow{{ $errors->has('is_subscribed') ? ' has-error' : '' }}">

                                    <?php

                                    $is_checked = '';

                                    if (old('is_subscribed', 1)) {

                                        $is_checked = 'checked="checked"';
                                    }

                                    ?>



                                    <input type="checkbox" value="1" name="is_subscribed" {{$is_checked}} />
                                    {{__('Subscribe to Newsletter')}}

                                    @if ($errors->has('is_subscribed')) <span class="help-block">
                                        <strong>{{ $errors->first('is_subscribed') }}</strong> </span> @endif
                                </div>




                                <div class="formrow{{ $errors->has('terms_of_use') ? ' has-error' : '' }}">

                                    <input type="checkbox" value="1" name="terms_of_use" />

                                    <a href="{{url('terms-of-use')}}">{{__('I accept Terms of Use')}}</a>



                                    @if ($errors->has('terms_of_use')) <span class="help-block">
                                        <strong>{{ $errors->first('terms_of_use') }}</strong> </span> @endif
                                </div>

                                <div class="form-group col-12 col-sm-12 col-md-10 text-center mx-auto mobile-padding-no {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                    {!! app('captcha')->display() !!}
                                    @if ($errors->has('g-recaptcha-response')) <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                                </div>

                                <input type="submit" class="btn" value="{{__('Đăng Ký')}}">

                            </form>

                        </div>


                        <!-- sign up form -->

                        <div class="newuser">{{__('Have Account')}}? <a href="{{route('login')}}">{{__('Đăng Nhập')}}</a></div>

                        <!-- sign up form end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('flash::message')







</div>

</div>

@include('templates.employers.includes.footer')

@endsection