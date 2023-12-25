<div class="table-content">
    <div class="p-3 mt-2 d-flex justify-content-between ">
            <div class="text-muted">
                {{ __('Found') }} <span  class="font-weight-bold text-primary">{{ $userApply->count('id') }}</span> {{ __('Candidates') }}
            </div>
            <div class="d-flex justify-content-between">
                <div class="custom-control custom-radio custom-control-inline mr-2">
                    <input type="radio" id="quick-filter-1" name="quick-filter" class="custom-control-input" {{ $log_seen != 'unseen' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="quick-filter-1">{{ __('Show all CV') }}</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="quick-filter-2" name="quick-filter" class="custom-control-input" {{ $log_seen == 'unseen' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="quick-filter-2">{{ __('Show only unread CV') }}</label>
                </div>
            </div>
        </div>
    <div class="card-body">
        <div class="table-responsive ">
            <table class="table table-applican-manager table-hover mb-0 border-0">
                <thead>
                    <tr>
                        <th class="font-weight-bold" colspan="2">{{ __('Candidate') }}</th>
                        <!-- <th class="font-weight-bold"></th> -->
                        <th class="font-weight-bold">{{ __('Recruitment Bulletin') }}</th>
                        <th class="font-weight-bold">{{ __('Candidate Detail') }}</th>
                        <th class="font-weight-bold">{{ __('Date Application') }}</th>

                        <th class="font-weight-bold">{{ __('Status') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($userApply) > 0)
                    @foreach($userApply as $value)

                    
                    <tr class="cv viewed">
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle avatar "
                                    style="width: 40px; height: 40px; flex: 0 0 40px; background-image: url();">
                                    @php
                                        $candidate_image = $value->user->image ? $value->user->image :"no-image.png";
                                    @endphp
                                    <div class="image-candidate">
                                    {{ ImgUploader::print_image("user_images/$candidate_image") }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        
                        <td>
                            <div class="fullname">
                                <a href="#" role="button" class="font-weight-bold text-dark text-primary-hover text-capitalize public-profile"
                                   data-user="{{$value->user->id}}" data-job="{{$value->job->id}}"
                                   data-name="{{$value->user->first_name.' '.$value->user->middle_name.' '.$value->user->last_name}}">
                                   {{ $value->user->first_name.' '.$value->user->middle_name.' '.$value->user->last_name }}
                                </a>
                            </div>
                            <div class="mb-2">
                                <span class="badge badge-secondary badge-default transparent-1 font-weight-normal">{{ $value->seen == 1 ? 'Đã xem' : 'Chưa xem' }}</span>
                            </div>
                        </td>
                        <td>
                            <a class="text-gray text-truncate has-tooltip job-details"
                                data-original-title="null" style="max-width: 150px;" data-job-slug="{{$value->job->slug}}"
                               data-job-name="{{$value->job->title ??''}}">
                                {{ $value->job->title ??'' }}
                            </a>
                        </td>
                        <td class="align-top text-gray">
                            <div class="insights">
                                @if($value->user->email)
                                <div class="text-nowrap text-truncate" style="max-width: 250px;">
                                    <i class="iconmoon icon-recruiter-email text-primary"></i>
                                    {{ $value->user->email }}
                                </div>
                                @endif
                                @if($value->user->phone)
                                <div class="text-nowrap text-truncate" style="max-width: 250px;">
                                    <i class="iconmoon icon-recruiter-phone-call text-primary"></i>
                                    {{ $value->user->phone }}
                                </div>
                                @endif
                            </div>
                        </td>
                        <td class="align-top text-gray">
                            <div class="insights text-muted">
                                <div>
                                    <span style="cursor: pointer;">
                                    <i class="iconmoon icon-recruiter-suitcase"></i>
                                        Ứng tuyển
                                    </span></div>
                                <div>
                                    <span style="cursor: pointer;">
                                        <i class="iconmoon icon-calendar-icon1"></i> {{ \Carbon\Carbon::parse($value->created_at)->format('Y-m-d H:i') }}
                                    </span>
                                </div>
                            
                            </div>
                        </td>
                        <td>
                            <!-- Có 6 trạng thái status từ cv-status-1 đến cv-status-6  -->
                            <span role="button" class="cv-status cv-status-1 cv-status-default" data-toggle="modal" data-target="#modalReviewApplication">{{ __(\App\JobApply::getListStatus()[$value->status]) }}</span>
                        </td>
                        <td class="text-right pl-0">
                            <span type="button" role="button" data-toggle="dropdown" class=""
                                aria-expanded="false"><i class="iconmoon icon-recruiter-dots"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a role="button" onClick="submitUpdateApplication({{ $value->id }});" class="dropdown-item" data-toggle="modal" data-target="#modalReviewApplication">Đổi trạng thái CV</a> 
                                <a role="button" onClick="submitUpdateNoteApplication({{ $value->id }});" class="dropdown-item"  data-toggle="modal" data-target="#modalReviewApplicationNote">Ghi chú</a> 
                                <a role="button" download href="{{'http://localhost:8000/'.'cvs/'.$value->user->getDefaultCv()->cv_file}}" target="_blank" class="dropdown-item">Tải CV</a>
                            
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="pagiWrap">
                <nav aria-label="Page navigation example " class=" d-flex justify-content-center">
                    @if(isset($userApply) && count($userApply))
                    {{ $userApply->appends(request()->query())->links() }} @endif
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal modal-review-application fade" id="candidate-profile-modal" tabindex="-1"
     aria-labelledby="modalReviewApplicationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="candidate-profile-modal-title">{{__('Candidate public profile')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="iconmoon icon-recruiter-close"></span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("Close")}}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
<!-- Job Detail Modal -->
<div class="modal modal-review-application fade" id="job-detail-modal" tabindex="-1"
     aria-labelledby="jobModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="job-detail-modal-title">{{__('Job details')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="iconmoon icon-recruiter-close"></span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("Close")}}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Job Modal -->
@push('styles')
<style type="text/css">
    .image-candidate img {
        vertical-align: middle;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
</style>
@endpush
@push('scripts')
<script>
    $(document).ready(function(){
        $('.public-profile').on('click',function(e){
            e.preventDefault();
            var user_id = $(this).attr('data-user');
            var job_id = $(this).attr('data-job');
            var user_name = $(this).attr('data-name');
            
            if(user_id > 0){
                var url = "{{ route('application.profile.candidate', [':user_id', ':job_id']) }}";
                url = url.replace(':user_id',user_id).replace(':job_id',job_id);
                $('#candidate-profile-modal .modal-body').empty();
                $.ajax({
                    url: url,
                    method: 'get',
                    beforeSend: function(){
                    },
                    success: function(response){
                        $('#candidate-profile-modal-title').html($('#candidate-profile-modal-title').html() + ' - ' + user_name);
                        $('#candidate-profile-modal .modal-body').html(response);
                        $('#candidate-profile-modal').modal('show').trigger('focus');

                    }
                });
            }
        });

        $('.job-details').on('click',function(e){
            e.preventDefault();
            var job_slug= $(this).attr('data-job-slug');
            var job_name= $(this).attr('data-job-name');
            if(job_slug != '' && job_slug != undefined){
                var url = "{{ route('job.detail.popup', [':job_slug']) }}";
                url = url.replace(':job_slug',job_slug);
                $.ajax({
                    url: url,
                    method: 'get',
                    beforeSend: function(){
                    },
                    success: function(response){
                        $('#job-detail-modal-title').html($('#job-detail-modal-title').html() + ' - ' + job_name);
                        $('#job-detail-modal .modal-body').html(response);
                        $('#job-detail-modal').modal('show').trigger('focus');
                    }
                });
            }
        });
    });
</script>
@endpush
