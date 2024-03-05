<footer class="bg-white text-lg-start border-top">
    <section class="links">
        <div class="container">
            <div class=" text-md-start">
                <div class="row mt-3">
                    <div class="col-md-12 col-lg-3">
                        <div class="company-information">
                            <a class="navbar-brand" href="{{url('/')}}">
                                <img src="{{ asset('/vietstar/imgs/logo-new.svg') }}" alt="vietstar">
                            </a>
                            <!-- <div class="company-description">
                        Jobvieclam là  website dành cho nhà tuyển dụng và người  tìm việc, thuộc sở hữu của Công ty Cổ phần Tập đoàn Vietstar. Chúng tôi còn là đơn vị cung ứng nhân sự (headhunt) cho các doanh nghiệp. Vietstar sở hữu đội ngũ chuyên viên tuyển dụng có nhiều kinh nghiệm, năng động và nhiệt huyết.
                    </div> -->

                            <!-- <div class="socials">
                        <a href="#" class="social"><i class="fa-brands fa-facebook-f fa-lg me-3"></i></a>
                        <a href="#" class="social"><i class="fa-brands fa-twitter fa-lg me-3"></i></a>
                        <a href="#" class="social"><i class="fa-brands fa-instagram fa-lg me-3"></i></a>
                        <a href="#" class="social"><i class="fa-brands fa-linkedin-in fa-lg me-3"></i></a>
                        <a href="#" class="social"><i class="fa-brands fa-youtube fa-lg me-3"></i></a>
                        
                    </div> -->
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-9">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="footer-widget">
                                    <h4 class="widget-title">{{__('For applicants')}}</h4>
                                    <!--Quick Links menu Start-->
                                    <ul class="list-unstyled footer-links">
                                        <li>
                                            <a href="{{ route('job.list') }}">{{__('Latest jobs')}}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('my.profile') }}">{{__('Create CV')}}</a>
                                        </li>
                                        <li>
                                            <a href="#">{{__('Introduce candidate')}}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('blogs') }}">{{__('Recruitment News')}}</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-2">
                                <div class="footer-widget">
                                    <h4 class="widget-title">{{__('About Us')}}</h4>
                                    <ul class="list-unstyled footer-links">
                                        <li><a href="#">{{__('About Us')}}</a></li>
                                        
                                       
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="footer-widget">
                                    <h4 class="widget-title">{{__('Help')}}</h4>
                                    <ul class="list-unstyled footer-links">
                                        <li><a href="#">{{__('Job search policy')}}</a></li>
                                        <li><a href="">{{__('Privacy Policy')}}</a></li>
                                        <li><a href="">{{__('Agreement of use')}}</a></li>
                                        <li><a href="{{ route('contact.us') }}">{{__('Contact')}}</a></li>
                                        <li>
                                            <a href="{{route('about_us')}}">
                                                {{__('About us')}}
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                      

                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="footer-widget">
                            <h4 class="widget-title">Kết Nối Với Jobvieclam</h4>
                            <div class="socials">
                                <a href="#" class="social"><i class="fa-brands fa-facebook-f fa-lg me-3"></i></a>
                                <a href="#" class="social"><i class="fa-brands fa-twitter fa-lg me-3"></i></a>
                                <a href="#" class="social"><i class="fa-brands fa-instagram fa-lg me-3"></i></a>
                                <a href="#" class="social"><i class="fa-brands fa-linkedin-in fa-lg me-3"></i></a>
                                <a href="#" class="social"><i class="fa-brands fa-youtube fa-lg me-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        </div>
        </div>
    </section>
    <div class="inner-copyright">
        <div class="container">
            <div class="footer-widget footer-widget-contact">
                <h5>CÔNG TY CỔ PHẦN TẬP ĐOÀN VIETSTAR</h5>
                <ul class="contact-detail">
                    <li style="padding-left: 0">54/31 Đ. Phổ Quang, Phường 2, Tân Bình, Thành phố Hồ Chí Minh, Việt Nam</li>
                    <li><i class="fa-solid fa-phone"></i>02871000 555</li>
                    <li><i class="far fa-envelope"></i>info@jobvieclam.com</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-copyright">
            <p class="copyright">Copyright © Jobvieclam</p>
            <div class="term-link">
                <span class="fs-16px pe-2">All Rights Reserved</span>
                <div class="d-inline-block "><a class="fs-16px px-2" href="#">{{__('Terms Of Use')}}</a></div>
                <div class="d-inline-block "><a class="fs-16px ps-2" href="#">{{__('Policies')}}</a></div>
            </div>
        </div>
    </div>
</footer>


<div class="social-button">
    <a href="tel:02871000555" class="icon-button lanmak-phone"><i class="fas fa-phone"></i>
        <!-- <span class="real-lanmak" style="display:none;">02781.000.555</span> -->
    </a>
    <a href="https://www.facebook.com/jobvieclam.vn" class="icon-button lanmak-facebook" target="_blank"><i class="fab fa-facebook-f"></i>
        <!-- <span class="real-lanmak" style="display:none;">Jobvieclam</span> -->
    </a>

    <a href="https://zalo.me/0969075139" class="icon-button lanmak-zalo"><i class="zalo-lanmak" target="_blank"></i>
        <!-- <span class="real-lanmak" style="display:none;">Jobvieclam</span> -->
    </a>
</div>

@push('styles')
<style>
    /* .footer-links li a {
            color: #D1D1D1;
        }
        .footer-links li a:hover {
            color: #981B1E;
            text-decoration:underline;
            text-decoration-style: solid;
            text-underline-offset: 5px;
        } */
    /* social */


    /* end social */
</style>
@endpush
@push('scripts')
<script>
    $(document).ready(function() {
        $(".icon-button")
            .mouseenter(function() {
                $(this).find(".real-lanmak").css({
                    "display": "inline",
                    "color": "#fff"
                });
            })
            .mouseleave(function() {
                $(".real-lanmak").css("display", "none");
            });
    });
</script>
@endpush