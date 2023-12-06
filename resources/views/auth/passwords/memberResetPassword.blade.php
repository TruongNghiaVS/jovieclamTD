@extends('templates.employers.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->
<div class="reset-password-section cb-section">
    <div class="container mt-5">
        <div class="cb-title cb-title-center" bis_skin_checked="1">
            <h2> Thay đổi mật khẩu</h2>
        </div>
        <!-- <form id="passwordForm" novalidate>
        <div class="form-group">
            <label for="newPassword">New Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="newPassword" placeholder="Enter New Password" required>
                <div class="input-group-append">
                    <button class="btn" type="button" id="showNewPassword">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
                <div class="invalid-feedback">
                    Passwords must match.
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
                <div class="input-group-append">
                    <button class="btn" type="button" id="showConfirmPassword">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="showPasswords">
            <label class="form-check-label" for="showPasswords">Show Passwords</label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form> -->
        <div class="box-shadown" bis_skin_checked="1">
            <div class="row" bis_skin_checked="1">
                    <div class="main-form d-flex justify-content-center" bis_skin_checked="1">
                        <div class="form-reset-password " bis_skin_checked="1">
                            <form id="passwordForm" novalidate>
                                <div class="form-group">
                                    <label for="newPassword">{{__('New Password')}}</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="newPassword" placeholder="{{__('Enter New Password')}}" required>
                                        <div class="input-group-append">
                                            <button class="btn" type="button" id="showNewPassword">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="invalid-feedback">
                                                    
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="confirmPassword">{{__('Confirm Password')}}</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="confirmPassword" placeholder="{{__('Confirm Password')}}" required>
                                        <div class="input-group-append">
                                            <button class="btn" type="button" id="showConfirmPassword">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="invalid-feedback password-invalid-feedback">
                                            Passwords must match.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check mb-3">
                                    
                                    <label class="form-check-label" for="showPasswords">{{__(('Show Password'))}}</label>
                                   
                                </div>
                                <input type="text" class="form-control" id="forgotpassword" style="display: none;" required value="{{$resetPassword}}">
                                
                                <button type="button" id="passwordForm_btn" class="btn btn-primary w-100">{{__(('Submit'))}}</button>
                            </form>
                            <div class="need-help my-4" bis_skin_checked="1">
                                <p>Nếu cần giúp đỡ, hãy liên hệ với chúng tôi
                                    <a href="mailto:info@jobvieclam.com" style="color: rgb(17, 85, 204)" target="_blank">info@jobvieclam.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@include('templates.vietstar.includes.footer')
@endsection
@push('styles')
<style>
    .reset-password-section .form-reset-password {
         
            border: 1px solid #3333;
            min-height: 400px;
            border-radius: 10px;
            padding: 45px 50px;
    }

    .input-group-append {
        position: absolute;
        right: 0;
        z-index: 5;
    }
</style>
@endpush

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#showNewPassword').click(function() {
            togglePasswordVisibility('newPassword');
        });

        $('#showConfirmPassword').click(function() {
            togglePasswordVisibility('confirmPassword');
        });

        $('#showPasswords').change(function() {
            var isShow = $(this).is(':checked');
            $('#newPassword #confirmPassword').attr('type', isShow ? 'text' : 'password');
        });
        var ismatch =  false;
        var isvalid = false

        function togglePasswordVisibility(inputId) {
            var input = $('#' + inputId);
            var type = input.attr('type') === 'password' ? 'text' : 'password';
            input.attr('type', type);
        }

        $('#passwordForm_btn').click(function(event) {
            var newPassword = $('#newPassword').val();
            var confirmPassword = $('#confirmPassword').val();

            // Check password length
            if (newPassword.length < 6 || newPassword.length > 15) {
                $('#newPassword').addClass('is-invalid');
                $('.invalid-feedback').text(`{{__(('Password must be 6-15 characters.'))}}`);
                isvalid = false
                event.preventDefault();
            } else {
                isvalid = true
                $('#newPassword').removeClass('is-invalid');
            }


            // Check if passwords match
            if (newPassword !== confirmPassword) {
                $('#confirmPassword').addClass('is-invalid');
                $('.invalid-feedback').text(`{{__(('Passwords must match'))}}`);
                ismatch = false
                event.preventDefault();
            } else {
                ismatch =true
                $('#confirmPassword').removeClass('is-invalid');
            }
        
            var key =  $('#forgotpassword').val();
            key = JSON.parse(key);
            
            if(ismatch && isvalid && key){
                $.ajax({
            type: "POST",
            url:  `{{ route('member.ChangePassword') }}`,
            data: {
                password:$('#newPassword').val() ?$('#newPassword').val() :"",
                code:key.code ? key.code :"",
            },
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    console.log(responseObject.error);
        
                },
                400: function(responseObject, textStatus, jqXHR) {
                    // No content found (400)
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
                   
                        window.location.href = "{{route('company.login')}}";
                })
                .fail(function(jqXHR, textStatus){
                    
                })
                .always(function(jqXHR, textStatus) {
                
                });

            }
        });
    });
</script>
@endpush