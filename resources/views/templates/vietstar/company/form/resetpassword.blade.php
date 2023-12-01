<div class="modal fade" id="user_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Account Information')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myForm1" class="needs-validation" novalidate>
                    
                    <div class="form-group">
                        <label for="CEO_Name">{{__('Password')}}</label>
                        <input type="password" id="pwdId" class="form-control pwds"  required>
                        
                        <div class="invalid-feedback">{{__('Password is required')}}</div>
                    </div>
                    <div class="form-group">
                        <label for="CEO_Name">{{__('Confirm Password')}}</label>
                        <input type="password" id="cPwdId" class="form-control pwds"  required>
                        <div id="cPwdValid" class="valid-feedback">Valid</div>
                        <div id="cPwdInvalid" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <button id="reset_submitBtn" type="button" class="btn btn-primary submit-button" disabled>Submit</button>
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
          $('#cPwdValid').html('Valid').css('color', 'green');
          $('.pwds').removeClass('is-invalid')
        } else {
          $("#reset_submitBtn").attr("disabled",true);
          $('#cPwdValid').hide();
          $('#cPwdInvalid').show();
          $('#cPwdInvalid').html('Not Matching').css('color', 'red');
          $('.pwds').addClass('is-invalid')
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
          console.log(12314);
                if ($('#pwdId').val()) {
                    // Simulating an AJAX POST request
                    $.ajax({
                        url:  `{{ route('update.company.updatePassword') }}`,
                        type: 'post',
                        data:  {
                            _token: '{{ csrf_token() }}',
                            password:$('#pwdId').val(),
                        },
                    
                        success: function (response) {
                            if(response){
                                location.reload();
                                
                            }
                        },
                        error: function (xhr, status, error) {
                            // Handle error
                            console.error('Error uploading avatar:', error);
                        }
                    });
                } else {
                    alert('Please select an image before uploading.');
                }
  
    })
    


</script>
@endpush

