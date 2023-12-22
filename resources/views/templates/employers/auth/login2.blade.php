@extends('templates.employers.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->
<div class="second-login-section cb-section">
    <div class="container">
        <div class="row justify-content-md-center">

            <div class="col-lg-6 col-md-4 col-sm-12">
                <div class="box-img">
                    <img src="https://ads.careerbuilder.vn/www/images/6804e96cfe23971714beafba912d8782.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12" bis_skin_checked="1">
                <div class="box-info-signup forgot-password" id="login" bis_skin_checked="1">
                    <div class="title" bis_skin_checked="1">
                        <h2 class="text-primary"> {{__('Login')}}</h2>
                    </div>
                    <div class="step-title d-flex align-center" bis_skin_checked="1">
                        <div class="main-step-title" bis_skin_checked="1">
                            <h3>THÔNG TIN ĐĂNG NHẬP</h3>
                        </div>
                    </div>
                    <div class="main-form" bis_skin_checked="1">
                        <form class="form-horizontal needs-validation" id="formLogin2" novalidate>
                            {{ csrf_field() }}
                            <div class="form-group d-flex" bis_skin_checked="1">
                                <div class="form-info" bis_skin_checked="1">
                                    <span>{{__(('Email'))}}</span>
                                </div>
                                <div class="form-input " bis_skin_checked="1">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
                                    <div class="invalid-feedback email-error">
                                        {{__('Email is required')}}
                                </div>
                                </div>
                            </div>

                            <div class="form-group d-flex" bis_skin_checked="1">
                                <div class="form-info" bis_skin_checked="1">
                                    <span>{{__(('Password'))}}</span>
                                </div>
                                <div class="form-input" bis_skin_checked="1">
                                <input id="password" type="password" class="form-control" name="password" value="" required placeholder="{{__('Password')}}">
                                    <div class="invalid-feedback password-error">
                                            {{__('Password is required')}}
                                    </div>
                                </div>
                            </div>
                            <div class="user-action" bis_skin_checked="1">
                                <div class="btn-area" bis_skin_checked="1">
                                    <button type="submit" id="resetPasswordBtn_company" class="btn btn-primary" value="Gửi">Gửi</button>
                                </div>
                                <p> <a class="register" href="#" data-toggle="modal" data-target="#company_logup_Modal">Quý khách chưa có tài khoản?</a> Đăng ký dễ dàng, hoàn toàn miễn phí</p>

                                <div class="text-help" bis_skin_checked="1">
                                    <p>Nếu bạn cần sự trợ giúp, vui lòng liên hệ:</p>
                                    <p>Email: <a href="#" target="_blank">support@jobvieclam.com</a></p>
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
        margin-left: 50px;
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
        flex: 0 0 150px;
        max-width: 150px;
    }

    .main-form .form-group .form-info span {
        width: 100%;
        background: var(--bs-primary);
        color: #fff;
        text-transform: uppercase;
        padding-left: 15px;
        height: 45px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        align-items: center;
        border-radius: 6px 0 0 6px;
    }

    .main-form .form-group .form-input {
        -ms-flex: 0 0 calc(100% - 150px);
        -webkit-box-flex: 0;
        flex: 0 0 calc(100% - 150px);
        max-width: calc(100% - 150px);
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
    
     $('#formLogin2').submit(function(event) {
        var isValid = true;
        event.preventDefault()
        
        // Check each input field for emptiness
        $('#formLogin2 input').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid');
              
            }
        });

        $("#formLogin2").find(":input").prop("disabled", false);


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


      

     
        if (!isValid) {
            event.preventDefault(); // Prevent the form from submitting
        }
      

        
        if (isValid) { 
            $.ajax({
            type: "POST",
            url:  `{{route('company.login')}}`,
            data: $(this).serialize(),
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    console.log(responseObject.error);
        
                },
                401: function(responseObject, textStatus, jqXHR) {
                    // No content found (404)
                    console.log(responseObject.responseJSON);
                    responseObject.responseJSON.error.forEach(err => {
                        $(`#formLogin2 .invalid-feedback.${err.key}-error`).empty();
                        $(`#formLogin2 .invalid-feedback.${err.key}-error`).text(err.textError)
                        $(`#formLogin2 .invalid-feedback.${err.key}-error`).addClass('has-error')
                        $(`#formLogin2 input[name*='${err.key}']`).addClass('has-error')
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
                    if(data.sucess == true){
                        showModal_Success('Đăng nhập', `${data.message ? data.message :"Đăng nhập thành công"}`, `${ data.urlRedirect ?  data.urlRedirect : "/company-home"}`);
                        setTimeout(function(){
                              window.location.href =  "/company-home";
                        }, 3000);
                    }
                
                })
                .fail(function(jqXHR, textStatus){
                    
                })
                .always(function(jqXHR, textStatus) {
                
                });
                }
    });

    // Remove validation class on input change
    $('#formLogin2 input').on('input', function() {
        $(this).removeClass('is-invalid');
    });
</script>
@endpush