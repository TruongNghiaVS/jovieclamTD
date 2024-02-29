@extends('templates.employers.layouts.app')

@section('content')

@include('templates.employers.includes.header')

@include('templates.employers.includes.company_dashboard_menu')
<!-- Header end -->
<!-- Inner Page Title start -->
<?php
if (Auth::guard('company')->user()) {
  $package = Auth::guard('company')->user();
  if (null !== ($package)) {
    $array_ids = explode(',', $package->availed_cvs_ids);
    if (in_array($user->id, $array_ids)) {
      $true = TRUE;
    }
  }
}
?> 


<div class="company-wrapper">


  @include('templates.employers.includes.mobile_dashboard_menu')
  <div class="container company-content">
    <div class="user-account-section">
 
      <div class="box-profile-view">
        <div class="formpanel mt0">
          <div class="section-head section-head2">
            <h3 class="title">CHỨC DANH/VỊ TRÍ: {{$job->title}}</h3>
          </div>
          <div class="section-body  section-head2">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="info" bis_skin_checked="1">
                  <div class="image" bis_skin_checked="1">
                    @if($user->logo)
                    <img src="{{ $user->avatar() }}" class="img-bio rounded mx-md-auto mt-md-4 d-block" alt="employers">
                    @else
                    <img src="/admin_assets/no-image.jpg" class="img-bio rounded mx-md-auto mt-md-4 d-block" alt="employers">
                    @endif
                  </div>
                  <ul class="info-list">
                    <li>
                      <p> <strong>Ứng viên:</strong></p>
                      <p class="name"> <strong>{{ $user->name }}</strong></p>
                    </li>
                    <li>
                      <p><strong>Ngày sinh:</strong></p>
                      <p>{{ date('d-m-Y', strtotime($user->date_of_birth)) }} </p>
                    </li>
                    <li>
                      <p><strong>Quốc tịch:</strong></p>
                      <p>Người việt Nam</p>
                    </li>
                    <li>
                      <p><strong>Giới Tính:</strong></p>
                      <p>{{$user->getGender('gender')}}</p>
                    </li>
                    <li>
                      <p><strong>Quốc Gia:</strong></p>
                      <p>Việt Nam</p>
                    </li>
                    <li>
                      <p><strong>Tỉnh/Thành Phố:</strong></p>
                      <p>{{$user->getCity2()}}</p>
                    </li>
                    <li>
                      <p><strong>Địa chỉ:</strong></p>
                      <p>{{ $user->street_address ?  $user->street_address :" " }} </p>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12">
                
              </div>
            </div>
            <p class="title-flip">Thông tin nghề nghiệp</p>
            <div class="job-information">
              <ul class="information-list">
                <li>
                  <p> <strong>Năm Kinh Nghiệm:</strong></p>
                  <p>{{$user->getJobExperiencev2('job_experience')}}</p>
                </li>
                <li>
                  @php
                    $education = $user->profileEducation()->first();
                    $educationText = 'Chưa cập nhật';
                    if($education)
                    {
                      $item = $education->getDegreeLevel();

                      if($item)
                      {
                        $educationText = $item->degree_level;
                      }
                     
                    }
                  @endphp
                  <p> <strong>Bằng Cấp Cao Nhất: </strong></p>
                  <p>{{$educationText}}</p>
                </li>
                <li>
                  <p> <strong>{{__('Current salary')}}</strong></p>
                  @if($user->current_salary > 0 )
                    <p>{{number_format($user->current_salary)}}</p>
                  @else 
                    <p>Chưa cập nhật</p>
                  @endif
                 
                </li>
                <li>
                  <p> <strong>Mức Lương Mong Muốn:</strong></p>

                  @if($user->expected_salary > 0 )
                    <p>{{number_format($user->expected_salary)}}</p>
                  @else 
                  <p>Chưa cập nhật</p>

                  @endif
                 
                </li>


                
                <li>
                  <p> <strong>Ngành Nghề Mong Muốn:</strong></p>
                  <p>{{$user->getIndustry('industry')}}</p>
                </li>
                <li>
                  <p> <strong>Địa Điểm:</strong></p>
                  <p>{{$user->street_address}}</p>
                </li>
                <li>
                  <p> <strong>Hình thức:</strong></p>
                  <p>Nhân viên chính thức</p>
                </li>
                <li>
                  <p> <strong>Ngày tạo:</strong></p>
                  <p>{{ date('d-m-Y', strtotime($user->created_at)) }}</p>
                </li>
                <li>
                  <p> <strong>Cập nhật:</strong></p>
                  <p>{{ date('d-m-Y', strtotime($user->updated_at)) }}</p>
                </li>
              </ul>

            </div>
            <p class="title-flip">NỘI DUNG HỒ SƠ</p>
           
            <div class ="profile-iframe" >
                  <iframe id="frm_view_pdf" 
                  frameborder="0"
                  toolbar =0,
                  navpanes=0,
                   scrolling="no" 
                  src="http://jobvieclam.com/cvs/83b901eb2cc47bf714c899608a4d263b.pdf" 
                  height="934"   width="100%">
                  </iframe>
             </div>

          </div>

        </div>
      </div>

   <div class="action" bis_skin_checked="1">
          <ul class="action-list">
            <li> <a href ="javascript:void(0)"
                    onclick ="downloadFileFromUrl('http://jobvieclam.com/cvs/83b901eb2cc47bf714c899608a4d263b.pdf', 'nguyen_truong_nghia.pdf')"
            >
                   <img style ="width:32px" src= "/iconDowloadFile.png"> 
                   <span>Xuất file pdf   </span></a>
            </li>
          </ul>
      </div>
    </div>
  </div>

</div>

@include('templates.employers.includes.footer')

@endsection

<script>
function downloadFileFromUrl(url, filename) {

  fetch(url,
  {
            method: "GET", 
            
            mode: 'cors'
        })
    .then(response => response.blob())
    .then(blob => {
      const link = document.createElement("a");
      link.href = URL.createObjectURL(blob);
      link.download = filename;
      link.click();
  })
  .catch(console.error);
}  
</script>






















{{--<?php $true = FALSE; ?>

<?php
if (Auth::guard('company')->user()) {
  $package = Auth::guard('company')->user();
  if (null !== ($package)) {
    $array_ids = explode(',', $package->availed_cvs_ids);
    if (in_array($user->id, $array_ids)) {
      $true = TRUE;
    }
  }
}
?> 

@section('content')
@include('templates.employers.includes.header')
<!-- Public profile cover -->
<section class="public-profile-cover">
    <div>
      <img src="{{ asset('employers/imgs/company-cover.jpg') }}" alt="employers - company">
</div>
</section>
<section class="container public-profile">
  <div class="card card-bio mb-5 w-100 shadow-sm">
    <div class="row g-0">
      <div class="col-md-2">
        @if($user->logo)
        <img src="{{ $user->avatar() }}" class="img-bio rounded mx-md-auto mt-md-4 d-block" alt="employers">
        @else
        <img src="/admin_assets/no-image.jpg" class="img-bio rounded mx-md-auto mt-md-4 d-block" alt="employers">
        @endif
      </div>
      <div class="col-md-10">
        <div class="card-body">
          <h5 class="card-title text-sub-color">{{ $user->name }}</h5>
          <p class="card-text">{{ $user->getProfileSummary('summary') }}</p>

        </div>
        <div class="card-body contact-bio d-flex flex-column">
          <span class="me-4 mb-2"><i class="far fa-map-marker-alt fa__icon-black me-2"></i>{{ $user->getLocation() }}</span>
          @if (((bool)$user->verified))
          <span class="me-4 mb-2 text-green-color"><i class="far fa-envelope fa__icon-black me-2"></i>{{ $user->email }}</span>
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
    <div class="col-md-12 col-lg-8 col-sm-12">
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
        <iframe width="100%" height="400" src="{{$user->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
    <div class="col-md-12 col-lg-4 col-sm-12">
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
        @php($jobLanguages = \App\Helpers\DataArrayHelper::languagesArray())
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
  </div>
</section>

@push('styles')
<style type="text/css">
  .formrow iframe {
    height: 78px;
  }
</style>
@endpush
@push('scripts')
<script type="text/javascript">


  $(document).ready(function() {
    $(document).on('click', '#send_applicant_message', function() {
      var postData = $('#send-applicant-message-form').serialize();
      $.ajax({
        type: 'POST',
        url: "{{ route('contact.applicant.message.send') }}",
        data: postData,
        //dataType: 'json',
        success: function(data) {
          response = JSON.parse(data);
          var res = response.success;
          if (res == 'success') {
            var errorString = '<div role="alert" class="alert alert-success">' + response.message + '</div>';
            $('#alert_messages').html(errorString);
            $('#send-applicant-message-form').hide('slow');
            $(document).scrollTo('.alert', 2000);
          } else {
            var errorString = '<div class="alert alert-danger" role="alert"><ul>';
            response = JSON.parse(data);
            $.each(response, function(index, value) {
              errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul></div>';
            $('#alert_messages').html(errorString);
            $(document).scrollTo('.alert', 2000);
          }
        },
      });
    });
    showEducation();
    showProjects();
    showExperience();
    showSkills();
    showLanguages();
  });

  function showProjects() {
    $.post("{{ route('show.applicant.profile.projects', $user->id) }}", {
        user_id: {
          {
            $user - > id
          }
        },
        _method: 'POST',
        _token: '{{ csrf_token() }}'
      })
      .done(function(response) {
        $('#projects_div').html(response);
      });
  }

  function showExperience() {
    $.post("{{ route('show.applicant.profile.experience', $user->id) }}", {
        user_id: {
          {
            $user - > id
          }
        },
        _method: 'POST',
        _token: '{{ csrf_token() }}'
      })
      .done(function(response) {

        $('#experience_div').html(response);
      });
  }

  function showEducation() {
    $.post("{{ route('show.applicant.profile.education', $user->id) }}", {
        user_id: {
          {
            $user - > id
          }
        },
        _method: 'POST',
        _token: '{{ csrf_token() }}'
      })
      .done(function(response) {
        $('#education_div').html(response);
      });
  }

  function showLanguages() {
    $.post("{{ route('show.applicant.profile.languages', $user->id) }}", {
        user_id: {
          {
            $user - > id
          }
        },
        _method: 'POST',
        _token: '{{ csrf_token() }}'
      })
      .done(function(response) {
        $('#language_div').html(response);
      });
  }

  function showSkills() {
    $.post("{{ route('show.applicant.profile.skills', $user->id) }}", {
        user_id: {
          {
            $user - > id
          }
        },
        _method: 'POST',
        _token: '{{ csrf_token() }}'
      })
      .done(function(response) {
        $('#skill_div').html(response);
      });
  }

  function send_message() {
    const el = document.createElement('div')
    el.innerHTML = "Please <a class='btn' href='{{route('login')}}' onclick='set_session()'>log in</a> as a Employer and try again."
    @if(null !== (Auth::guard('company') - > user()))
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
        @if(null !== (Auth::guard('company') - > user()))
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
@include('templates.employers.includes.footer')
@endsection--}}