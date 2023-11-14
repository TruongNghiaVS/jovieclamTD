<div class="cv-template-wrapper cv-template-1 cvTemplateVietNam fontCVOpenSans fontCVsize12">
    <div class="temFlex">
        <div class="top">
            <div class="left-profile">
                <div class="avata">
                    {{ ImgUploader::print_image("user_images/$user->image") }} 
                </div>
                <h2 class="name">{{ $user->last_name.' '.$user->middle_name.' '.$user->first_name }}</h2>
                <div class="position"></div>
            </div>
            <div class="right-profile">
                <h2>giới thiệu</h2>
                <div class="text">
                    {{ $user->getProfileSummary('summary') }}
                </div>
                <div class="contact-info">
                    <h3>Liên lạc</h3>
                    <div>{{ $user->phone }}</div>
                    <div>{{ $user->street_address }}</div>
                    <div>{{ $user->email }}</div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="body-content">
            <div class="row">
                <div class="col-6">
                    <div class="box">
                        <h3 class="tagline">TRÌNH ĐỘ HỌC VẤN</h3>
                        @if(count($user->profileEducation) > 0)
                        @foreach($user->profileEducation as $education)
                        <div class="timeline">
                            <div class="time">
                                {{ $education->date_completion }}
                            </div>
                            <div class="info">
                                <div><strong>{{ $education->institution }} | {{ $education->city->city ?? '' }}</strong></div>
                                <div>
                                    {{ $education->institution }}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="box">
                        <h3 class="tagline">Kỹ năng</h3>
                        @if(count($user->profileSkills) > 0)
                        @foreach($user->profileSkills as $skill)
                        <div class="progress-group">
                            <div>{{ $skill->getJobSkill('job_skill') }}</div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{ 100 * $skill['job_experience_id']/5 }}%" aria-valuenow="{{ 100 * $skill['job_experience_id']/5 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                 <div class="line line-1"></div>
                                <div class="line line-2"></div>
                                <div class="line line-3"></div>
                                <div class="line line-4"></div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="box">
                        <h3 class="tagline">Ngoại ngữ</h3>
                        @if(count($user->profileLanguages) > 0)
                        @foreach($user->profileLanguages as $language)
                        <div class="progress-group">
                            <div>{{ $language->getLanguageLevel('language_level') }}</div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{ ceil(100 * $language->getLanguageLevel('language_level_id')/6) }}%" aria-valuenow="{{ ceil(100 * $language['language_level_id']/6) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                 <div class="line line-1"></div>
                                <div class="line line-2"></div>
                                <div class="line line-3"></div>
                                <div class="line line-4"></div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="bg-main">
                        <div class="box">
                            <h3>KINH NGHIỆM VIỆC LÀM</h3>
                            @if(count($user->profileExperience) > 0)
                            @foreach($user->profileExperience as $experience)
                            <div class="timeline">
                                <div class="time">
                                    {{ $experience->date_start->format('d M, Y') }} - {{ is_null($experience->date_end) ? 'Hiện đang làm việc' : $experience->date_end->format('d M, Y') }}
                                </div>
                                <div class="info">
                                    <div><strong>{{ $experience->company }} | {{ $experience->title }}</strong></div>
                                    <div>
                                        {{ $experience->description }}
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="box">
                            <h3 class="">HOẠT ĐỘNG KHÁC</h3>
                            <div class="" id="sticker_div_cv">
                                <div class="sticker">
                                    <ul class="list-sticker">
                                        @if(count($user->profileActivity) > 0)
                                        @foreach($user->profileActivity as $activity)
                                        <li class="item" id="actList_23064">
                                            <div class="head-sticker">
                                                <div class="title">
                                                    <h4>{{ $activity->company }}</h4>
                                                    <div class="sub-title">
                                                        <p>{{ $activity->role }}</p>
                                                    </div>
                                                    <div class="date">
                                                        <p>{{ $activity->date_start->format('d M, Y') }} - {{ ($activity->date_end) ? $activity->date_end->format('d M, Y') : 'Hiện đang làm việc' }}</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <h3 class="">NGƯỜI THAM KHẢO</h3>
                            <div class="" id="references_div_cv">

                                <div class="list-references">
                                    @if(count($user->profileReferences) > 0)
                                    @foreach($user->profileReferences as $references)
                                    <div class="item" id="referList_814524">
                                        <div class="head-sticker">
                                            <div class="title">
                                                <h4>{{ $references->ref_name }}</h4>
                                                
                                            </div>
                                            <div class="meta-info">
                                                <ul>
                                                    <li> <i class="fas fa-user"></i>{{ $references->ref_position }}</li>
                                                    <li> <i class="far fa-building"></i>{{ $references->ref_company }}</li>
                                                    <li> <i class="fas fa-phone-alt"></i>Số điện thoại: {{ $references->ref_phone }}</li>
                                                    <li> <i class="far fa-envelope"></i>Email: {{ $references->ref_email }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cv-template-wrapper cv-template-1 cvTemplateEnglish fontCVOpenSans fontCVsize12">
    <div class="temFlex">
        <div class="top">
            <div class="left-profile">
                <div class="avata">
                    {{ ImgUploader::print_image("user_images/$user->image") }} 
                </div>
                <h2 class="name">{{ $user->first_name.' '.$user->middle_name.' '.$user->last_name }}</h2>
                <div class="position"></div>
            </div>
            <div class="right-profile">
                <h2>INTRODUCTION</h2>
                <div class="text">
                    {{ $user->getProfileSummary('summary') }}
                </div>
                <div class="contact-info">
                    <h3>CONTACT</h3>
                    <div>{{ $user->phone }}</div>
                    <div>{{ $user->street_address }}</div>
                    <div>{{ $user->email }}</div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="body-content">
            <div class="row">
                <div class="col-6">
                    <div class="box">
                        <h3 class="tagline">EDUCATIONS</h3>
                        @if(count($user->profileEducation) > 0)
                        @foreach($user->profileEducation as $education)
                        <div class="timeline">
                            <div class="time">
                                {{ $education->date_completion }}
                            </div>
                            <div class="info">
                                <div><strong>{{ $education->institution }} | {{ $education->city->city ?? ''}}</strong></div>
                                <div>
                                    {{ $education->institution }}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="box">
                        <h3 class="tagline">SKILLS</h3>
                        @if(count($user->profileSkills) > 0)
                        @foreach($user->profileSkills as $skill)
                        <div class="progress-group">
                            <div>{{ $skill->getJobSkill('job_skill') }}</div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{ 100 * $skill['job_experience_id']/5 }}%" aria-valuenow="{{ 100 * $skill['job_experience_id']/5 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="line line-1"></div>
                                <div class="line line-2"></div>
                                <div class="line line-3"></div>
                                <div class="line line-4"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="bg-main">
                        <div class="box">
                            <h3>WORK EXPERIENCE</h3>
                            @if(count($user->profileExperience) > 0)
                            @foreach($user->profileExperience as $experience)
                            <div class="timeline">
                                <div class="time">
                                    {{ $experience->date_start->format('d M, Y') }} - {{ is_null($experience->date_end) ? 'Currently working' : $experience->date_end->format('d M, Y') }}
                                </div>
                                <div class="info">
                                    <div><strong>{{ $experience->company }} | {{ $experience->title }}</strong></div>
                                    <div>
                                        {{ $experience->description }}
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        

                        <div class="box">
                            <h3 class="">OTHER ACTIVITIES</h3>
                            <div class="" id="sticker_div_cv">
                                <div class="sticker">
                                    <ul class="list-sticker">
                                        @if(count($user->profileActivity) > 0)
                                        @foreach($user->profileActivity as $activity)
                                        <li class="item" id="actList_23064">
                                            <div class="head-sticker">
                                                <div class="title">
                                                    <h4>{{ $activity->company }}</h4>
                                                    <div class="sub-title">
                                                        <p>{{ $activity->role }}</p>
                                                    </div>
                                                    <div class="date">
                                                        <p>{{ $activity->date_start->format('d M, Y') }} - {{ ($activity->date_end) ? $activity->date_end->format('d M, Y') : 'Currently working' }}</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <h3 class="">REFERENCES</h3>
                            <div class="" id="references_div_cv">

                                <div class="list-references">
                                    @if(count($user->profileReferences) > 0)
                                    @foreach($user->profileReferences as $references)
                                    <div class="item" id="referList_814524">
                                        <div class="head-sticker">
                                            <div class="title">
                                                <h4>{{ $references->ref_name }}</h4>
                                                
                                            </div>
                                            <div class="meta-info">
                                                <ul>
                                                    <li> <i class="fas fa-user"></i>{{ $references->ref_position }}</li>
                                                    <li> <i class="far fa-building"></i>{{ $references->ref_company }}</li>
                                                    <li> <i class="fas fa-phone-alt"></i>Phone: {{ $references->ref_phone }}</li>
                                                    <li> <i class="far fa-envelope"></i>Email: {{ $references->ref_email }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

