<div class="modal fade" id="contact_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">{{__('Contact Company')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="contact_info_edit" class="needs-validation" novalidate>
           
              <div class="form-group row">
                <div class="col-lg-3">
                  <label for="Website_URL">Họ và Tên</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control  border-0 border-bottom"  id="fullname" name="fullname" value="Mr.Chiến" placeholder="Họ và Tên">
                </div>
              </div>
            
            
              <div class="form-group row">
                <div class="col-lg-3">
                  <label for="Fax">Chức Vụ</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control  border-0 border-bottom" id="position" placeholder="Chức Vụ" name="position" value="Manager">
                </div>
              </div>
            

              <div class="form-group row">
                <div class="col-lg-3">

                  <label for="email">Email</label>
                </div>
                <div class="col-lg-9">
                  <input type="email" class="form-control  border-0 border-bottom" id="email" name="email" value="	povav27298@fesgrid.com" placeholder="Email">
                </div>
  
              </div>
            
              <div class="form-group row">
                <div class="col-lg-3">
                <label for="Phone_number">{{__('Mobile Number')}}</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control  border-0 border-bottom"  id="phone" name="phone" value="+8428317269171" placeholder="{{__('Mobile Number')}}">
                </div>

              </div>
            

              <div class="form-group row">
                                <div class="col-lg-3"> 
                                    <label for="citySelect">Chọn Thành Phố:</label>
                                </div>
                                <div class="col-lg-9"> 
                                    <select class="form-control border-0 border-bottom citySelect" >
                                    <option value="">Chọn Thành Phố</option>
                                    <option value="79">Thành phố Hồ Chí Minh</option>
                                    <option value="01">Thành phố Hà Nội</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row districtGroup"  style="display:none;">
                                <div class="col-lg-3"> 
                                    <label for="districtSelect">Chọn Quận/Huyện:</label>
                                </div>

                                <div class="col-lg-9"> 
                                    <select class="form-control form-select border-0 border-bottom districtSelect" >
                                    <option value="">Chọn Quận/Huyện</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row wardGroup"  style="display:none;">
                                <div class="col-lg-3"> 
                                    <label for="wardSelect">Chọn Phường/Xã:</label>
                                </div>

                                <div class="col-lg-9"> 
                                    <select class="form-control form-select border-0 border-bottom wardSelect" >
                                    <option value="">Chọn Phường/Xã</option>
                                    </select>
                                </div>
                               
                            </div>
            
              
            
            
              <div class="form-group row">
                <div class="col-lg-3">
                  <label for="Location">Địa Chỉ</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control  border-0 border-bottom" id="location" name="location" value="139I-J Lý Chính Thắng, Võ Thị Sáu, Quận 3, Thành phố Hồ Chí Minh, Việt Nam" placeholder="Địa Chỉ">
                </div>
              </div>

            <div class="col-sm-12 col-md-12 col-lg-12">
              <button class="btn btn-primary w-100" type="submit">{{__('Update')}}</button>
            </div>
          
        </form>
      </div>
    </div>
  </div>
</div>


@push('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#contact_info .citySelect').change(function() {
      var selectedCityCode = $(this).val();
      var districtGroup = $(this).closest('#contact_info form').find('.districtGroup');
      var wardGroup = $(this).closest('#contact_info form').find('.wardGroup');
     
      if (selectedCityCode) {
        populateDistricts(selectedCityCode, districtGroup);
      } else {
        districtGroup.hide();
        wardGroup.hide();
      }
    });

    $(document).on('change', '.districtSelect', function() {
      var selectedDistrictCode = $(this).val();
      var wardGroup = $(this).closest('form').find('.wardGroup');
      if (selectedDistrictCode) {
        populateWards(selectedDistrictCode, wardGroup);
      } else {
        wardGroup.hide();
      }
    });
  });
   $(document).ready(function() {
    $('#contact_info_edit').submit(function(event) {
        event.preventDefault();
        var formDataArray = $('#contact_info_edit').serializeArray();
        var formDataObject = {};

            $.each(formDataArray, function (i, field) {
                    formDataObject[field.name] = field.value;
            });
      

            showSpinner();
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
                    hideSpinner();
                    // Handle successful response
                    if(response){
                        $('#contact_info').modal("hide");
                        showModal_Success('Thông báo', `Cập nhật thông tin liên hệ thành công`, ``);
                        setTimeout(function(){
                              window.location.reload();
                        }, 1000);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    alert(' failed: ' + error); // Example: You can show an error message
                },
                complete: function() {
                    // Hide spinner after the request is complete
                    hideSpinner();
                }
            });
  

      
    });
});

</script>
@endpush