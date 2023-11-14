<div class="tab-pane fade" id="posted-job-5-pane" role="tabpanel" aria-labelledby="posted-job-5" tabindex="0">
    <div class="posted-job-profiles">
        <div class="row">
            @if(isset($job_applications_rejected) && count($job_applications_rejected))
                @foreach($job_applications_rejected as $job_application)
                    @php
                        $user = $job_application->getUser();
                        $job = $job_application->getJob();
                        $company = $job->getCompany();
                        $profileCv = $job_application->getProfileCv();
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
                    </div>
                </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>