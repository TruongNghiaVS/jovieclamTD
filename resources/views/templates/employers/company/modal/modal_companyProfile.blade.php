<?php
$company = Auth::guard('company')->user();

?>
<!-- Modal -->

{{--@if (Auth::guard('company')->check())
<div class="modal fade" id="company_profile_modal" tabindex="-1" role="dialog" aria-labelledby="company_profile_modal_Label" aria-hidden="true">
    <div class="modal-dialog modal-company-profile-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="company_profile_modal_Label">Hồ Sơ Công Khai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

        


                </div>
            </div>
    </div>
</div>
@endif--}}

@if (Auth::guard('company')->check())
<div class="modal fade" id="company_profile_modal" tabindex="-1" role="dialog" aria-labelledby="company_profile_modal_Label" aria-hidden="true">
    <div class="modal-dialog modal-company-profile-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="company_profile_modal_Label">Hồ Sơ Công Khai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container company-content" bis_skin_checked="1">
                    <div class="user-account-section" bis_skin_checked="1">

                        <div class="box-profile-view" bis_skin_checked="1">
                            <div class="formpanel mt0" bis_skin_checked="1">
                                <div class="section-head" bis_skin_checked="1">
                                    <h3 class="title">Thông Tin Công Ty</h3>
                                </div>
                                <div class="section-body" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-lg-6 col-md-6 col-sm-12" bis_skin_checked="1">
                                            <div class="info" bis_skin_checked="1">
                                                <div class="img-avatar__wrapper">
                                                    {{$company->printCompanyImage()}}
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12" bis_skin_checked="1">
                                            <div class="img-thumnail__wrapper">
                                                    {{ ImgUploader::print_image("company_logos/$company->cover_logo") }}
                                                </div>

                                        </div>
                                    </div>
                                  
                               
                                    <p class="title-flip">Thông Tin Công Ty</p>


                                    <div class="job-information" bis_skin_checked="1">
                                        <ul class="information-list">
                                            <li>
                                                <p> <strong>Tên Công Ty:</strong></p>
                                                <p>  {{ isset($company->name) ? $company->name : old('name') }}</p>
                                            </li>
                                            <li>
                                                <p> <strong>Tên CEO:</strong></p>
                                                <p>   {{ isset($company->ceo) ? $company->ceo : old('ceo') }} </p>
                                            </li>
                                            
                                            
                                            <li>
                                                <p> <strong>    {{__('Industry')}}</strong></p>
                                                <p>  {{ !empty($company->industry)?$company->industry->industry : '' }}</p>
                                            </li>

                                            <li>
                                                <p> <strong>Sở Hữu:</strong></p>
                                                <p>{{ !empty($company->ownershipTypes)?$company->ownershipTypes->ownershipTypes : 'TNHH' }}</p>
                                            </li>
                                            <li>
                                                <p> <strong>Mô Tả:</strong></p>
                                                <p>{!! $company->description !!} </p>
                                            </li>
                                            <li>
                                                <p> <strong>Quốc Gia:</strong></p>
                                                <p> Viet Nam</p>
                                            </li>
                                            <li>
                                                <p> <strong>Địa Chỉ:</strong></p>
                                                <p> {{ isset($company->location) ? $company->location : old('location') }}</p>
                                            </li>
                                            <li>
                                                <p> <strong>Số Lượng Văn Phòng:</strong></p>
                                                <p>  {{ isset($company->no_of_offices) ? $company->no_of_offices : old('no_of_offices') }}
                                                </p>
                                            </li>

                                            <li>
                                                <p> <strong>Số Lượng Nhân Viên:</strong></p>
                                                <p>{{ isset($company->no_of_employees) ? $company->no_of_employees : old('no_of_employees') }}</p>
                                            </li>

                                            <li>
                                                <p> <strong>Thành Lập Năm:</strong></p>
                                                <p>  {{ isset($company->established_in) ? $company->established_in : old('established_in')}}</p>
                                            </li>
                                        

                                        </ul>

                                    </div>

                                    <p class="title-flip">Thông tin liên hệ</p>


                                    <div class="job-information" bis_skin_checked="1">
                                        <ul class="information-list">
                                            <li>
                                                <p> <strong>Trang Web:</strong></p>
                                                <a href="{{ isset($company->website) ? $company->website : old('website')}}">
                                                    {{ $company->website ? $company->website : old('website')}}
                                                </a>
                                            </li>
                                            <li>
                                                <p> <strong>{{__('Fax')}}:</strong></p>
                                                <p>    {{ isset($company->fax) ? $company->fax : old('fax')}} </p>
                                            </li>
                                            
                                            
                                            <li>
                                                <p> <strong>{{__('Mobile Number')}}:</strong></p>
                                                <p>   {{ isset($company->phone) ? $company->phone : old('phone')}}</p>
                                            </li>

                                            <li>
                                                <p> <strong>Facebook:</strong></p>
                                                <a href="{{ isset($company->facebook) ? $company->facebook : old('facebook')}}">{{ isset($company->facebook) ? $company->facebook : old('facebook')}}</a>
                                            </li>
                                            <li>
                                                <p> <strong>Twitter:</strong></p>
                                                <a href="{{ isset($company->twitter) ? $company->twitter : old('twitter')}}">{{ isset($company->twitter) ? $company->twitter : old('twitter')}}</a>
                                            </li>
                                            <li>
                                                <p> <strong>LinkedIn:</strong></p>
                                                <a href="{{ isset($company->linkedin) ? $company->linkedin : old('linkedin')}}">{{ isset($company->linkedin) ? $company->linkedin : old('linkedin')}}</a>
                                            </li>
                                            <li>
                                                <p> <strong>Google Plus:</strong></p>
                                                <a href="{{ isset($company->google_plus) ? $company->google_plus : old('google_plus')}}">{{ isset($company->google_plus) ? $company->google_plus : old('google_plus')}}</a>
                                            </li>
                                            

                                        </ul>

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
@endif
@push('styles')
<style type="text/css">

    .modal-company-profile-dialog {
        max-width: 70%;
        min-width: 70%;
    }

    .btn-view-more {
        padding: 12px 16px;
        border-radius: 10px;
        color: var(--bs-primary);
        text-decoration: underline;
        border: none;
        outline: none;
        background-color: unset !important;
        transition: unset !important;
    }

    .about-company div {
        overflow: hidden;
        display: -webkit-box;
        /* display 2 lines only */
        -webkit-line-clamp: 2;
        line-clamp: 2;
        -webkit-box-orient: vertical;
        width: 100%;
    }
</style>
@endpush
@push('scripts') 
<script type="text/javascript">
 
</script>
@endpush
