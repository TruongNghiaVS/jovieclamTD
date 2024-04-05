@extends('templates.employers.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->

<!-- Dashboard menu start -->
@include('templates.employers.includes.mobile_dashboard_menu')
<!-- Dashboard menu end -->

<div class="second-login-section cb-section">
    <div class="container">
        <div class="row justify-content-md-center">

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="box-img">
                    <img src="{{ asset('/') }}admin_assets/login.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-7 col-sm-12" bis_skin_checked="1">
                <div class="box-info-signup forgot-password" id="logup" bis_skin_checked="1">
                    <div class="title" bis_skin_checked="1">
                        <h2 class="text-primary text-center"> {{__('Register')}}</h2>
                    </div>
                    <div class="step-title d-flex align-center" bis_skin_checked="1">
                        <div class="main-step-title" bis_skin_checked="1">
                            <h3>THÔNG TIN TÀI KHOẢN</h3>
                        </div>
                    </div>
                    <div class="main-form" bis_skin_checked="1">
                        <form class="form-horizontal needs-validation" id="formLogup2" novalidate>
                            {{ csrf_field() }}
                            <input type="hidden" name="candidate_or_employer" value="employer">
                            <div class="form-group d-flex" bis_skin_checked="1">
                                <div class="form-info" bis_skin_checked="1">
                                    <span>{{__('Company')}}</span>
                                </div>
                                <div class="form-input " bis_skin_checked="1">
                                    <input type="text" name="name" class="form-control border-t-l-ra-0 border-b-l-ra-0" required="required" placeholder="{{__('Company Name')}}" value="{{old('name')}}">
                                    <div class="invalid-feedback name-error">
                                        {{__('Name is required')}}
                                    </div>
                                </div>
                            </div>





                            <div class="form-group d-flex" bis_skin_checked="1">
                                <div class="form-info" bis_skin_checked="1">
                                    <span>{{__(('Email'))}}</span>
                                </div>
                                <div class="form-input " bis_skin_checked="1">
                                    <input id="email" type="email" class="form-control border-t-l-ra-0 border-b-l-ra-0" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
                                    <div class="invalid-feedback email-error">
                                        {{__('Email is required')}}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex" bis_skin_checked="1">
                                <div class="form-info" bis_skin_checked="1">
                                    <span>{{__(('Password'))}}</span>
                                </div>
                                <div class="form-input position-relative" bis_skin_checked="1">
                                    <input id="company_passId2" type="password" class="form-control form-control border-t-l-ra-0 border-b-l-ra-0" name="password" value="" required placeholder="{{__('Password')}}">

                                    <button class="btn btn-showpassword" type="button" onclick="showPassword('#formLogup2 #company_passId2');">
                                                        <i id="eyeIcon" class="fa fa-eye"></i>
                                    </button>

                                    <div class="invalid-feedback password-error">
                                        {{__('Password is required')}}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group d-flex" bis_skin_checked="1">
                                <div class="form-info" bis_skin_checked="1">
                                    <span>{{__('Password Confirmation')}}</span>
                                </div>
                                <div class="form-input position-relative" bis_skin_checked="1">
                                    <input  id="company_comfirmId2" type="password" name="password_confirmation" class="form-control form-control border-t-l-ra-0 border-b-l-ra-0" required="required" placeholder="{{__('Password Confirmation')}}" value="">

                                    <button class="btn btn-showpassword" type="button" onclick="showPassword('#formLogup2 #company_comfirmId2');">
                                        <i id="eyeIcon" class="fa fa-eye"></i>
                                    </button>


                                    <div class="invalid-feedback password-error">
                                        {{__('Password Incorrect')}}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group d-flex" bis_skin_checked="1">
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

                            <input type="checkbox" value="1" name="terms_of_use" />

                            <a href="/dieu-khoan-su-dung-nha-tuyen-dung">{{__('I accept Terms of Use')}}</a>
                            <span class="help-block terms_of_use">



                            {!! app('captcha')->display() !!}
                            @if ($errors->has('g-recaptcha-response')) <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif

                            <div class="user-action " bis_skin_checked="1">
                                <div class="btn-area d-grid" bis_skin_checked="1">
                                    <button type="submit" id="" class="btn btn-primary" value="Gửi">Đăng ký</button>
                                </div>
                                <p> <a class="register" href="/employer/register" target="_self" >Quý khách chưa có tài khoản?</a> Đăng ký dễ dàng, hoàn toàn miễn phí</p>

                                <div class="text-help" bis_skin_checked="1">
                                    <p>Nếu bạn cần sự trợ giúp, vui lòng liên hệ:</p>
                                    <p>Email: <a href="mailto:support@jobvieclam.com" target="_self">support@jobvieclam.com</a></p>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('templates.employers.includes.footer')
@endsection
@push('styles')
<style>
    .second-login-section.cb-section {
        padding: 60px 0;
    }

    .second-login-section.cb-section .container {
        max-width: 1440px;
    }

    .box-img {
        margin-right: -50px;
        width: 100%;
    }

    .box-img img {
        width: 100%;
    }

    .box-info-signup {
 
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .box-info-signup .title h2 {
        margin-bottom: 20px;
    }

    .box-info-signup .main-step-title h3 {

        font-weight: normal;
        font-size: 17px;
        color: #333;
    }

    .main-form .form-group .form-info {
        -webkit-box-flex: 0;
        flex: 0 0 100px;
        max-width: 100px;
    }

    .main-form .form-group .form-info span {
        width: 100%;
        background: var(--bs-primary);
        color: #fff;
        text-transform: uppercase;
        padding-left: 15px;
        height: 46px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        align-items: center;
        border-radius: 6px 0 0 6px;
    }

    .main-form .form-group .form-input {
        -ms-flex: 0 0 calc(100% - 100px);
        -webkit-box-flex: 0;
        flex: 0 0 calc(100% - 100px);
        max-width: calc(100% - 100px);
    }

    .main-form .form-group .form-input.short {
        -ms-flex: 0 0 200px;
        -webkit-box-flex: 0;
        flex: 0 0 200px;
        max-width: 200px;
    }

    .user-action {}

    .user-action>* {
        margin-bottom: 20px;
    }

    .btn-area {
        text-align: right;
    }
</style>
@endpush

@push('scripts')
<script type="text/javascript">
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
    
    $('#formLogup2').submit(function(event) {
        var passwordValue = $('#company_passId2').val();
        var confirmPasswordValue = $('#company_comfirmId2').val();

        var isValid = true;
        event.preventDefault()
        // Check each input field for emptiness
        $('#formLogup2 input').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid');
              
            }
        });
        $("#formLogup2").find(":input").prop("disabled", false);
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

        console.log(passwordValue,confirmPasswordValue);
        if (passwordValue !== confirmPasswordValue) {
            event.preventDefault(); // Prevent form submission

            isValid=false
            // Display error message
            $('#company_comfirmId2').addClass('is-invalid has-error');
            $('#company_comfirmId2').next('.invalid-feedback').show();
        }

        $('#password_confirmation').on('input', function() {
        var passwordValue = $('#company_passId2').val();
        var confirmPasswordValue = $(this).val();
        if (passwordValue == confirmPasswordValue) {
            isValid=true
            $(this).removeClass('is-invalid has-error');
            $(this).next('.invalid-feedback').hide();
        }
        });

        if (isValid) { 
            $.ajax({
            type: "POST",
            url:  `{{ route('company.register') }}`,
            data: $(this).serialize(),
            beforeSend:showSpinner(),
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    hideSpinner();

                    console.log(responseObject.error);
                if(responseObject.error) {
                    responseObject.error.forEach(err => {
                        $(`#formLogup2 .invalid-feedback.${err.key}-error`).text(err.textError)
                        $(`#formLogup2 .invalid-feedback.${err.key}-error`).addClass('has-error')
                        $(`#formLogup2 input[name*='${err.key}']`).addClass('has-error')
                        
                        // $(`#formLogup2 .invalid-feedback.${err.key}-error`).append(err.textError)
                     
                    }) 
                }
                },
                404: function(responseObject, textStatus, jqXHR) {
                    hideSpinner();

                    // No content found (404)
                    // This code will be executed if the server returns a 404 response
                },
                503: function(responseObject, textStatus, errorThrown) {
                    hideSpinner();

                    // Service Unavailable (503)
                    // This code will be executed if the server returns a 503 response
                }           
                }
                })
                .done(function(data){
                    hideSpinner();
                    if (data.sucess == true ) {
                       
                        setTimeout(function(){
                              window.location.href =  "/recruiter/xac-nhan-email-dang-ky";
                        }, 1000);
                    }
                          
                     
                })
                .fail(function(jqXHR, textStatus){
                    hideSpinner();
                })
                .always(function(jqXHR, textStatus) {
                
                });
                }
    });

    // Remove validation class on input change
    $('#formLogup2 input').on('input', function() {
        $(this).removeClass('is-invalid');
        $(this).removeClass('has-error');
    });

});
    
</script>
@endpush