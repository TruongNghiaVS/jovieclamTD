<div class="modal fade" id="company_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="wizard-title">{{__('Company Information')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" id="tab_company_info" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#infoPanel" role="tab">Công ty</a>
          <li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#ads" role="tab">Mô tả</a>
          <li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#placementPanel" role="tab">Địa chỉ</a>
          <li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#detail" role="tab">Chi tiết</a>
          <li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#review" role="tab">Review</a>
          <li>
        </ul>
        <div class="tab-content mt-2">
          <div class="tab-pane fade show active" id="infoPanel" role="tabpanel">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">{{__('Company Name')}}</label>
                  <em class="important">*</em>
                  <input type="text" class="form-control" required name="name" name_table="{{__('Company Name')}}" id="name" value="{{ isset($company->name) ? $company->name : old('name') }}" placeholder="{{__('Company Name')}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="ceo">{{__('CEO Name')}}</label>
                  <input type="text" class="form-control" id="ceo" name="ceo" name_table="{{__('CEO Name')}}" value="{{ isset($company->ceo) ? $company->ceo : old('ceo') }}" placeholder="{{__('CEO Name')}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Industry">{{__('Industry')}}</label>
                  <em class="important">*</em>
                  <select required class="form-control form-select" id="industry_id" name="industry_id" name_table="{{__('Industry')}}">
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
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Ownership">{{__('Ownership')}}</label>
                  {!! Form::select('ownership_type_id', ['' => __('Select Ownership type')]+$ownershipTypes, null, array('class'=>'form-control form-select', 'id'=>'ownership_type_id','name_table'=>__('Ownership')  )) !!}
                  {!! APFrmErrHelp::showErrors($errors, 'ownership_type_id') !!}
                </div>
              </div>
            </div>
            <button class="btn btn-secondary" id="infoContinue">Continue</button>
          </div>
          <div class="tab-pane fade" id="ads" role="tabpanel">
            <div class="col-md-12">
              <div class="form-group">
                <label for="Description">{{__('Description')}}</label>
                <em class="important">*</em>
                <textarea class="form-control" id="description" required name="description" name_table="{{__('Description')}}" rows="4">{{ isset($company->description) ? $company->description : old('description') }}</textarea>
              </div>
            </div>
            <button class="btn btn-secondary" id="adsContinue">Continue</button>
          </div>
          <div class="tab-pane fade" id="placementPanel" role="tabpanel">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Country">{{__('Country')}}</label>
                  <em class="important">*</em>
                  <select required class="form-control form-select" id="country_id" name="country_id" name_table="{{__('Country')}}">
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
              <div class="col-md-6">
                <div class="form-group">
                  <label for="State">{{__('State')}}</label>
                  <em class="important">*</em>
                  <span id="default_state_dd">
                    <select required class="form-control form-select" id="state_id" name="state_id" name_table="{{__('State')}}">
                      <option value="">{{ __('Select one') }}</option>
                    </select>
                  </span>
                  {!! APFrmErrHelp::showErrors($errors, 'state_id') !!}
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="City">{{__('City')}}</label>
                  <em class="important">*</em>
                  <span id="default_city_dd">
                    <select required class="form-control form-select" id="city_id" name="city_id" name_table="{{__('City')}}">
                      <option value="">{{ __('Select one') }}</option>
                    </select>
                  </span>
                  {!! APFrmErrHelp::showErrors($errors, 'city_id') !!}
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Address">{{__('Address')}}</label>
                  <em class="important">*</em>
                  <input type="text" class="form-control" required id="location" placeholder="{{__('Address')}}" name_table="{{__('Address')}}" name="location" value="{{ isset($company->location) ? $company->location : old('location') }}">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="Google_Map_Iframe">{{__('Google Map Iframe')}}</label>
                  <textarea class="form-control" id="map" name="map" name_table="{{__('Google Map Iframe')}}" rows="4">{{ isset($company->map) ? $company->map : old('map') }}</textarea>
                </div>
              </div>
            </div>
            <button class="btn btn-secondary" id="placementContinue">Continue</button>
          </div>
          <div class="tab-pane fade" id="detail" role="tabpanel">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="no-offices">{{__('No of Office')}}</label>
                  <em class="important">*</em>
                  <select required class="form-control form-select" id="no_of_offices" name="no_of_offices" name_table="{{__('No of Office')}}">
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
              <div class="col-md-6">
                <div class="form-group">
                  <label for="employee-number">{{__('No of Employees')}}</label>
                  <em class="important">*</em>
                  <select required class="form-control form-select" id="no_of_employees" name="no_of_employees" name_table="{{__('No of Employees')}}">
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
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Established_In">{{__('Established In')}}</label>
                  <em class="important">*</em>
                  <input type="text" class="form-control" id="established_in" name="established_in" name_table="{{__('Established In')}}" value="{{ isset($company->established_in) ? $company->established_in : old('established_in')}}" placeholder="Established In">
                </div>
              </div>
            </div>
            <button class="btn btn-secondary" id="detailContinue">Continue</button>
          </div>
          <div class="tab-pane fade" id="review" role="tabpanel">
            <h4>{{__('Review the form')}}</h4>  
            <div class="table-responsive" bis_skin_checked="1">
                    <table class="table table-responsive table-user-information"  id="dataTable">
                        <tbody>

                        </tbody>
                    </table>
                </div>


            <button class="btn btn-primary btn-block" id="activate">{{__('Submit')}}</button>
          </div>
        </div>

      </div>
     
    </div>
  </div>
</div>

@push('scripts')
<script type="text/javascript">
  $(function() {
    $('#modalToggle').click(function() {
      $('#company_info').modal({
        backdrop: 'static'
      });
    });

    $('#infoContinue').click(function(e) {
      e.preventDefault();
      $('.progress-bar').css('width', '40%');
      $('.progress-bar').html('Step 2 of 5');
      $('#tab_company_info a[href="#ads"]').tab('show');
    });

    $('#adsContinue').click(function(e) {
      e.preventDefault();
      $('.progress-bar').css('width', '60%');
      $('.progress-bar').html('Step 3 of 5');
      $('#tab_company_info a[href="#placementPanel"]').tab('show');
    });

    $('#placementContinue').click(function(e) {
      e.preventDefault();
      $('.progress-bar').css('width', '80%');
      $('.progress-bar').html('Step 4 of 5');
      $('#tab_company_info a[href="#detail"]').tab('show');
    });

    $('#detailContinue').click(function(e) {
      e.preventDefault();
      $('.progress-bar').css('width', '100%');
      $('.progress-bar').html('Step 5 of 5');
      $('#tab_company_info a[href="#reviewPanel"]').tab('show');
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
    });
      function updateTable() {
          // Initialize an empty array to store input values
          var inputValues = [];
          var formData = {};
          var tableData = {};
         
          // Iterate through input fields and select elements in the first two tab-panes
          $('#infoPanel, #ads, #placementPanel ,#detail').find('input, select,textarea').each(function() {
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
              console.log(value_submit,elementId);
              if(elementName && elementValue){
            
                tableData[elementName] = elementValue;
                formData[elementId] = value_submit;
              }
          });
  

        // Add rows to the table with the values
        for (var key in tableData) {
            var newRow = '<tr>';
            newRow += '<th colspan="4">' + key + '</th>';
            newRow += '<td>' + tableData[key] + '</td>';
            newRow += '</tr>';
            $('#dataTable tbody').append(newRow);
        }
        console.log(formData);
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
              success: function(response) {
                  // Handle success
              },
              error: function(xhr, status, error) {
                  // Handle error
              }
          });
        }

        
      }

  })


</script>
@endpush

