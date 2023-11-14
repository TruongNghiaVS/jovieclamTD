<div class="section-head">
    <div class="section-head__figure">
        <div class="figure__image" ><img src="https://icons.veryicon.com/png/o/system/alongthink/ico-user-info.png" alt=""></div>
        <div class="figure__caption">
            <h5 class="">{{__('Account Information')}}</h5>
            <div class="status complete" bis_skin_checked="1">
                <p>Hoàn thành</p>
            </div>
        </div>
    </div>
    <div class="section-head__right-action" bis_skin_checked="1">
        <div class="right-action__tips" bis_skin_checked="1">
            <i class="bi bi-lightbulb"></i>
            <p>Tips</p>
        </div>
        <div class="right-action__link-edit" ><a data-toggle="modal" data-target="#changepassword"><i class="bi bi-pen"></i>Đổi mật khẩu</a></div>
        <div class="right-action__link-edit-mobile"><a data-toggle="modal" data-target="#changepassword"><i class="bi bi-pen"></i></a></div>
    </div>
</div>


<div class="section-body">
    <!-- <div class="row">
        <div class="col-md-6">
            <div class="formrow {!! APFrmErrHelp::hasError($errors, 'email') !!}">
                <label for="">{{__('Email')}}</label>
                {!! Form::text('email', null, array('class'=>'form-control', 'id'=>'email', 'placeholder'=>__('Email'))) !!}
                {!! APFrmErrHelp::showErrors($errors, 'email') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="formrow {!! APFrmErrHelp::hasError($errors, 'password') !!}">
                <label for="">{{__('Password')}}</label>
                {!! Form::password('password', array('class'=>'form-control', 'id'=>'password',
                'placeholder'=>__('Password'))) !!}
                {!! APFrmErrHelp::showErrors($errors, 'password') !!}
            </div>
        </div>
    </div> -->
    <div class="table-responsive">
              <table class="table table-responsive table-user-information">
                <tbody>
                  <tr>
                    <td class="table_title">
                      <strong>
                        <i class="bi bi-envelope"></i> {{__('Email')}}
                      </strong>
                    </td>
                    <td class="text-primary table_value">
                        {!! Form::text('email', null, array('class'=>'', 'id'=>'email', 'placeholder'=>__('Email'))) !!}
                        {!! APFrmErrHelp::showErrors($errors, 'email') !!}
                    </td>
                  </tr>
                  <tr>
                     <td  class="table_title">
                      <strong>
                      <i class="bi bi-lock"></i> Password
                      </strong>
                    </td>
                    <td class="text-primary table_value">
                        <!-- <i class="toggle-password fa fa-fw fa-eye-slash"></i> -->
                    </td>
                  </tr>
                </tbody>
              </table>
    </div>
</div>



<div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="changepasswordLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Account Information')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myFormpassword" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="password">{{__('Reset Password')}}</label>
                        {!! Form::password('password', array('class'=>'form-control', 'id'=>'pwdId',
                        'placeholder'=>__('Password'))) !!}
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
                        <button id="account_submitBtn" type="submit" class="btn btn-primary submit-button" disabled>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@push('scripts')
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
      // Check if passwords match
      $('#pwdId, #cPwdId').on('keyup', function () {
        if ($('#pwdId').val() != '' && $('#cPwdId').val() != '' && $('#pwdId').val() == $('#cPwdId').val()) {
          $("#account_submitBtn").attr("disabled",false);
          $('#cPwdValid').show();
          $('#cPwdInvalid').hide();
          $('#cPwdValid').html('Valid').css('color', 'green');
          $('.pwds').removeClass('is-invalid')
        } else {
          $("#account_submitBtn").attr("disabled",true);
          $('#cPwdValid').hide();
          $('#cPwdInvalid').show();
          $('#cPwdInvalid').html('Not Matching').css('color', 'red');
          $('.pwds').addClass('is-invalid')
          }
      });
      let currForm1 = document.getElementById('myFormpassword');
        // Validate on submit:
        if(currForm1){
          currForm1.addEventListener('submit', function(event) {
            if (currForm1.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            currForm1.classList.add('was-validated');
          }, false);
          // Validate on input:
          currForm1.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener(('input'), () => {
              if (input.checkValidity()) {
                input.classList.remove('is-invalid')
                input.classList.add('is-valid');
              } else {
                input.classList.remove('is-valid')
                input.classList.add('is-invalid');
              }
              var is_valid = $('.form-control').length === $('.form-control.is-valid').length;
              $("#account_submitBtn").attr("disabled", !is_valid);
            });
          });
        }
      });
</script>
@endpush

@endpush