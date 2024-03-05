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
        min-width: 100%;
        max-width: 100%;

    }
    .img-thumnail .img-thumnail__wrapper {
       
        overflow: hidden;
       
    }
    .text-decoration {
        text-decoration: underline;
    }





</style>
@endpush

{!! Form::model($company, array('method' => 'put', 'route' => array('update.company.profile'), 'class' => 'form form-user-profile', 'files'=>true)) !!}
<form action="">
    <div class="user-account-section">
        <div class="formpanel mt0">
            <div class="section-head">
                <h1 class="title-form">Chỉnh Sửa Thông Tin Tài Khoản</h1>
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
                        <h6>Hình Nền</h6>
                            <div id="thumbnail">
                                <div class="pic img-thumnail">
                                    <div class="img-thumnail__wrapper">
                                    {{--{{ ImgUploader::print_image("company_logos/$company->cover_logo") }}--}}
                                    {{$company->printCompanyCoverImage()}}
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
                                       Tỉnh/Thành Phố
                                    </strong>
                                </td>
                                <td class="table_value">
                                       {{$cityCompany->city}}
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
                                    <a href="tel:{{ isset($company->fax) ? $company->fax : old('fax')}}">{{ isset($company->fax) ? $company->fax : old('fax')}}</a>
                                    
                                    
                                </td>
                            </tr>

                            <tr>
                                <td class="table_title">
                                    <strong>
                                        <i class="bi bi-telephone"></i> {{__('Mobile Number')}}
                                    </strong>
                                </td>
                                <td class="table_value">
                                    <a href="tel:{{ isset($company->phone) ? $company->phone : old('phone')}}">{{ isset($company->phone) ? $company->phone : old('phone')}}</a>
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





</script>
@endpush