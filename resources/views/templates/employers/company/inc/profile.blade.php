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

    select:invalid {
        height: 0px !important;
        opacity: 0 !important;
        position: absolute !important;
        display: flex !important;
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
</style>
@endpush

{!! Form::model($company, array('method' => 'put', 'route' => array('update.company.profile'), 'class' => 'form form-user-profile', 'files'=>true)) !!}
<form action="">
    <div class="user-account-section">
        <div class="formpanel mt0">
            <div class="section-head">
                <h3 class="title-form">Thông Tin Tài Khoản</h3>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-md-6 col-lg-4 d-flex flex-column justify-content-center align-items-center">
                        <div class="formrow formrow-photo">
                            <div id="thumbnail">
                                <div class="pic img-avatar">
                                    <div class="img-avatar__wrapper">
                                        {{$company->printCompanyImage()}}
                                    </div>
                                    <input type="file" name="image" id="fileInput" style="display: none;">

                                    <a class="uploadImage_btn" href="javascript:void(0);" onclick="$('#fileInput').click()"><i class="fa-solid fa-camera"></i></a>
                                    {!! APFrmErrHelp::showErrors($errors, 'image') !!}
                                    {!! APFrmErrHelp::showErrors($errors, 'image') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-8">
                        <div class="user__name" bis_skin_checked="1">
                            <h4 id="">{{ $company->name }}</h4>
                        </div>

                        <div class="user__infomation" bis_skin_checked="1">
                            <h5 id="">Freelandcer</h5>
                        </div>

                        <div class="user__complete_section" bis_skin_checked="1">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="user-account-section">
        <div class="formpanel mt0">
            <div class="section-head">
                <div class="section-head__figure">
                    <div class="figure__image"><img src="/assets/ico-user-info.png" alt=""></div>
                    <div class="figure__caption">
                        <h5 class="">{{__('Account Information')}}</h5>
                        <div class="status complete" bis_skin_checked="1">
                            <p>Hoàn thành</p>
                        </div>
                    </div>
                </div>
                <div class="section-head__right-action" bis_skin_checked="1">
                    <div class="right-action__tips" bis_skin_checked="1" >
                        <i class="fa-regular fa-lightbulb"></i>
                        <p>Tips</p>
                    </div>
                    <div class="right-action__link-edit"><a data-toggle="modal" data-target="#user_info" href="#"><i class="fa-solid fa-pen"></i>Chỉnh sửa</a></div>
                    <div class="right-action__link-edit-mobile"><a data-toggle="modal" data-target="#user_info" href="#"><i class="fa-solid fa-pen"></i></a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="table-responsive">
                    <table class="table table-responsive table-user-information">
                        <tbody>
                            <tr>
                                <td class="table_title">
                                    <strong>
                                        <i class="bi bi-envelope"></i>{{__('Email')}}
                                    </strong>
                                </td>
                                <td class="text-primary table_value">
                                    {{ old('email') ? old('email') : $company->email }}
                                </td>
                            </tr>
                            <tr>
                                <td class="table_title">
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
        </div>
    </div>
    <div class="user-account-section">
        <div class="formpanel mt0">
            <div class="section-head">
                <div class="section-head__figure">
                    <div class="figure__image"><img src="/assets/ico-user-info.png" alt=""></div>
                    <div class="figure__caption">

                        <h5 class="">{{__('Company Information')}}</h5>
                        <div class="status complete" bis_skin_checked="1">
                            <p>Hoàn thành</p>
                        </div>
                    </div>
                </div>
                <div class="section-head__right-action" bis_skin_checked="1">
                    <div class="right-action__tips" bis_skin_checked="1" >
                        <i class="fa-regular fa-lightbulb"></i>
                        <p>Tips</p>
                    </div>
                    <div class="right-action__link-edit"><a id="modalToggle" data-toggle="modal" data-target="#company_info" href="#"><i class="fa-solid fa-pen"></i>Chỉnh sửa</a></div>
                    <div class="right-action__link-edit-mobile"><a id="modalToggle" data-toggle="modal" data-target="#company_info" href="#"><i class="fa-solid fa-pen"></i></a></div>
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
                                    {{ !empty($company->industry)?$company->industry->industry : 'NA' }}
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
                                    Viet Nam
                                </td>
                            </tr>

                            <tr>
                                <td class="table_title">
                                    <strong>
                                        {{__('State')}}
                                    </strong>
                                </td>
                                <td class="table_value">

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
                                    2
                                </td>
                            </tr>

                            <tr>
                                <td class="table_title">
                                    <strong>
                                        {{__('No of Employees')}}
                                    </strong>
                                </td>
                                <td class="table_value">
                                    50-100
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
                </div>
            </div>
        </div>
    </div>


    <div class="user-account-section">
        <div class="formpanel mt0">
            <div class="section-head">
                <div class="section-head__figure">
                    <div class="figure__image"><img src="/assets/ico-user-info.png" alt=""></div>
                    <div class="figure__caption">

                        <h5 class="">Thông Tin Liên Hệ</h5>
                        <div class="status complete" bis_skin_checked="1">
                            <p>Hoàn thành</p>
                        </div>
                    </div>
                </div>
                <div class="section-head__right-action" bis_skin_checked="1">
                    <div class="right-action__tips" bis_skin_checked="1">
                        <i class="fa-regular fa-lightbulb"></i>
                        <p>Tips</p>
                    </div>
                    <div class="right-action__link-edit"><a id="modalToggle" data-toggle="modal" data-target="#contact_info" href="#"><i class="fa-solid fa-pen"></i>Chỉnh sửa</a></div>
                    <div class="right-action__link-edit-mobile"><a id="modalToggle" data-toggle="modal" data-target="#contact_info" href="#"><i class="fa-solid fa-pen"></i></a></div>
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
                                    <?php
                                        // PHP code goes here
                                        dd($company->website);
                                    ?>
                                        {{ $company->website ? $company->website : old('website')}}
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="table_title">
                                    <strong>
                                        <i class="bi bi-telephone"></i> {{__('Fax')}}
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
                <h6>Map</h6>
                <div class="gmap">
                    {!!$company->map!!}
                </div>
            </div>
        </div>
    </div>
</form>



@include('templates.employers.company.form.companyinfo_form')

@include('templates.employers.company.form.contact')


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
@include('templates.employers.includes.tinyMCEFront')
<script type="text/javascript">
    function readURL(input) {
        console.log("input", input);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.img-avatar img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#fileInput').change(function() {
        readURL(this);
    });

    function removeAvatar() {
        $('.pic .img-avatar img').attr('src', 'https://cdn-icons-png.flaticon.com/512/149/149071.png');
        $('#fileInput').val('');
    }

    // js chosen dropdown select
    $(".chosen").chosen();

    function filterDefaultStates(state_id) {
        var country_id = $('#country_id').val();
        if (country_id != '') {
            $.post("{{ route('filter.default.states.dropdown') }}", {
                    country_id: country_id,
                    state_id: state_id,
                    _method: 'POST',
                    _token: '{{ csrf_token() }}'
                })
                .done(function(response) {
                    $('#default_state_dd').html(response);
                    filterDefaultCities(<?php echo old('city_id', (isset($company)) ? $company->city_id : 0); ?>);
                });
        }
    }

    function filterDefaultCities(city_id) {
        var state_id = $('#state_id').val();
        if (state_id != '') {
            $.post("{{ route('filter.default.cities.dropdown') }}", {
                    state_id: state_id,
                    city_id: city_id,
                    _method: 'POST',
                    _token: '{{ csrf_token() }}'
                })
                .done(function(response) {
                    $('#default_city_dd').html(response);
                });
        }
    }

    $(document).ready(function() {
        $('#country_id').on('change', function(e) {
            e.preventDefault();
            filterDefaultStates(0);
        });
        $(document).on('change', '#state_id', function(e) {
            e.preventDefault();
            filterDefaultCities(0);
        });
        filterDefaultStates(<?php echo old('state_id', (isset($company)) ? $company->state_id : 0); ?>);

        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        $('#country_id').on('change', function(e) {
            e.preventDefault();
            filterLangStates(0);
        });
        $(document).on('change', '#state_id', function(e) {
            e.preventDefault();
            filterLangCities(0);
        });
        filterLangStates(<?php echo old('state_id', (isset($company)) ? $company->state_id : 0); ?>);

        /*******************************/
        // var fileInput = document.getElementById("logo");
        // fileInput.addEventListener("change", function (e) {
        //     var files = this.files
        //     showThumbnail(files)
        // }, false)
    });

    var fileInput = document.getElementById("image");
    fileInput.addEventListener("change", function(e) {
        var files = this.files
        showThumbnail(files)
    }, false)

    var fileInput_cover_image = document.getElementById("cover_image");

    fileInput_cover_image.addEventListener("change", function(e) {

        var files_cover_image = this.files

        showThumbnail_cover_image(files_cover_image)

    }, false)


    function showThumbnail(files) {
        $('#logo').html('');
        for (var i = 0; i < files.length; i++) {
            var file = files[i]
            var imageType = /image.*/
            if (!file.type.match(imageType)) {
                console.log("Not an Image");
                continue;
            }
            var reader = new FileReader()
            reader.onload = (function(theFile) {
                return function(e) {
                    $('#logo').append('<div class="fileattached"><img height="100px" src="' + e.target.result + '" > <div>' + theFile.name + '</div><div class="clearfix"></div></div>');
                };
            }(file))
            var ret = reader.readAsDataURL(file);
        }
    }


    function showThumbnail_cover_image(files) {

        $('#thumbnail_logo').html('');

        for (var i = 0; i < files.length; i++) {

            var file = files[i]

            var imageType = /image.*/

            if (!file.type.match(imageType)) {

                console.log("Not an Image");

                continue;

            }

            var reader = new FileReader()

            reader.onload = (function(theFile) {

                return function(e) {

                    $('#thumbnail_logo').append('<div class="fileattached"><img height="100px" src="' + e.target.result + '" > <div>' + theFile.name + '</div><div class="clearfix"></div></div>');

                };

            }(file))

            var ret = reader.readAsDataURL(file);

        }

    }
</script>
@endpush