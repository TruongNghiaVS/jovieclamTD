<style>
    
    @media only screen and (min-width: 600px) {
        .aboutusHOmepage {
            margin-bottom: 30px
        }
        .aboutus-hp{
            overflow-x: hidden;
            border-bottom: 1px solid #e8e8e8;
        }
    }
</style>
<section class="our_customer aboutus-hp cb-section ">
    <div class="container">
        <h2 class="section-title  aboutusHOmepage text-center text-primary">
            {{__('About Us')}}
        </h2>
        <div class="about_us_content animation fade-top active" bis_skin_checked="1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 font-weight-normal d-flex align-items-center  justify-content-center flex-column ">
                    <p class="about_us_content__text py-2 ">
                    Jobvieclam.com là một trang web việc làm, được thiết kế để kết nối những người Tìm Kiếm làm với các công ty và tổ chức đang tuyển dụng. 
                    </p>
                    <p class="about_us_content__text py-2"> 

                    Với sứ mệnh tạo ra một nền tảng thuận lợi và hiệu quả, Jobvieclam.com cung cấp cho người tìm việc nhiều cơ hội nghề nghiệp và giúp doanh nghiệp thuận lợi trong quá trình Tìm Kiếm và chọn lựa ứng viên phù hợp.
                    </p class="about_us_content__text py-2">

                    <p class="about_us_content__text py-2">
                        Jobvieclam.com chú trọng đến trải nghiệm người dùng bằng cách cung cấp giao diện thân thiện và dễ sử dụng.

                    </p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 about_us_img">
                        <img class="about_us_content__img" src="{{ asset('/') }}admin_assets/hoatdong.jpeg" alt="about us">
                </div>
            </div>

        </div>
    </div>
</section>

@push('styles')
<style>
    .about_us_img img {
        width: 100%;
        border-radius: 20px;
    }
</style>
@endpush

