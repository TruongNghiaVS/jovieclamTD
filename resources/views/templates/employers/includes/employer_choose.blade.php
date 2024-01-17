<section class="employer-choose cb-section">
    <div class="flex-img" bis_skin_checked="1">
        <div class="image" bis_skin_checked="1">
            <img src="{{ asset('/vietstar/imgs') }}/solution.png" alt="jobvieclam.com">
        </div>
    </div>
    <div class="box-content" bis_skin_checked="1">
        <h2 class="cb-title animation fade-right active">Chọn Jobvieclam</h2>
        <div class="box-content__content animation fade-right active" bis_skin_checked="1">
            <p>Tại Việt Nam, Jobvieclam.com đã và đang là lựa chọn của hơn 17.000 doanh nghiệp hàng đầu với các ưu thế:</p>
            <ul>
                <li><i class="bi bi-arrow-right mx-2 text-white"></i> Tiếp cận hiệu quả nhiều nguồn ứng viên tiềm năng hơn bất cứ trang tuyển dụng nào ở Việt Nam. Thông tin tuyển dụng được đăng tải rộng rãi trên các trang web lớn: Talentnetwork.vn, VieclamIT.vn, VietnamSalary.vn</li>
                <li><i class="bi bi-arrow-right mx-2 text-white"></i>Hàng trăm ngàn hồ sơ ứng viên hoàn chỉnh và được cập nhật mới thường xuyên.</li>
                <li><i class="bi bi-arrow-right mx-2 text-white"></i>Thu hút ứng viên với các sự kiện quảng bá thương hiệu tuyển dụng.</li>
                <li><i class="bi bi-arrow-right mx-2 text-white"></i>Giải pháp kết nối, tuyển dụng và quản lý nhân tài Talent Solution - 200+ khách hàng</li>
                <li><i class="bi bi-arrow-right mx-2 text-white"></i>Giải pháp Talent Driver , Targeted Email Marketing , Talent Referral</li>
            </ul>
        </div>
    </div>
</section>

@push('styles')
<style type="text/css">
        .employer-choose {
            -ms-flex-wrap: wrap;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
           
        }
        section.employer-choose.cb-section{
            padding: 60px 0;
        }
        .employer-choose .flex-img, .employer-choose .box-content {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
            background-color: var(--bs-primary);
        }
        .employer-choose .box-content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .employer-choose .image{
            height: 100%;
            padding-top: 58%;
            position: relative;
        }
        .employer-choose .image img {
            -o-object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .box-content__content {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left:50px;
            color: white;
        }
        .employer-choose .box-content .cb-title {
            font-size: 32px;
            max-width: 600px;
            margin:0 auto;
            padding: 20px;
            color: white;
        }
        .employer-choose .box-content .box-content__content p {
        
            font-size: 18px;
            font-weight: 500;
            line-height: 24px;
            color: white;
        }
        .employer-choose .box-content .box-content__content ul {
            margin-top: 10px;
            list-style-type: none;
        }
        .employer-choose .box-content .box-content__content ul li {
              position: relative;
                padding-left: 20px;
                line-height: 24px;
                font-size: 16.5px;
                font-weight: 400;
                margin: 5px 0;
                color: white;
        }
        
      
       
</style>
@endpush
