
<form id="changepassword_company_form" class="needs-validation" novalidate>
    <div class="form-group row w-50">
        <div class="col-lg-4">  
            <label for="password">{{__('Reset Password')}}</label>
        </div>

        <div class="col-lg-8">  

            {!! Form::password('password', array('class'=>'form-control border-0 border-bottom cursor-pointer', 'id'=>'pwdId')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'password') !!}
            <div class="invalid-feedback">{{__('Password is required')}}</div>
        </div>
    </div>
    <div class="form-group row w-50">
        <div class="col-lg-4">
            <label for="cPwdId">{{__('Confirm Password')}}</label>
        </div>

        <div class="col-lg-8">
            <input type="password" id="cPwdId" class="form-control border-0 border-bottom cursor-pointer pwds" placeholder="{{__('Confirm Password')}}"  required>
            <div id="cPwdValid" class="valid-feedback">Valid</div>
            <div id="cPwdInvalid" class="invalid-feedback"></div>
        </div>
    </div>
    <div class="form-group  row w-50">
        <div class="col-lg-12">
            <button id="account_submitBtn" type="button" class="btn btn-primary submit-button" disabled>{{__(('Update'))}}</button>
        </div>
    </div>
</form>





@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
      // Check if passwords match
      $(' #pwdId,  #cPwdId').on('keyup', function () {
        var pwd = $(' #pwdId').val();
        var cPwd = $(' #cPwdId').val();
        console.log(pwd,cPwd);
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
                if ($(' #pwdId').val()) {
                    showSpinner();
                    // Simulating an AJAX POST request
                    $.ajax({
                        url:  `{{ route('update.company.updatePassword') }}`,
                        type: 'post',
                        beforeSend: showSpinner(),
                        data:  {
                            _token: '{{ csrf_token() }}',
                            password:$(' #pwdId').val(),
                        },
                        success: function (response) {
                          hideSpinner();
                          if (response.sucess) {
                            
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

