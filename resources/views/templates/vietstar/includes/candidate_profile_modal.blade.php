
<div class="card card-bio mb-5 w-100 shadow-sm">
        <div class="row g-0">
            <div class="col-md-2">
                @if($user->logo)
                <img src="{{ $user->avatar() }}" class="img-bio rounded mx-md-auto mt-md-4 d-block" alt="vietstar">
                @else
                <img src="{{ $user->avatar() }}/no-image.png" class="img-bio rounded mx-md-auto mt-md-4 d-block" alt="vietstar">

                @endif
            </div>
            <div class="col-md-10">
                <div class="card-body">
                    <h5 class="card-title text-sub-color">{{ $user->name }}</h5>
                    <p class="card-text">{{ $user->getProfileSummary('summary') }}</p>

                </div>
                <div class="card-body contact-bio d-flex flex-column flex-lg-row">
                    <span class="me-4 mb-2"><i class="far fa-map-marker-alt fa__icon-black me-2"></i>{{ $user->getLocation() }}</span>
                    @if (((bool)$user->verified))
                        <span class="me-4 mb-2 text-green-color"><i class="far fa-envelope fa__icon-black me-2"></i>{{ __('Email Verified') }}</span>
                    @endif

                    @if((bool)$user->is_immediate_available)
                        <span class="me-4 mb-2 text-green-color"><span class="icon-user-1-icon fs-18px me-2"></span>{{ __('Immediate Available') }}</span>
                    @else
                        <span class="me-4 mb-2 text-red-color"><span class="icon-user-1-icon fs-18px me-2"></span>{{ __('Not Immediate Available') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
<div class="row">
        <div class="col-md-8">
            <div class="summary-card row mx-0">
                <div class="col-md-4 mb-4 d-flex gap-16">
                    <div class="summary-card__item-icon">
                        <div class="icon-gender icon-size-30"></div>
                    </div>
                    <div class="summary-card__item-content">
                        <p>{{__('Gender')}}</p>
                        <strong>{{$user->getGender('gender')}}</strong>
                    </div>
                </div>
                <div class="col-md-4 mb-4 d-flex gap-16">
                    <div class="summary-card__item-icon">
                        <div class="icon-birthday-cake icon-size-30"></div>
                    </div>
                    <div class="summary-card__item-content">
                        <p>{{__('Age')}}</p>
                        <strong>{{$user->getAge()}}</strong>
                    </div>
                </div>
                <div class="col-md-4 mb-4 d-flex gap-16">
                    <div class="summary-card__item-icon">
                        <div class="icon-wedding-rings icon-size-30"></div>
                    </div>
                    <div class="summary-card__item-content">
                        <p>{{__('Marital Status')}}</p>
                        <strong>{{$user->getMaritalStatus('marital_status')}}</strong>
                    </div>
                </div>
                <div class="col-md-4 mb-4 d-flex gap-16">
                    <div class="summary-card__item-icon">
                        <div class="icon-suicase icon-size-30"></div>
                    </div>
                    <div class="summary-card__item-content">
                        <p>{{__('Experience')}}</p>
                        <strong>{{$user->getJobExperience('job_experience')}}</strong>
                    </div>
                </div>
                <div class="col-md-4 mb-4 d-flex gap-16">
                    <div class="summary-card__item-icon">
                        <div class="icon-salary icon-size-30"></div>
                    </div>
                    <div class="summary-card__item-content">
                        <p>{{__('Current salary')}}</p>
                        <strong>{{ number_format($user->current_salary)}} {{$user->salary_currency}}</strong>
                    </div>
                </div>
                <div class="col-md-4 mb-4 d-flex gap-16">
                    <div class="summary-card__item-icon">
                        <div class="icon-salary icon-size-30"></div>
                    </div>
                    <div class="summary-card__item-content">
                        <p>{{__('Expected salary')}}</p>
                        <strong>{{number_format($user->expected_salary)}} {{$user->salary_currency}}</strong>
                    </div>
                </div>
            </div>
            @if($user->video_link !=='' && null!==($user->video_link))
                <div class="mb-5">
                    <h6 class="mb-4">Video</h6>
                    <iframe width="100%" height="400" src="{{$user->video_link}}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            @endif
            <div class="mb-5">
                <h6 class="mb-4">{{__('Experience')}}</h6>
                <div class="" id="experience_div"></div>
            </div>

            <!-- Ẩn tính năng Portfolio HIRE-110 -->
        <!-- <div class="mb-5">
            <h3>{{__('Portfolio')}}</h3>
            <div  id="projects_div"></div>
        </div> -->
        </div>
        <div class="col-md-4">
            <div class="mb-5">
                <h6>{{__('Degree Level')}}</h6>
                @foreach($user->profileEducation as $education)
                    <div class="form-card mb-3">
                        <h6 class="my-0">{{$education->degree_title}}</h6>
                        @php
                            $degree_type = ($education->Industries) ? ' | '.$education->Industries->industry : '';
                        @endphp
                        <p class="text-primary mb-2 font-weight-bold">{{$education->date_completion}} | {{$education->institution . $degree_type}}</p>
                        <h6 class="my-0">{{$education->degree}}</h6>
                        <p>{{$education->school}}</p>
                    </div>
                @endforeach
            </div>

            <div class="mb-5">
                @php($jobSkills = \App\JobSkill::where('lang',\App::getLocale())->pluck('job_skill','job_skill_id'))
                @php($jobExperiences = \App\JobExperience::where('lang', \App::getLocale())->pluck('job_experience','job_experience_id'))
                <h6>{{__('Skills')}}</h6>
                @foreach($user->profileSkills as $skill)
                    <div class="form-card d-flex justify-content-between mb-3">
                        <p class="text-primary mb-2 font-weight-bold">{{ $jobSkills[$skill->job_skill_id] ?? ''}}</p>
                        <p>{{$jobExperiences[$skill->job_experience_id] ?? ''}} {{$skill->job_experience_id}}/5</p>
                    </div>
                @endforeach
            </div>
            <div class="mb-5">
                @php($jobLanguages = \App\Language::all()->pluck('lang','id'))
                @php($jobLanguageLevels = \App\LanguageLevel::all()->pluck('language_level','language_level_id'))
                <h6>{{__('Languages')}}</h6>
                @foreach($user->profileLanguages as $language)
                    <div class="form-card d-flex justify-content-between mb-3">
                        <p class="text-primary mb-2 font-weight-bold"> {{$jobLanguages[$language->language_id]?? ''}}</p>
                        <p>{{$jobLanguageLevels[$language->language_level_id] ?? ''}}</p>
                    </div>
                @endforeach

            </div>
        </div>
    <script type="text/javascript">
        $('#candidate-profile-modal').on('show.bs.modal', function () {
            showExperience();
        });


        function showExperience()
        {
            $.post("{{ route('show.applicant.profile.experience', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    $('#experience_div').html(response);
                });
        }

    </script>
</div>
@push('styles')
    <style type="text/css">
        .formrow iframe {
            height: 78px;
        }
    </style>
@endpush
@push('scripts')
    <script type="text/javascript">
        $('#candidate-profile-modal').on('show.bs.modal', function () {
            showExperience();
        });

        $( "#candidate-profile-modal" ).focus(function() {
            showExperience();
        });
        $(document).ready(function () {
            $('body').on('show.bs.modal', function () {
                showExperience();
            });
            $(window).on('load', function () {
                showExperience();
            });
            showEducation();
            showProjects();
            showExperience();
            showSkills();
            showLanguages();
        });
        function showProjects()
        {
            $.post("{{ route('show.applicant.profile.projects', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    $('#projects_div').html(response);
                });
        }
        function showExperience()
        {
            $.post("{{ route('show.applicant.profile.experience', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    $('#experience_div').html(response);
            });
        }
        function showEducation()
        {
            $.post("{{ route('show.applicant.profile.education', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    $('#education_div').html(response);
                });
        }
        function showLanguages()
        {
            $.post("{{ route('show.applicant.profile.languages', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    $('#language_div').html(response);
                });
        }
        function showSkills()
        {
            $.post("{{ route('show.applicant.profile.skills', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    $('#skill_div').html(response);
                });
        }

        function send_message() {
            const el = document.createElement('div')
            el.innerHTML = "Please <a class='btn' href='{{route('login')}}' onclick='set_session()'>log in</a> as a Employer and try again."
            @if(null!==(Auth::guard('company')->user()))
            $('#sendmessage').modal('show');
            @else
            swal({
                title: "You are not Loged in",
                content: el,
                icon: "error",
                button: "OK",
            });
            @endif
        }
        if ($("#send-form").length > 0) {
            $("#send-form").validate({
                validateHiddenInputs: true,
                ignore: "",

                rules: {
                    message: {
                        required: true,
                        maxlength: 5000
                    },
                },
                messages: {

                    message: {
                        required: "Message is required",
                    }

                },
                submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    @if(null !== (Auth::guard('company')->user()))
                    $.ajax({
                        url: "{{route('submit-message-seeker')}}",
                        type: "POST",
                        data: $('#send-form').serialize(),
                        success: function(response) {
                            $("#send-form").trigger("reset");
                            $('#sendmessage').modal('hide');
                            swal({
                                title: "Success",
                                text: response["msg"],
                                icon: "success",
                                button: "OK",
                            });
                        }
                    });
                    @endif
                }
            })
        }
    </script>
@endpush
