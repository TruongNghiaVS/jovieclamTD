@extends('templates.employers.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.employers.includes.header')



<!-- Dashboard menu start -->
@include('templates.employers.includes.mobile_dashboard_menu')
<!-- Dashboard menu end -->
<!-- Header end -->
<div class="reset-password-section cb-section">
    <div class="container">
        <div class="row justify-content-md-center">

            <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="box-img">
                    <img src="{{ asset('/') }}admin_assets/comfirm.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12" bis_skin_checked="1">
                    <div class="box-info-signup forgot-password" id="form_reset_content" bis_skin_checked="1">
                                    <div class="title" bis_skin_checked="1">
                                        <h2 class="text-primary text-center">Xác Nhận Email</h2>
                                    </div>
                                    <div class="main-form" bis_skin_checked="1"> 
                                        <p class="mb-3">
                                               Thông tin tài khoản tuyển dụng đã được tạo. Vui lòng kiểm tra Email và làm theo hướng dẫn. Email xác nhận này sẽ chứa thông tin chi tiết về quy trình kích hoạt tài khoản của bạn.
                                        </p>

                                        <p class="mb-3">
                                               Vào thư mục thư rác (spam) nếu bạn không nhận được email trong vòng vài phút.
                                        </p>

                                        <p class="mb-3">
                                              Nếu không nhận được email hoặc có bất kỳ thắc mắc nào, đừng ngận ngại liên hệ với chúng tôi qua email <a href="mailto:support@jobvieclam.com">Support@jobvieclam.com</a> hoặc số điện thoại <a href="tel:(848) 3822 6060">(848) 3822 6060</a> để được hỗ trợ.
                                        </p>

                                        <p class="mb-3">
                                              Cảm ơn và chúc bạn một ngày tốt lành!
                                        </p>
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
    
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .box-info-signup .title h2 {
        margin-bottom: 20px;
        font-size:25px
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
    .main-form p {
        font-size: 17px;
        line-height: 25px;
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
                                                Nếu bạn sử dụng Gmail hoặc công ty bạn đang sử dụng dịch vụ email của Google để đăng ký tài khoản, bạn nên kiểm tra email trong các mục Inbox/Hộp thư đến (Primary, Social, Promotions) và Spam. Hoặc dùng công cụ Tìm Kiếm email để tìm tên email: support@Jobvieclam.
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