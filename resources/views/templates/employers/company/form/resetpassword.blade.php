<div class="modal fade" id="user_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đổi Mật Khẩu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myForm1" class="needs-validation" novalidate>
                   
                    <div class="form-group">
                        <label for="CEO_Name">Mật khẩu mới</label>
                        <input type="password" id="pwdId" class="form-control pwds"  required>
                        
                        <div class="invalid-feedback">Nhập mật khẩu</div>
                    </div>
                    <div class="form-group">
                        <label for="CEO_Name">Nhập lại mật khẩu mới</label>
                        <input type="password" id="cPwdId" class="form-control pwds"  required>
                        <div id="cPwdValid" class="valid-feedback"></div>
                        <div id="cPwdInvalid" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <button id="reset_submitBtn" type="button" class="btn btn-primary submit-button" disabled>Gửi</button>
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
      $('#pwdId, #cPwdId').on('keyup', function () {
        if ($('#pwdId').val() != '' && $('#cPwdId').val() != '' && $('#pwdId').val() == $('#cPwdId').val()) {
          $("#reset_submitBtn").attr("disabled",false);
          $('#cPwdValid').show();
          $('#cPwdInvalid').hide();
          $('#cPwdValid').html().css('color', 'green');
          $('.pwds').removeClass('is-invalid')
        } else {
          $("#reset_submitBtn").attr("disabled",true);
          $('#cPwdValid').hide();
          $('#cPwdInvalid').show();
          $('#cPwdInvalid').html('Không khớp mật khẩu').css('color', 'red');
       
          }
      });
      let currForm1 = document.getElementById('myForm1');
        // Validate on submit:
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
            $("#reset_submitBtn").attr("disabled", !is_valid);
          });
        });
      });


      $('#reset_submitBtn').on('click',()=>{
          if ($('#pwdId').val()) {
          
                    // Simulating an AJAX POST request
                    $.ajax({
                        url:  `{{ route('update.company.updatePassword') }}`,
                        type: 'post',
                        beforeSend: showSpinner(),
                        data:  {
                            _token: '{{ csrf_token() }}',
                            password:$('#pwdId').val(),
                        },
                    
                        success: function (response) {
                          hideSpinner();
                          
                            if (response.sucess) {
                              $("#user_info").modal("hide");
                              showModal_Success('Thông báo', `${response.message ? response.message : "Đổi Mật Khẩu thành công"}`, ``);
                              setTimeout(function(){
                                  window.location.reload();
                              }, 3000);
                       
                            }
                        },
                        error: function (xhr, status, error) {
                            // Handle error
                            hideSpinner();

                            console.error('Error uploading avatar:', error);
                        },
                        complete: function() {
                    // Hide spinner after the request is complete
                            hideSpinner();
                        }
                    });
                } else {
                    alert('Please select an image before uploading.');
                }
  
    })
    


</script>
@endpush

