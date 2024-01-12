@extends('templates.employers.layouts.app')
@section('content')
<!-- Header start -->


<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->

<!-- Header end -->
<!-- Inner Page Title start -->

<!-- Inner Page Title end -->
<div class="inner-page">
    <!-- About -->
    <div class="container">
        <div class="contact-wrap shadow">
            <!-- <h5 class="title">
                {{__('Thank you for trusting and choosing Jobvieclam.')}}
                <br>
                {{__('Please contact us when you need assistance')}}
            </h5> -->
            <!-- Contact Info -->
            <div class="contact-now">

                <div class="row">
                    <div class="col-lg-6 column">
                        <div class="contact" style="height: auto">
                            <div class="information"> <strong>{{__('vietstar group joint stock company')}}</strong>
                                <p>{{ $siteSetting->site_street_address }}</p>
                            </div>

                            <div class="information">
                                <p><i class="fa fa-phone mr-2" style="color: #951B1E; margin-right: 10px"></i><a href="tel:{{ $siteSetting->site_phone_primary }}">{{ $siteSetting->site_phone_primary }}</a>
                                </p>
                                <!-- <p><i class="fa fa-phone mr-2" style="color: #951B1E; margin-right: 10px"></i><a href="tel:{{ $siteSetting->site_phone_secondary }}">{{ $siteSetting->site_phone_secondary }}</a></p> -->
                            </div>

                            <div class="information">
                                <p><i class="fa fa-envelope mr-2" style="color: #951B1E; margin-right: 10px"></i><a href="mailto:{{ $siteSetting->mail_to_address }}">{{ $siteSetting->mail_to_address }}</a>
                                </p>
                            </div>
                        </div>
                        <!-- Google Map -->
                        <div class="googlemap">
                            <iframe src="https://maps.google.it/maps?q={{urlencode(strip_tags($siteSetting->site_google_map))}}&output=embed" allowfullscreen></iframe>
                        </div>
                    </div>
                    <!-- Contact form -->
                    <div class="col-lg-6 column">
                        <div class="contact-form">
                            <div id="message"></div>
                            <form 
                                name="form-horizontal needs-validation" id="contactform" novalidate>
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="col-md-12 my-1 {{ $errors->has('full_name') ? ' has-error' : '' }}">
                                    
                                        <div class="formrow{{ $errors->has('name') ? ' has-error' : '' }}">

                                            <input id="name" type="text" name="name" class="form-control" required="required" placeholder="{{__('Name')}}" value="{{old('name')}}">


                                                <div class="invalid-feedback name-error">
                                                    {{__('Name is required')}}
                                                </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12 my-1 {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">

                                            <input id="email" type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">

                                            <div class="invalid-feedback email-error">
                                                {{__('Email is required')}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-1 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <div class="formrow{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <input id="phoneId" type="tel" name="phone" class="form-control" required="required" placeholder="{{__('Mobile Number')}}" value="">
                
                                        <div class="invalid-feedback phone-error">
                                            {{__('Phone is required')}}
                                    
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-1 {{ $errors->has('subject') ? ' has-error' : '' }}">
                                        <div class="formrow{{ $errors->has('subject') ? ' has-error' : '' }}">

                                        <input id="subject" type="text" name="subject" class="form-control" required="required" placeholder="{{__('Subject')}}" value="{{old('name')}}">
                                            <div class="invalid-feedback subject-error">
                                                {{__('Subject is required')}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-1 {{ $errors->has('message_txt') ? ' has-error' : '' }}">
                                        <div class="form-group">
                                      
                                            <textarea class="form-control" id="message_txt" rows="3" placeholder="{{__('Message')}}"></textarea>
                                            <div class="invalid-feedback message_txt-error">
                                                {{__('Message is required')}}
                                           
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12 my-1 {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                        {!! app('captcha')->display() !!}
                                        @if ($errors->has('g-recaptcha-response')) <span class="help-block">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                                    </div>
                                    <div class="col-md-12 my-1 ">
                                        <button title="" class="btn btn-primary btn-submit" type="submit" id="submit">{{__('Submit Now')}} <i class="far fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="contact_success" role="dialog">
            <div class="modal-dialog">
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
                                Chúng tôi sẽ trả lời thắc mắc của bạn sau 02 ngày làm việc
                            </p>
                            <p class="text-center">
                                Nếu không nhận được phải hồi vui lòng liên hệ 
                            </p>
                            <p class="text-center">
                                Cảm ơn bạn đã chọn Jobvieclam
                            </p>
 						</div>
                    </div>
        </div>
    </div>
</div>
@include('templates.employers.includes.footer')
@endsection

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
    $('#contactform').submit(function(event) {
      
        var isValid = true;
      
        var email_valid = true;
        var phone_valid = true;

        var text_valid = true;


        event.preventDefault()

        $('#contactform  input').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid');
              
            }
        });
     
    var email = $('#contactform  #email').val();

    // Simple email validation using a regular expression
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (emailRegex.test(email)) {
        email_valid = true;
        // Email is valid
        $('#contactform #email').removeClass('is-invalid');
        $(' #contactform  #email').addClass('is-valid');
        $('#contactform #email').removeClass("has-error")
        
    } else {
        email_valid = false;
        // Email is invalid
        $('#contactform #email').addClass("has-error")
        $('#contactform  #email').removeClass('is-valid');
        $('#contactform  #email').addClass('is-invalid');
        $('.email-error').text('{{__('The email must be a valid email address')}}')
    }

  
    var phone = $('#phoneId').val();

    var telregex = /^[0-9-]{9,}$/;

    if (telregex.test(phone)) {
        phone_valid = true;
        // Valid phone number
        $('.phone-error').hide();
        $('#phoneId').removeClass("is-invalid")
        $('#phoneId').removeClass("has-error")
        $('#phoneId').addClass("is-valid")
    
    } else {
        phone_valid = false;
        // Invalid phone number
        $('.phone-error').empty();
        $('.phone-error').text("Số điện thoại không hợp lệ");
        $('.phone-error').show();
        $('#phoneId').removeClass("is-valid")
        $('#phoneId').addClass("is-invalid")
        $('#phoneId').addClass("has-error")
    }

    var textarea = $('#message_txt');
    var invalidFeedback = textarea.next('.message_txt-error');
    var text = textarea.val();

    if (text.trim() !== '') {
        text_valid = true;
       
        // Valid content
        textarea.removeClass('is-invalid');
        invalidFeedback.hide();
    } else {
        text_valid = false;
        // Invalid content
        textarea.addClass('is-invalid');
        invalidFeedback.show();
    }
       // console.log("isValid",isValid);
        // console.log("email_valid",email_valid);
        // console.log("phone_valid",phone_valid);
        // console.log("text_valid",text_valid);
    if ( isValid && email_valid && phone_valid && text_valid ) { 
   
            var name = $('#contactform #name').val();
            var email = $('#contactform #email').val();
            var phone = $('#contactform #phoneId').val();
            var token =  $('#contactform #token').val();
            var subject =  $('#contactform #subject').val();
            var text =  $('#contactform #message_txt').val();
            
            $.ajax({
            type: "POST",
            url:  `{{ route('contact-request') }}`,
            beforeSend:showSpinner(),
            datatype:"JSON",
            data: {
                phone:phone,
                title:subject,
                message:text,
                email:email,
                fullName:name
            },
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    console.log(responseObject.error);
        
                },
                401: function(responseObject, textStatus, jqXHR) {
                    // No content found (404)
                    console.log(responseObject.responseJSON);
                    
                    // This code will be executed if the server returns a 404 response
                },
                503: function(responseObject, textStatus, errorThrown) {
                    // Service Unavailable (503)
                    console.log(responseObject.error);

                    // This code will be executed if the server returns a 503 response
                }           
                }
                })
                .done(function(data){
                    hideSpinner();
                    $('#contact_success').modal('show');
                    $('#contactform')[0].reset();
                    $('#contactform').removeClass("was-validated");
                    $('#contactform input').removeClass('is-valid');
                    $('#contactform input').removeClass('has-error');
                    
                
                    setTimeout(()=>{
                        $('#contact_success').modal('hide');
                    },3000)
                })
                .fail(function(jqXHR, textStatus){
                    hideSpinner();
                    
                })
                .always(function(jqXHR, textStatus) {
                
                });
           
    }
    

   
      
    // Remove validation class on input change
    
    $('#contactform  input').on('input', function() {
        $(this).removeClass('is-invalid');
        $(this).removeClass('has-error');
    });
});

})

</script>
@endpush
