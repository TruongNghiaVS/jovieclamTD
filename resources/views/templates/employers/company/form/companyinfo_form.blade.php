<div class="modal fade" id="company_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="wizard-title">{{__('Company Information')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" id="tab_company_info" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#infoPanel" role="tab">Công Ty</a>
          <li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#ads" role="tab">Mô Tả</a>
          <li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#placementPanel" role="tab">Địa Chỉ</a>
          <li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#detail" role="tab">Chi Tiết</a>
          <li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#social" role="tab">Mạng Xã Hội</a>
          <li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#review" role="tab">Review</a>
          <li>
        </ul>
        <div class="tab-content mt-2">
          <div class="tab-pane fade show active" id="infoPanel" role="tabpanel">
                <div class="form-group row">
                  <div class="col-lg-3">
                    <label for="name">{{__('Company Name')}}</label>
                    <em class="important">*</em>

                  </div>

                  <div class="col-lg-9">
                    <input type="text" class="form-control  border-0 border-bottom" required name="name" name_table="{{__('Company Name')}}" id="name" value="{{ isset($company->name) ? $company->name : old('name') }}" placeholder="{{__('Company Name')}}">
                  </div>
                </div>


                <div class="form-group row">
                  <div class="col-lg-3">
                    <label for="ceo">{{__('CEO Name')}}</label>
                  </div>
                  <div class="col-lg-9">
                    
                    <input type="text" class="form-control border-0 border-bottom" id="ceo" name="ceo" name_table="{{__('CEO Name')}}" value="{{ isset($company->ceo) ? $company->ceo : old('ceo') }}" placeholder="{{__('CEO Name')}}">
                  </div>
                </div>
 
            
                <div class="form-group row">
                  <div class="col-lg-3">

                    <label for="Industry">{{__('Industry')}}</label>
                    <em class="important">*</em>
                  </div>


                  <div class="col-lg-9">
                    
                    
                    <select required class="form-control form-select border-0 border-bottom" id="industry_id" name="industry_id" name_table="{{__('Industry')}}">
                      <option value="">{{ __('Select one') }}</option>
                      @if(count($industries) > 0)
                      @foreach($industries as $key => $value)
                      <option {{ $company->industry_id == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                      @endforeach
                      @endif
                    </select>
                    {!! APFrmErrHelp::showErrors($errors, 'industry_id') !!}
                  </div>
                </div>
              
                <div class="form-group row">
                  <div class="col-lg-3">
                    <label for="Ownership">{{__('Ownership')}}</label>
                  </div>

                  <div class="col-lg-9">
                    {!! Form::select('ownership_type_id', ['' => __('Select Ownership type')]+$ownershipTypes, null, array('class'=>'form-control form-select border-0 border-bottom', 'id'=>'ownership_type_id','name_table'=>__('Ownership')  )) !!}
                    {!! APFrmErrHelp::showErrors($errors, 'ownership_type_id') !!}
                  </div>
                </div>
             
            
            <button class="btn btn-secondary" id="infoContinue">Tiếp Tục</button>
          </div>
          <div class="tab-pane fade" id="ads" role="tabpanel">
            
              <div class="form-group row">
                <div class="col-lg-3">
                  <label for="Description">{{__('Description')}}</label>
                  <em class="important">*</em>
                </div>
                <div class="col-lg-9">
                  <textarea class="form-control border-0 border-bottom" id="description_text" required name="description"  name_table="Mô Tả" rows="4">{{ isset($company->description) ? $company->description : old('description') }}</textarea>
                </div>
              </div>
            
            <button class="btn btn-secondary" id="adsContinue">Tiếp Tục</button>
          </div>
          <div class="tab-pane fade" id="placementPanel" role="tabpanel">
            
              
                <div class="form-group row">
                  <div class="col-lg-3">
                    <label for="Country">{{__('Country')}}</label>
                    <em class="important">*</em>
                  </div>
                  <div class="col-lg-9">
                    
                    <select required class="form-control form-select border-0 border-bottom" id="country_id" name="country_id" name_table="{{__('Country')}}">
                      <option value="">{{ __('Select one') }}</option>
                      @if(count($countries) > 0)
                      @foreach($countries as $key => $value)
                      <option {{ $company->country_id == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                      @endforeach
                      @endif
                    </select>
                    {!! APFrmErrHelp::showErrors($errors, 'country_id') !!}
                  </div>
             
                </div>
              
             
            
                 <div class="form-group row">
                                <div class="col-lg-3"> 
                                    <label for="citySelect">Chọn Thành Phố:</label>
                                </div>
                                <div class="col-lg-9"> 
                                    <select class="form-control border-0 border-bottom citySelect" name="province" name_table="Tỉnh / Thành Phố">
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
                                    <select class="form-control form-select border-0 border-bottom districtSelect" name="district" name_table="Quận / Huyện">
                                    <option value="">Chọn Quận/Huyện</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row wardGroup"  style="display:none;">
                                <div class="col-lg-3"> 
                                    <label for="wardSelect">Chọn Phường/Xã:</label>
                                </div>

                                <div class="col-lg-9"> 
                                    <select class="form-control form-select border-0 border-bottom wardSelect" name="reward" name_table="Phường / Xã">
                                    <option value="">Chọn Phường/Xã</option>
                                    </select>
                                </div>
                               
                            </div>

     
                <div class="form-group row">
                  <div class="col-lg-3">   
                    <label for="Address">{{__('Address')}}</label>
                    <em class="important">*</em>
                  </div>
                  <div class="col-lg-9">   
                    <input type="text" class="form-control border-0 border-bottom" required id="location" placeholder="{{__('Address')}}" name_table="{{__('Address')}}" name="location" value="{{ isset($company->location) ? $company->location : old('location') }}">
                  </div>
                </div>
             
             
                <div class="form-group row">
                  <div class="col-lg-3">   
                    <label for="Google_Map_Iframe">{{__('Google Map Iframe')}}</label>

                  </div>

                  <div class="col-lg-9">   
                
                    <textarea class="form-control border-0 border-bottom" id="map" name="map" name_table="{{__('Google Map Iframe')}}" rows="4">{{ isset($company->map) ? $company->map : old('map') }}</textarea>
                  </div>
                  
                </div>
            
            
            <button class="btn btn-secondary" id="placementContinue">Tiếp Tục</button>
          </div>
          <div class="tab-pane fade" id="detail" role="tabpanel">    
            <div class="form-group row">
              <div class="col-lg-3">
                <label for="no-offices">{{__('No of Office')}}</label>
                <em class="important">*</em>
              </div>
              <div class="col-lg-9">
                <select required class="form-control form-select border-0 border-bottom" id="no_of_offices" name="no_of_offices" name_table="{{__('No of Office')}}">
                  <option value="">{{ __('Select one') }}</option>
                  @if(count(MiscHelper::getNumOffices()) > 0)
                  @foreach(MiscHelper::getNumOffices() as $key => $value)
                  <option {{ $company->no_of_offices == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                  @endif
                </select>
                {!! APFrmErrHelp::showErrors($errors, 'no_of_offices') !!}
              </div>
              </div>  
          

              <div class="form-group row">
                <div class="col-lg-3">
                  <label for="employee-number">{{__('No of Employees')}}</label>
                  <em class="important">*</em>
                </div>
                <div class="col-lg-9">   
                  <select required class="form-control form-select border-0 border-bottom" id="no_of_employees" name="no_of_employees" name_table="{{__('No of Employees')}}">
                    <option value="">{{ __('Select one') }}</option>
                    @if(count(MiscHelper::getNumEmployees()) > 0)
                    @foreach(MiscHelper::getNumEmployees() as $key => $value)
                    <option {{ $company->no_of_employees == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                    @endif
                  </select>
                  {!! APFrmErrHelp::showErrors($errors, 'no_of_employees') !!}
                </div>
              </div>
            
            
              <div class="form-group row">
                <div class="col-lg-3">   
                  <label for="Established_In">{{__('Established In')}}</label>
                  <em class="important">*</em>
                </div>
                <div class="col-lg-9">     
                  <input type="text" class="form-control border-0 border-bottom" id="established_in" name="established_in" name_table="{{__('Established In')}}" value="{{ isset($company->established_in) ? $company->established_in : old('established_in')}}" placeholder="{{__('Established In')}}">
                </div>
              </div>
              
           
            <button class="btn btn-secondary" id="detailContinue">Tiếp Tục</button>
          </div>
          <div class="tab-pane fade" id="social" role="tabpanel">
            <div class="form-group row">
                <div class="col-lg-3">
                  <label for="Website_URL">Trang Web</label>
                  <em class="important">*</em>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control border-0 border-bottom" required id="website"  value="{{ isset($company->website) ? $company->website : old('website')}}" placeholder="Trang Web"
                  name="website" name_table="Website"
                  >
                </div>

            </div>

            <div class="form-group row">
                <div class="col-lg-3">
                  <label for="Fax">{{__('Fax')}}</label>
                </div>
                <div class="col-lg-9">
                
                  <input type="text" class="form-control border-0 border-bottom" id="fax" placeholder="{{__('Fax')}}"  value="{{ isset($company->fax) ? $company->fax : old('fax')}}"
                  name="fax" name_table="Fax"
                  >
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-3">
                <label for="Phone_number">{{__('Mobile Number')}}</label>
                <em class="important">*</em>
                </div>
                <div class="col-lg-9">
                
                <input type="text" class="form-control border-0 border-bottom" required id="phone"  value="{{ isset($company->phone) ? $company->phone : old('phone')}}" placeholder="{{__('Phone number')}}"
                name="phone" name_table="Số điện thoại"
                >
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-3">
                  <label for="Facebook">Facebook</label>
                </div>
                <div class="col-lg-9">

                  <input type="text" class="form-control border-0 border-bottom" id="facebook"  value="{{ isset($company->facebook) ? $company->facebook : old('facebook')}}" placeholder="Facebook"
                  name="facebook" name_table="Facebook"
                  >
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-3">
                  <label for="Twitter">Twitter</label>
                </div>
                <div class="col-lg-9">

                <input type="text" class="form-control border-0 border-bottom" id="twitter"  value="{{ isset($company->twitter) ? $company->twitter : old('twitter')}}" placeholder="Twitter"
                name="twitter" name_table="Twitter"
                
                >
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-3">
                  <label for="LinkedIn">LinkedIn</label>
                </div>
                <div class="col-lg-9">

                  <input type="text" class="form-control border-0 border-bottom" id="linkedin"  value="{{ isset($company->linkedin) ? $company->linkedin : old('linkedin')}}" placeholder="LinkedIn"
                  name="linkedin" name_table="LinkedIn"
                  >
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-3">
                  <label for="Google_Plus">Google Plus</label>
                </div>
                <div class="col-lg-9">

                  <input type="text" class="form-control border-0 border-bottom" id="google_plus" name="google_plus" value="{{ isset($company->google_plus) ? $company->google_plus : old('google_plus')}}" placeholder="Google Plus"
                  name="google_plus" name_table="Google Plus"
                  
                  >
                </div>
            </div>

           <button class="btn btn-secondary" id="socialContinue">Tiếp Tục</button>
          </div>
          <div class="tab-pane fade" id="review" role="tabpanel">
            <h4>{{__('Review the form')}} </h4>  
            <div class="table-responsive" bis_skin_checked="1">
                    <table class="table table-responsive table-user-information"  id="dataTable">
                        <tbody>

                        </tbody>
                    </table>
                </div>


            <button class="btn btn-primary w-100" type="button" id="submit_company_info">Cập Nhật</button>
          </div>
        </div>

      </div>
     
    </div>
  </div>
</div>

<!--Company-Info Start -->
<div id="company-info-tip" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-primary">Cập Nhật Thông Tin Công Ty</h4>
      </div>
      <div class="modal-body">
        <p>Vui lòng cập nhật các thông tin của công ty để tăng độ tin cậy.</p>
      </div>
    </div>

  </div>
</div>
<!--Company-Info End -->


<!--Company Contact Start -->
<div id="company-contact-tip" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-primary">Cập Nhật Thông Tin Liên Hệ</h4>
      </div>
      <div class="modal-body">
        <p>Vui lòng cập nhật các thông tin liên hệ của công ty để tăng độ tin cậy.</p>
        <p>Việc cập nhật các thông tin liên hệ giúp người dùng có thể liên kết với công ty dễ hơn.</p>

      </div>
    </div>

  </div>
</div>
<!--Company Contact End -->

@push('styles')
<style>

  #dataTable .tb-value {
    min-width: 100px;
  }
  
  
</style>
@endpush

@push('scripts')
<script type="text/javascript">
  // Main function to handle changes in city and district selects
  $(document).ready(function() {
    
    $('.citySelect').change(function() {
      var selectedCityCode = $(this).val();
      var districtGroup = $(this).closest('#placementPanel').find('.districtGroup');
      var wardGroup = $(this).closest('#placementPanel').find('.wardGroup');
      
      if (selectedCityCode) {
        populateDistricts(selectedCityCode, districtGroup);
      } else {
        districtGroup.hide();
        wardGroup.hide();
        updateLocationField('', '', ''); // Clear location field
       
      }
    });

    $(document).on('change', '.districtSelect', function() {
      var selectedDistrictCode = $(this).val();
      var wardGroup = $(this).closest('#placementPanel').find('.wardGroup');
      if (selectedDistrictCode) {
        populateWards(selectedDistrictCode, wardGroup);
      } else {
        wardGroup.hide();
        updateLocationField('', '', ''); // Clear location field
       
      }
    });
   
  

  });


  $(function() {
    $('#modalToggle').click(function() {
      $('#company_info').modal({
        backdrop: 'static'
      });
    });

    $('#infoContinue').click(function(e) {
      e.preventDefault();
      $('.progress-bar').css('width', '20%');
      $('.progress-bar').html('Step 2 of 5');
      $('#tab_company_info a[href="#ads"]').tab('show');
    });

    $('#adsContinue').click(function(e) {
      e.preventDefault();
      $('.progress-bar').css('width', '40%');
      $('.progress-bar').html('Step 3 of 5');
      $('#tab_company_info a[href="#placementPanel"]').tab('show');
    });

    $('#placementContinue').click(function(e) {
      e.preventDefault();
      $('.progress-bar').css('width', '60%');
      $('.progress-bar').html('Step 4 of 5');
      $('#tab_company_info a[href="#detail"]').tab('show');
    });

  
    $('#detailContinue').click(function(e) {
      e.preventDefault();
      $('.progress-bar').css('width', '100%');
      $('.progress-bar').html('Step 5 of 5');
      $('#tab_company_info a[href="#social"]').tab('show');
    });


    $('#socialContinue').click(function(e) {
      e.preventDefault();
      $('.progress-bar').css('width', '100%');
      $('.progress-bar').html('Step 5 of 5');
      $('#tab_company_info a[href="#review"]').tab('show');
    });

    $(document).ready(function() {
        // Handle tab change event
        $('#tab_company_info').on('click', 'a[data-toggle="tab"]', function(e) {
      
            // Get the target tab-pane
            var targetTab = $($(this).attr("href"));
        
            // If the target tab-pane is the last one, update the table
            if (targetTab.is('#review')) {
                
                updateTable();
            }
        });


        $('#socialContinue').on('click', function(e) {
          updateTable();
        });
    });
      function updateTable() {
          // Initialize an empty array to store input values
          var inputValues = [];
          var formData = {};
          var tableData = {};
         
          $('#dataTable tbody').empty()
          // Iterate through input fields and select elements in the first two tab-panes
          $('#infoPanel, #ads, #placementPanel ,#detail , #social').find('input, select ,textarea').each(function() {
            var elementName = $(this).attr('name_table');
    
            var elementValue,value_submit;
            var elementId = $(this).attr('id');
            value_submit =  $(this).val();
 
              if ($(this).is('select')) {
                elementValue = $(this).find('option:selected').text();
              } else {
                  // For other elements, get the value directly
                  elementValue = $(this).val();
              }
              
              if(elementName && elementValue){
            
                tableData[elementName] = elementValue;
                formData[elementId] = value_submit;
              }

              formData.description = $('#description_text').val();
          });
          
          formData.city_id = $("#city_id").val();

        // Add rows to the table with the values
        for (var key in tableData) {
            var newRow = '<tr>';
            newRow += '<th class="tb-value" colspan="4">' + key + '</th>';
            newRow += '<td>' + tableData[key] + '</td>';
            newRow += '</tr>';
            $('#dataTable tbody').append(newRow);
        }

   
        if(!formData){
          $("#submit_company_info").attr("disabled", true);
        }
        
        
        $("#submit_company_info").click(()=>{
          
          if(formData){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                url: `{{ route('update.company.profile') }}`,
                type: 'post',
                data: formData,
                beforeSend:showSpinner(),
                success: function(response) {
           
                    hideSpinner();
                    if (response) {
                    
                        $('#company_info').modal("hide");
                        showModal_Success('Thông báo', `Cập nhật Thông Tin Công Ty thành công`, ``);
                        setTimeout(function(){
                              window.location.reload();
                        }, 1000);
                    }
                },
                error: function(xhr, status, error) {
                  hideSpinner();

                    // Handle error
                },
                complete: function() {
                    // Hide spinner after the request is complete
                    hideSpinner();
                }
            });
          }
        })

        
      }

  })
</script>
@endpush




