<div id="content" class="content">
    <!-- Main -->
    <!-- Bio -->
<div class="content-wrapper">

    <div class="card card-bio mb-4 w-100 shadow-sm">
        <div class="row g-0">
            <div class="col-md-3">
                    <div class="img-avatar__wrapper">
                            @if(Auth::user())
                            {{Auth::user()->printUserImage()}}
                            @else
                            <img id="avatar" class="" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Avatar">
                            @endif
                    </div>
            </div>
            <div class="col-md-9">
                <div class="card-body card-body-profile-seeker">
                    <h5 class="card-title text-sub-color">{{auth()->user()->name}}</h5>
                    <p class="card-text justify-content-between align-items-center">
                        {{ auth()->user()->getProfileSummary('summary') }}
                    </p>
                    {{--<a href="{{ route('view.public.profile', Auth::user()->id) }}" class="btn btn-primary
                    btn-edit-profile">
                    <span class="icon-edit-icon fs-18px me-2 text-white-color"></span>
                    {{ __('Edit Profile') }}
                    </a> --}}
                </div>

                <div class="card-body contact-bio">
                    <span class="contact-bio-info me-4 mb-2"><i
                            class="iconmoon icon-recruiter-location"></i>{{Auth::user()->getLocation()}}</span>
                    <span class="contact-bio-info me-4 mb-2"><i
                            class="iconmoon icon-recruiter-phone-call"></i>{{auth()->user()->phone}}</span>
                    <span class="contact-bio-info me-4 mb-2"><i
                            class="iconmoon icon-recruiter-email"></i>{{auth()->user()->email}}</span>
                </div>

            </div>
        </div>
    </div>
    <!-- Statistics -->
    @include('templates.employers.includes.user_dashboard_stats')
    @if((bool)config('jobseeker.is_jobseeker_package_active'))
    @php
    $packages = App\Package::where('package_for', 'like', 'job_seeker')->get();
    $package = Auth::user()->getPackage();
    if(null !== $package){
    $packages = App\Package::where('package_for', 'like', 'job_seeker')->where('id', '<>',
        $package->id)->where('package_price', '>=', $package->package_price)->get();
        }
        @endphp

        @if(null !== $package)
        @include('templates.employers.includes.user_package_msg')
        @include('templates.employers.includes.user_packages_upgrade')
        @else

        @if(null !== $packages)
        @include('templates.employers.includes.user_packages_new')
        @endif
        @endif
        @endif
        <div class="row">
            <div class="col-md-7">
                @if(null!==($matchingJobs) && count($matchingJobs) > 0)
                <!-- realated jobs -->
                <section class="related-jobs card card-bio mb-3 w-100 shadow-sm">
                    <div class="card-body">
                        <div class="related-jobs__title d-flex justify-content-between align-items-center">
                            <h6>{{__('Matched Jobs')}}</h6>
                            <button class="btn btn-round btn-link btn-sm main-color"
                                onclick="window.location='{{ route('job.list') }}'">{{__('View all')}}</button>
                        </div>
                        <div class="row related-jobs__jobs px-12px mb-2">
                            @foreach($matchingJobs as $match)
                            <div class="col-12 card-news gap-16">
                                <div class="card-news__icon">

                                    <img src="{{ asset('company_logos/'.( !empty($match->getCompany()) ? $match->getCompany()->logo : 'no-logo.png')) }}"
                                        alt="{{!empty($match->getCompany()) ? $match->getCompany()->name : ''}}">
                                </div>
                                <div class="card-news__content">
                                    <h6 class="card-news__content-title">{{ $match->name }}</h6>
                                    <p class="card-news__content-detail">
                                        {{!empty($match->getCompany()) ? $match->getCompany()->name : ''}}
                                    </p>
                                    <div class="card-news__content-footer">
                                        <div class="card-news__content-footer__location">
                                            <span
                                                class="badge rounded-pill pill pill-location">{{!empty($match->getCompany()) ? $match->getCompany()->name : ''}}</span>
                                            <span
                                                class="badge rounded-pill pill pill-worktime">{{$match->getJobType('job_type')}}</span>
                                        </div>
                                        <div class="card-news__content-footer__salary">
                                            {{$match->salary_from.' '.$match->salary_currency}} -
                                            {{$match->salary_to.' '.$match->salary_currency}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {!! $matchingJobs->appends(Request::except(['page','_token']))->render() !!}
                        </div>
                    </div>
                </section>
                @endif
            </div>
            <div class="col-md-5">
                <!--My following -->

                <section class="related-jobs card card-bio mb-3 w-100 shadow-sm">
                    <div class="card-body">
                        <div class="related-jobs__title d-flex justify-content-between align-items-center mb-2">
                            <h6>Danh sách theo dõi</h6>
                            <a href="{{route('my.followings')}}"><button
                                    class="btn btn-round btn-linsk btn-sm main-color">Xem tất cả</button></a>
                        </div>
                        @if(isset($followers) && null!==($followers))
                        @foreach($followers as $follow)
                        @php
                        $company =
                        DB::table('companies')->where('slug',$follow->company_slug)->where('is_active',1)->first();
                        @endphp
                        @if (!empty($company))
                        <li class="list-group-item p-0 mt-3">
                            <div class="no-shadow col-12 card-news gap-16 p-0">
                                <div class="card-news__icon">
                                    <img src="{{ asset('company_logos/'.$company->logo) }}" alt="{{$company->name}}">
                                </div>
                                <div class="card-news__content">
                                    <h6 class="card-news__content-title">{{$company->name}}</h6>
                                    <p class="card-news__content-detail">{{$company->location}}</p>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        @endif

                    </div>
                </section>
            </div>
        </div>
</div>
</div>