<!-- Modal -->
<div class="modal fade" id="employer_logup_Modal" tabindex="-1" role="dialog" aria-labelledby="employer_logup_ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div id="employer" class="formpanel">

                    <form id ="fromEmployerRegister" class="form-horizontal needs-validation" novalidate >
                        <h3>{{__('Employers')}} / {{__('Register')}}</h3>
                        {{ csrf_field() }}

                        <input type="hidden" name="candidate_or_employer" value="employer" />

                        <div class="formrow{{ $errors->has('name') ? ' has-error' : '' }}">

                            <input type="text" name="name" class="form-control" required="required" placeholder="{{__('Name')}}" value="{{old('name')}}">

                           
                                <div class="invalid-feedback name-error">
                                    {{__('Name is required')}}
                                </div>

                        </div>

                        <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">

                            <input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">

                            <div class="invalid-feedback email-error">
                                {{__('Email is required')}}
                            </div>
                        </div>

                        <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">

                            <input id="company_passId" type="password" name="password" class="form-control" required="required" placeholder="{{__('Password')}}" value="">

                            <div class="invalid-feedback password-error">
                                {{__('Password is required')}}
                            </div>
                        </div>

                        <div class="formrow{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                            <input  id="company_comfirmId" type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Password Confirmation')}}" value="">

                            <div class="invalid-feedback password-error">
                                {{__('Password Incorrect')}}
                            </div>
                        </div>

                        <div class="formrow{{ $errors->has('is_subscribed') ? ' has-error' : '' }}">

                            <?php

                            $is_checked = '';

                            if (old('is_subscribed', 1)) {

                                $is_checked = 'checked="checked"';
                            }

                            ?>



                            <input type="checkbox" value="1" name="is_subscribed" {{$is_checked}} />
                            {{__('Subscribe to Newsletter')}}

                            <span class="help-block is_subscribed">
                            </span> 
                        </div>




                        <div class="formrow{{ $errors->has('terms_of_use') ? ' has-error' : '' }}">

                            <input type="checkbox" value="1" name="terms_of_use" />

                            <a href="{{url('terms-of-use')}}">{{__('I accept Terms of Use')}}</a>
                            <span class="help-block terms_of_use">
                            </span> 
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-10 text-center mx-auto mobile-padding-no {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            {!! app('captcha')->display() !!}
                            @if ($errors->has('g-recaptcha-response')) <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                        </div>

                        <input type="submit" class="btn" value="{{__('Register')}}">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="logup_em_success" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      
                     </div>
					
                    <div class="modal-body">
                     
                        <div class="thank-you-pop">
							<img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
							<h3>{{__('Sign Up Success')}}</h3>		
 						</div>
                    </div>
					
        </div>
    </div>
</div>
@push('styles')
<style>
    .invalid-feedback {
        display: none;
    }
    .invalid-feedback.has-error {
        display: block;
    }
    .form-control.has-error{
        border: 1px solid #dc3545 !important;
    }
    #logup_em_success.show {
        display: block;
        height: 100%;
    }
    .thank-you-pop{
	width:100%;
 	padding:20px;
	text-align:center;
}
.thank-you-pop img{
	width:76px;
	height:auto;
	margin:0 auto;
	display:block;
	margin-bottom:25px;
}

.thank-you-pop h1{
	font-size: 42px;
    margin-bottom: 25px;
	color:#5C5C5C;
}
.thank-you-pop p{
	font-size: 20px;
    margin-bottom: 27px;
 	color:#5C5C5C;
}
.thank-you-pop h3.cupon-pop{
	font-size: 25px;
    margin-bottom: 40px;
	color:#222;
	display:inline-block;
	text-align:center;
	padding:10px 20px;
	border:2px dashed #222;
	clear:both;
	font-weight:normal;
}
.thank-you-pop h3.cupon-pop span{
	color:#03A9F4;
}
.thank-you-pop a{
	display: inline-block;
    margin: 0 auto;
    padding: 9px 20px;
    color: #fff;
    text-transform: uppercase;
    font-size: 14px;
    background-color: #8BC34A;
    border-radius: 17px;
}
.thank-you-pop a i{
	margin-right:5px;
	color:#fff;
}
#logup_em_success .modal-header{
    border:0px;
}

</style>
@endpush


<script>
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
    $('#fromEmployerRegister').submit(function(event) {
        var passwordValue = $('#company_passId').val();
        var confirmPasswordValue = $('#company_comfirmId').val();

        var isValid = true;
        event.preventDefault()
        // Check each input field for emptiness
        $('#fromEmployerRegister input').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid');
              
            }
        });
        $("#fromEmployerRegister").find(":input").prop("disabled", false);
        if (!isValid) {
            event.preventDefault(); // Prevent the form from submitting
        }


        var email = $('#email').val();

        // Simple email validation using a regular expression
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (emailRegex.test(email)) {
            // Email is valid
            $('#email').removeClass('is-invalid');
            $('#email').addClass('is-valid');

        
        } else {
            // Email is invalid
        
            $('#email').removeClass('is-valid');
            $('#email').addClass('is-invalid');
            $('.email-error').text('{{__('The email must be a valid email address')}}')
        }


        if (passwordValue !== confirmPasswordValue) {
            event.preventDefault(); // Prevent form submission

            isValid=false
            // Display error message
            $('#company_comfirmId').addClass('is-invalid has-error');
            $('#company_comfirmId').next('.invalid-feedback').show();
        }

        $('#password_confirmation').on('input', function() {
        var passwordValue = $('#company_passId').val();
        var confirmPasswordValue = $(this).val();
        if (passwordValue == confirmPasswordValue) {
            isValid=true
            $(this).removeClass('is-invalid has-error');
            $(this).next('.invalid-feedback').hide();
        }
        });

        if (isValid) { 
            $.ajax({
            type: "POST",
            url:  '{{ route('company.register') }}',
            data: $(this).serialize(),
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    console.log(responseObject.error);
                if(responseObject.error) {
                    responseObject.error.forEach(err => {
                        $(`#fromEmployerRegister .invalid-feedback.${err.key}-error`).text(err.textError)
                        $(`#fromEmployerRegister .invalid-feedback.${err.key}-error`).addClass('has-error')
                        $(`#fromEmployerRegister input[name*='${err.key}']`).addClass('has-error')
                        
                        // $(`#fromEmployerRegister .invalid-feedback.${err.key}-error`).append(err.textError)
                     
                    }) 
                }
                },
                404: function(responseObject, textStatus, jqXHR) {
                    // No content found (404)
                    // This code will be executed if the server returns a 404 response
                },
                503: function(responseObject, textStatus, errorThrown) {
                    // Service Unavailable (503)
                    // This code will be executed if the server returns a 503 response
                }           
                }
                })
                .done(function(data){
                    $("#logup_em_success").addClass("show")
                    $("#employer_logup_Modal").css("display:none")
                    setTimeout(function() { 
                        $("#logup_em_success").removeClass("show")
                        window.location.href =  "/company-home";
                    }, 2000);    
                })
                .fail(function(jqXHR, textStatus){
                    
                })
                .always(function(jqXHR, textStatus) {
                
                });
                }
    });

    // Remove validation class on input change
    $('#fromEmployerRegister input').on('input', function() {
        $(this).removeClass('is-invalid');
        $(this).removeClass('has-error');
    });
    
    
});
    


</script>