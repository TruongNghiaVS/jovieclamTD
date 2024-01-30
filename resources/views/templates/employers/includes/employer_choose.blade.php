<section class="employer-choose cb-section">
    <div class="flex-img" bis_skin_checked="1">
        <div class="image" bis_skin_checked="1">
            <img src="{{ asset('/vietstar/imgs') }}/solution.png" alt="jobvieclam.com">
        </div>
    </div>
    <div class="box-content" bis_skin_checked="1">
        <h2 class="cb-title animation fade-right active">CHỌN JOBVIECLAM.COM</h2>
        <div class="box-content__content animation fade-right active" bis_skin_checked="1">
            <p>Jobvieclam.com đã và đang là lựa chọn của hơn 10.000.000 ứng viên và 1.000.000 doanh nghiệp hàng đầu với các ưu thế: </p>
            <ul>
                <li><i class="bi bi-arrow-right mx-2 text-white"></i>  Là kho lưu trữ nguồn ứng viên tiềm năng thu hút lượng ứng viên đa dạng ngành nghề cho mọi doanh nghiệp</li>
                <li><i class="bi bi-arrow-right mx-2 text-white"></i>Hàng triệu lượt truy cập mỗi ngày, Jobvieclam.com không ngừng cập nhật thông tin về ứng viên để đảm bảo sự thường xuyên và chính xác.
</li>
                <li><i class="bi bi-arrow-right mx-2 text-white"></i>Giải pháp Employee Branding chú trọng vào phát triển hình ảnh và uy tín của doanh nghiệp, đây là một chiến lược quan trọng để thu hút và giữ chân nhân tài.
</li>
                <li><i class="bi bi-arrow-right mx-2 text-white"></i>Kết nối và lưu trữ ứng viên chất lượng giúp doanh nghiệp tiết kiệm thời gian và công sức trong quá trình tuyển dụng bằng phương pháp Talent Pool. 
</li>
                <li><i class="bi bi-arrow-right mx-2 text-white"></i>Đội ngũ CSKH duy trì liên lạc với ứng viên, cung cấp thông tin, điều phối quy trình tuyển dụng cho trải nghiệm tuyển dụng một cách chuyên nghiệp và hiệu quả.
</li>
<li><i class="bi bi-arrow-right mx-2 text-white">
</i>
Sử dụng chiến lược tiếp thị (Recruitment Marketing) tăng cường sự nhận thức và quan tâm đối với chiến dịch tuyển dụng trên các phương tiện truyền thông, quảng cáo…


</li>
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
            padding:0  50px;
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
            padding:0 2rem;
            text-align: justify;

        }
        .employer-choose .box-content .box-content__content ul li {
                position: relative;
                
                line-height: 24px;
                font-size: 16.5px;
                font-weight: 400;
                margin: 5px 0;
                color: white;
                text-align: justify;
        }
        
      
       
</style>
@endpush
