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
   $( document ).ready(function() {
        setTimeout(() => {
            window.location.href = "/";
        }, 3500);
    });
</script>
@endpush