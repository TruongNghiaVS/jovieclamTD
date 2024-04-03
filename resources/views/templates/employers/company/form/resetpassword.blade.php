<div class="modal fade" id="user_info" tabindex="-1" role="dialog" aria-labelledby="user_infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Account Information')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="changepassword_company_form" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="password">{{__('Reset Password')}}</label>
                        {!! Form::password('password', array('class'=>'form-control', 'id'=>'pwdId')) !!}
                        {!! APFrmErrHelp::showErrors($errors, 'password') !!}
                        <div class="invalid-feedback">{{__('Password is required')}}</div>
                    </div>
                    <div class="form-group">
                        <label for="cPwdId">{{__('Confirm Password')}}</label>
                        <input type="password" id="cPwdId" class="form-control pwds" placeholder="{{__('Confirm Password')}}"  required>
                        <div id="cPwdValid" class="valid-feedback">Valid</div>
                        <div id="cPwdInvalid" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <button id="account_submitBtn" type="button" class="btn btn-primary submit-button" disabled>{{__(('Update'))}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
      // Check if passwords match
      $('#user_info #pwdId, #user_info #cPwdId').on('keyup', function () {
        var pwd = $('#user_info #pwdId').val();
        var cPwd = $('#user_info #cPwdId').val();
        if (pwd != '' && cPwd != '' && pwd == cPwd && pwd.length >= 6 && pwd.length <= 15 && cPwd.length >= 6 && cPwd.length <= 15 ) {
          $("#account_submitBtn").attr("disabled",false);
          $('#cPwdValid').show();
          $('#cPwdInvalid').hide();
          $('#cPwdValid').html('').css('color', 'green');
          $('.pwds').removeClass('is-invalid')
        } else {
          $("#account_submitBtn").attr("disabled",true);
          $('#cPwdValid').hide();
          $('#cPwdInvalid').show();
          if (!(pwd.length >= 6 && pwd.length <= 15)) {
                $('#cPwdInvalid').html(`{{__(('Password must be 6-15 characters.'))}}`).css('color', 'red');
            } else {
                $('#cPwdInvalid').html(`Passwords do not match`).css('color', 'red');
            }
            $('.pwds').addClass('is-invalid');
          }
      });

     $('#account_submitBtn').on('click',()=>{
                if ($('#user_info #pwdId').val()) {
                    showSpinner();
                    // Simulating an AJAX POST request
                    $.ajax({
                        url:  `{{ route('update.company.updatePassword') }}`,
                        type: 'post',
                        beforeSend: showSpinner(),
                        data:  {
                            _token: '{{ csrf_token() }}',
                            password:$('#user_info #pwdId').val(),
                        },
                        success: function (response) {
                          hideSpinner();
                          if (response.sucess) {
                                $('#user_info').modal("hide");
                                showModal_Success('Thông báo', `${response.message ? response.message : "Đổi Mật Khẩu thành công"}`, ``);
                                setTimeout(function(){
                                    window.location.reload();
                                }, 1000);
                            }
                        },
                        error: function (xhr, status, error) {
                            // Handle error
                            hideSpinner();
                        }
                    });
                } else {
                
                }
  
    })
    });
</script>
@endpush

