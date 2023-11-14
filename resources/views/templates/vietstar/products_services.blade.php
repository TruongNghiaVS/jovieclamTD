@extends('templates.vietstar.layouts.app')
@section('content') 
<!-- Header start --> 
@include('templates.vietstar.includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('Products and Services')])
@include('flash::message')
<!-- Inner Page Title end -->

<section class="all-product-banner">
    <div class="main-slide">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="banner-pc">
                        <div class="image">
                            <img class="swiper-lazy " alt=" "
                                src="{{ asset('/vietstar/imgs/CB landingpage_employer%20banner.png') }}">

                        </div>
                    </div>
                    <div class="banner-mb">
                        <div class="image">
                            <img class="swiper-lazy " alt=" "
                                src="https://images.careerbuilder.vn/content/images/Banner/CB%20landingpage_employer%20banner%20copy.jpg">

                        </div>
                    </div>

                </div>
                <div class="swiper-slide">
                    <div class="banner-pc">
                        <div class="image">
                            <img class="swiper-lazy " alt=" "
                                src="https://images.careerbuilder.vn/content/images/Banner/CB%20landingpage_employer%20banner%20copy.jpg">

                        </div>
                    </div>
                    <div class="banner-mb">
                        <div class="image">
                            <img class="swiper-lazy " alt=" "
                                src="https://images.careerbuilder.vn/content/images/Banner/CB%20landingpage_employer%20banner%20copy.jpg">

                        </div>
                    </div>


                </div>
            </div>
        </div>
        </div>
</section>


<section class="all-product-service cb-section">
    <div class="container">
        <h2 class="cb-title cb-title-center">Chúng tôi mang đến trải nghiệm toàn diện trong lĩnh vực cung ứng nhân sự, cung ứng việc làm</h2>
        <div class="sub-title">
            <p>Hiện tại, chúng tôi là đơn vị cung cấp việc làm và cung ứng nhân sự uy tín với các đối tác là các doanh nghiệp, các tập đoàn lớn và toàn thể người lao động đang có nhu cầu tìm việc tại Việt Nam</p>
        </div>
        <div class="list-service">
            

            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <div class="row">
                        <div class="col-md-6 co-item-service">
                            <div class="item">
                                <div class="image">
                                    <a href="#">
                                        <img class="lazy-new" alt="Đăng Tuyển Dụng"
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/i1.png"
                                            style="">
                                    </a>
                                </div>
                                <div class="caption">
                                    <h3 class="title"><a
                                            href="#">Đăng Tin Tuyển Dụng</a></h3>
                                    <div class="content">
                                        <p style="font-weight: bold">Hiển thị việc làm - Tiếp cận nhân tài</p>
                                        <p>Thông tin về vị trí tuyển dụng của bạn sẽ được hiển thị trên trang web Jobvieclam và fanpage Jobvieclam- Tuyển Dụng & Việc Làm trong 30 ngày.</p>
                                    </div>
                                    <a class="view-more" href="#">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 co-item-service">
                            <div class="item">
                                <div class="image"><a
                                        href="#"><img
                                            class="lazy-new" alt="Tìm Hồ Sơ Ứng Viên"
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/i2.png"
                                            style=""></a></div>
                                <div class="caption">
                                    <h3 class="title"><a  href="#">Tìm Hồ Sơ Ứng Viên</a></h3>
                                    <div class="content">
                                        <p style="font-weight: bold">Sàng lọc hồ sơ - Chọn đúng nhu cầu</p>

                                        <p>Cơ hội truy cập và tiếp cận hàng trăm ngàn hồ sơ được cập nhật mới thường xuyên giúp nhà tuyển dụng dễ dàng tìm kiếm ứng viên phù hợp.</p>
                                    </div>
                                    <a class="view-more"  href="#">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 co-item-service">
                            <div class="item">
                                <div class="image"><a
                                        href="#"><img
                                            class="lazy-new" alt="Talent Solution"
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/i3.png"
                                            style=""></a>
                                </div>
                                <div class="caption">
                                    <h3 class="title"><a
                                            href="#">HEADHUNT  SĂN NHÂN SỰ</a></h3>
                                    <div class="content">
                                        <p><strong>Giải pháp toàn diện - Tiết kiệm thời gian</strong></p>

                                        <p>Dịch vụ Headhunt toàn diện sẽ giúp các doanh nghiệp tiết kiệm tối đa thời gian tìm kiếm nhân sự, sàng lọc ứng viên với thời hạn bảo hành dài lâu.</p>
                                    </div>
                                    <a class="view-more"
                                        href="#">Xem
                                        thêm<em class="mdi mdi-chevron-right"></em></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 co-item-service">
                            <div class="item">
                                <div class="image"><a
                                        href="#"><img
                                            class="lazy-new" alt="Quảng Cáo Tuyển Dụng"
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/i4.png"
                                            style=""></a></div>
                                <div class="caption">
                                    <h3 class="title"><a
                                            href="#">Quảng Cáo Tuyển Dụng</a></h3>
                                    <div class="content">
                                        <p style="font-weight: bold">Đa nền tảng - Tăng tiếp cận</p>

                                        <p>Bạn có thể lựa chọn quảng cáo tin tuyển dụng của mình trên nền tảng Facebook Ads, Google Ads hoặc Tiktok Ads.</p>
                                    </div>
                                    <a class="view-more"
                                        href="#">Xem
                                        thêm</a>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-6 co-item-service">
                            <div class="item">
                                <div class="image"><a
                                        href="#"><img
                                            class="lazy-new" alt="Talent Referral"
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/i7.png"
                                            style=""></a>
                                </div>
                                <div class="caption">
                                    <h3 class="title"><a
                                            href="#">Giới thiệu ứng viên</a></h3>
                                    <div class="content">
                                        <p><strong>Mở rộng nguồn - đa dạng ứng viên</strong></p>

                                        <p>Jobvieclam là nền tảng cho phép các ứng viên khác giới thiệu việc làm cho bạn bè người quen và ngược lại, giới thiệu CV cho nhà tuyển dụng.</p>
                                    </div>
                                    <a class="view-more" href="#">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 co-item-service">
                            <div class="item">
                                <div class="image"><a
                                        href="#"><img
                                            class="lazy-new" alt="Targeted Email Marketing"
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/i6.png"
                                            style=""></a></div>
                                <div class="caption">
                                    <h3 class="title"><a
                                            href="#">
                                            Email Marketing</a></h3>
                                    <div class="content">
                                        <p><strong>Gợi ý việc làm phù hợp - Tăng tiếp cận tiềm năng.</strong></p>

                                        <p>Giải pháp nâng cao hiệu quả tiếp cận những ứng viên phù hợp bằng Email Marketing, gợi ý cho các ứng viên công viêc tương tự với vị trí họ quan tâm.</p>
                                    </div>
                                    <a class="view-more"
                                        href="#">Xem
                                        thêm</a>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <form class="form-product-service-contact">
                        <h3 class="title">Liên hệ</h3>
                        <div class="form-group">
                            <label for="">Họ tên</label>
                            <input type="text" class="form-control" placeholder="Họ tên">
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="tel" class="form-control" placeholder="Số điện thoại">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea name="" id=""  rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Gửi thông tin</button>
                        </div>
                         <div class="socials">
                            <a href="#" class="social"><i class="fab fa-facebook-f fa-lg"></i></a>
                            <a href="#" class="social"><i class="fab fa-twitter fa-lg"></i></a>
                            <a href="#" class="social"><i class="fab fa-instagram fa-lg"></i></a>
                            <a href="#" class="social"><i class="fab fa-linkedin-in fa-lg"></i></a>
                            <a href="#" class="social"><i class="fab fa-youtube fa-lg"></i></a>
                            
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<section class="all-product-benefit cb-section">
    <div class="container">
        <h2 class="cb-title cb-title-center">Lợi ích khi tuyển dụng trên JobVieclam</h2>
        <div class="row list-benefit">
            <div class="col-sm-6 col-lg-3">
                <div class="benefit-item">
                    <div class="icon"><img
                            src="https://static.careerbuilder.vn/themes/employer/img/employer/i10.png" alt=""></div>
                    <div class="content">
                        <p>Nguồn ứng viên da dạng, các doanh nghiệp đối tác uy tín.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="benefit-item">
                    <div class="icon"><img
                            src="https://static.careerbuilder.vn/themes/employer/img/employer/i11.png" alt=""></div>
                    <div class="content">
                        <p>Hệ thống thông minh tự động đề xuất việc làm phù hợp.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="benefit-item">
                    <div class="icon"><img
                            src="https://static.careerbuilder.vn/themes/employer/img/employer/i12.png" alt=""></div>
                    <div class="content">
                        <p>Quản lý giao diện tiện lợi, tối ưu, dễ dàng và nhanh chóng</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="benefit-item">
                    <div class="icon"><img
                            src="https://static.careerbuilder.vn/themes/employer/img/employer/i13.png" alt=""></div>
                    <div class="content">
                        <p>Quảng cáo đa kênh giúp tiếp cận ứng viên tốt hơn</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="employer-customer cb-section">
    <div class="container">
        <h2 class="cb-title cb-title-center">Khách hàng của chúng tôi:</h2>
        <div class="sub-title">
            <p>CareerBuilder tự hào đã cung cấp dịch vụ cho hơn <strong>17.000 + </strong>doanh nghiệp hàng đầu tại
                Việt Nam</p>
        </div>
        <div class="main-slide">
            <div class="swiper-container swiper-container-multirow">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/1.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/2.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/3.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/4.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/5.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/6.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/7.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/8.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/9.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/10.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/11.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/12.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/13.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/14.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/15.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/16.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/17.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/18.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/19.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/20.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/21.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/22.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/23.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/24.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/25.png"
                            alt="careerbuilder.vn">
                    </div>
                    <div class="swiper-slide"><img src="https://images.careerbuilder.vn/content/images/logo/26.png"
                            alt="careerbuilder.vn">
                    </div>
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
            <!-- <div class="main-button"> -->
            <!-- <div class="button-prev swiper-button-disabled" tabindex="0" role="button" -->
            <!-- aria-label="Previous slide" aria-disabled="true"><em class="mdi mdi-chevron-left"> </em></div> -->
            <!-- <div class="button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"> -->
            <!-- <em class="mdi mdi-chevron-right"></em> -->
            <!-- </div> -->
            <!-- </div> -->
        </div>
        <div class="view-more"><a class="btn-gradient" href="#">Xem thêm</a>
        </div>
    </div>
</section> <!-- Danh Gia Khach Hang -->
<section class="all-product-customer-reviews cb-section"
    style="background-image: url('https://static.careerbuilder.vn/themes/employer/img/employer/bg-1.png')">
    <div class="container">
        <div class="cb-title cb-title-center">
            <h2>Đánh giá của khách hàng</h2>
        </div>
        <div class="main-slide">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="customer-reviews-item">
                            <div class="head">
                                <div class="avata"><img
                                        src="https://static.careerbuilder.vn/themes/employer/img/employer/19.png"
                                        alt=""></div>
                                <div class="content">
                                    <p class="name">Chị Nguyễn Ngọc Diệp </p>
                                    <p class="position">Giám đốc Nhân sự </p>
                                    <p class="company">Công ty TNHH SX TM DV Lê Mây</p>
                                </div>
                            </div>
                            <div class="body">
                                <ul class="list-star">
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star-half"></em></li>
                                </ul>
                                <div class="content">
                                    <p>Mặc dù có thể lúc đầu khi áp dụng công nghệ của Talent Solution vào trong các
                                        hoạt động hàng ngày của công tác tuyển dụng có hơi chưa quen nhưng sau một
                                        thời gian, chúng tôi đã thấy được sự thay đổi tích cực và hiệu quả của giải
                                        pháp này mang lại. Nếu xét về tính hiệu quả đầu tư, các chỉ số như
                                        Cost/Application <a class="view-popup" href="#"
                                            data-src="#popup-review-12"><em class="mdi mdi-plus-box"></em></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="popup-customer-reviews" style="display: none" id="popup-review-12">
                            <div class="main-popup">
                                <div class="left-review">
                                    <div class="avata"><img
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/19.png"
                                            alt=""></div>
                                    <ul class="list-star">
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star-half"></em></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="head">
                                        <p class="name">Chị Nguyễn Ngọc Diệp </p>
                                        <p class="position">Giám đốc Nhân sự </p>
                                        <p class="company">Công ty TNHH SX TM DV Lê Mây</p>
                                    </div>
                                    <div class="body">
                                        <p>Mặc dù có thể lúc đầu khi áp dụng công nghệ của Talent Solution vào trong
                                            các hoạt động hàng ngày của công tác tuyển dụng có hơi chưa quen nhưng
                                            sau một thời gian, chúng tôi đã thấy được sự thay đổi tích cực và hiệu
                                            quả của giải pháp này mang lại. Nếu xét về tính hiệu quả đầu tư, các chỉ
                                            số như Cost/Application (Chi phí cho một hồ sơ ứng tuyển), Cost/Hire
                                            (Chi phí cho một nhân sự tuyển dụng thành công) đang dần trở nên hiệu
                                            quả hơn. </p>
                                        <p>Mặc dù có thể lúc đầu khi áp dụng công nghệ của Talent Solution vào trong
                                            các hoạt động hàng ngày của công tác tuyển dụng có hơi chưa quen nhưng
                                            sau một thời gian, chúng tôi đã thấy được sự thay đổi tích cực và hiệu
                                            quả của giải pháp này mang lại. Nếu xét về tính hiệu quả đầu tư, các chỉ
                                            số như Cost/Application (Chi phí cho một hồ sơ ứng tuyển), Cost/Hire
                                            (Chi phí cho một nhân sự tuyển dụng thành công) đang dần trở nên hiệu
                                            quả hơn.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="customer-reviews-item">
                            <div class="head">
                                <div class="avata"><img
                                        src="https://static.careerbuilder.vn/themes/employer/img/employer/40.png"
                                        alt=""></div>
                                <div class="content">
                                    <p class="name">Anh Phạm Văn Chính</p>
                                    <p class="position">Giám đốc Nhân sự </p>
                                    <p class="company">United International Pharma</p>
                                </div>
                            </div>
                            <div class="body">
                                <ul class="list-star">
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star-half"></em></li>
                                </ul>
                                <div class="content">
                                    <p>Tối ưu nguồn lực là điều đầu tiên phải kể đến khi đánh giá hiệu quả Talent
                                        Solution. Giải pháp này của CareerBuilder Vietnam thực sự đã giúp bộ phận
                                        tuyển dụng chúng tôi mang về cho công ty những nhân viên/ quản lý ưu tú
                                        trong thời gian ngắn và với chi phí hiệu quả nhất. Thị trường lao động có
                                        rất nhiều <a class="view-popup" href="#"
                                            data-src="#popup-review-22"><em class="mdi mdi-plus-box"></em></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="popup-customer-reviews" style="display: none" id="popup-review-22">
                            <div class="main-popup">
                                <div class="left-review">
                                    <div class="avata"><img
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/40.png"
                                            alt=""></div>
                                    <ul class="list-star">
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star-half"></em></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="head">
                                        <p class="name">Anh Phạm Văn Chính</p>
                                    </div>
                                    <p class="position">Giám đốc Nhân sự </p>
                                    <p class="company">United International Pharma</p>
                                    <div class="body">
                                        <p>Tối ưu nguồn lực là điều đầu tiên phải kể đến khi đánh giá hiệu quả
                                            Talent Solution. Giải pháp này của CareerBuilder Vietnam thực sự đã giúp
                                            bộ phận tuyển dụng chúng tôi mang về cho công ty những nhân viên/ quản
                                            lý ưu tú trong thời gian ngắn và với chi phí hiệu quả nhất. Thị trường
                                            lao động có rất nhiều </p>
                                        <p>Tối ưu nguồn lực là điều đầu tiên phải kể đến khi đánh giá hiệu quả
                                            Talent Solution. Giải pháp này của CareerBuilder Vietnam thực sự đã giúp
                                            bộ phận tuyển dụng chúng tôi mang về cho công ty những nhân viên/ quản
                                            lý ưu tú trong thời gian ngắn và với chi phí hiệu quả nhất. Thị trường
                                            lao động có rất nhiều</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="customer-reviews-item">
                            <div class="head">
                                <div class="avata"><img
                                        src="https://static.careerbuilder.vn/themes/employer/img/employer/41.png"
                                        alt=""></div>
                                <div class="content">
                                    <p class="name">Chị Đỗ Thị Kim Cúc </p>
                                    <p class="position">Giám đốc Hành Chính Nhân Sư </p>
                                    <p class="company">GreenFeed VN</p>
                                </div>
                            </div>
                            <div class="body">
                                <ul class="list-star">
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star-half"></em></li>
                                </ul>
                                <div class="content">
                                    <p>GreenFeed VN là công ty hàng đầu trong lĩnh vực sản xuất thức ăn gia súc, gia
                                        cầm và thủy sản, với nhiều chi nhánh trong và ngoài nước. Với sự phát triển
                                        ngày càng lớn mạnh của công ty, hàng năm chúng tôi cần tuyển dụng nhân tài
                                        cho các vị trí. Và giải pháp Talent Solution của CareerBuilder đã tạo lợi
                                        thế cho <a class="view-popup" href="#"
                                            data-src="#popup-review-32"><em class="mdi mdi-plus-box"></em></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="popup-customer-reviews" style="display: none" id="popup-review-32">
                            <div class="main-popup">
                                <div class="left-review">
                                    <div class="avata"><img
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/41.png"
                                            alt=""></div>
                                    <ul class="list-star">
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star-half"></em></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="head">
                                        <p class="name">Chị Đỗ Thị Kim Cúc </p>
                                        <p class="position">Giám đốc Hành Chính Nhân Sư </p>
                                        <p class="company">GreenFeed VN</p>
                                    </div>
                                    <div class="body">
                                        <p>GreenFeed VN là công ty hàng đầu trong lĩnh vực sản xuất thức ăn gia súc,
                                            gia cầm và thủy sản, với nhiều chi nhánh trong và ngoài nước. Với sự
                                            phát triển ngày càng lớn mạnh của công ty, hàng năm chúng tôi cần tuyển
                                            dụng nhân tài cho các vị trí. Và giải pháp Talent Solution của
                                            CareerBuilder đã tạo lợi thế cho</p>
                                        <p>GreenFeed VN là công ty hàng đầu trong lĩnh vực sản xuất thức ăn gia súc,
                                            gia cầm và thủy sản, với nhiều chi nhánh trong và ngoài nước. Với sự
                                            phát triển ngày càng lớn mạnh của công ty, hàng năm chúng tôi cần tuyển
                                            dụng nhân tài cho các vị trí. Và giải pháp Talent Solution của
                                            CareerBuilder đã tạo lợi thế cho</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="customer-reviews-item">
                            <div class="head">
                                <div class="avata"><img
                                        src="https://static.careerbuilder.vn/themes/employer/img/employer/42.png"
                                        alt=""></div>
                                <div class="content">
                                    <p class="name">Anh Nguyễn Thanh Hưng </p>
                                    <p class="position">Trưởng bộ phận Tuyển dụng &amp; Đào tạo </p>
                                    <p class="company">Acecook Việt Nam</p>
                                </div>
                            </div>
                            <div class="body">
                                <ul class="list-star">
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star-half"></em></li>
                                </ul>
                                <div class="content">
                                    <p>Sau quá trình triển khai và sử dụng Talent Solution của CareerBuilder
                                        Vietnam, tôi đánh giá rất cao hiệu quả mà giải pháp này mang lại. Bên cạnh
                                        những lợi ích thấy rõ trong khả năng tạo nguồn và kết nối liên tục với ứng
                                        viên thì các tính năng khác giúp nâng cao sự tương tác trong tuyển dụng giữa
                                        chúng tôi và ứng viên của<a class="view-popup" href="#"
                                            data-fancybox="popup" data-src="#popup-review-42"><em
                                                class="mdi mdi-plus-box"></em></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="popup-customer-reviews" style="display: none" id="popup-review-42">
                            <div class="main-popup">
                                <div class="left-review">
                                    <div class="avata"><img
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/42.png"
                                            alt=""></div>
                                    <ul class="list-star">
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star-half"></em></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="head">
                                        <p class="name">Anh Nguyễn Thanh Hưng </p>
                                        <p class="position">Trưởng bộ phận Tuyển dụng &amp; Đào tạo </p>
                                        <p class="company">Acecook Việt Nam</p>
                                    </div>
                                    <div class="body">
                                        <p>Sau quá trình triển khai và sử dụng Talent Solution của CareerBuilder
                                            Vietnam, tôi đánh giá rất cao hiệu quả mà giải pháp này mang lại. Bên
                                            cạnh những lợi ích thấy rõ trong khả năng tạo nguồn và kết nối liên tục
                                            với ứng viên thì các tính năng khác giúp nâng cao sự tương tác trong
                                            tuyển dụng giữa chúng tôi và ứng viên của</p>
                                        <p>Sau quá trình triển khai và sử dụng Talent Solution của CareerBuilder
                                            Vietnam, tôi đánh giá rất cao hiệu quả mà giải pháp này mang lại. Bên
                                            cạnh những lợi ích thấy rõ trong khả năng tạo nguồn và kết nối liên tục
                                            với ứng viên thì các tính năng khác giúp nâng cao sự tương tác trong
                                            tuyển dụng giữa chúng tôi và ứng viên của</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="customer-reviews-item">
                            <div class="head">
                                <div class="avata"><img
                                        src="https://static.careerbuilder.vn/themes/employer/img/employer/19.png"
                                        alt=""></div>
                                <div class="content">
                                    <p class="name">Chị Nguyễn Ngọc Diệp </p>
                                    <p class="position">Giám đốc Nhân sự </p>
                                    <p class="company">Công ty TNHH SX TM DV Lê Mây</p>
                                </div>
                            </div>
                            <div class="body">
                                <ul class="list-star">
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star-half"></em></li>
                                </ul>
                                <div class="content">
                                    <p>Mặc dù có thể lúc đầu khi áp dụng công nghệ của Talent Solution vào trong các
                                        hoạt động hàng ngày của công tác tuyển dụng có hơi chưa quen nhưng sau một
                                        thời gian, chúng tôi đã thấy được sự thay đổi tích cực và hiệu quả của giải
                                        pháp này mang lại. Nếu xét về tính hiệu quả đầu tư, các chỉ số như
                                        Cost/Application <a class="view-popup" href="#"
                                            data-src="#popup-review-11"><em class="mdi mdi-plus-box"></em></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="popup-customer-reviews" style="display: none" id="popup-review-11">
                            <div class="main-popup">
                                <div class="left-review">
                                    <div class="avata"><img
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/19.png"
                                            alt=""></div>
                                    <ul class="list-star">
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star-half"></em></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="head">
                                        <p class="name">Chị Nguyễn Ngọc Diệp </p>
                                        <p class="position">Giám đốc Nhân sự </p>
                                        <p class="company">Công ty TNHH SX TM DV Lê Mây</p>
                                    </div>
                                    <div class="body">
                                        <p>Mặc dù có thể lúc đầu khi áp dụng công nghệ của Talent Solution vào trong
                                            các hoạt động hàng ngày của công tác tuyển dụng có hơi chưa quen nhưng
                                            sau một thời gian, chúng tôi đã thấy được sự thay đổi tích cực và hiệu
                                            quả của giải pháp này mang lại. Nếu xét về tính hiệu quả đầu tư, các chỉ
                                            số như Cost/Application (Chi phí cho một hồ sơ ứng tuyển), Cost/Hire
                                            (Chi phí cho một nhân sự tuyển dụng thành công) đang dần trở nên hiệu
                                            quả hơn. </p>
                                        <p>Mặc dù có thể lúc đầu khi áp dụng công nghệ của Talent Solution vào trong
                                            các hoạt động hàng ngày của công tác tuyển dụng có hơi chưa quen nhưng
                                            sau một thời gian, chúng tôi đã thấy được sự thay đổi tích cực và hiệu
                                            quả của giải pháp này mang lại. Nếu xét về tính hiệu quả đầu tư, các chỉ
                                            số như Cost/Application (Chi phí cho một hồ sơ ứng tuyển), Cost/Hire
                                            (Chi phí cho một nhân sự tuyển dụng thành công) đang dần trở nên hiệu
                                            quả hơn.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="customer-reviews-item">
                            <div class="head">
                                <div class="avata"><img
                                        src="https://static.careerbuilder.vn/themes/employer/img/employer/40.png"
                                        alt=""></div>
                                <div class="content">
                                    <p class="name">Anh Phạm Văn Chính</p>
                                    <p class="position">Giám đốc Nhân sự </p>
                                    <p class="company">United International Pharma</p>
                                </div>
                            </div>
                            <div class="body">
                                <ul class="list-star">
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star-half"></em></li>
                                </ul>
                                <div class="content">
                                    <p>Tối ưu nguồn lực là điều đầu tiên phải kể đến khi đánh giá hiệu quả Talent
                                        Solution. Giải pháp này của CareerBuilder Vietnam thực sự đã giúp bộ phận
                                        tuyển dụng chúng tôi mang về cho công ty những nhân viên/ quản lý ưu tú
                                        trong thời gian ngắn và với chi phí hiệu quả nhất. Thị trường lao động có
                                        rất nhiều <a class="view-popup" href="#"
                                            data-src="#popup-review-21"><em class="mdi mdi-plus-box"></em></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="popup-customer-reviews" style="display: none" id="popup-review-21">
                            <div class="main-popup">
                                <div class="left-review">
                                    <div class="avata"><img
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/40.png"
                                            alt=""></div>
                                    <ul class="list-star">
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star-half"></em></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="head">
                                        <p class="name">Anh Phạm Văn Chính</p>
                                    </div>
                                    <p class="position">Giám đốc Nhân sự </p>
                                    <p class="company">United International Pharma</p>
                                    <div class="body">
                                        <p>Tối ưu nguồn lực là điều đầu tiên phải kể đến khi đánh giá hiệu quả
                                            Talent Solution. Giải pháp này của CareerBuilder Vietnam thực sự đã giúp
                                            bộ phận tuyển dụng chúng tôi mang về cho công ty những nhân viên/ quản
                                            lý ưu tú trong thời gian ngắn và với chi phí hiệu quả nhất. Thị trường
                                            lao động có rất nhiều </p>
                                        <p>Tối ưu nguồn lực là điều đầu tiên phải kể đến khi đánh giá hiệu quả
                                            Talent Solution. Giải pháp này của CareerBuilder Vietnam thực sự đã giúp
                                            bộ phận tuyển dụng chúng tôi mang về cho công ty những nhân viên/ quản
                                            lý ưu tú trong thời gian ngắn và với chi phí hiệu quả nhất. Thị trường
                                            lao động có rất nhiều</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="customer-reviews-item">
                            <div class="head">
                                <div class="avata"><img
                                        src="https://static.careerbuilder.vn/themes/employer/img/employer/41.png"
                                        alt=""></div>
                                <div class="content">
                                    <p class="name">Chị Đỗ Thị Kim Cúc </p>
                                    <p class="position">Giám đốc Hành Chính Nhân Sư </p>
                                    <p class="company">GreenFeed VN</p>
                                </div>
                            </div>
                            <div class="body">
                                <ul class="list-star">
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star-half"></em></li>
                                </ul>
                                <div class="content">
                                    <p>GreenFeed VN là công ty hàng đầu trong lĩnh vực sản xuất thức ăn gia súc, gia
                                        cầm và thủy sản, với nhiều chi nhánh trong và ngoài nước. Với sự phát triển
                                        ngày càng lớn mạnh của công ty, hàng năm chúng tôi cần tuyển dụng nhân tài
                                        cho các vị trí. Và giải pháp Talent Solution của CareerBuilder đã tạo lợi
                                        thế cho <a class="view-popup" href="#"
                                            data-src="#popup-review-31"><em class="mdi mdi-plus-box"></em></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="popup-customer-reviews" style="display: none" id="popup-review-31">
                            <div class="main-popup">
                                <div class="left-review">
                                    <div class="avata"><img
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/41.png"
                                            alt=""></div>
                                    <ul class="list-star">
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star-half"></em></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="head">
                                        <p class="name">Chị Đỗ Thị Kim Cúc </p>
                                        <p class="position">Giám đốc Hành Chính Nhân Sư </p>
                                        <p class="company">GreenFeed VN</p>
                                    </div>
                                    <div class="body">
                                        <p>GreenFeed VN là công ty hàng đầu trong lĩnh vực sản xuất thức ăn gia súc,
                                            gia cầm và thủy sản, với nhiều chi nhánh trong và ngoài nước. Với sự
                                            phát triển ngày càng lớn mạnh của công ty, hàng năm chúng tôi cần tuyển
                                            dụng nhân tài cho các vị trí. Và giải pháp Talent Solution của
                                            CareerBuilder đã tạo lợi thế cho</p>
                                        <p>GreenFeed VN là công ty hàng đầu trong lĩnh vực sản xuất thức ăn gia súc,
                                            gia cầm và thủy sản, với nhiều chi nhánh trong và ngoài nước. Với sự
                                            phát triển ngày càng lớn mạnh của công ty, hàng năm chúng tôi cần tuyển
                                            dụng nhân tài cho các vị trí. Và giải pháp Talent Solution của
                                            CareerBuilder đã tạo lợi thế cho</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="customer-reviews-item">
                            <div class="head">
                                <div class="avata"><img
                                        src="https://static.careerbuilder.vn/themes/employer/img/employer/42.png"
                                        alt=""></div>
                                <div class="content">
                                    <p class="name">Anh Nguyễn Thanh Hưng </p>
                                    <p class="position">Trưởng bộ phận Tuyển dụng &amp; Đào tạo </p>
                                    <p class="company">Acecook Việt Nam</p>
                                </div>
                            </div>
                            <div class="body">
                                <ul class="list-star">
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star-half"></em></li>
                                </ul>
                                <div class="content">
                                    <p>Sau quá trình triển khai và sử dụng Talent Solution của CareerBuilder
                                        Vietnam, tôi đánh giá rất cao hiệu quả mà giải pháp này mang lại. Bên cạnh
                                        những lợi ích thấy rõ trong khả năng tạo nguồn và kết nối liên tục với ứng
                                        viên thì các tính năng khác giúp nâng cao sự tương tác trong tuyển dụng giữa
                                        chúng tôi và ứng viên của<a class="view-popup" href="#"
                                            data-fancybox="popup" data-src="#popup-review-41"><em
                                                class="mdi mdi-plus-box"></em></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="popup-customer-reviews" style="display: none" id="popup-review-41">
                            <div class="main-popup">
                                <div class="left-review">
                                    <div class="avata"><img
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/42.png"
                                            alt=""></div>
                                    <ul class="list-star">
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star-half"></em></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="head">
                                        <p class="name">Anh Nguyễn Thanh Hưng </p>
                                        <p class="position">Trưởng bộ phận Tuyển dụng &amp; Đào tạo </p>
                                        <p class="company">Acecook Việt Nam</p>
                                    </div>
                                    <div class="body">
                                        <p>Sau quá trình triển khai và sử dụng Talent Solution của CareerBuilder
                                            Vietnam, tôi đánh giá rất cao hiệu quả mà giải pháp này mang lại. Bên
                                            cạnh những lợi ích thấy rõ trong khả năng tạo nguồn và kết nối liên tục
                                            với ứng viên thì các tính năng khác giúp nâng cao sự tương tác trong
                                            tuyển dụng giữa chúng tôi và ứng viên của</p>
                                        <p>Sau quá trình triển khai và sử dụng Talent Solution của CareerBuilder
                                            Vietnam, tôi đánh giá rất cao hiệu quả mà giải pháp này mang lại. Bên
                                            cạnh những lợi ích thấy rõ trong khả năng tạo nguồn và kết nối liên tục
                                            với ứng viên thì các tính năng khác giúp nâng cao sự tương tác trong
                                            tuyển dụng giữa chúng tôi và ứng viên của</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="customer-reviews-item">
                            <div class="head">
                                <div class="avata"><img
                                        src="https://static.careerbuilder.vn/themes/employer/img/employer/19.png"
                                        alt=""></div>
                                <div class="content">
                                    <p class="name">Chị Nguyễn Ngọc Diệp </p>
                                    <p class="position">Giám đốc Nhân sự </p>
                                    <p class="company">Công ty TNHH SX TM DV Lê Mây</p>
                                </div>
                            </div>
                            <div class="body">
                                <ul class="list-star">
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star-half"></em></li>
                                </ul>
                                <div class="content">
                                    <p>Mặc dù có thể lúc đầu khi áp dụng công nghệ của Talent Solution vào trong các
                                        hoạt động hàng ngày của công tác tuyển dụng có hơi chưa quen nhưng sau một
                                        thời gian, chúng tôi đã thấy được sự thay đổi tích cực và hiệu quả của giải
                                        pháp này mang lại. Nếu xét về tính hiệu quả đầu tư, các chỉ số như
                                        Cost/Application <a class="view-popup" href="#"
                                            data-src="#popup-review-12"><em class="mdi mdi-plus-box"></em></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="popup-customer-reviews" style="display: none" id="popup-review-12">
                            <div class="main-popup">
                                <div class="left-review">
                                    <div class="avata"><img
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/19.png"
                                            alt=""></div>
                                    <ul class="list-star">
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star-half"></em></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="head">
                                        <p class="name">Chị Nguyễn Ngọc Diệp </p>
                                        <p class="position">Giám đốc Nhân sự </p>
                                        <p class="company">Công ty TNHH SX TM DV Lê Mây</p>
                                    </div>
                                    <div class="body">
                                        <p>Mặc dù có thể lúc đầu khi áp dụng công nghệ của Talent Solution vào trong
                                            các hoạt động hàng ngày của công tác tuyển dụng có hơi chưa quen nhưng
                                            sau một thời gian, chúng tôi đã thấy được sự thay đổi tích cực và hiệu
                                            quả của giải pháp này mang lại. Nếu xét về tính hiệu quả đầu tư, các chỉ
                                            số như Cost/Application (Chi phí cho một hồ sơ ứng tuyển), Cost/Hire
                                            (Chi phí cho một nhân sự tuyển dụng thành công) đang dần trở nên hiệu
                                            quả hơn. </p>
                                        <p>Mặc dù có thể lúc đầu khi áp dụng công nghệ của Talent Solution vào trong
                                            các hoạt động hàng ngày của công tác tuyển dụng có hơi chưa quen nhưng
                                            sau một thời gian, chúng tôi đã thấy được sự thay đổi tích cực và hiệu
                                            quả của giải pháp này mang lại. Nếu xét về tính hiệu quả đầu tư, các chỉ
                                            số như Cost/Application (Chi phí cho một hồ sơ ứng tuyển), Cost/Hire
                                            (Chi phí cho một nhân sự tuyển dụng thành công) đang dần trở nên hiệu
                                            quả hơn.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="customer-reviews-item">
                            <div class="head">
                                <div class="avata"><img
                                        src="https://static.careerbuilder.vn/themes/employer/img/employer/40.png"
                                        alt=""></div>
                                <div class="content">
                                    <p class="name">Anh Phạm Văn Chính</p>
                                    <p class="position">Giám đốc Nhân sự </p>
                                    <p class="company">United International Pharma</p>
                                </div>
                            </div>
                            <div class="body">
                                <ul class="list-star">
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star-half"></em></li>
                                </ul>
                                <div class="content">
                                    <p>Tối ưu nguồn lực là điều đầu tiên phải kể đến khi đánh giá hiệu quả Talent
                                        Solution. Giải pháp này của CareerBuilder Vietnam thực sự đã giúp bộ phận
                                        tuyển dụng chúng tôi mang về cho công ty những nhân viên/ quản lý ưu tú
                                        trong thời gian ngắn và với chi phí hiệu quả nhất. Thị trường lao động có
                                        rất nhiều <a class="view-popup" href="#"
                                            data-src="#popup-review-22"><em class="mdi mdi-plus-box"></em></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="popup-customer-reviews" style="display: none" id="popup-review-22">
                            <div class="main-popup">
                                <div class="left-review">
                                    <div class="avata"><img
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/40.png"
                                            alt=""></div>
                                    <ul class="list-star">
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star-half"></em></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="head">
                                        <p class="name">Anh Phạm Văn Chính</p>
                                    </div>
                                    <p class="position">Giám đốc Nhân sự </p>
                                    <p class="company">United International Pharma</p>
                                    <div class="body">
                                        <p>Tối ưu nguồn lực là điều đầu tiên phải kể đến khi đánh giá hiệu quả
                                            Talent Solution. Giải pháp này của CareerBuilder Vietnam thực sự đã giúp
                                            bộ phận tuyển dụng chúng tôi mang về cho công ty những nhân viên/ quản
                                            lý ưu tú trong thời gian ngắn và với chi phí hiệu quả nhất. Thị trường
                                            lao động có rất nhiều </p>
                                        <p>Tối ưu nguồn lực là điều đầu tiên phải kể đến khi đánh giá hiệu quả
                                            Talent Solution. Giải pháp này của CareerBuilder Vietnam thực sự đã giúp
                                            bộ phận tuyển dụng chúng tôi mang về cho công ty những nhân viên/ quản
                                            lý ưu tú trong thời gian ngắn và với chi phí hiệu quả nhất. Thị trường
                                            lao động có rất nhiều</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="customer-reviews-item">
                            <div class="head">
                                <div class="avata"><img
                                        src="https://static.careerbuilder.vn/themes/employer/img/employer/41.png"
                                        alt=""></div>
                                <div class="content">
                                    <p class="name">Chị Đỗ Thị Kim Cúc </p>
                                    <p class="position">Giám đốc Hành Chính Nhân Sư </p>
                                    <p class="company">GreenFeed VN</p>
                                </div>
                            </div>
                            <div class="body">
                                <ul class="list-star">
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star-half"></em></li>
                                </ul>
                                <div class="content">
                                    <p>GreenFeed VN là công ty hàng đầu trong lĩnh vực sản xuất thức ăn gia súc, gia
                                        cầm và thủy sản, với nhiều chi nhánh trong và ngoài nước. Với sự phát triển
                                        ngày càng lớn mạnh của công ty, hàng năm chúng tôi cần tuyển dụng nhân tài
                                        cho các vị trí. Và giải pháp Talent Solution của CareerBuilder đã tạo lợi
                                        thế cho <a class="view-popup" href="#"
                                            data-src="#popup-review-32"><em class="mdi mdi-plus-box"></em></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="popup-customer-reviews" style="display: none" id="popup-review-32">
                            <div class="main-popup">
                                <div class="left-review">
                                    <div class="avata"><img
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/41.png"
                                            alt=""></div>
                                    <ul class="list-star">
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star-half"></em></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="head">
                                        <p class="name">Chị Đỗ Thị Kim Cúc </p>
                                        <p class="position">Giám đốc Hành Chính Nhân Sư </p>
                                        <p class="company">GreenFeed VN</p>
                                    </div>
                                    <div class="body">
                                        <p>GreenFeed VN là công ty hàng đầu trong lĩnh vực sản xuất thức ăn gia súc,
                                            gia cầm và thủy sản, với nhiều chi nhánh trong và ngoài nước. Với sự
                                            phát triển ngày càng lớn mạnh của công ty, hàng năm chúng tôi cần tuyển
                                            dụng nhân tài cho các vị trí. Và giải pháp Talent Solution của
                                            CareerBuilder đã tạo lợi thế cho</p>
                                        <p>GreenFeed VN là công ty hàng đầu trong lĩnh vực sản xuất thức ăn gia súc,
                                            gia cầm và thủy sản, với nhiều chi nhánh trong và ngoài nước. Với sự
                                            phát triển ngày càng lớn mạnh của công ty, hàng năm chúng tôi cần tuyển
                                            dụng nhân tài cho các vị trí. Và giải pháp Talent Solution của
                                            CareerBuilder đã tạo lợi thế cho</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="customer-reviews-item">
                            <div class="head">
                                <div class="avata"><img
                                        src="https://static.careerbuilder.vn/themes/employer/img/employer/42.png"
                                        alt=""></div>
                                <div class="content">
                                    <p class="name">Anh Nguyễn Thanh Hưng </p>
                                    <p class="position">Trưởng bộ phận Tuyển dụng &amp; Đào tạo </p>
                                    <p class="company">Acecook Việt Nam</p>
                                </div>
                            </div>
                            <div class="body">
                                <ul class="list-star">
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star-half"></em></li>
                                </ul>
                                <div class="content">
                                    <p>Sau quá trình triển khai và sử dụng Talent Solution của CareerBuilder
                                        Vietnam, tôi đánh giá rất cao hiệu quả mà giải pháp này mang lại. Bên cạnh
                                        những lợi ích thấy rõ trong khả năng tạo nguồn và kết nối liên tục với ứng
                                        viên thì các tính năng khác giúp nâng cao sự tương tác trong tuyển dụng giữa
                                        chúng tôi và ứng viên của<a class="view-popup" href="#"
                                            data-fancybox="popup" data-src="#popup-review-42"><em
                                                class="mdi mdi-plus-box"></em></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="popup-customer-reviews" style="display: none" id="popup-review-42">
                            <div class="main-popup">
                                <div class="left-review">
                                    <div class="avata"><img
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/42.png"
                                            alt=""></div>
                                    <ul class="list-star">
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star-half"></em></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="head">
                                        <p class="name">Anh Nguyễn Thanh Hưng </p>
                                        <p class="position">Trưởng bộ phận Tuyển dụng &amp; Đào tạo </p>
                                        <p class="company">Acecook Việt Nam</p>
                                    </div>
                                    <div class="body">
                                        <p>Sau quá trình triển khai và sử dụng Talent Solution của CareerBuilder
                                            Vietnam, tôi đánh giá rất cao hiệu quả mà giải pháp này mang lại. Bên
                                            cạnh những lợi ích thấy rõ trong khả năng tạo nguồn và kết nối liên tục
                                            với ứng viên thì các tính năng khác giúp nâng cao sự tương tác trong
                                            tuyển dụng giữa chúng tôi và ứng viên của</p>
                                        <p>Sau quá trình triển khai và sử dụng Talent Solution của CareerBuilder
                                            Vietnam, tôi đánh giá rất cao hiệu quả mà giải pháp này mang lại. Bên
                                            cạnh những lợi ích thấy rõ trong khả năng tạo nguồn và kết nối liên tục
                                            với ứng viên thì các tính năng khác giúp nâng cao sự tương tác trong
                                            tuyển dụng giữa chúng tôi và ứng viên của</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="customer-reviews-item">
                            <div class="head">
                                <div class="avata"><img
                                        src="https://static.careerbuilder.vn/themes/employer/img/employer/19.png"
                                        alt=""></div>
                                <div class="content">
                                    <p class="name">Chị Nguyễn Ngọc Diệp </p>
                                    <p class="position">Giám đốc Nhân sự </p>
                                    <p class="company">Công ty TNHH SX TM DV Lê Mây</p>
                                </div>
                            </div>
                            <div class="body">
                                <ul class="list-star">
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star-half"></em></li>
                                </ul>
                                <div class="content">
                                    <p>Mặc dù có thể lúc đầu khi áp dụng công nghệ của Talent Solution vào trong các
                                        hoạt động hàng ngày của công tác tuyển dụng có hơi chưa quen nhưng sau một
                                        thời gian, chúng tôi đã thấy được sự thay đổi tích cực và hiệu quả của giải
                                        pháp này mang lại. Nếu xét về tính hiệu quả đầu tư, các chỉ số như
                                        Cost/Application <a class="view-popup" href="#"
                                            data-src="#popup-review-11"><em class="mdi mdi-plus-box"></em></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="popup-customer-reviews" style="display: none" id="popup-review-11">
                            <div class="main-popup">
                                <div class="left-review">
                                    <div class="avata"><img
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/19.png"
                                            alt=""></div>
                                    <ul class="list-star">
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star-half"></em></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="head">
                                        <p class="name">Chị Nguyễn Ngọc Diệp </p>
                                        <p class="position">Giám đốc Nhân sự </p>
                                        <p class="company">Công ty TNHH SX TM DV Lê Mây</p>
                                    </div>
                                    <div class="body">
                                        <p>Mặc dù có thể lúc đầu khi áp dụng công nghệ của Talent Solution vào trong
                                            các hoạt động hàng ngày của công tác tuyển dụng có hơi chưa quen nhưng
                                            sau một thời gian, chúng tôi đã thấy được sự thay đổi tích cực và hiệu
                                            quả của giải pháp này mang lại. Nếu xét về tính hiệu quả đầu tư, các chỉ
                                            số như Cost/Application (Chi phí cho một hồ sơ ứng tuyển), Cost/Hire
                                            (Chi phí cho một nhân sự tuyển dụng thành công) đang dần trở nên hiệu
                                            quả hơn. </p>
                                        <p>Mặc dù có thể lúc đầu khi áp dụng công nghệ của Talent Solution vào trong
                                            các hoạt động hàng ngày của công tác tuyển dụng có hơi chưa quen nhưng
                                            sau một thời gian, chúng tôi đã thấy được sự thay đổi tích cực và hiệu
                                            quả của giải pháp này mang lại. Nếu xét về tính hiệu quả đầu tư, các chỉ
                                            số như Cost/Application (Chi phí cho một hồ sơ ứng tuyển), Cost/Hire
                                            (Chi phí cho một nhân sự tuyển dụng thành công) đang dần trở nên hiệu
                                            quả hơn.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="customer-reviews-item">
                            <div class="head">
                                <div class="avata"><img
                                        src="https://static.careerbuilder.vn/themes/employer/img/employer/40.png"
                                        alt=""></div>
                                <div class="content">
                                    <p class="name">Anh Phạm Văn Chính</p>
                                    <p class="position">Giám đốc Nhân sự </p>
                                    <p class="company">United International Pharma</p>
                                </div>
                            </div>
                            <div class="body">
                                <ul class="list-star">
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star-half"></em></li>
                                </ul>
                                <div class="content">
                                    <p>Tối ưu nguồn lực là điều đầu tiên phải kể đến khi đánh giá hiệu quả Talent
                                        Solution. Giải pháp này của CareerBuilder Vietnam thực sự đã giúp bộ phận
                                        tuyển dụng chúng tôi mang về cho công ty những nhân viên/ quản lý ưu tú
                                        trong thời gian ngắn và với chi phí hiệu quả nhất. Thị trường lao động có
                                        rất nhiều <a class="view-popup" href="#"
                                            data-src="#popup-review-21"><em class="mdi mdi-plus-box"></em></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="popup-customer-reviews" style="display: none" id="popup-review-21">
                            <div class="main-popup">
                                <div class="left-review">
                                    <div class="avata"><img
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/40.png"
                                            alt=""></div>
                                    <ul class="list-star">
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star-half"></em></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="head">
                                        <p class="name">Anh Phạm Văn Chính</p>
                                    </div>
                                    <p class="position">Giám đốc Nhân sự </p>
                                    <p class="company">United International Pharma</p>
                                    <div class="body">
                                        <p>Tối ưu nguồn lực là điều đầu tiên phải kể đến khi đánh giá hiệu quả
                                            Talent Solution. Giải pháp này của CareerBuilder Vietnam thực sự đã giúp
                                            bộ phận tuyển dụng chúng tôi mang về cho công ty những nhân viên/ quản
                                            lý ưu tú trong thời gian ngắn và với chi phí hiệu quả nhất. Thị trường
                                            lao động có rất nhiều </p>
                                        <p>Tối ưu nguồn lực là điều đầu tiên phải kể đến khi đánh giá hiệu quả
                                            Talent Solution. Giải pháp này của CareerBuilder Vietnam thực sự đã giúp
                                            bộ phận tuyển dụng chúng tôi mang về cho công ty những nhân viên/ quản
                                            lý ưu tú trong thời gian ngắn và với chi phí hiệu quả nhất. Thị trường
                                            lao động có rất nhiều</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="customer-reviews-item">
                            <div class="head">
                                <div class="avata"><img
                                        src="https://static.careerbuilder.vn/themes/employer/img/employer/41.png"
                                        alt=""></div>
                                <div class="content">
                                    <p class="name">Chị Đỗ Thị Kim Cúc </p>
                                    <p class="position">Giám đốc Hành Chính Nhân Sư </p>
                                    <p class="company">GreenFeed VN</p>
                                </div>
                            </div>
                            <div class="body">
                                <ul class="list-star">
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star-half"></em></li>
                                </ul>
                                <div class="content">
                                    <p>GreenFeed VN là công ty hàng đầu trong lĩnh vực sản xuất thức ăn gia súc, gia
                                        cầm và thủy sản, với nhiều chi nhánh trong và ngoài nước. Với sự phát triển
                                        ngày càng lớn mạnh của công ty, hàng năm chúng tôi cần tuyển dụng nhân tài
                                        cho các vị trí. Và giải pháp Talent Solution của CareerBuilder đã tạo lợi
                                        thế cho <a class="view-popup" href="#"
                                            data-src="#popup-review-31"><em class="mdi mdi-plus-box"></em></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="popup-customer-reviews" style="display: none" id="popup-review-31">
                            <div class="main-popup">
                                <div class="left-review">
                                    <div class="avata"><img
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/41.png"
                                            alt=""></div>
                                    <ul class="list-star">
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star-half"></em></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="head">
                                        <p class="name">Chị Đỗ Thị Kim Cúc </p>
                                        <p class="position">Giám đốc Hành Chính Nhân Sư </p>
                                        <p class="company">GreenFeed VN</p>
                                    </div>
                                    <div class="body">
                                        <p>GreenFeed VN là công ty hàng đầu trong lĩnh vực sản xuất thức ăn gia súc,
                                            gia cầm và thủy sản, với nhiều chi nhánh trong và ngoài nước. Với sự
                                            phát triển ngày càng lớn mạnh của công ty, hàng năm chúng tôi cần tuyển
                                            dụng nhân tài cho các vị trí. Và giải pháp Talent Solution của
                                            CareerBuilder đã tạo lợi thế cho</p>
                                        <p>GreenFeed VN là công ty hàng đầu trong lĩnh vực sản xuất thức ăn gia súc,
                                            gia cầm và thủy sản, với nhiều chi nhánh trong và ngoài nước. Với sự
                                            phát triển ngày càng lớn mạnh của công ty, hàng năm chúng tôi cần tuyển
                                            dụng nhân tài cho các vị trí. Và giải pháp Talent Solution của
                                            CareerBuilder đã tạo lợi thế cho</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="customer-reviews-item">
                            <div class="head">
                                <div class="avata"><img
                                        src="https://static.careerbuilder.vn/themes/employer/img/employer/42.png"
                                        alt=""></div>
                                <div class="content">
                                    <p class="name">Anh Nguyễn Thanh Hưng </p>
                                    <p class="position">Trưởng bộ phận Tuyển dụng &amp; Đào tạo </p>
                                    <p class="company">Acecook Việt Nam</p>
                                </div>
                            </div>
                            <div class="body">
                                <ul class="list-star">
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star"> </em></li>
                                    <li> <em class="fas fa-star-half"></em></li>
                                </ul>
                                <div class="content">
                                    <p>Sau quá trình triển khai và sử dụng Talent Solution của CareerBuilder
                                        Vietnam, tôi đánh giá rất cao hiệu quả mà giải pháp này mang lại. Bên cạnh
                                        những lợi ích thấy rõ trong khả năng tạo nguồn và kết nối liên tục với ứng
                                        viên thì các tính năng khác giúp nâng cao sự tương tác trong tuyển dụng giữa
                                        chúng tôi và ứng viên của<a class="view-popup" href="#"
                                            data-fancybox="popup" data-src="#popup-review-41"><em
                                                class="mdi mdi-plus-box"></em></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="popup-customer-reviews" style="display: none" id="popup-review-41">
                            <div class="main-popup">
                                <div class="left-review">
                                    <div class="avata"><img
                                            src="https://static.careerbuilder.vn/themes/employer/img/employer/42.png"
                                            alt=""></div>
                                    <ul class="list-star">
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star"> </em></li>
                                        <li> <em class="fas fa-star-half"></em></li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="head">
                                        <p class="name">Anh Nguyễn Thanh Hưng </p>
                                        <p class="position">Trưởng bộ phận Tuyển dụng &amp; Đào tạo </p>
                                        <p class="company">Acecook Việt Nam</p>
                                    </div>
                                    <div class="body">
                                        <p>Sau quá trình triển khai và sử dụng Talent Solution của CareerBuilder
                                            Vietnam, tôi đánh giá rất cao hiệu quả mà giải pháp này mang lại. Bên
                                            cạnh những lợi ích thấy rõ trong khả năng tạo nguồn và kết nối liên tục
                                            với ứng viên thì các tính năng khác giúp nâng cao sự tương tác trong
                                            tuyển dụng giữa chúng tôi và ứng viên của</p>
                                        <p>Sau quá trình triển khai và sử dụng Talent Solution của CareerBuilder
                                            Vietnam, tôi đánh giá rất cao hiệu quả mà giải pháp này mang lại. Bên
                                            cạnh những lợi ích thấy rõ trong khả năng tạo nguồn và kết nối liên tục
                                            với ứng viên thì các tính năng khác giúp nâng cao sự tương tác trong
                                            tuyển dụng giữa chúng tôi và ứng viên của</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Danh Gia Khach Hang -->


@include('templates.vietstar.includes.footer')
@endsection

