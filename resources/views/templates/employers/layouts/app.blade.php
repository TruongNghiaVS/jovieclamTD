<?php
if (!isset($seo)) {
    $seo = (object)array('seo_title' => $siteSetting->site_name, 'seo_description' => $siteSetting->site_name, 'seo_keywords' => $siteSetting->site_name, 'seo_other' => '');
}
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="{{ (session('localeDir', 'ltr'))}}"
    dir="{{ (session('localeDir', 'ltr'))}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{__($seo->seo_title) }}</title>
    <meta name="Description" content="{!! $seo->seo_description !!}">
    <meta name="Keywords" content="{!! $seo->seo_keywords !!}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <!-- social meta tag share start -->
    @yield('meta_tags')
    <!-- social meta tag share end -->

    {!! $seo->seo_other !!}
    <link rel="icon" type="image/x-icon" href="{{ asset('/vietstar/imgs/jobvieclam.png') }}">

    <link href="{{ asset('/vietstar/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/vietstar/css/swiper-bundle.min.css')}}" />

    <!-- Custom Style -->
    <link href="{{ asset('/vietstar/css/style.css')}}" rel="stylesheet">
   
    <link href="{{ asset('/fontawesome-free-6.5.1-web/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/animation.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/fonts/icon-vietstart/style.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/recruiter.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('/vietstar/css/jquery.multiselect.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/chosen/chosen.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />



    
    <link href="{{ asset('/vietstar/css/default_sidebar.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/login.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/update.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/user_update.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/employee_update.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/font-awsome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/custom-chosen.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/responsive.css')}}" rel="stylesheet">

    
    @stack('styles')
    <script src="{{asset('/')}}js/jquery.min.js"></script>
    {!! $siteSetting->ganalytics !!}
    {!! $siteSetting->google_tag_manager_for_head !!}

</head>

<body class="default-page">
    <main style="padding-top: 76px;">
        <b class="screen-overlay"></b>

        @yield('content')
    </main>
  
    <script src="{{asset('/')}}js/popper.js"></script>
    <script src="{{asset('/')}}js/bootstrap.min.js"></script>
    <script src="{{ asset('/vietstar/js/jquery.multiselect.js')}}" type="text/javascript"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    
    <!-- Owl carousel -->

    
    <script src="{{asset('/')}}js/owl.carousel.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
   

    <script src="{{ asset('/') }}admin_assets/global/plugins/Bootstrap-3-Typeahead/bootstrap3-typeahead.min.js"
        type="text/javascript"></script>
    <script src="{{ asset('/') }}admin_assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>

    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{ asset('/') }}admin_assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('/') }}admin_assets/global/plugins/jquery.scrollTo.min.js" type="text/javascript"></script>
    <!-- Revolution Slider -->
    <script type="text/javascript" src="{{ asset('/') }}js/revolution-slider/js/jquery.themepunch.tools.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('/') }}js/revolution-slider/js/jquery.themepunch.revolution.min.js">
    </script>
    <script src="{{ asset('/vietstar/js/sweetalert.min.js')}}"></script>
    <script src="{{ asset('/vietstar/js/jquery.validate.js')}}"></script>
    <script src="{{ asset('/vietstar/js/additional-methods.min.js')}}"></script>
    <script src="{{ asset('/vietstar/js/swiper-bundle.min.js')}}" type="text/javascript"></script>

    <script src="{{ asset('/vietstar/js/jquery.formatCurrency-1.4.0.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/vietstar/js/jquery.formatCurrency.all.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/vietstar/js/main.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/vietstar/js/animation.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/vietstar/js/custom.js')}}" type="text/javascript"></script>
    {!! NoCaptcha::renderJs() !!}
    @stack('scripts')
    <!-- Custom js -->
    <script src="{{asset('/')}}js/script.js"></script>
    <script type="text/JavaScript">
        $(document).ready(function(){
            $(document).scrollTo('.has-error', 2000);
            });
            function showProcessingForm(btn_id){		
            $("#"+btn_id).val( 'Processing .....' );
            $("#"+btn_id).attr('disabled','disabled');		
            }
		
		setInterval("hide_savedAlert()",7000);
        function hide_savedAlert(){
          $(document).find('.svjobalert').hide();
        }

        $(document).ready(function(){
            $.ajax({
                type: 'get',
                url: "{{route('check-time')}}",
                success: function(res) {
                        $('.notification').html(res);
                   
                }
            });
        });
		
        </script>
    <script type="application/ld+json">{
          "@context": "http://schema.org",
          "@type": "Organization",
          "name": "Jobvieclam",
          "description": "Jobvieclam.com là một nền tảng hàng đầu cung cấp giải pháp nhân sự toàn diện cho doanh nghiệp, giúp tối ưu hóa quá trình tuyển dụng và quản lý nhân sự. Với mục tiêu tạo ra sự kết nối hiệu quả giữa doanh nghiệp và ứng viên, Jobvieclam.com không chỉ là một cầu nối thông tin tuyển dụng mà còn là đối tác đáng tin cậy đồng hành cùng sự phát triển của doanh nghiệp.",
          "logo": "https://tuyendung.jobvieclam.com/vietstar/imgs/logo-new.svg",
          "url": "https://tuyendung.jobvieclam.com/",
          "telephone": "0938797478",
          "sameAs": ["https://www.facebook.com/tuyendungvietstar"],
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "54/31 Đ. Phổ Quang",
            "addressLocality": "Phường 2, Tân Bình, Thành phố Hồ Chí Minh,",
            "postalCode": "70000",
            "addressCountry": "Việt Nam"
          }}</script><script type="application/ld+json">{
            "@context": "https://schema.org",
            "@type": "WebSite",
            "url": "https://tuyendung.jobvieclam.com/",
            "potentialAction": {
              "@type": "SearchAction",
              "target": "https://tuyendung.jobvieclam.com/tuyen-dung?search={search_term_string}",
              "query-input": "required name=search_term_string"
            }
   }</script>
</body>

</html>