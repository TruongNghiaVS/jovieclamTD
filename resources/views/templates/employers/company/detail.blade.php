@extends('templates.vietstar.layouts.app')

@section('content')
    <!-- Header start -->
    @include('templates.employers.includes.header')
    <!-- Header end -->
  
<!-- Company cover -->

@include('templates.employers.includes.mobile_dashboard_menu')
@include('templates.employers.includes.company_dashboard_menu')

<!-- Hero banner -->
<section class="hero-banner-company-profile" style="background-image: url({!!  asset('/vietstar/imgs/company-cover.jpg') !!});"></section>


<!-- Main content -->
<section class="main-content my-5" id="main-content">
    <div class="container">
        <section class="section-company-profile">
            <div class="container-hm">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="company-profile">
                            <div class="box-logo">
                                <div class="logo">
                                    {{$company->printCompanyImage()}}
                                </div>
                            </div>
                            <div class="box-content">
                                <h2 class="company-name">{{ $company->name }}</h2>
                                <p class="company-position">
                                    {{ !empty($company->industry)?$company->industry->industry : '' }}
                                </p>
                                <div class="company-info public">
                                    <div class="company-info__item">
                                        <i class="fa-regular fa-user mx-2"></i>
                                        {{ $company->no_of_employees }}
                                    </div>
                                </div>
                                <div class="group-button job-detail-banner__actions job-detail-banner_info_actions d-flex flex-row gap-16">
                                    <form action="{{ route('seeker.submit-message', ['message' => 'Xin chào!', 'company_id' => $company->id, 'new' => true]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary"><span class="icon icon-recruiter-email"></span>{{__('Send message')}}</button>
                                    </form>
                                    @if(Auth::check() && Auth::user()->isFavouriteCompany($company->slug))
                                    <a href="{{ route('remove.from.favourite.company', ['company_slug' => $company->slug])}}" class="btn btn-outline-primary"><i class="fas fa-heart iconoutline"></i>
                                        {{__('Favourite company')}} </a>
                                    @else
                                    <a href="{{ route('add.to.favourite.company', ['company_slug' => $company->slug]) }}" class="btn btn-outline-primary"><i class="far fa-heart"></i>
                                        {{__('Follow company')}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">

                        <div class="row  company-info">
                            <div class="company-info__item">
                                <i class="bi bi-telephone"></i>
                                @if($company->phone)
                                <p>
                                    {{ $company->phone }}
                                </p>
                                @endif
                            </div>
                            <div class="company-info__item">
                                <i class="bi bi-envelope"></i>
                                @if($company->email)
                                <p>
                                    {{ $company->email }}
                                </p>
                                @endif
                            </div>

                            <div class="company-info__item">
                                <i class="bi bi-globe"></i>
                                @if($company->website)
                                <p>
                                    {{ $company->website }}
                                </p>
                                @endif
                            </div>
                        </div>

                        
                        <div class="socials">
                            <a href="{{ $company->facebook }}" class="social" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
                            <a href="{{ $company->twitter }}" class="social" target="_blank"><i class="fa-brands fa-square-twitter"></i></a>
                            <a href="{{ $company->linkedin }}" class="social" target="_blank"><i class="fa-brands fa-linkedin"></i></span></a>
                            <a href="{{ $company->google_plus }}" class="social" target="_blank"><i class="fa-brands fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @php
        $jobs = $company->jobs;
        $minSal = count($jobs->pluck('salary_from')->toArray()) > 0 ? min($jobs->pluck('salary_from')->toArray()) : 0;
        $maxSal = count($jobs->pluck('salary_to')->toArray()) > 0 ? max($jobs->pluck('salary_to')->toArray()) : 0;
        $avaragedSal = $maxSal/2 + $minSal/2;
        @endphp
        <section class="section-company-profile-detail">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="company-size">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="item-size">
                                    <div class="size-icon">
                                        <span class="iconmoon icon-recruiter-salary"></span>
                                    </div>
                                    <div class="size-content">
                                        <p>{{__('Industries')}}</p>
                                        <h4>{{ !empty($company->industry)?$company->industry->industry : 'NA' }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="item-size">
                                    <div class="size-icon">
                                        <span class="iconmoon icon-recruiter-total-employee"></span>
                                    </div>
                                    <div class="size-content">
                                        <p>{{__('Total Employees')}}</p>
                                        <h4>{{ $company->no_of_employees }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="item-size">
                                    <div class="size-icon">
                                        <span class="iconmoon icon-recruiter-calendar"></span>
                                    </div>
                                    <div class="size-content">
                                        <p>{{__('Established In')}}</p>
                                        <h4>{{ $company->established_in }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="item-size">
                                    <div class="size-icon">
                                        <span class="iconmoon icon-recruiter-suitcase"></span>
                                    </div>
                                    <div class="size-content">
                                        <p>{{__('Current jobs')}}</p>
                                        <h4>{{ $company->jobs->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget-public-profile widget-job">
                        <h4 class="title">{{__('Job Openings')}}</h4>
                        @if ($company->jobs->count() > 0)
                        @php( $jobShifts = App\JobShift::all()->pluck('job_shift','id') )
                        <div class="jobs">
                            @foreach ($company->jobs->sortBy('id') as $cjob)
                            <div class="job">
                                <div class="box-logo">
                                    <div class="logo">
                                        {{$company->printCompanyImage()}}
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <h3 class="job-title"><a href="{{route('job.detail', [$cjob->slug])}}" style="text-decoration: none;" title="{{$cjob->title}}">{{$cjob->title}}</a>
                                    </h3>
                                    <p class="job-name">{{ $company->name }}</p>
                                    <div class="group-control">
                                        <div class="tags">
                                            <span class="tag location">{{ !empty($cjob->location) ? $cjob->location :  $cjob->getCity('city')}}</span>
                                            <span class="tag time">{{ $jobShifts[$cjob->job_shift_id] ?? ''}}</span>
                                        </div>
                                        <div class="salary">
                                            {{--<span class="iconmoon icon-recruiter-attach_money"></span><span>{{$cjob->salary_from.' '.$cjob->salary_currency}}
                                            - {{$cjob->salary_to.' '.$cjob->salary_currency}}</span>--}}
                                            @php($from = round($cjob->salary_from/1000000,0))
                                            @php($to = round($cjob->salary_to/1000000,0))
                                            @if($cjob->salary_type == \App\Job::SALARY_TYPE_FROM)
                                            <span class="fas fa-dollar-sign"></span> {{__('From: ')}} {{$from}}
                                            {{__('million')}} ({{$cjob->salary_currency}})
                                            @elseif($cjob->salary_type == \App\Job::SALARY_TYPE_TO)
                                            <span class="fas fa-dollar-sign"></span> {{__('Up To: ')}} {{$to}}
                                            {{__('million')}} ({{$cjob->salary_currency}})
                                            @elseif($cjob->salary_type == \App\Job::SALARY_TYPE_RANGE)
                                            <span class="fas fa-dollar-sign"></span> {{$from}} - {{$to}}
                                            {{__('million')}} ({{$cjob->salary_currency}})
                                            @elseif($cjob->salary_type == \App\Job::SALARY_TYPE_NEGOTIABLE)
                                            <span class="fas fa-money-bill"></span> {{__('Negotiable')}}
                                            @else
                                            <span class="fas fa-dollar-sign"></span> {{__('Salary Not provided')}}
                                            @endif


                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <div class="widget-public-profile widget-about">
                        <h4 class="title">{{__('About Company')}}</h4>

                        <div class="about-company">
                            {!! $company->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="widget-public-profile widget-map">
                        <h4 class="title">Maps</h4>
                        <div class="map">
                            {!!$company->map!!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>



@include('templates.employers.includes.footer')

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style type="text/css">
    .formrow iframe {

        height: 78px;

    }

    ul.company-info.public {
        padding-bottom: 20px;
    }

    .section-company-profile .box-content .company-info {}
</style>

@endpush

@push('scripts')

<script type="text/javascript">
    $(document).ready(function() {

        $(document).on('click', '#send_company_message', function() {

            var postData = $('#send-company-message-form').serialize();

            $.ajax({

                type: 'POST',

                url: "{{ route('contact.company.message.send') }}",

                data: postData,

                //dataType: 'json',

                success: function(data) {

                    response = JSON.parse(data);

                    var res = response.success;

                    if (res == 'success') {

                        var errorString = '<div role="alert" class="alert alert-success">' +

                            response.message + '</div>';

                        $('#alert_messages').html(errorString);

                        $('#send-company-message-form').hide('slow');

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

    });



    function send_message() {

        const el = document.createElement('div')

        el.innerHTML =

            "Please <a class='btn' href='{{route('login')}}' onclick='set_session()'>log in</a> as a Canidate and try again."

        @if(Auth::check())

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

                    required: "{{ __('Message is required') }}",

                }



            },

            submitHandler: function(form) {

                $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }

                });

                @if(null !== (Auth::user()))

                $.ajax({

                    url: "{{route('submit-message')}}",

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