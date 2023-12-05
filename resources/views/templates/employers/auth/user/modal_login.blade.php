<!-- Modal -->
<div class="modal fade" id="employer_login_Modal" tabindex="-1" role="dialog" aria-labelledby="employer_login_ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div id="employers" class="formpanel tab-pane" >
                    <h3>{{__('Employers')}} / {{__('Login')}}</h3>
                    <form id="employers_login" class="form-horizontal needs-validation" novalidate>
                        {{ csrf_field() }}
                        <input type="hidden" name="candidate_or_employer" value="employer" />
                        <div class="formpanel">
                            <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
                                <div class="invalid-feedback email-error">
                                    {{__('Email is required')}}
                                </div>
                            </div>
                            <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" value="" required placeholder="{{__('Password')}}">
                                <div class="invalid-feedback password-error">
                                    {{__('Password is required')}}
                                </div>
                            </div>
                            <div class="forgot-password-btn">
                                <a href="{{ route('company.password.request') }}">{{__('Forgot Your Password')}}?</a>
                            </div>
                            <input type="submit" class="btn" value="{{__('Login')}}">
                        </div>

                        <div class="text-center ml-1" style="margin: 15px 0;">
                            <span>
                                Hoặc đăng nhập bằng
                            </span>
                        </div>
                        <!-- login form  end-->
                    </form>
                    <div class="socialLogin">
                        <a href="{{ url('login/jobseeker/facebook')}}" class="fb">
                            <i class="fab fa-facebook-f"></i>
                            <span>Facebook</span>
                        </a>
                        <a href="{{ url('login/jobseeker/google')}}" class="gp"><i class="fab fa-google"></i>
                            <span>Google</span>
                        </a>
                        {{--<a href="{{ url('login/jobseeker/twitter')}}" class="tw"><i class="fab fa-twitter"></i> <span>Twitter</span></a>--}}
                    </div>
                    <!-- sign up form -->
                    <div class="newuser">{{__('New User')}}?
                        <a href="#" data-toggle="modal" data-target="#employer_logup_Modal" data-dismiss="modal" aria-label="Close">{{__('Register Here')}}</a>
                    </div>
                    <!-- sign up form end-->
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="login_em_success" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        
                     </div>
					
                    <div class="modal-body">
                     
                        <div class="thank-you-pop">
							<img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
							<h3>{{__('Sign In Success')}}</h3>		
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
    .invalid-feedback.has-error{
        display: block;
        margin: 10px;
        color: red;
    }
    .form-control.has-error{
        border: 1px solid #dc3545 !important;
    }
    #login_em_success.show {
        display: block;
        height: 100%;
    }
    .thank-you-pop{
	width:100%;
 	padding:20px;
	
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
#login_em_success .modal-header{
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
    $('#employers_login').submit(function(event) {
        var isValid = true;
        event.preventDefault()
        
        // Check each input field for emptiness
        $('#employers_login input').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid');
              
            }
        });

        $("#employers_login").find(":input").prop("disabled", false);


        var email = $('#employers_login #email').val();
        console.log(email);

        // Simple email validation using a regular expression
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (emailRegex.test(email)) {
            // Email is valid
            $('#employers_login #email').removeClass('is-invalid');
            $('#employers_login #email').addClass('is-valid');
            isValid = true;
           
        } else {
            // Email is invalid
            isValid = false;
            $(' #employers_login #email').removeClass('is-valid');
            $('#employers_login #email').addClass('is-invalid');
            $('#employers_login .email-error').text('{{__('The email must be a valid email address')}}')
        }


        isValid = this.checkValidity();


        if (!isValid) {
            event.preventDefault(); // Prevent the form from submitting
        }
        if (isValid) { 
            $.ajax({
            type: "POST",
            url:  '{{ route('company.login') }}',
            data: $(this).serialize(),
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    console.log(responseObject.error);
        
                },
                401: function(responseObject, textStatus, jqXHR) {
                    // No content found (404)
                    console.log(responseObject.responseJSON);
                    responseObject.responseJSON.error.forEach(err => {
                        console.log(err);
                        $(`#employers_login .invalid-feedback.${err.key}-error`).text(err.textError)
                        $(`#employers_login .invalid-feedback.${err.key}-error`).addClass('has-error')
                        $(`#employers_login input[name*='${err.key}']`).addClass('has-error')
                    })
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
                    $("#employer_login_Modal").css("display:none");
                    $("#employer_login_Modal").removeClass("show");
                    window.location.href =  "/company-home";
                })
                .fail(function(jqXHR, textStatus){
                    
                })
                .always(function(jqXHR, textStatus) {
                
                });
        }
    });

    // Remove validation class on input change
    $('#employers_login input').on('input', function() {
        $(this).removeClass('is-invalid');
    });
});

</script>
