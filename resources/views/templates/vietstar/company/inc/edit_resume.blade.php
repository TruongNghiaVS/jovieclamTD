<!-- Main content -->
<section class="main-content my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Main -->
                <!-- Bio -->
                @if($edit == true){
                    <form action="{{ route('company.resume.update', $resume->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                } @else{
                    <form action="{{ route('company.resume.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                }
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-edit-profile mb-3 w-100 shadow-sm">
                            <div class="card-body">
                                <form action="">
                                    <div class="section-infomation company-image">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4">
                                                <label for="">{{__('Company Logo')}}</label>
                                                <div class="logo-company">
                                                    <img scr="">
                                                </div>
                                                {!! APFrmErrHelp::showErrors($errors, 'logo') !!}
                                                <button class="btn btn-primary" type="button">{{__('Select Logo')}}</button>
                                            </div>
                                            <div class="col-md-8 col-lg-4">
                                                <div class="form-group">
                                                    <label for="full_name">{{__('Full Name')}}</label>
                                                    <input type="text" class="form-control" id="full_name"
                                                           placeholder="{{__('Full Name')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-4">
                                                <div class="form-group">
                                                    <label for="job_title">{{__('Job Title')}}</label>
                                                    <input type="text" class="form-control" id="job_title"
                                                           placeholder="{{__('Job Title')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section-infomation account-infomation">
                                        <h3 class="title">{{__('Account Information')}}</h3>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Company_Name">Email</label>
                                                    <input type="text" class="form-control" id="Company_Name"
                                                           placeholder="{{__('Company Name')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="CEO_Name">{{__('Password')}}</label>
                                                    <input type="password" class="form-control" id="Password"
                                                           placeholder="{{__('Password')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section-infomation company-infomation">
                                        <h3 class="title">{{__('Company Information')}}</h3>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Company_Name">{{__('Company Name')}}</label>
                                                    <input type="text" class="form-control" id="Company_Name"
                                                           placeholder="{{__('Company Name')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="CEO_Name">{{__('CEO Name')}}</label>
                                                    <input type="text" class="form-control" id="CEO_Name"
                                                           placeholder="{{__('CEO Name')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Industry">{{__('Industry')}}</label>
                                                    {!! Form::select('industry_id', ['' => __('Select one')]+$industries, null, array('class'=>'form-control form-select', 'id'=>'industry_id')) !!}
                                                    {!! APFrmErrHelp::showErrors($errors, 'industry_id') !!}

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Ownership">{{__('Ownership')}}</label>
                                                    {!! Form::select('ownership_type_id', ['' => __('Select Ownership type')]+$ownershipTypes, null, array('class'=>'form-control form-select', 'id'=>'ownership_type_id')) !!}
                                                    {!! APFrmErrHelp::showErrors($errors, 'ownership_type_id') !!}
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Description">{{__('Description')}}</label>
                                                    <textarea class="form-control" id="description" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Country">{{__('Country')}}</label>
                                                    <label>{{__('Country')}}</label>
                                                    {!! Form::select('country_id', ['' => __('Select one')]+$countries, old('country_id', (isset($company))? $company->country_id:$siteSetting->default_country_id), array('class'=>'form-control form-select', 'id'=>'country_id')) !!}
                                                    {!! APFrmErrHelp::showErrors($errors, 'country_id') !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="State">{{__('State')}}</label>
                                                    {!! Form::select('state_id', ['' => __('Select one')], null, array('class'=>'form-control form-select', 'id'=>'state_id')) !!} </span> {!! APFrmErrHelp::showErrors($errors, 'state_id') !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="City">{{__('City')}}</label>
                                                    {!! Form::select('city_id', ['' => __('Select one')], null, array('class'=>'form-control form-select', 'id'=>'city_id')) !!} </span> {!! APFrmErrHelp::showErrors($errors, 'city_id') !!}
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Address">{{__('Address')}}</label>
                                                    <input type="text" class="form-control" id="Address" placeholder="{{__('Address')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Google_Map_Iframe">{{__('Google Map Iframe')}}</label>
                                                    <textarea class="form-control" id="Google_Map_Iframe" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="no-offices">{{__('No of Office')}}</label>
                                                    {!! Form::select('no_of_offices', ['' => __('Select num. of offices')]+MiscHelper::getNumOffices(), null, array('class'=>'form-control form-select', 'id'=>'no_of_offices')) !!}
                                                    {!! APFrmErrHelp::showErrors($errors, 'no_of_offices') !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="employee-number">{{__('No of Employees')}}</label>
                                                    {!! Form::select('no_of_employees', ['' => __('Select num. of employees')]+MiscHelper::getNumEmployees(), null, array('class'=>'form-control form-select', 'id'=>'no_of_employees')) !!}
                                                    {!! APFrmErrHelp::showErrors($errors, 'no_of_employees') !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Established_In">{{__('Established In')}}</label>
                                                    <input type="text" class="form-control" id="Established_In"
                                                           placeholder="Established In">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Website_URL">Trang Web</label>
                                                    <input type="text" class="form-control" id="Website_URL"
                                                           placeholder="Trang Web">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Fax">{{__('Fax')}}</label>
                                                    <input type="text" class="form-control" id="Fax" placeholder="{{__('Fax')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Phone_number">{{__('Phone number')}}</label>
                                                    <input type="text" class="form-control" id="Phone_number"
                                                           placeholder="{{__('Phone number')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Facebook">Facebook</label>
                                                    <input type="text" class="form-control" id="Facebook"
                                                           placeholder="Facebook">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Twitter">Twitter</label>
                                                    <input type="text" class="form-control" id="Twitter" placeholder="Twitter">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="LinkedIn">LinkedIn</label>
                                                    <input type="text" class="form-control" id="LinkedIn"
                                                           placeholder="LinkedIn">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Google_Plus">Google Plus</label>
                                                    <input type="text" class="form-control" id="Google_Plus"
                                                           placeholder="Google Plus">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="Subscribe">
                                                    <label class="form-check-label" for="Subscribe">
                                                        {{__('Subscribe to news letter')}}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn btn-primary" type="submit">{{__('Update Profile and Save')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style type="text/css">
    .datepicker>div {
        display: block;
    }
</style>
@endpush
@push('scripts')
@include('templates.employers.includes.tinyMCEFront') 
<script type="text/javascript">
    $(document).ready(function () {
        $('#country_id').on('change', function (e) {
            e.preventDefault();
            filterLangStates(0);
        });
        $(document).on('change', '#state_id', function (e) {
            e.preventDefault();
            filterLangCities(0);
        });
        filterLangStates(<?php echo old('state_id', (isset($company)) ? $company->state_id : 0); ?>);

        /*******************************/
        var fileInput = document.getElementById("logo");
        fileInput.addEventListener("change", function (e) {
            var files = this.files
            showThumbnail(files)
        }, false)
    });

    function showThumbnail(files) {
        $('#thumbnail').html('');
        for (var i = 0; i < files.length; i++) {
            var file = files[i]
            var imageType = /image.*/
            if (!file.type.match(imageType)) {
                console.log("Not an Image");
                continue;
            }
            var reader = new FileReader()
            reader.onload = (function (theFile) {
                return function (e) {
                    $('#thumbnail').append('<div class="fileattached"><img height="100px" src="' + e.target.result + '" > <div>' + theFile.name + '</div><div class="clearfix"></div></div>');
                };
            }(file))
            var ret = reader.readAsDataURL(file);
        }
    }


    function filterLangStates(state_id)
    {
        var country_id = $('#country_id').val();
        if (country_id != '') {
            $.post("{{ route('filter.lang.states.dropdown') }}", {country_id: country_id, state_id: state_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#default_state_dd').html(response);
                        filterLangCities(<?php echo old('city_id', (isset($company)) ? $company->city_id : 0); ?>);
                    });
        }
    }
    function filterLangCities(city_id)
    {
        var state_id = $('#state_id').val();
        if (state_id != '') {
            $.post("{{ route('filter.lang.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#default_city_dd').html(response);
                    });
        }
    }
</script> 
@endpush
