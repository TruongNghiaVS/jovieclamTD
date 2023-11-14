<div class="row">
    <div class="header-list-schedule-interview">
        <div class="col-12">
            <h3 class="title-list-schedule-interview">{{ __('My Interview Schedule') }}</h3>
        </div>
        <div class="col-12">
            {!! Form::open(['method' => 'get','route' => 'interview.filter']) !!}
            <div class="group-filter-schedule-interview d-block">    
                <div class="row">
                    <div class="col-12 col-md-5 col-lg-5 col-xl-5">
                        <div class="form-group form-group-datepicker input-daterange"  style="max-width: 100%; margin-bottom: 10px;">
                            <input type="text" class="daterange form-control " name="date_range"
                                placeholder="{{ __('Start date-End date') }}" />
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-lg-5 col-xl-5">
                        <div class="form-group"  style="max-width: 100%; margin-bottom: 10px;">
                            <input type="text" class="form-control" name="title" placeholder="{{ __('Search by interview title') }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-2 col-lg-2 col-xl-1" >
                        <div class="form-group" style="max-width: 100%; margin-bottom: 10px;">
                            <button type="submit" class="btn btn-primary btn-search form-control"><i class="bi bi-search text-white"></i></button>
                        </div>
                    </div>
                </div>
                
                
                
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="body-list-schedule-interview">
    <div class="content-list-schedule-interview table-responsive">
        <table class="table table-schedule-interview">
            <thead>
                <tr>
                    <th>{{ __('Candidates') }}</th>
                    <th>{{ __('Recruitment Bulletin') }}</th>
                    <th>{{ __('Companies') }}</th>
                    <th>{{ __('Interview Plan Date') }}</th>
                    <th>{{ __('Interview Status') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(count($interviews) > 0)
                @foreach($interviews as $value)
                <tr>
                    <td>
                        <a href="#" role="button" class="font-weight-bold text-dark text-primary-hover text-capitalize interview-candidate" data-user="{{$value->applicant->id}}" data-job="{{($value->job) ? $value->job->id : 0}}" data-name="{{$value->applicant->name}}">
                            {{ $value->applicant->name }}
                        </a>
                    </td>
                    <td>
                        <a href="#" role="button" class="job-item font-weight-bold text-dark text-primary-hover text-capitalize" data-slug="{{($value->job) ? $value->job->slug : ''}}" data-name="{{ ($value->job) ? $value->job->title : '' }}">
                            {{ ($value->job) ? $value->job->title : '' }}
                        </a>
                    </td>
                    <td>{{ ($value->company) ? $value->company->name : '' }}</td>
                    <td>{{ Carbon\Carbon::parse($value->interview_plan_date)->format('d-m-Y H:i') }}</td>
                    <td>
                        <span role="button" class="cv-status cv-status-1 cv-status-default update-interview-popup" data-toggle="modal" data-target="#modalScheduleInterviewStatus" onClick="submitUpdateInterview({{ $value->id }});">
                            {{ __(\App\Interview::getShortListStatus()[$value->interview_status] ?? 'N/A') }}
                        </span>
                    </td>
                    <td>
                        <span type="button" role="button" data-toggle="dropdown"
                            class="badge btn-dot d-flex align-items-center justify-content-center"
                            aria-expanded="false"><i class="iconmoon icon-recruiter-dots"></i>
                        </span>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a role="button" class="dropdown-item" data-toggle="modal"
                                data-target="#modalScheduleInterviewStatus" onClick="submitUpdateInterview({{ $value->id }});">{{ __('Update status') }}</a>
                            <a role="button" class="dropdown-item" data-toggle="modal"
                                data-target="#modalScheduleInterviewDate" onClick="submitUpdateInterview({{ $value->id }});">{{ __('Update date interview') }}</a>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif

            </tbody>
        </table>
    </div>
    {{-- <div class="nav-list-schedule-interview">
        <nav>
            <ul class="pagination">
                <li class="page-item disabled" aria-disabled="true" aria-label="pagination.previous">
                    <span class="page-link" aria-hidden="true">‹</span>
                </li>
                <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" rel="next" aria-label="pagination.next">›</a>
                </li>
            </ul>
        </nav>
    </div> --}}
</div>

<!-- Modal -->
<div class="modal modal-review-application fade" id="modalScheduleInterviewDate" tabindex="-1"
    aria-labelledby="modalScheduleInterviewDateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('interview.schedule.update') }}" id="updateScheduleInterviewDate" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScheduleInterviewDateLabel">{{ __('Update date interview') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="iconmoon icon-recruiter-close"></span>
                    </button>
                </div>
                <div class="modal-body">

                    <div id="load_review_cv">
                        <div class="form-group">
                            <input type="text" name="interview_plan_date" class="form-control bs-datetimepicker" id="interview_plan_date"
                                placeholder="Ngày phỏng vấn">
                        </div>
                        <textarea id="review-application-note" name="note" rows="5"
                            placeholder="Bạn có muốn thêm ghi chú cho sự thay đổi này không?"
                            class="form-control p-3 interview-note"></textarea>
                    </div>
                    <input type="hidden" name="id_interview" class="get-id-interview" id="id_interview">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-primary" id="btnUpdateScheduleInterview">{{ __('Update') }}</button>
                </div>
            </div>
        </form>

    </div>
   
</div>

<div class="modal modal-review-application fade" id="modalScheduleInterviewStatus" tabindex="-1"
    aria-labelledby="modalScheduleInterviewStatusLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScheduleInterviewStatusLabel">{{ __('Update status') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="iconmoon icon-recruiter-close"></span>
                </button>
            </div>
            <form action="{{ route('interview.schedule.update') }}" id="updateApplication" method="post">
                <div class="modal-body">
                        @csrf
                        <div id="load_review_cv">
                            <div>
                                <div class="d-inline-block mb-3"><span role="button" id="interview-status-1" data-value="1"
                                        class="btn btn-cv-application rounded-30 mr-2 d-block px-3 status">
                                        {{ __('Interview') }}
                                    </span>
                                </div>
                                <div class="d-inline-block mb-3"><span role="button" id="interview-status-2" data-value="2"
                                        class="btn btn-cv-application rounded-30 mr-2 d-block px-3 status">
                                        {{ __('Interview confirmation') }}
                                    </span>
                                </div>
                                <div class="d-inline-block mb-3"><span role="button" id="interview-status-3" data-value="3"
                                        class="btn btn-cv-application rounded-30 mr-2 d-block px-3 status">
                                        {{ __('Successful interview') }}
                                    </span>
                                </div>
                                <div class="d-inline-block mb-3"><span role="button" id="interview-status-4" data-value="4"
                                        class="btn btn-cv-application rounded-30 mr-2 d-block px-3 status">
                                        {{ __('Interview failed') }}
                                    </span>
                                </div>
                            </div>
                            <input type="hidden" name="interview_status" id="review-application-status">
                            <input type="hidden" name="id_interview" class="get-id-interview">
                            <textarea id="review-application-note" name="note" rows="5"
                                placeholder="Bạn có muốn thêm ghi chú cho sự thay đổi này không?"
                                class="form-control p-3 interview-note"></textarea>
                        </div>
                    <input type="hidden" name="id_interview" class="get-id-interview" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-primary" id="btnUpdateScheduleInterview">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Candidate Modal -->
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

<!-- Job Modal -->
<div class="modal modal-review-application fade" id="job-modal" tabindex="-1"
     aria-labelledby="modalReviewApplicationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="job-modal-title">{{__('Job Information')}}</h5>
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
@push('styles')
<style type="text/css">
    .header-list-schedule-interview .title-list-schedule-interview{
        max-width: none;
    }
    .header-list-schedule-interview .group-filter-schedule-interview{
        float: right;
        flex: none;
        max-width: none;
    }
    .header-list-schedule-interview .group-filter-schedule-interview .form-group{
        /* max-width: 33% !important; */
    }
</style>
@endpush
@push('scripts')
    <script type="text/javascript">
        function submitUpdateInterview(id_interview) {
            detailInterview(id_interview)
        }

        function detailInterview(id_interview) {
            $.ajax({
                type: "GET",
                url: "{{ route('interview.schedule.edit') }}",
                data: {
                    "id": id_interview,
                    "modal_note": 0
                },
                datatype: 'json',
                success: function(json) {
                    $(".status").removeClass("active")
                    $(".interview-note").val()
                    
                    $("#interview-status-"+json.data.interview_status).addClass("active");
                    $("#review-application-status").val(json.data.interview_status)
                    $("#interview_plan_date").val(json.data.interview_plan_date)
                    $(".interview-note").val(json.data.note)
                    $(".get-id-interview").val(json.data.id)
                    console.log(json.data.id)
                }
            });
        }
        $(document).ready(function(){
            $('.interview-candidate').on('click',function(e){
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
            $('.job-item').on('click',function(e){
                e.preventDefault();
                var job_slug = $(this).attr('data-slug');
                var job_name = $(this).attr('data-name');
                if(job_slug != ''){
                    var url = "{{ route('job.detail.popup', [':job_slug']) }}";
                    url = url.replace(':job_slug',job_slug);
                    $('#job-modal .modal-body').empty();
                    $.ajax({
                        url: url,
                        method: 'get',
                        beforeSend: function(){
                        },
                        success: function(response){
                            $('#job-modal-title').html($('#job-modal-title').html() + ' - ' + job_name);
                            $('#job-modal .modal-body').html(response);
                            $('#job-modal').modal('show').trigger('focus');
                        }
                    });
                }
            });
        });
    </script>
@endpush
