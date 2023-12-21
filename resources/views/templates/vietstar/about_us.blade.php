@extends('templates.employers.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->
<!-- Inner Page Title start -->
<section class="hero-banner-company-profile" style="background-image: url(http://localhost:8000/vietstar/imgs/company-cover.jpg);"></section>


<section class="cb-section about-us-section ">
    <h4 class="text-center mb-4 text-uppercase text-primary">
            Về chúng tôi
        </h4>
    <div class="container">
        <div class="row about_us_content justify-content-md-center " bis_skin_checked="1">
            <div class="col-lg-6 col-md-12 col-sm-12  about_us_img animation fade-left ">
                <img src="https://vietstargroup.vn/assets/img/hoatdong.jpeg" class="img_left_about">
            </div>
            <div class="col-lg-6  col-md-12  col-sm-12  d-flex align-items-center animation fade-right">
                <div class="content_title" bis_skin_checked="1">
                    <div class="title" bis_skin_checked="1">
                        <h2>
                            Cung Cấp Giải Pháp Tuyển Dụng Khắp Toàn Cầu</h2>
                    </div>
                    <div class="text" bis_skin_checked="1">
                        <p>
                            JobViecLam.com, sở hữu bởi JobViecLam Mỹ - Mạng Việc làm &amp; Tuyển dụng lớn nhất thế giới. Với công nghệ tiên tiến, mạng lưới đối tác toàn cầu và dịch vụ khách hàng chuyên nghiệp, chúng tôi kết nối nhân tài với công việc mơ ước và giúp doanh nghiệp xây dựng đội ngũ nhân sự tài năng.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our_customer cb-section">
    <div class="container" bis_skin_checked="1">
        <h4 class="text-center mb-4 text-uppercase text-primary">
            Khách hàng của chúng tôi
        </h4>
        <div class="container-company" bis_skin_checked="1">
            <div class="group-company aos-init aos-animate" bis_skin_checked="1">
                <div class="trust-by animation fade-left active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/1.svg" alt="">
                </div>
                <div class="trust-by animation fade-left active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/2.svg" alt="">
                </div>
                <div class="trust-by animation fade-left active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/9.svg" alt="">
                </div>
                <div class="trust-by animation fade-left active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/3.svg" alt="">
                </div>
                <div class="trust-by animation fade-left active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/4.svg" alt="">
                </div>
                <div class="trust-by animation fade-right active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/10.svg" alt=""></div>
                <div class="trust-by animation fade-right active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/7.svg" alt=""></div>
                <div class="trust-by animation fade-right active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/6.svg" alt=""></div>
                <div class="trust-by animation fade-right active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/bosch_global.jpg" alt=""></div>
                <div class="trust-by animation fade-right active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/8.svg" alt="">
                </div>
            </div>
           
        </div>
    </div>
</section>


@push('styles')
<style>
    .cb-section.about-us-section {
        padding: 60px 0;
    }

    .about-us-section .about_us_content {
        padding: 40px;
    }
    .about-us-section .about_us_img  {
        display: flex;
        justify-content: end;
    }
    .about-us-section .about_us_img img {
        width: 80%;
        border-radius: 20px;
    }

    .about_us_content .content_title{
        padding-left: 30px;
    }

    .about_us_content .content_title .title{
        margin-bottom: 25px;
    }
    .about_us_content .content_title .title h2 {
        font-size: 25px;
    }

    .content_title .text {
        max-height: 300px;
    padding-right: 10px;
    overflow-y: auto;
    color: #5d677a;
    font-size: 16px;
    font-weight: 500;
    line-height: 1.4;
    text-align: justify;
    }


</style>
@endpush


@include('templates.employers.includes.footer')
@endsection