@extends('templates.employers.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.employers.includes.header')
@include('templates.employers.includes.mobile_dashboard_menu')

<!-- Header end -->
<!-- Inner Page Title start -->
<section class="about-us-banner" style="background-image: url(/admin_assets/no-cover.png);"></section>
    <!-- Bootstrap CSS -->
<!-- jQuery first, then Bootstrap JS. -->
<!-- Nav tabs -->
<div class="container">

<ul class="nav nav-tabs justify-content-center" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" href="#about-us" role="tab" data-toggle="tab">
        <h4 class="text-center text-uppercase text-primary mb-0">
            Về Chúng Tôi
        </h4>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="#culture" role="tab" data-toggle="tab"> 
        <h4 class="text-center text-uppercase text-primary  mb-0">
            Về Văn Hóa
        </h4>
    </a>
  </li>

</ul>
</div>


<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active show " id="about-us">
        
        <section class="about-us-section ">
             
            <div class="container">
                <div class="row about_us_content justify-content-md-center " bis_skin_checked="1">
                    <div class="col-lg-5 col-md-12 col-sm-12  about_us_img animation fade-left ">
                        <img src="/admin_assets/hoatdong.jpg" class="img_left_about">
                    </div>
                    <div class="col-lg-7  col-md-12  col-sm-12  d-flex align-items-center animation fade-right">
                        <div class="content_title" bis_skin_checked="1">
                            <div class="title" bis_skin_checked="1">
                                <h2>
                                Về Jobvieclam.com</h2>
                            </div>
                            <div class="text" bis_skin_checked="1">
                                <p>
                                Jobvieclam.com là một nền tảng hàng đầu cung cấp giải pháp nhân sự toàn diện cho doanh nghiệp, giúp  tối ưu hóa quá trình tuyển dụng và quản lý nhân sự. Với mục tiêu tạo ra sự kết nối hiệu quả giữa doanh nghiệp và ứng viên, Jobvieclam.com không chỉ là một cầu nối thông tin tuyển dụng mà còn là đối tác đáng tin cậy đồng hành cùng sự phát triển của doanh nghiệp.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="feature_section ">
             
             <div class="container">
                <h4 class="text-center mb-4 text-uppercase text-primary">
                    Các ưu điểm nổi bật của Jobvieclam.com
                </h4>
                 <div class="row  g-0 about_us_feature justify-content-md-center "  id="about_us_feature" bis_skin_checked="1">
                     <div class="col-lg-4 col-md-12 col-sm-12 p-2 animation fade-top active">
                            <div class="number">
                                    <strong>
                                       01
                                    </strong>
                            </div>

                            <div class="title">
                                   <h3>Đa dạng về Ngành Nghề</h3>
                            </div>
                            <div class="text">
                                   <p>
                                        Jobvieclam.com cung cấp hàng ngàn cơ hội việc làm trong nhiều lĩnh vực khác nhau, từ sản xuất đến dịch vụ, từ công nghệ thông tin đến tài chính, giúp doanh nghiệp dễ dàng Tìm Kiếm ứng viên phù hợp với nhu cầu tuyển dụng của doanh nghiệp.
                                    </p>
                            </div>
                     </div>
                     <div class="col-lg-4 col-md-12 col-sm-12 p-2 animation fade-top active">
                            <div class="number">
                                    <strong>
                                       02
                                    </strong>
                            </div>

                            <div class="title">
                                   <h3>Tích hợp Công Nghệ</h3>
                            </div>
                            <div class="text">
                                   <p>
                                    Với việc sử dụng công nghệ tiên tiến, Jobvieclam.com tạo ra trải nghiệm tuyển dụng mượt mà và hiệu quả. Giao diện dễ sử dụng và tính năng Tìm Kiếm thông minh giúp doanh nghiệp tiết kiệm thời gian và năng lực trong quá trình Tìm Kiếm ứng viên.

                                    </p>
                            </div>
                     </div>
                     <div class="col-lg-4 col-md-12 col-sm-12 p-2 animation fade-top active">
                            <div class="number">
                                    <strong>
                                       03
                                    </strong>
                            </div>

                            <div class="title">
                                   <h3>Hệ Thống Đánh Giá và Phản Hồi</h3>
                            </div>
                            <div class="text">
                                   <p>
                                   Jobvieclam.com không chỉ giúp doanh nghiệp Tìm Kiếm ứng viên, mà còn hỗ trợ trong quá trình đánh giá chất lượng của họ. Hệ thống đánh giá và phản hồi từ người sử dụng giúp tạo ra một cộng đồng chia sẻ thông tin chân thực về các công ty và vị trí làm việc.
                                    </p>
                            </div>
                     </div>
                     <div class="col-lg-4 col-md-12 col-sm-12 p-2 animation fade-top active">
                            <div class="number">
                                    <strong>
                                       04
                                    </strong>
                            </div>

                            <div class="title">
                                   <h3>Tư Vấn và Hỗ Trợ</h3>
                            </div>
                            <div class="text">
                                   <p>
                                   Đội ngũ tư vấn chuyên nghiệp của Jobvieclam.com sẵn sàng hỗ trợ doanh nghiệp trong quá trình Tìm Kiếm, lựa chọn và giữ chân nhân sự. Họ cung cấp các giải pháp tùy chỉnh để đáp ứng nhu cầu cụ thể của từng doanh nghiệp.

                                    </p>
                            </div>
                     </div>
                     <div class="col-lg-4 col-md-12 col-sm-12 p-2 animation fade-top active">
                            <div class="number">
                                    <strong>
                                       05
                                    </strong>
                            </div>

                            <div class="title">
                                   <h3>Bảo Mật Thông Tin</h3>
                            </div>
                            <div class="text">
                                   <p>
                                   Jobvieclam.com cam kết bảo vệ thông tin của doanh nghiệp và ứng viên một cách nghiêm túc. Hệ thống bảo mật thông tin cá nhân được xây dựng đồng bộ để đảm bảo an toàn và tin cậy.
                                    </p>
                            </div>
                     </div>
                     
                 </div>

                
             </div>
        </section>
        <section class="feature_section_end ">
            <div class="container" bis_skin_checked="1">
            <div class="row  g-0 about_us_feature justify-content-md-center "  id="about_us_feature" bis_skin_checked="1">
                     <div class="col-lg-8 col-md-12 col-sm-12 p-2  text-center">
                        Jobvieclam.com không chỉ là một cầu nối tuyển dụng mà còn là đối tác chiến lược, hỗ trợ doanh nghiệp xây dựng đội ngũ nhân sự mạnh mẽ và linh hoạt để đối mặt với thách thức của thị trường lao động đang thay đổi liên tục.
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
                        <div class="trust-by animation fade-bottom active" bis_skin_checked="1"><img src="https://jobvieclam.com\company_logos/trung-tam-anh-ngu-apollo-english-1710921682-857.png" alt="">
                        </div>
                        <div class="trust-by animation fade-bottom active" bis_skin_checked="1"><img src="https://jobvieclam.com\company_logos/cong-ty-co-phan-bpo-mat-bao-1710920753-929.jpg" alt="">
                        </div>
                        <div class="trust-by animation fade-bottom active" bis_skin_checked="1"><img src="https://jobvieclam.com\company_logos/cong-ty-tnhh-tu-van-va-dich-vu-hung-cuong-1710920301-208.jpg" alt="">
                        </div>
                        <div class="trust-by animation fade-bottom active" bis_skin_checked="1"><img src="https://jobvieclam.com\company_logos/cong-ty-tnhh-concentrix-service-vietnam-1710919659-829.png" alt="">
                        </div>
                        <div class="trust-by animation fade-bottom active" bis_skin_checked="1"><img src="https://jobvieclam.com\company_logos/cong-ty-tnhh-transcosmos-viet-nam-1710921997-733.png" alt="">
                        </div>
                        <div class="trust-by animation fade-bottom active" bis_skin_checked="1"><img src="https://jobvieclam.com\company_logos/-1710745917-344.png" alt=""></div>
                        
                    </div>
                
                </div>
            </div>
        </section>


    
  </div>
  <div role="tabpanel" class="tab-pane fade in " id="culture">
    <section class="culture-section ">
        <div class="container">
            <h1 class="text-primary">Văn Hóa Jobvieclam</h1>
                <div class="culture-img">
                        <img src="/uploads/blogs/tim-viec-lam-anh-dai-dien_542_742.png" alt="tim-viec-lam-anh-dai-dien_542_742.png" title="tim-viec-lam-anh-dai-dien_542_742.png">
                </div>
            <div class="title">
                <i class="fas fa-hand-point-right text-primary"></i> Văn Hóa Tập Trung vào Con Người:
            </div>
            <p>
                Jobvieclam.com xây dựng một văn hóa tổ chức tập trung vào giá trị con người. Đồng nghiệp ở đây không chỉ là những người làm việc mà còn là những đối tác đồng hành, cùng nhau xây dựng và chia sẻ sứ mệnh tạo ra những cơ hội nghề nghiệp tốt nhất cho mọi người.
            </p>

            <strong>
                Tôn Trọng sự Đa Dạng:
            </strong>

            <p>
                Jobvieclam.com coi trọng sự đa dạng trong nền tảng nhân sự của mình. Chúng tôi tin rằng sự đa dạng mang lại sức mạnh sáng tạo và tích cực. Chúng tôi cam kết tạo ra một môi trường làm việc công bằng, tôn trọng quyền lợi và độc lập của mỗi cá nhân.
            </p>

            <strong>
                Tương Tác Cộng Đồng:
            </strong>

            <p>
                Jobvieclam.com không chỉ là một nền tảng tuyển dụng, mà còn là một phần của cộng đồng tuyển dụng việc làm. Chúng tôi tổ chức sự kiện, hội thảo và hoạt động tương tác để tạo ra cơ hội gặp gỡ, chia sẻ kinh nghiệm và mở rộng mạng lưới liên kết các chuyên ngành.
            
            </p>

            <strong>
                Trách Nhiệm Xã Hội:
            </strong>

            <p>
                Chúng tôi hiểu rằng doanh nghiệp có trách nhiệm đối với xã hội. Jobvieclam.com cam kết thực hiện các hoạt động trách nhiệm xã hội, đóng góp vào sự phát triển của cộng đồng và hỗ trợ những người có nhu cầu đặc biệt trong thị trường lao động.
              
            </p>

            <p>
                Với những giá trị văn hóa này, Jobvieclam.com không chỉ là một đối tác nhân sự mà còn là một đồng minh đáng tin cậy, hỗ trợ doanh nghiệp xây dựng và phát triển nguồn lực nhân sự của mình theo hướng bền vững và tích cực.

            </p>


            <div class="title">
                <i class="fas fa-hand-point-right text-primary"></i> Tầm nhìn - sứ mệnh của Jobvieclam.com
            </div>
            <strong>
                Tầm Nhìn của Jobvieclam.com:
            </strong>

            <p>
                Jobvieclam.com hướng tới việc trở thành nền tảng hàng đầu, định hình và đổi mới trong lĩnh vực cung ứng nhân sự, kết nối doanh nghiệp với những tài năng xuất sắc và đáp ứng mọi nhu cầu nhân sự của họ.
            </p>


            <strong>
                Sứ Mệnh của Jobvieclam.com:
            </strong>

            <p>
                Sứ mệnh của Jobvieclam là mang lại giải pháp nhân sự toàn diện, tạo cơ hội và tăng cường sức mạnh cho cả doanh nghiệp và ứng viên. Chúng tôi cung cấp không chỉ là dịch vụ tuyển dụng, mà còn là một đối tác chiến lược đồng hành, giúp doanh nghiệp xây dựng và phát triển đội ngũ nhân sự mạnh mẽ và linh hoạt để đối mặt với những thách thức và những biến đổi của thị trường.
            </p>

            <div class="title">

            <i class="fas fa-hand-point-right text-primary"></i>   Giá Trị Cốt Lõi của Jobvieclam.com:

            </div>
            <strong>
                Chất Lượng và Hiệu Suất:
            </strong>
           

            <ul>
                <li>
                    Chúng tôi tập trung vào việc mang lại chất lượng cao nhất cho cả trải nghiệm người dùng và dịch vụ tuyển dụng. Chất lượng là tiêu chí hàng đầu để hỗ trợ doanh nghiệp đạt được hiệu suất tối ưu và đạt được mục tiêu tuyển dụng.
                </li>
            </ul>


            <strong>
                Sáng Tạo và Linh Hoạt:

            </strong>


            <ul>
                <li>
                    Chúng tôi khuyến khích và tôn trọng sự sáng tạo, linh hoạt trong cách chúng tôi xây dựng và phát triển nền tảng. Điều này giúp doanh nghiệp và ứng viên tận dụng mọi cơ hội để khai thác tìm năng của mình 
                </li>
            </ul>

            <strong>
             Đa Dạng và Bình Đẳng:

            </strong>


            <ul>
                <li>
                    Chúng tôi cam kết tạo ra môi trường làm việc đa dạng, bình đẳng, và tôn trọng. Mọi người có cơ hội công bằng để phát triển và góp phần vào sự đa dạng của đội ngũ nhân sự.
                </li>
            </ul>

            <strong>
                Trách Nhiệm Xã Hội:

            </strong>

            
            <ul>
                <li>
                Chúng tôi xem xét mọi quyết định và hành động dưới góc độ trách nhiệm xã hội. Chúng tôi đóng góp tích cực vào cộng đồng và giữ vững các tiêu chuẩn bền vững.

                </li>
            </ul>


            <strong>
                Tận Tâm và Hỗ Trợ Chuyên Nghiệp:

            </strong>

            
            <ul>
                <li>
                Đội ngũ chuyên gia của chúng tôi không chỉ tận tâm trong từng tương tác mà còn chuyên nghiệp trong cách họ hỗ trợ doanh nghiệp và ứng viên. Chúng tôi luôn sẵn sàng cung cấp giải pháp và đưa ra những lời khuyên có giá trị.

                </li>
            </ul>
        </div>
    </section>
    

  </div>

</div>




@push('styles')
<style>
    .cb-section.about-us-section {
        padding: 20px 0;
    }
    .feature_section{
        padding-top: 25px;
    } 
    .feature_section_end{
        padding-top: 20px;

    }
    .our_customer.cb-section{
        padding-top: 20px;
    }
  
    .about-us-section .about_us_img  {
        display: flex;
        justify-content: start;
    }
    .about-us-section .about_us_img img {
        width: 100%;
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
        color: var(--bs-primary);
        font-size: 29px;
    }

    .content_title .text {
        
        padding-right: 10px;

        color: #5d677a;
        font-size: 16px;
        font-weight: 500;
        line-height: 1.4;
        text-align: justify;
    }

    .content_title .text p{
        
        padding-right: 10px;
        color: #5d677a;
        font-size: 16px;
        font-weight: 500;
        line-height: 2rem;
        text-align: justify;
    }

    .about_us_feature .number {
        margin-bottom: 25px;
    }
    .about_us_feature .number strong{
        font-size: 34px;
        color: var(--bs-primary);
       
    }


    .about_us_feature .title{
        font-size: 24px;
        color: #141414;
        margin-bottom: 10px;


    }


    .about_us_feature .text p{
        font-size: 16px;
        line-height: 27px;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;

    }

    .culture-section  .container {
        padding: 30px 40px;
        border: 1px solid #f0f0f0;
    }
    .culture-img {
        width: 50%;
        padding-top: 32%;
        position: relative;
        height: 350px;
        margin-bottom: 10px;
    }

    .culture-img  img{
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        object-fit: contain;
    }

    .culture-section p {
        margin-bottom: 10px;
        font-size: 18px;
        font-weight: 500;
        line-height: 2.0rem;
        text-align: justify;
    }
    .culture-section strong {
        margin-bottom: 10px;
        font-size: 20px;
        font-weight: 600;
        line-height: 2.0rem;
        color: var(--bs-primary);
    }
    .culture-section h1 {
        margin-top: 0;
        margin-bottom: 0.5rem;
        font-weight: 700;
        line-height: 1.2;

    }
    .culture-section .title  {
        color: var(--bs-primary);
        font-weight: 700;
        margin-bottom: 15px;
        line-height: 1.2;
        font-size: 23px;

    }

    .culture-section ul li {
        margin-bottom: 10px;
        font-size: 17px;
        font-weight: 500;
        line-height: 1.5rem;
        text-align: justify;

    }



</style>
@endpush


@include('templates.employers.includes.footer')
@endsection