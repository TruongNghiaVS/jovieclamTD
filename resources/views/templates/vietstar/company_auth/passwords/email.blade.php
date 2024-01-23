@extends('templates.employers.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->
<div class="reset-password-section cb-section">
    <div class="container">
        <div class="row justify-content-md-center">

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="box-img">
                    <img src="{{ asset('/') }}admin_assets/quen_mk.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12" bis_skin_checked="1">
                <div class="box-info-signup forgot-password" id="form_reset_content" bis_skin_checked="1">
                    <div class="title" bis_skin_checked="1">
                        <h2 class="text-primary">Quên Mật Khẩu</h2>
                    </div>
                    <div class="step-title d-flex align-center" bis_skin_checked="1">
                        <div class="main-step-title" bis_skin_checked="1">
                            <h3>Chúng tôi sẽ gửi email hướng dẫn bạn tạo mật khẩu mới</h3>
                        </div>
                    </div>
                    <div class="main-form" bis_skin_checked="1">
                        <form class="form-horizontal" id="resetPasswordForm_company">
                            <div class="form-group d-flex" bis_skin_checked="1">
                                <div class="form-info" bis_skin_checked="1">
                                    <span>Email</span>
                                </div>
                                <div class="form-input" bis_skin_checked="1">
                                    <input type="text" name="email" id="email" class="form-control" placeholder=" Vui lòng nhập thông tin" onkeyup="this.setAttribute('value', this.value);" value="" onfocus="javascript:if(this.value=='Email/Tên đăng nhập') this.value='';">
                                    <div class="invalid-feedback email-error">
                                        {{__('Email is required')}}
                                    </div>
                                </div>
                            </div>
                            <div class="user-action" bis_skin_checked="1">
                                <div class="btn-area" bis_skin_checked="1">
                                    <button type="button" id="resetPasswordBtn_company" class="btn btn-primary" value="Gửi">Gửi</button>
                                </div>
                                <p> <a class="register" href="/employer/register" target="_self">Quý khách chưa có tài khoản?</a> Đăng ký dễ dàng, hoàn toàn miễn phí</p>

                                <div class="text-help" bis_skin_checked="1">
                                    <p>Nếu bạn cần sự trợ giúp, vui lòng liên hệ:</p>
                                    <p>Email: <a href="mailto:support@jobvieclam.com" target="_self"> support@jobvieclam.com</a></p>
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
    .reset-password-section.cb-section {
        padding: 60px 0;
    }

    .reset-password-section.cb-section .container {
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
        margin-bottom: 35px;
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
    $('#resetPasswordBtn_company').on('click', function() {
    // Get values from the form
    var email = $('#resetPasswordForm_company #email').val();
    var verificationCode = $('#resetPasswordForm_company #verificationCode').val();

    // Validate form fields
    $('.invalid-feedback').hide();


    // Validate form fields
    if (!email) {
        $('.email-error').show(); // Show email error message

    }

    if (!verificationCode) {
        $('.code-error').show(); // Show verification code error message

    }


            $.ajax({
            type: "POST",
            url:  '{{url('/')}}/recruiter/requestResetPassword',
            beforeSend:showSpinner(),
            data: {
                email:email,
            },
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    hideSpinner();

                    console.log(responseObject.error);
        
                },
                400: function(responseObject, textStatus, jqXHR) {
                    hideSpinner();

                    // No content found (400)
                    if(responseObject.responseJSON.error){

                        responseObject.responseJSON.error.forEach((element,key) => {
                                console.log(element?.key,element?.textError);
                                $(`.${element?.key}-error`).empty();
                                $(`.${element?.key}-error`).text(element?.textError);
        
                                $(`.${element?.key}-error`).show();
                            
                        });
                    }
                   
                    // This code will be executed if the server returns a 404 response
                },
                503: function(responseObject, textStatus, errorThrown) {
                    hideSpinner();

                    // Service Unavailable (503)
                    console.log(responseObject.error);

                    // This code will be executed if the server returns a 503 response
                }           
                }
                })
                .done(function(data){
                    hideSpinner();
                    $("#form_reset_content").empty();
                        $("#form_reset_content").append(`<div class="title" bis_skin_checked="1">
                                        <h2 class="text-primary">Quên Mật Khẩu</h2>
                                    </div>`)

                        $("#form_reset_content").append(`<div class="step-title d-flex align-center" bis_skin_checked="1">
                                        <div class="main-step-title" bis_skin_checked="1">
                                            <h3>Vui lòng kiểm tra email của bạn và làm theo hướng dẫn để tạo mật khẩu mới</h3>
                                        </div>
                                    </div>`)
                        $("#form_reset_content").append(`<div class="main-form"  bis_skin_checked="1"> <p class="my-3">
                                                Nếu bạn sử dụng Gmail hoặc công ty bạn đang sử dụng dịch vụ email của Google để đăng ký tài khoản, bạn nên kiểm tra email trong các mục Inbox/Hộp thư đến (Primary, Social, Promotions) và Spam. Hoặc dùng công cụ tìm kiếm email để tìm tên email: support@Jobvieclam.
                                            </p></div>
                                            <div class="user-action" bis_skin_checked="1">

                                            <p> <a class="register" href="/employer/register" target="_self" >Quý khách chưa có tài khoản?</a> Đăng ký dễ dàng, hoàn toàn miễn phí</p>

                                            <div class="text-help" bis_skin_checked="1">
                                                <p>Nếu bạn cần sự trợ giúp, vui lòng liên hệ:</p>
                                                <p>Email: <a href="mailto:support@jobvieclam.com" target="_self">support@jobvieclam.com</a></p>
                                            </div>
                                        </div>`)
                })
                .fail(function(jqXHR, textStatus){
                    hideSpinner();
                })
                .always(function(jqXHR, textStatus) {
                
                });

    });
</script>
@endpush