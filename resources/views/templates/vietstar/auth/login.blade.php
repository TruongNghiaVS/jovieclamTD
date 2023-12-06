@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end -->
@include('templates.vietstar.includes.mobile_dashboard_menu')
<div class="login-form shadow">
    <div class="container">
        @include('flash::message')
        <div class="row g-0 login-swapper shadow">
            <div class="col-6">
                <div class="login-img-swapper">
                    <div class="login-img-swapper__img">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="useraccountwrap">
                    <div class="userccount">
                        <div class="userbtns">
                            <ul class="nav nav-tabs login-nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#login-tab" aria-expanded="true">{{__('Login')}}</a>
                                </li>
                                <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#logup-tab" aria-expanded="false">{{__('Register')}}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div id="login-tab" class="formpanel tab-pane active " >

                                <h3>{{__('Job Seekers')}}</h3>
                                <form class="form-horizontal needs-validation" id="form_login_tab" novalidate>
                                    {{ csrf_field() }}
                                    <input type="hidden" name="candidate_or_employer" value="candidate" />
                                    <div class="formpanel">
                                        <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
                                            <div class="invalid-feedback email-error">
                                                {{__('Email is required')}}
                                            </div>
                                        </div>
                                        <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <input id="password" type="password" class="form-control" name="password" value="" required placeholder="{{__('Password')}}">
                                            <div class="invalid-feedback password-error">
                                            {{__('Password is required')}}
                                            </div>
                                        </div>
                                        <div class="forgot-password-btn">
                                            <a href="{{ route('company.password.request') }}">{{__('Forgot Your Password')}}?</a>
                                        </div>
                                        <input type="submit" class="btn" value="{{__('Login')}}">
                                    </div>

                                 
                                </form>
                                
                                <!-- sign up form -->
                                <div class="newuser">{{__('New User')}}?
                                    <a href="{{route('register')}}">{{__('Register Here')}}</a>
                                </div>

                            </div>
                            <div id="logup-tab" class="formpanel tab-pane fade">
                                <div id="candidate" class="formpanel">

                                    <form class="form-horizontal needs-validation" id="form_logup_tab" novalidate>
                                        <h3>{{__('Job Seekers')}}</h3>
                                        {{ csrf_field() }}

                                        <input type="hidden" name="candidate_or_employer" value="candidate" />
                                        <div class="row">
                            <div class="formrow col {{ $errors->has('last_name') ? ' has-error' : '' }}">

                                <input type="text" name="last_name" class="form-control" required="required" placeholder="{{__('Last Name')}}" value="{{old('last_name')}}">
                                
                         
                              
                                <div class="invalid-feedback first_name-error">
                                    {{__('Last Name is required')}}
                                </div>
                            </div>


                            <div class="formrow col {{ $errors->has('middle_name') ? ' has-error' : '' }}">

                                <input type="text" name="middle_name" class="form-control" required="required" placeholder="{{__('Middle Name')}}" value="{{old('middle_name')}}">
                                
                                
                             
                               
                                <div class="invalid-feedback first_name-error">
                                    {{__('Middle Name is required')}}
                                </div>
                             
                            </div>
                            <div class="formrow col {{ $errors->has('first_name') ? ' has-error' : '' }}">

                                <input type="text" name="first_name" class="form-control" required="required" placeholder="{{__('First Name')}}" value="{{old('first_name')}}">
                       

                                <div class="invalid-feedback first_name-error">
                                    {{__('First Name is required')}}
                                </div>
                              
                            </div>
                        </div>


                                        <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">

                                            <input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">

                                            <div class="invalid-feedback email-error">
                                                {{__('Email is required')}}
                                            </div>
                                        </div>

                                        <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">

                                            <input type="password" name="password" class="form-control" required="required" placeholder="{{__('Password')}}" value="">
                                                <div class="invalid-feedback password-error">
                                                    {{__('Password is required')}}
                                                </div>
                                        </div>

                                        <div class="formrow{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                                            <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Password Confirmation')}}" value="">

                                                <span class="help-block password_confirmation">
                                                </span> 
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

                                            <span class="help-block is_subscribed">
                                            </span> 
                                        </div>





                                        <div class="formrow{{ $errors->has('terms_of_use') ? ' has-error' : '' }}">

                                            <input type="checkbox" value="1" name="terms_of_use" />

                                            <a href="{{url('cms/terms-of-use')}}">{{__('I accept Terms of Use')}}</a>



                                            <span class="help-block terms_of_use">
                                            </span> 
                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-10 text-center mx-auto mobile-padding-no {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                            {!! app('captcha')->display() !!}
                                            @if ($errors->has('g-recaptcha-response')) <span class="help-block">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                                        </div>

                                        <input type="submit" class="btn" value="{{__('Đăng ký')}}">

                                    </form>

                                </div>
                            </div>
                            <!-- login form -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@include('templates.vietstar.includes.footer')
@endsection

@push('styles')
<style>
    .invalid-feedback {
        display: none;
    }
    .invalid-feedback.has-error {
        display: block;
        margin: 10px;
        color: red;
    }
    .form-control.has-error{
        border: 1px solid #dc3545 !important;
    }

</style>
@endpush


@push('scripts') 

<script>

    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
        })
    })()
    $(document).ready(function() {
    $('#form_login_tab').submit(function(event) {
        var isValid = true;
        event.preventDefault()
        
        // Check each input field for emptiness
        $('#form_login_tab input').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid');
              
            }
        });

        $("#form_login_tab").find(":input").prop("disabled", false);


        var email = $('#email').val();

        // Simple email validation using a regular expression
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (emailRegex.test(email)) {
            // Email is valid
            $('#email').removeClass('is-invalid');
            $('#email').addClass('is-valid');

           
        } else {
            // Email is invalid
           
            $('#email').removeClass('is-valid');
            $('#email').addClass('is-invalid');
            $('.email-error').text('{{__('The email must be a valid email address')}}')
        }


        isValid = this.checkValidity();


        if (!isValid) {
            event.preventDefault(); // Prevent the form from submitting
        }
        if (isValid) { 
            $.ajax({
            type: "POST",
            url:  '{{ route('login') }}',
            data: $(this).serialize(),
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    console.log(responseObject.error);
        
                },
                401: function(responseObject, textStatus, jqXHR) {
                    // No content found (404)
                    console.log(responseObject.responseJSON);
                    responseObject.responseJSON.error.forEach(err => {
                        $(`#form_login_tab .invalid-feedback.${err.key}-error`).empty();
                        $(`#form_login_tab .invalid-feedback.${err.key}-error`).text(err.textError)
                        $(`#form_login_tab .invalid-feedback.${err.key}-error`).addClass('has-error')
                        $(`#form_login_tab input[name*='${err.key}']`).addClass('has-error')
                    })
                    // This code will be executed if the server returns a 404 response
                },
                503: function(responseObject, textStatus, errorThrown) {
                    // Service Unavailable (503)
                    console.log(responseObject.error);

                    // This code will be executed if the server returns a 503 response
                }           
                }
                })
                .done(function(data){
                    // setTimeout(function() { 
                    //     alert(data.message)
                    // }, 2000);
                        
                    window.location.href = data.urlRedirect;
                    

                    
                })
                .fail(function(jqXHR, textStatus){
                    
                })
                .always(function(jqXHR, textStatus) {
                
                });
                }
    });

    // Remove validation class on input change
    $('#form_login_tab input').on('input', function() {
        $(this).removeClass('is-invalid');
    });


    $('#form_logup_tab').submit(function(event) {
        var isValid = true;
        event.preventDefault()
        // Check each input field for emptiness
        $('#form_logup_tab input').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid');
              
            }
        });
        $("#form_logup_tab").find(":input").prop("disabled", false);
        if (!isValid) {
            event.preventDefault(); // Prevent the form from submitting
        }


        var email = $('#email').val();

        // Simple email validation using a regular expression
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (emailRegex.test(email)) {
            // Email is valid
            $('#email').removeClass('is-invalid');
            $('#email').addClass('is-valid');

        
        } else {
            // Email is invalid
        
            $('#email').removeClass('is-valid');
            $('#email').addClass('is-invalid');
            $('.email-error').text('{{__('The email must be a valid email address')}}')
        }

        if (isValid) { 
            $.ajax({
            type: "POST",
            url:  `{{ route('register') }}`,
            data: $(this).serialize(),
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    console.log(responseObject.error);
                if(responseObject.error) {
                    responseObject.error.forEach(err => {
                        $(`#form_logup_tab .invalid-feedback.${err.key}-error`).text(err.textError)
                        $(`#form_logup_tab .invalid-feedback.${err.key}-error`).addClass('has-error')
                        $(`#form_logup_tab input[name*='${err.key}']`).addClass('has-error')
                        
                        // $(`#form_logup_tab .invalid-feedback.${err.key}-error`).append(err.textError)
                     
                    }) 
                }
                },
                404: function(responseObject, textStatus, jqXHR) {
                    // No content found (404)
                    // This code will be executed if the server returns a 404 response
                },
                503: function(responseObject, textStatus, errorThrown) {
                    // Service Unavailable (503)
                    // This code will be executed if the server returns a 503 response
                }           
                }
                })
                .done(function(data){
                    console.log(data);
                    
                })
                .fail(function(jqXHR, textStatus){
                    
                })
                .always(function(jqXHR, textStatus) {
                
                });
                }
    });

    // Remove validation class on input change
    $('#form_logup_tab input').on('input', function() {
        $(this).removeClass('is-invalid');
    });

});

</script>
@endpush