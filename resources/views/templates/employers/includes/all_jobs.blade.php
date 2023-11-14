@if(isset($allJobs) && count($allJobs))

<?php 
   $numberOfColumns = 9;
?>

<div class="r-news">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($allJobs->chunk($numberOfColumns) as $chunk)

            <div class="swiper-slide">
                <div class="row g-2">
                    @foreach($chunk as $allJob)
                    <?php $company = $allJob->getCompany(); ?>
                    @if(null !== $company)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card-news w-100">
                            <div class="card-news__icon">
                                <a href="{{route('job.detail', [$allJob->slug])}}" title="{{$allJob->title}}">
                                    <img width="45" height="45" src="{{asset('company_logos/'.$company->logo)}}"
                                        alt="vietstar">
                                </a>
                            </div>
                            <div class="card-news__content">
                                <button class="btn-pin-job active" type="button"><span
                                        class="iconmoon icon-flag"></span></button>
                                <h6 class="card-news__content-title"><a href="{{route('job.detail', [$allJob->slug])}}"
                                        title="{{$allJob->title}}">{{$allJob->title}}</a></h6>
                                <p class="card-news__content-detail"><a
                                        href="{{route('company.detail', $company->slug)}}"
                                        title="{{$company->name}}">{{$company->name}}</a></p>
                                <div class="card-news__content-footer">
                                    <div class="card-news__content-footer__location">
                                        <span
                                            class="badge rounded-pill pill pill-location">{{$allJob->getCity('city')}}</span>
                                        <span
                                            class="badge rounded-pill pill pill-worktime">{{$allJob->getJobType('job_type')}}</span>
                                    </div>
                                    <div class="card-news__content-footer__salary">
                                        {{ $allJob->salary_from }} - {{ $allJob->salary_to }}
                                        ({{ $allJob->salary_currency }})
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>

            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
@endif