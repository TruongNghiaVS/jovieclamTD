<section class="form_support cb-section">
    <div class="container">
        <div class="banner-form ">
            <h3 class="banner-form__title text-white text-center">Đâu là giải pháp phù hợp cho doanh nghiệp của bạn?</h3>
            <div class="banner-form__subtitle">
                Hãy để lại thông tin và các chuyên viên tư vấn tuyển dụng của VietStar sẽ liên hệ ngay với bạn
            </div>
            <div class="row px-4 g-0">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="banner-form__wrapper">
                        <div class="banner-form__img">
    
                        </div>
                    </div>
                </div>
                <div class="banner-form-main col-lg-6 col-md-12 col-sm-12 bg-white">
                       <div class="form-main__title py-3 text-primary">Đăng ký nhận tư vấn</div>
                    <form>
                        <div class="form-group">
                            <label for="full_name">{{__('Full Name')}}</label>
                            <input type="text" class="form-control" id="full_name" aria-describedby="full_name" placeholder="{{__('Full Name')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">{{__('Email')}}</label>
                            <input type="email" class="form-control" id="email" placeholder="{{__('Email')}}">
                        </div>
                       

                        <div class="form-group">
                            <label for="phone">{{__('Mobile Number')}}</label>
                            <input type="tel" class="form-control" id="phone" placeholder="{{__('Mobile Number')}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">{{__('City')}}</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Chọn Tỉnh/ Thành Phố</option>
                                <option>Hồ Chí Minh</option>
                                <option>Hà Nội</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('Send require')}}</button>
                    
                    </form>
                </div>
            </div>

            
        </div>
    </div>
</section>

@push('styles')
<style type="text/css">
    .banner-form{
        background-image: linear-gradient(to right, #d4240b, #981b1e);
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        padding: 50px;
    }
    .banner-form__title{
        font-size: 28px;
        font-style: normal;
        font-weight: 700;
        line-height: 125%;
        letter-spacing: -0.54px;
        color: #FFF;
        text-align: center;
        margin-top: 50px;
    }
    .banner-form__subtitle{
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 22px;
        letter-spacing: 0.14px;
        color: #FFF;
        text-align: center;
        margin-bottom: 35px;
    }
    .banner-form__wrapper {
        background-image: url(https://tuyendung.topcv.vn/images/banner_form_bg.png);
        height: 100%;
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        border-bottom-left-radius: 10px;
        border-top-left-radius: 10px;
    }
    .banner-form__img {
        background-image: url(https://tuyendung.topcv.vn/images/banner_form_center.png);
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        height: 593px;
    }
    .banner-form-main{
        border-bottom-right-radius: 10px;
        border-top-right-radius: 10px;
        padding: 30px;
    }
    .form-main__title {
        font-size: 20px;
        font-weight: 700;
    }

</style>
@endpush