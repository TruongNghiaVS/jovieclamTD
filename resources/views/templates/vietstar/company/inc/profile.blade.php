<!-- Main content -->

@push('styles')
<style type="text/css">
    .datepicker>div {
        display: block;
    }

    label.btn.btn-primary {
        width: 100%;
    }

    .section-infomation.company-image .cover-photo img {
        border-radius: 8px;
    }

    .password_box {
        position: relative;
    }

    span.fa.fa-fw.field-icon.toggle-password.fa-eye {
        margin-right: 14px;
        position: absolute;
        z-index: 2;
        top: 37%;
        right: 0;
    }

    span.fa.fa-fw.field-icon.toggle-password.fa-eye-slash {
        margin-right: 14px;
        position: absolute;
        z-index: 2;
        top: 37%;
        right: 0;
    }

    .important {
        color: #ff0000 !important;
        font-weight: normal;
        margin-left: 0px;
        padding: 0;
    }



    select:invalid[multiple] {
        margin-top: 15px !important;
    }

    div#industry_id_chosen {
        width: 100% !important;
    }

    div#country_id_chosen {
        width: 100% !important;
    }

    div#state_id_chosen {
        width: 100% !important;
    }

    div#city_id_chosen {
        width: 100% !important;
    }

    div#no_of_offices_chosen {
        width: 100% !important;
    }

    div#no_of_employees_chosen {
        width: 100% !important;
    }


    .table_value div {
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    a.uploadImage_btn {
        position: absolute;
        bottom: 3px;
        right: 3px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid #d2d6de;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all .2s ease-in-out;
        z-index: 5;
    }

    a.uploadImage_btn i {
        color: #6c7eb7;
        font-size: 20px;
    }
    .pic.img-thumnail {
     

        position: relative;
    }
    .img-thumnail .img-thumnail__wrapper {
       
        overflow: hidden;
       
    }
    .text-decoration {
        text-decoration: underline;
    }





</style>
@endpush
<!-- <section class="main-content my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {!! Form::model($company, array('method' => 'put', 'route' => array('update.company.profile'), 'class' => 'form', 'files'=>true)) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-edit-profile mb-3 w-100 shadow-sm">
                            <div class="card-body">
                                <form action="">
                                    <div class="section-infomation company-image">
                                        <div class="row">
                                            <div class="col-md-5 col-lg-4">
                                                <label for="">{{__('Company Logo')}}</label>
                                                <div class="logo-company" id="logo">
                                                    {{ ImgUploader::print_image("company_logos/$company->logo", 100, 100) }}
                                                </div>
                                                {!! APFrmErrHelp::showErrors($errors, 'logo') !!}
                                                {{-- <button class="btn btn-primary" type="button">{{__('Select Logo')}}</button> --}}
                                                <div class="formrow">
            
                                                    <label class="btn btn-primary"> {{__('Select Logo')}}
                                                        <input type="file" name="logo" id="image" style="display: none;">
                                                    </label>
                                                    {!! APFrmErrHelp::showErrors($errors, 'image') !!} 
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-lg-8">
                                                <label for="">{{__('Company Cover')}}</label>
                                                <div class="cover-photo" id="thumbnail_logo">
                                                    {{ ImgUploader::print_image("company_logos/$company->cover_logo", 300, 120) }}
                                                </div>
                                                {{-- <button class="btn btn-primary" type="button">{{__('Select Cover Image')}}</button> --}}
                                                <div class="formrow">
            
                                                    <label class="btn btn-primary"> {{__('Select Cover Image')}}
                                                        <input type="file" name="cover_logo" id="cover_image" style="display: none;">
                                                    </label>
                                                    {!! APFrmErrHelp::showErrors($errors, 'cover_image') !!} 
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
                                                    <input type="text" class="form-control" name="email" disabled id="Company_Name" value="{{ old('email') ? old('email') : $company->email }}"
                                                           placeholder="{{__('Company Email')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" id="show_hide_password">
                                                    <label for="CEO_Name">{{__('Password')}}</label>
                                                    <input type="password" class="form-control" id="password-field"
                                                           placeholder="{{__('Password')}}">
                                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
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
                                                    <em class="important">*</em>
                                                    <input type="text" class="form-control" required name="name" id="Company_Name" value="{{ isset($company->name) ? $company->name : old('name') }}"
                                                           placeholder="{{__('Company Name')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="CEO_Name">{{__('CEO Name')}}</label>
                                                    <input type="text" class="form-control" id="CEO_Name" name="ceo" value="{{ isset($company->ceo) ? $company->ceo : old('ceo') }}"
                                                           placeholder="{{__('CEO Name')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Industry">{{__('Industry')}}</label>
                                                    <em class="important">*</em>
                                                    <select required class="form-control form-select chosen" id="industry_id" name="industry_id">
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
                                                    {!! Form::select('ownership_type_id', ['' => __('Select Ownership type')]+$ownershipTypes, null, array('class'=>'form-control form-select', 'id'=>'ownership_type_id')) !!}
                                                    {!! APFrmErrHelp::showErrors($errors, 'ownership_type_id') !!}
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Description">{{__('Description')}}</label>
                                                    <em class="important">*</em>
                                                    <textarea class="form-control" id="description" required name="description" rows="4">{{ isset($company->description) ? $company->description : old('description') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Country">{{__('Country')}}</label>
                                                    <em class="important">*</em>
                                                    <select required class="form-control form-select chosen" id="country_id" name="country_id">
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
                                                        <select required class="form-control form-select chosen" id="state_id" name="state_id">
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
                                                        <select required class="form-control form-select chosen" id="city_id" name="city_id">
                                                            <option value="">{{ __('Select one') }}</option>
                                                        </select>
                                                    </span>
                                                    {!! APFrmErrHelp::showErrors($errors, 'city_id') !!}
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Address">{{__('Address')}}</label>
                                                    <em class="important">*</em>
                                                    <input type="text" class="form-control" required id="Address" placeholder="{{__('Address')}}" name="location" value="{{ isset($company->location) ? $company->location : old('location') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Google_Map_Iframe">{{__('Google Map Iframe')}}</label>
                                                    <textarea class="form-control" id="Google_Map_Iframe" name="map" rows="4">{{ isset($company->map) ? $company->map : old('map') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="no-offices">{{__('No of Office')}}</label>
                                                    <em class="important">*</em>
                                                    <select required class="form-control form-select chosen" id="no_of_offices" name="no_of_offices">
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
                                                    <select required class="form-control form-select chosen" id="no_of_employees" name="no_of_employees">
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
                                                    <input type="text" class="form-control" id="Established_In" name="established_in" value="{{ isset($company->established_in) ? $company->established_in : old('established_in')}}"
                                                           placeholder="Established In">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Website_URL">Trang Web</label>
                                                    <em class="important">*</em>
                                                    <input type="text" class="form-control" required id="Website_URL" name="website" value="{{ isset($company->website) ? $company->website : old('website')}}"
                                                           placeholder="Trang Web">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Fax">{{__('Fax')}}</label>
                                                    <input type="text" class="form-control" id="Fax" placeholder="{{__('Fax')}}" name="fax" value="{{ isset($company->fax) ? $company->fax : old('fax')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Phone_number">{{__('Phone number')}}</label>
                                                    <em class="important">*</em>
                                                    <input type="text" class="form-control" required id="Phone_number" name="phone" value="{{ isset($company->phone) ? $company->phone : old('phone')}}"
                                                           placeholder="{{__('Phone number')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Facebook">Facebook</label>
                                                    <input type="text" class="form-control" id="Facebook" name="facebook" value="{{ isset($company->facebook) ? $company->facebook : old('facebook')}}"
                                                           placeholder="Facebook">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Twitter">Twitter</label>
                                                    <input type="text" class="form-control" id="Twitter" name="twitter" value="{{ isset($company->twitter) ? $company->twitter : old('twitter')}}"
                                                         placeholder="Twitter">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="LinkedIn">LinkedIn</label>
                                                    <input type="text" class="form-control" id="LinkedIn" name="linkedin" value="{{ isset($company->linkedin) ? $company->linkedin : old('linkedin')}}"
                                                           placeholder="LinkedIn">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Google_Plus">Google Plus</label>
                                                    <input type="text" class="form-control" id="Google_Plus" name="google_plus" value="{{ isset($company->google_plus) ? $company->google_plus : old('google_plus')}}"
                                                           placeholder="Google Plus">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" {{ ($company->is_subscribed != null) ? 'checked' : '' }} name="is_subscribed" id="Subscribe">
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
</section> -->
{!! Form::model($company, array('method' => 'put', 'route' => array('update.company.profile'), 'class' => 'form form-user-profile', 'files'=>true)) !!}
<form action="">
    <div class="user-account-section">
        <div class="formpanel mt0">
            <div class="section-head">
                <h1 class="title-form">Chỉnh sửa thông tin tài khoản</h1>
            </div>

            <div class="section-body">
           
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 d-flex flex-column justify-content-center align-items-center">
                        <h6>Logo</h6>
                        
                        <div class="formrow formrow-photo">
                            <div id="thumbnail">
                                <div class="pic img-avatar">
                                    <div class="img-avatar__wrapper">
                                        {{$company->printCompanyImage()}}
                                    </div>
                                    <input type="file" name="image" id="company_fileInput" style="display: none;">

                                    <a class="uploadImage_btn" href="javascript:void(0);" onclick="$('#company_fileInput').click()"><i class="bi bi-camera-fill"></i></a>
                                    {!! APFrmErrHelp::showErrors($errors, 'image') !!}
                                    {!! APFrmErrHelp::showErrors($errors, 'image') !!}
                                </div>
                            </div>
                        
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-4 d-flex flex-column justify-content-center align-items-center">
                        <div class="formrow formrow-photo">
                        <h6>Hình nền</h6>
                            <div id="thumbnail">
                                <div class="pic img-thumnail">
                                    <div class="img-thumnail__wrapper">
                                    {{ ImgUploader::print_image("company_logos/$company->cover_logo") }}
                                    </div>
                                    <input type="file" name="image" id="company_thumnail_input" style="display: none;">

                                    <a class="uploadImage_btn" href="javascript:void(0);" onclick="$('#company_thumnail_input').click()"><i class="bi bi-camera-fill"></i></a>
                                    {!! APFrmErrHelp::showErrors($errors, 'image') !!}
                                    {!! APFrmErrHelp::showErrors($errors, 'image') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4 d-flex flex-column justify-content-start align-items-center">
                        <a class="cursor-pointer text-decoration text-secondary" data-toggle="modal" data-target="#user_info" href="#">Đổi mật khẩu <i class="bi bi-lock-fill"></i></a>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    
    <div class="user-account-section">
        <div class="formpanel mt0">
            <div class="section-head">
                <div class="section-head__figure">
                    <div class="figure__image"><img src="https://icons.veryicon.com/png/o/system/alongthink/ico-user-info.png" alt=""></div>
                    <div class="figure__caption">

                        <h5 class="">{{__('Company Information')}}</h5>
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
                    <div class="right-action__link-edit"><a id="modalToggle" data-toggle="modal" data-target="#company_info" href="#"><i class="bi bi-pen"></i>Chỉnh sửa</a></div>
                    <div class="right-action__link-edit-mobile"><a id="modalToggle" data-toggle="modal" data-target="#company_info" href="#"><i class="bi bi-pen"></i></a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="table-responsive">
                    <table class="table table-responsive table-user-information">
                        <tbody>
                            <tr>
                                <td class="table_title">
                                    <strong>
                                        {{__('Company Name')}}
                                    </strong>
                                </td>
                                <td class="table_value">
                                    {{ isset($company->name) ? $company->name : old('name') }}
                                </td>
                            </tr>

                            <tr>
                                <td class="table_title">
                                    <strong>
                                        {{__('CEO Name')}}
                                    </strong>
                                </td>
                                <td class="table_value">
                                    {{ isset($company->ceo) ? $company->ceo : old('ceo') }}
                                </td>
                            </tr>

                      
                            <tr>
                                <td class="table_title">
                                    <strong>
                                        {{__('Industry')}}
                                    </strong>
                                </td>
                                <td class="table_value">
                                    {{ !empty($company->industry)?$company->industry->industry : '' }}
                                </td>
                            </tr>


                            <tr>
                                <td class="table_title">
                                    <strong>
                                        {{__('Ownership')}}
                                    </strong>
                                </td>
                                <td class="table_value">
                                    {{ !empty($company->ownershipTypes)?$company->ownershipTypes->ownershipTypes : 'TNHH' }}
                                </td>
                            </tr>


                            <tr>
                                <td class="table_title">
                                    <strong>
                                        {{__('Description')}}
                                    </strong>
                                </td>
                                <td class="table_value">
                                    {!! $company->description !!}
                                </td>
                            </tr>


                            <tr>
                                <td class="table_title">
                                    <strong>
                                        {{__('Country')}}
                                    </strong>
                                </td>
                                <td class="table_value">



                                    @foreach ($countries as $key => $countrie)
                                    @if($key == $company->country_id)
                                    {{$countrie}}
                                    @endif
                                    @endforeach
                                </td>
                            </tr>



                            <tr>
                                <td class="table_title">
                                    <strong>
                                        {{__('Address')}}
                                    </strong>
                                </td>
                                <td class="table_value">
                                    {{ isset($company->location) ? $company->location : old('location') }}
                                </td>
                            </tr>

                            <tr>
                                <td class="table_title">
                                    <strong>
                                        {{__('No of Office')}}
                                    </strong>
                                </td>
                                <td class="table_value">
                                {{ isset($company->no_of_offices) ? $company->no_of_offices : old('no_of_offices') }}

                                </td>
                            </tr>

                            <tr>
                                <td class="table_title">
                                    <strong>
                                        {{__('No of Employees')}}
                                    </strong>
                                </td>
                                <td class="table_value">
                                {{ isset($company->no_of_employees) ? $company->no_of_employees : old('no_of_employees') }}
                                </td>
                            </tr>


                            <tr>
                                <td class="table_title">
                                    <strong>
                                        {{__('Established In')}}
                                    </strong>
                                </td>
                                <td class="table_value">
                                    {{ isset($company->established_in) ? $company->established_in : old('established_in')}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h6>Map</h6>
                    <div class="gmap">
                        {!!$company->map!!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="user-account-section">
        <div class="formpanel mt0">
            <div class="section-head">
                <div class="section-head__figure">
                    <div class="figure__image"><img src="https://icons.veryicon.com/png/o/system/alongthink/ico-user-info.png" alt=""></div>
                    <div class="figure__caption">

                        <h5 class="">Thông tin liên hệ</h5>
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
                    <div class="right-action__link-edit"><a id="modalToggle" data-toggle="modal" data-target="#contact_info" href="#"><i class="bi bi-pen"></i>Chỉnh sửa</a></div>
                    <div class="right-action__link-edit-mobile"><a id="modalToggle" data-toggle="modal" data-target="#contact_info" href="#"><i class="bi bi-pen"></i></a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="table-responsive">
                    <table class="table table-responsive table-user-information">
                        <tbody>
                            <tr>
                                <td class="table_title">
                                    <strong>
                                        <i class="fa fa-globe"></i> Trang Web
                                    </strong>
                                </td>
                                <td class="table_value">
                                    <a href="{{ isset($company->website) ? $company->website : old('website')}}">
                                        {{ $company->website ? $company->website : old('website')}}
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="table_title">
                                    <strong>
                                    <i class="fa-solid fa-fax"></i> {{__('Fax')}}
                                    </strong>
                                </td>
                                <td class="table_value">
                                    {{ isset($company->fax) ? $company->fax : old('fax')}}
                                </td>
                            </tr>

                            <tr>
                                <td class="table_title">
                                    <strong>
                                        <i class="bi bi-telephone"></i> {{__('Mobile Number')}}
                                    </strong>
                                </td>
                                <td class="table_value">
                                    {{ isset($company->phone) ? $company->phone : old('phone')}}
                                </td>
                            </tr>

                            <tr>
                                <td class="table_title">
                                    <strong>
                                        <i class="bi bi-facebook"></i> Facebook
                                    </strong>
                                </td>
                                <td class="table_value">
                                    <a href="{{ isset($company->facebook) ? $company->facebook : old('facebook')}}">{{ isset($company->facebook) ? $company->facebook : old('facebook')}}</a>
                                </td>
                            </tr>


                            <tr>
                                <td class="table_title">
                                    <strong>
                                        <i class="bi bi-twitter"></i> Twitter
                                    </strong>
                                </td>
                                <td class="table_value">
                                    <a href="{{ isset($company->twitter) ? $company->twitter : old('twitter')}}">{{ isset($company->twitter) ? $company->twitter : old('twitter')}}</a>
                                </td>
                            </tr>



                            <tr>
                                <td class="table_title">
                                    <strong>
                                        <i class="bi bi-linkedin"></i> LinkedIn
                                    </strong>
                                </td>
                                <td class="table_value">
                                    <a href="{{ isset($company->linkedin) ? $company->linkedin : old('linkedin')}}">{{ isset($company->linkedin) ? $company->linkedin : old('linkedin')}}</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="table_title">
                                    <strong>
                                        <i class="bi bi-google"></i> Google Plus
                                    </strong>
                                </td>
                                <td class="table_value">
                                    <a href="{{ isset($company->google_plus) ? $company->google_plus : old('google_plus')}}">{{ isset($company->google_plus) ? $company->google_plus : old('google_plus')}}</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</form>

@include('templates.employers.company.form.resetpassword')

@include('templates.employers.company.form.companyinfo_form')

@include('templates.employers.company.form.contact')


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
@include('templates.vietstar.includes.tinyMCEFront')
<script type="text/javascript">
    function readURLAvatar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.img-avatar img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            var formData = new FormData();
            var avatarFile = $('#company_fileInput')[0].files[0];

            console.log(avatarFile);
            if (avatarFile) {
                formData.append('logo', avatarFile);

                // Simulating an AJAX POST request

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({
                    url: `{{route('update.company.avatar')}}`,
                    type: 'POST',
                    data: formData,
                    beforeSend:showSpinner(),
                    contentType: false,
                    processData: false,

                    success: function(response) {
                        // Handle success response
                        hideSpinner();
                        if(response){
                            showModal_Success('Thông báo', `Cập nhật avatar thành công`, ``);
                            
                            setTimeout(function(){
                                window.location.reload();
                            }, 3000);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        hideSpinner();

                        console.error('Error uploading avatar:', error);
                    }
                });
            } else {
                hideSpinner();
                alert('Please select an image before uploading.');
            }

        }
    }

    $('#company_fileInput').change(function() {
        readURLAvatar(this);
    });



    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.img-thumnail img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            var formData = new FormData();
            var avatarFile = $('#company_thumnail_input')[0].files[0];

            console.log(avatarFile);
            if (avatarFile) {
                formData.append('cover_logo', avatarFile);

                // Simulating an AJAX POST request

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({
                    url: `{{route('update.company.avatar')}}`,
                    type: 'POST',
                    data: formData,
                    beforeSend:showSpinner(),
                    contentType: false,
                    processData: false,

                    success: function(response) {
                        // Handle success response
                        hideSpinner();
                        if(response){
                        showModal_Success('Thông báo', `Cập nhật background thành công`, ``);
                            setTimeout(function(){
                                window.location.reload();
                            }, 3000);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        hideSpinner();
                        console.error('Error uploading avatar:', error);
                    }
                });
            } else {
                alert('Please select an image before uploading.');
            }

        }
    }

    $('#company_thumnail_input').change(function() {
        readURL(this);
    });

    function removeAvatar() {
        $('.pic .img-avatar img').attr('src', 'https://cdn-icons-png.flaticon.com/512/149/149071.png');
        $('#fileInput').val('');
    }

    // js chosen dropdown select
    $(".chosen").chosen();

    // function filterDefaultStates(state_id) {
    //     var country_id = $('#country_id').val();
    //     if (country_id != '') {
    //         $.post("{{ route('filter.default.states.dropdown') }}", {
    //                 country_id: country_id,
    //                 state_id: state_id,
    //                 _method: 'POST',
    //                 _token: '{{ csrf_token() }}'
    //             })
    //             .done(function(response) {
    //                 $('#default_state_dd').html(response);
    //                 filterDefaultCities(<?php echo old('city_id', (isset($company)) ? $company->city_id : 0); ?>);
    //             });
    //     }
    // }

    // function filterDefaultCities(city_id) {
    //     var state_id = $('#state_id').val();
    //     if (state_id != '') {
    //         $.post("{{ route('filter.default.cities.dropdown') }}", {
    //                 state_id: state_id,
    //                 city_id: city_id,
    //                 _method: 'POST',
    //                 _token: '{{ csrf_token() }}'
    //             })
    //             .done(function(response) {
    //                 $('#default_city_dd').html(response);
    //             });
    //     }
    // }

    // $(document).ready(function() {
    //     $('#country_id').on('change', function(e) {
    //         e.preventDefault();
    //         filterDefaultStates(0);
    //     });
    //     $(document).on('change', '#state_id', function(e) {
    //         e.preventDefault();
    //         filterDefaultCities(0);
    //     });
    //     filterDefaultStates(<?php echo old('state_id', (isset($company)) ? $company->state_id : 0); ?>);

    //     $(".toggle-password").click(function() {

    //         $(this).toggleClass("fa-eye fa-eye-slash");
    //         var input = $($(this).attr("toggle"));
    //         if (input.attr("type") == "password") {
    //             input.attr("type", "text");
    //         } else {
    //             input.attr("type", "password");
    //         }
    //     });

    //     $('#country_id').on('change', function(e) {
    //         e.preventDefault();
    //         filterLangStates(0);
    //     });
    //     $(document).on('change', '#state_id', function(e) {
    //         e.preventDefault();
    //         filterLangCities(0);
    //     });
    //     filterLangStates(<?php echo old('state_id', (isset($company)) ? $company->state_id : 0); ?>);

    //     /*******************************/
    //     // var fileInput = document.getElementById("logo");
    //     // fileInput.addEventListener("change", function (e) {
    //     //     var files = this.files
    //     //     showThumbnail(files)
    //     // }, false)
    // });




</script>
@endpush