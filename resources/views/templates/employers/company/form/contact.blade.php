<div class="modal fade" id="contact_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('Contact Company')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="contact_info_edit" class="needs-validation" novalidate>
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="form-group">
                <label for="Website_URL">Website URL</label>
                <em class="important">*</em>
                <input type="text" class="form-control" required id="website" name="website" value="{{ isset($company->website) ? $company->website : old('website')}}" placeholder="Website URL">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="form-group">
                <label for="Fax">{{__('Fax')}}</label>
                <input type="text" class="form-control" id="fax" placeholder="{{__('Fax')}}" name="fax" value="{{ isset($company->fax) ? $company->fax : old('fax')}}">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="form-group">
                <label for="Phone_number">{{__('Phone number')}}</label>
                <em class="important">*</em>
                <input type="text" class="form-control" required id="phone" name="phone" value="{{ isset($company->phone) ? $company->phone : old('phone')}}" placeholder="{{__('Phone number')}}">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="form-group">
                <label for="Facebook">Facebook</label>
                <input type="text" class="form-control" id="facebook" name="facebook" value="{{ isset($company->facebook) ? $company->facebook : old('facebook')}}" placeholder="Facebook">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="form-group">
                <label for="Twitter">Twitter</label>
                <input type="text" class="form-control" id="twitter" name="twitter" value="{{ isset($company->twitter) ? $company->twitter : old('twitter')}}" placeholder="Twitter">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="form-group">
                <label for="LinkedIn">LinkedIn</label>
                <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ isset($company->linkedin) ? $company->linkedin : old('linkedin')}}" placeholder="LinkedIn">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="form-group">
                <label for="Google_Plus">Google Plus</label>
                <input type="text" class="form-control" id="google_plus" name="google_plus" value="{{ isset($company->google_plus) ? $company->google_plus : old('google_plus')}}" placeholder="Google Plus">
              </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12">
              <button class="btn btn-primary w-100" type="submit">{{__('Submit')}}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


@push('scripts')
<script type="text/javascript">
   $(document).ready(function() {
    $('#contact_info_edit').submit(function(event) {
        event.preventDefault();
        var formDataArray = $('#contact_info_edit').serializeArray();
        var formDataObject = {};

            $.each(formDataArray, function (i, field) {
                    formDataObject[field.name] = field.value;
            });
      

            console.log(formDataObject);
            $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
            });
            $.ajax({
                url: '{{url('/')}}/update-company-info-contact', // Replace with your server endpoint
                type: 'POST',
                data: {"_token": "{{ csrf_token() }}", ...formDataObject},

                success: function(response) {
                    // Handle successful response
                    if(response){
                        $('#contact_info').modal("hide");
                        showModal_Success('Cập nhật thông tin liên hệ', `Cập nhật thông tin liên hệ thành công`, ``);
                        setTimeout(function(){
                              window.location.reload();
                        }, 3000);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    alert(' failed: ' + error); // Example: You can show an error message
                }
            });
  

      
    });
});

</script>
@endpush