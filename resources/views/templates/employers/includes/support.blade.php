
<section class="form_support cb-section">
    <div class="container">
        <div class="banner-form ">
            <h2 class="section-title  text-center text-primary">Đâu là giải pháp phù hợp cho doanh nghiệp của bạn?</h2>
            <div class="banner-form__subtitle  text-primary">
                Hãy để lại thông tin và các chuyên viên tư vấn tuyển dụng của VietStar sẽ liên hệ ngay với bạn
            </div>
            <div class="row  g-0">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="banner-form__wrapper">
                        <img src="{{ asset('/') }}admin_assets/supportform.png" alt="">
                    </div>
                </div>
                <div class="banner-form-main col-lg-6 col-md-12 col-sm-12 bg-white border">
                    <div>

                        <div class="form-main__title py-2 text-primary text-center">Đăng Ký Nhận Tư Vấn</div>
                        <form id="support_form"  class="form-horizontal needs-validation" novalidate>
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                    <label for="email">{{__('Name')}}</label>
                                <div class="formrow{{ $errors->has('name') ? ' has-error' : '' }}">
        
                                <input id="name" type="text" name="name" class="form-control" required="required" placeholder="{{__('Name')}}" value="{{old('name')}}">
                                    <div class="invalid-feedback name-error">
                                        {{__('Name is required')}}
                                    </div>
        
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">{{__('Email')}}</label>
                                <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="email"  type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">
            
                                    <div class="invalid-feedback email-error">
                                        {{__('Email is required')}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">{{__('Mobile Number')}}</label>
                              
                                <div class="formrow{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <input id="phoneId" type="tel" name="phone" class="form-control" required="required" placeholder="{{__('Mobile Number')}}" value="">
            
                                    <div class="invalid-feedback phone-error">
                                        {{__('Phone is required')}}
                                
                                    </div>
                                </div>
                            </div>

                         
                            <div class="form-group">
                                <label for="support_city">{{__('City')}}</label>
                                <select class="form-control" id="support_city">
                                    <option value="" selected="selected">Chọn địa điểm</option><option value="3">Port Blair</option><option value="48666">Lào Cai</option><option value="48667">Yên Bái</option><option value="48668">Lai Châu</option><option value="48669">Điện Biên</option><option value="48670">Sơn La</option><option value="48671">Hòa Bình</option><option value="48672">Hà Giang</option><option value="48673">Tuyên Quang</option><option value="48674">Phú Thọ</option><option value="48675">Thái Nguyên</option><option value="48676">Bắc Kạn</option><option value="48677">Cao Bằng</option><option value="48678">Lạng Sơn</option><option value="48679">Bắc Giang</option><option value="48680">Quảng Ninh</option><option value="48681">Tp. Hà Nội</option><option value="48682">Tp. Hải Phòng</option><option value="48683">Vĩnh Phúc</option><option value="48684">Bắc Ninh</option><option value="48685">Hưng Yên</option><option value="48686">Hải Dương</option><option value="48687">Thái Bình</option><option value="48688">Nam Định</option><option value="48689">Ninh Bình</option><option value="48690">Hà Nam</option><option value="48691">Thanh Hóa</option><option value="48692">Nghệ An</option><option value="48693">Hà Tĩnh</option><option value="48694">Quảng Bình</option><option value="48695">Quảng Trị</option><option value="48696">Thừa Thiên Huế</option><option value="48697">Tp. Đà Nẵng</option><option value="48698">Quảng Nam</option><option value="48699">Quảng Ngãi</option><option value="48700">Bình Định</option><option value="48701">Phú Yên</option><option value="48702">Khánh Hòa</option><option value="48703">Ninh Thuận</option><option value="48704">Bình Thuận</option><option value="48705">Kon Tum</option><option value="48706">Gia Lai</option><option value="48707">Đắk Lắk</option><option value="48708">Đắk Nông</option><option value="48709">Lâm Đồng</option><option value="48710">TP. Hồ Chí Minh</option><option value="48711">Đồng Nai</option><option value="48712">Bà Rịa-Vũng Tàu</option><option value="48713">Bình Dương</option><option value="48714">Bình Phước</option><option value="48715">Tây Ninh</option><option value="48716">Tp. Cần Thơ</option><option value="48717">Long An</option><option value="48718">Tiền Giang</option><option value="48719">Bến Tre</option><option value="48720">Vĩnh Long</option><option value="48721">Trà Vinh</option><option value="48722">Đồng Tháp</option><option value="48723">An Giang</option><option value="48724">Kiên Giang</option><option value="48725">Hậu Giang</option><option value="48726">Sóc Trăng</option><option value="48727">Bạc Liêu</option><option value="48728">Cà Mau</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{__('Send require')}}</button>
                                
                            </div>

                        </form>
                        </div>
                    </div>
            </div>

            
        </div>
    </div>
</section>

<div class="modal fade" id="support_request_success" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary d-flex justify-content-center">
                        <h5 class="m-0 text-white">{{__('Alert')}}</h5>
                     </div>
					
                    <div class="modal-body">
                     
                        <div class="thank-you-pop">
							<img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
                            <p class="text-center">
                                Cảm ơn bạn đã liên hệ với chúng tôi.
                            </p>
                            <p class="text-center">
                                Chúng tôi đã nhận được thư và sẽ liên hệ bạn trong thời gian sớm nhất
                            </p>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal">{{__('Close')}}</button>
                            </div>
 						</div>
                    </div>
                  
        </div>
    </div>
</div>

@push('styles')
<style type="text/css">
    .banner-form{
      
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        padding:0px 50px;
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
        margin-bottom: 30px;
    }
    .banner-form__wrapper {
        width: 100%;
        height: 100%;
    }
    .banner-form__wrapper img {
        width: 100%;
        height: 100%;
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
    .modal {
        background-color: rgba(0,0,0,0.6);
    }

</style>
@endpush


@push('scripts')
<script type="text/javascript">
  
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }
            form.classList.add('was-validated')
           
        }, false)
        })
    })()

$(document).ready(function() {
    $('#support_form').submit(function(event) {
      
            var isValid = true;
            var email_valid = true;
            var phone_valid = true;
          

            event.preventDefault()

            $('#support_form input').each(function() {
                if (!$(this).val()) {
                    isValid = false;
                    $(this).addClass('is-invalid');
                
                }
            });
        
        var email = $('#support_form #email').val();

        // Simple email validation using a regular expression
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (emailRegex.test(email)) {
            // Email is valid
            email_valid = true;
            $('#support_form#email').removeClass('is-invalid');
            $(' #support_form #email').addClass('is-valid');


        } else {
            // Email is invalid
            email_valid = false;
            $('#support_form #email').removeClass('is-valid');
            $('#support_form #email').addClass('is-invalid');
            $('.email-error').text('{{__('The email must be a valid email address')}}')
        }
        $('#phoneId').on('input', function () {
            validatePhoneNumber($(this).val()) 
        });
    
        var phone = $('#phoneId').val();

        var telregex = /^[0-9-]{9,}$/;

        if (telregex.test(phone)) {
            // Valid phone number
            phone_valid = true
            $('.phone-error').hide();
            $('#phoneId').removeClass("is-invalid")
            $('#phoneId').removeClass("has-error")
            $('#phoneId').addClass("is-valid")
        
        } else {
            phone_valid =  false
            // Invalid phone number
            $('.phone-error').empty();
            
            $('.phone-error').text("Số điện thoại không hợp lệ");
            $('.phone-error').show();
            $('#phoneId').removeClass("is-valid")
            $('#phoneId').addClass("is-invalid")
            $('#phoneId').addClass("has-error")
        }

        if (isValid && phone_valid && email_valid) { 
            var name = $('#support_form #name').val();
            var email = $('#support_form #email').val();
            var phone = $('#support_form #phoneId').val();
            var city = $('#support_form #support_city').val();

        
            var token =  $('#support_form #token').val();
           
            
            $.ajax({
            type: "POST",
            url:  `{{ route('contact-advice') }}`,
            datatype:"JSON",
            beforeSend:showSpinner(),

            data: {
                
                fullName:name,
                phone:phone,
                citys:city,
                email:email,
                citys:city,
            },
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    hideSpinner();

                    console.log(responseObject.error);
        
                },
                401: function(responseObject, textStatus, jqXHR) {
                    hideSpinner();

                    // No content found (404)
                    console.log(responseObject.responseJSON);
                    
                    // This code will be executed if the server returns a 404 response
                },
                503: function(responseObject, textStatus, errorThrown) {
                    hideSpinner();

                    // Service Unavailable (503)
                    console.log(responseObject.error);

                    // This code will be executed if the server returns a 503 response
                }           
                }
                })
                .done(function(data){
                    hideSpinner();

                    if(data.sucess){
                        $("#support_request_success").modal("show")
                        $("#support_form")[0].reset();
                        $("#support_form").removeClass("was-validated");
                        $('#support_form input').removeClass('is-valid');
                        $('#support_form input').removeClass('has-error');
                        setTimeout(()=>{
                            $('#support_request_success').modal('hide');
                        },3000)
                    }
                })
                .fail(function(jqXHR, textStatus){
                    hideSpinner();
                    
                })
                .always(function(jqXHR, textStatus) {
                
                });
        }
        
    });
    // Remove validation class on input change
$('#support_form input').on('input', function() {
    $(this).removeClass('is-invalid');
    $(this).removeClass('has-error');
});

})

</script>
@endpush

