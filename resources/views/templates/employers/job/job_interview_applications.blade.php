<div class="tab-pane fade" id="posted-job-3-pane" role="tabpanel" aria-labelledby="posted-job-3" tabindex="0">
    <div class="posted-job-profiles">
        <div class="row">
            @if(isset($job_applications_interview) && count($job_applications_interview))
                @foreach($job_applications_interview as $job_application)
                    @php
                        $user = $job_application->getUser();
                        $job = $job_application->getJob();
                        $company = $job->getCompany();
                        $profileCv = $job_application->getProfileCv();
                        $interview = \App\Interview::where('user_id', $user->id)->where('job_id', $job->id)->where('company_id',$company->id)->first();
                    @endphp
                    @if(null !== $job_application && null !== $user && null !== $job && null !== $company && null !== $profileCv)
                        <div class="col-md-6">
                            <div class="profile">
                    <div class="profile-header">
                        <div class="avata">
                            {{$user->printUserImage(100, 100)}}
                        </div>
                        <button type="button" class="btn btn-light"><a href="{{route('applicant.profile', $job_application->id)}}">{{__('View Profile')}}</a></button>
                    </div>
                    <div class="profile-body">
                        <h3 class="name"><a href="{{route('applicant.profile', $job_application->id)}}">{{$user->getName()}}</a></h3>
                        <div class="desc">
                            {{\Illuminate\Support\Str::limit(strip_tags($user->getProfileSummary('summary')),32,'...')}}
                        </div>
                        <ul class="profile-info">
                            <li>
                                <span class="iconmoon icon-location"></span> {{$user->getLocation()}}
                            </li>
                            <li class="status not-available">
                                <span class="iconmoon icon-profile"></span> {{$user->is_immediate_available == 1 ? __('Immediate Available') : __('Not Immediate Available')}}
                            </li>
                        </ul>
                    </div>
                    <div class="profile-footer">
                        <div class="time-interview"><span class="iconmoon icon-calenda"></span>{{__('Interview at:')}} {{\Carbon\Carbon::parse($interview->interview_plan_date)->format('d-m-Y') ?? ''}}</div>
                        <div class="status-interview"><span class="iconmoon status"></span>{{__('Interview status:')}} {{ $interview->interview_status ? __(\App\Interview::getShortListStatus()[$interview->interview_status]) : ''}}</div>
                        <div class="button-group">
                            <button class="btn btn-secondary">
                                <a href="{{route('remove.from.favourite.applicant',[$job_application->id, $user->id,$job->id,$company->id])}}">{{__('Reject')}}</a>
                            </button>
                            <button class="btn btn-primary">
                                <a href="{{route('hire.from.favourite.applicant',[$job_application->id, $user->id,$job->id,$company->id])}}">{{__('Hire')}}</a>
                            </button>
                        </div>
                    </div>
                </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>
