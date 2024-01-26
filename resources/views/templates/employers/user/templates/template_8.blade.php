<div class="cv-template-wrapper cv-template-8 cvTemplateVietNam fontCVOpenSans fontCVsize12">
    <div class="temFlex">
        <div class="row">
                <div class="col-5">
                    <div class="bg-main" style="height: 50px">
                    </div>
                </div>
            </div>
        <div class="top">
            
            <div class="left-profile">
                <h2 class="name">{{ $user->last_name.' '.$user->middle_name.' '.$user->first_name }}</h2>
               <div class="contact-info">
                    <div><strong>Số Điện Thoại</strong> {{ $user->phone }}</div>
                    <div><strong>Địa Chỉ</strong> {{ $user->street_address }}</div>
                    <div><strong>Email</strong> {{ $user->email }}</div>
                    <div><strong>Ngày sinh</strong> {{ $user->date_of_birth->format('d-m-Y') }}</div>
                </div>
            </div>
            <div class="right-profile">
                 <div class="avata">
                    {{ ImgUploader::print_image("user_images/$user->image") }} 
                </div>

                
            </div>
        </div>
        <div class="body-content">
            <div class="row">
                <div class="col-5">
                    <div class="bg-main left-content">
                        <div class="box">
                            <h3>TRÌNH ĐỘ HỌC VẤN</h3>
                        <div class="text">
                        @if(count($user->profileEducation) > 0)
                        @foreach($user->profileEducation as $education)
                        <div class="time">
                            {{ $education->date_completion }}
                        </div>
                        <div class="info">
                            <div><strong>{{ $education->institution }} | {{ $education->city->city }}</strong></div>
                            <div>
                                {{ $education->institution }}
                            </div>
                        </div>
                        @endforeach
                        @endif
                        </div>
                        </div>
                        <div class="box">
                            <h3>LIÊN LẠC</h3>
                            <div class="contact-info">
                                <div><strong>Số Điện Thoại</strong> {{ $user->phone }}</div>
                                <div><strong>Địa Chỉ</strong> {{ $user->street_address }}</div>
                                <div><strong>Email</strong> {{ $user->email }}</div>
                                <div><strong>Ngày sinh</strong> {{ $user->date_of_birth->format('d-m-Y') }}</div>
                            </div>
                        </div>
                        
                        
                        <div class="box">
                            <div class="bg-white">
                                {{ $user->getProfileSummary('summary') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-7" style="padding-top: 30px">
                    <div class="box">
                        <h3 class="tagline">KINH NGHIỆM VIỆC LÀM</h3>
                        @if(count($user->profileExperience) > 0)
                        @foreach($user->profileExperience as $experience)
                        <div class="company">
                            <h3 class="company-name">{{ $experience->company }} <i>{{ $experience->title }}</i></h3>
                            <h3 class="position">{{ $experience->date_start->format('d M, Y') }} - {{ is_null($experience->date_end) ? 'Currently working' : $experience->date_end->format('d M, Y') }}</h3>
                            <div class="text">
                                {{ $experience->description }}
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>

                    <div class="box">
                        <h3 class="tagline">KỸ NĂNG</h3>
                        @if(count($user->profileSkills) > 0)
                        @foreach($user->profileSkills as $skill)
                        <div class="start-skill">
                            <label>{{ $skill->getJobSkill('job_skill') }}</label>
                            <div class="group-start">
                                
                                <?php for ($i=0; $i < 5; $i++) { 
                                    if($i < $skill['job_experience_id']) {

                                        echo '<i class="fas fa-star"></i>';
                                    } else {
                                         echo '<i class="far fa-star"></i>';
                                    }
                                }?>
                               
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="box">
                        <h3 class="tagline">NGOẠI NGỮ</h3>
                        @if(count($user->profileLanguages) > 0)
                        @foreach($user->profileLanguages as $language)
                        <div class="start-skill">
                            <label>{{ $language->getLanguageLevel('language_level') }}</label>
                            <div class="group-start">
                                
                                <?php for ($i=0; $i < 6; $i++) { 
                                    if($i < $language['language_level_id']) {

                                        echo '<i class="fas fa-star"></i>';
                                    } else {
                                         echo '<i class="far fa-star"></i>';
                                    }
                                }?>
                               
                            </div>
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
                                                <li> <i class="fas fa-phone-alt"></i>Số Điện Thoại: {{ $references->ref_phone }}</li>
                                                <i class="fa-regular fa-envelope"></i>Email: {{ $references->ref_email }}</li>
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
<div class="cv-template-wrapper cv-template-8 cvTemplateEnglish fontCVOpenSans fontCVsize12">
    <div class="temFlex">
        <div class="row">
                <div class="col-5">
                    <div class="bg-main" style="height: 50px">
                    </div>
                </div>
            </div>
        <div class="top">
            
            <div class="left-profile">
                <h2 class="name">{{ $user->first_name.' '.$user->middle_name.' '.$user->last_name }}</h2>
               <div class="contact-info">
                    <div><strong>Phone</strong> {{ $user->phone }}</div>
                    <div><strong>Add</strong> {{ $user->street_address }}</div>
                    <div><strong>Email</strong> {{ $user->email }}</div>
                    <div><strong>DOB</strong> {{ $user->date_of_birth->format('d-m-Y') }}</div>
                </div>
            </div>
            <div class="right-profile">
                 <div class="avata">
                    {{ ImgUploader::print_image("user_images/$user->image") }} 
                </div>

                
            </div>
        </div>
        <div class="body-content">
            <div class="row">
                <div class="col-5">
                    <div class="bg-main left-content">
                        <div class="box">
                            <h3>EDUCATION</h3>
                        <div class="text">
                        @if(count($user->profileEducation) > 0)
                        @foreach($user->profileEducation as $education)
                        <div class="time">
                            {{ $education->date_completion }}
                        </div>
                        <div class="info">
                            <div><strong>{{ $education->institution }} | {{ $education->city->city }}</strong></div>
                            <div>
                                {{ $education->institution }}
                            </div>
                        </div>
                        @endforeach
                        @endif
                        </div>
                        </div>
                        <div class="box">
                            <h3>CONTACTS</h3>
                            <div class="contact-info">
                                <div><strong>Phone</strong> {{ $user->phone }}</div>
                                <div><strong>Add</strong> {{ $user->street_address }}</div>
                                <div><strong>Email</strong> {{ $user->email }}</div>
                                <div><strong>DOB</strong> {{ $user->date_of_birth->format('d-m-Y') }}</div>
                            </div>
                        </div>
                        
                        <div class="box">
                            <div class="bg-white">
                                {{ $user->getProfileSummary('summary') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-7" style="padding-top: 30px">
                    <div class="box">
                        <h3 class="tagline">WORK EXPERIENCE</h3>
                        @if(count($user->profileExperience) > 0)
                        @foreach($user->profileExperience as $experience)
                        <div class="company">
                            <h3 class="company-name">{{ $experience->company }} <i>{{ $experience->title }}</i></h3>
                            <h3 class="position">{{ $experience->date_start->format('d M, Y') }} - {{ is_null($experience->date_end) ? 'Currently working' : $experience->date_end->format('d M, Y') }}</h3>
                            <div class="text">
                                {{ $experience->description }}
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>

                    <div class="box">
                        @if(count($user->profileSkills) > 0)
                        @foreach($user->profileSkills as $skill)
                        <div class="start-skill">
                            <label>{{ $skill->getJobSkill('job_skill') }}</label>
                            <div class="group-start">
                                
                                <?php for ($i=0; $i < 5; $i++) { 
                                    if($i < $skill['job_experience_id']) {

                                        echo '<i class="fas fa-star"></i>';
                                    } else {
                                         echo '<i class="far fa-star"></i>';
                                    }
                                }?>
                               
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="box">
                        @if(count($user->profileLanguages) > 0)
                        @foreach($user->profileLanguages as $language)
                        <div class="start-skill">
                            <label>{{ $language->getLanguageLevel('language_level') }}</label>
                            <div class="group-start">
                                
                                <?php for ($i=0; $i < 5; $i++) { 
                                    if($i < $language['language_level_id']) {

                                        echo '<i class="fas fa-star"></i>';
                                    } else {
                                         echo '<i class="far fa-star"></i>';
                                    }
                                }?>
                               
                            </div>
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
                                                <li> <i class="fas fa-phone-alt"></i>Số Điện Thoại: {{ $references->ref_phone }}</li>
                                                <i class="fa-regular fa-envelope"></i>Email: {{ $references->ref_email }}</li>
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
