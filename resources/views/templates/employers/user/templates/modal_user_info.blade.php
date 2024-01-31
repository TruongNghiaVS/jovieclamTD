
@if(Auth::user())
<div class="modal fade" id="modal_user_info" tabindex="-1" role="dialog" aria-labelledby="modal_user_infoLabel" aria-hidden="true">
    <div class="modal-dialog modal_user_dialog" role="document" id="modal_user_dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_user_infoLabel">{{__('View Public Profile')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <div class="card card-bio mb-4 w-100 shadow-sm" bis_skin_checked="1">
                    <div class="row g-0" bis_skin_checked="1">
                        <div class="col-md-3" bis_skin_checked="1">
                            <div class="img-avatar__wrapper" bis_skin_checked="1">
                            @if(Auth::user())
                            {{Auth::user()->printUserImage()}}
                            @else
                            <img id="avatar" class="" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Avatar">
                            @endif
                            </div>
                        </div>
                        <div class="col-md-9" bis_skin_checked="1">
                            <div class="card-body card-body-profile-seeker" bis_skin_checked="1">
                                <h5 class="card-title text-sub-color">Trung Đức Trần</h5>
                                <p class="card-text justify-content-between align-items-center">

                                
                                {{ auth()->user()->getProfileSummary('summary') }}
                                </p>

                            </div>

                            <div class="card-body contact-bio" bis_skin_checked="1">
                                <span class="contact-bio-info me-4 mb-2"><i class="iconmoon icon-recruiter-location"></i>{{Auth::user()->getLocation()}}</span>
                                <span class="contact-bio-info me-4 mb-2"><i class="iconmoon icon-recruiter-phone-call"></i>{{auth()->user()->phone}}</span>
                                <span class="contact-bio-info me-4 mb-2"><i class="iconmoon icon-recruiter-email"></i>{{auth()->user()->email}}</span>
                            </div>

                        </div>
                    </div>
                </div> -->

                @include('templates.employers.user.applicant_profile')
            </div>

        <!-- <div class="modal-footer">
            <a href="{{ route('view.public.profile', Auth::user()->id) }}" class=" {{ route('view.public.profile', Auth::user()->id) }}" target="_blank">Xem Thêm</a>
        </div> -->
        </div>
    </div>
</div>
@endif
@push('styles')
<style>
    .modal-dialog.modal_user_dialog {
        max-width: 90%;
        height: 100vh;
    }
</style>
@endpush