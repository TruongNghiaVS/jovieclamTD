<!-- Job detail -->
<section class="job-detail-content">
    <div class="require-card">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="item-require">
                    <div class="require-card__item-icon">
                        <div class="icon-salary icon-size-30"></div>
                    </div>
                    <div class="require-card__item-content">
                        <p>{{ __('Salary Level') }}</p>
                        @php
                            $salaryType = $job->salary_type;
                            switch ($salaryType) {
                                case \App\Job::SALARY_TYPE_RANGE:
                                    $html = MiscHelper::formatCurrency($job->salary_from) . ' - ' . MiscHelper::formatCurrency($job->salary_to) . '(' . $job->salary_currency . ')';
                                    break;
                                case \App\Job::SALARY_TYPE_NEGOTIABLE:
                                    $html = __('Negotiable');
                                    break;
                                case \App\Job::SALARY_TYPE_FROM:
                                    $html = __('From') . ' ' . MiscHelper::formatCurrency($job->salary_from) . '(' . $job->salary_currency . ')';
                                    break;
                                case \App\Job::SALARY_TYPE_TO:
                                    $html = __('To') . ' ' .   MiscHelper::formatCurrency($job->salary_to) . '(' . $job->salary_currency . ')';
                                    break;
                            }
                        @endphp
                        @if(!(bool)$job->hide_salary)
                            <strong>{{$html}}</strong>
                        @endif
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-4">
                <div class="item-require">
                    <div class="require-card__item-icon">
                        <div class="icon-team icon-size-30"></div>
                    </div>
                    <div class="require-card__item-content">
                        <p>{{ __('Number of positions') }}</p>
                        <strong>{{ $job->num_of_positions }}</strong>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-4">
                <div class="item-require">
                    <div class="require-card__item-icon">
                        <div class="icon-calendar icon-size-30"></div>
                    </div>
                    <div class="require-card__item-content">
                        <p>{{ __('Job Types') }}</p>
                        <strong>{{ __($job->getJobType('job_type')) }}</strong>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-4">
                <div class="item-require item-require-last">
                    <div class="require-card__item-icon">
                        <div class="icon-level icon-size-30"></div>
                    </div>
                    <div class="require-card__item-content">
                        <p>{{ __('Career Level') }}</p>
                        <strong>{{$job->getCareerLevel('career_level')}}</strong>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="item-require item-require-last">
                    <div class="require-card__item-icon">
                        <div class="icon-gender icon-size-30"></div>
                    </div>
                    <div class="require-card__item-content">
                        <p>{{ __('Gender') }}</p>
                        <strong>{{$job->getGender('gender')}}</strong>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="item-require item-require-last item-require-end">
                    <div class="require-card__item-icon">
                        <div class="icon-suicase icon-size-30"></div>
                    </div>
                    <div class="require-card__item-content">
                        <p>{{ __('Experiences') }}</p>
                        <strong>{{$job->getJobExperience('job_experience')}}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="job-information">
        <h3 class="job-information__title">{{__('Job Description')}}</h3>
        <div class="inner-content">{!! $job->description !!}</div>
    </div>
    <div class="job-information">
        <h3 class="job-information__title">{{__('Job Requirements')}}</h3>
        <div class="inner-content">{!! $job->requirement !!}</div>
    </div>

    <div class="job-information">
        <h3 class="job-information__title">{{__('Benefits')}}</h3>
        <div class="inner-content">{!! $job->benefits !!}</div>
    </div>

    <h6 class="mb-2">{{ __('Skills') }}</h6>
    <div class="mb-5">
        @if (!empty($job_skill_ids) && count($job_skill_ids) > 0)
            @foreach ($job_skill_ids as $jobSkillId)
                <span class="badge badge-light">{{ $jobSkills[$jobSkillId] ?? 'NA' }}</span>
            @endforeach
        @endif
    </div>
</section>
