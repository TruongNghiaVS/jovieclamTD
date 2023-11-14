@if(isset($suggestedJobs) && count($suggestedJobs))

<?php 
   $numberOfColumns = 9;
?>

<div class="r-news">
    <div class="swiper alljobs_swiper">
      <div class="swiper-wrapper">
        @foreach($suggestedJobs->chunk($numberOfColumns) as $chunk)
            
            <div class="swiper-slide">
              <div class="row">
                @foreach($chunk as $suggestedJob)
                      <?php $company = $suggestedJob->getCompany(); ?>
                  @if(null != $company)
                    <div class="col-md-6 col-lg-4 mb-3">
                      <div class="card-news w-100">
                        <div class="card-news__icon">
                          <a href="{{route('job.detail', [$suggestedJob->slug])}}" title="{{$suggestedJob->title}}">
                          <img width="45" height="45" src="{{asset('company_logos/'.$company->logo)}}" alt="vietstar">
                          </a>
                        </div>
                        <div class="card-news__content">
                          @if(Auth::check() && Auth::user()->isFavouriteJob($suggestedJob->slug))
                            <a class="save-job box-meta" href="{{route('remove.from.favourite', $suggestedJob->slug)}}">
                              <button class="btn-pin-job active" type="button"><span class="iconmoon fa fa-flag"></span></button>
                            </a>
                          @else
                            <a class="save-job box-meta" href="{{route('add.to.favourite', $suggestedJob->slug)}}">
                              <button class="btn-pin-job" type="button"><span class="iconmoon icon-flag "></span></button>
                            </a>
                          @endif
                          <h6 class="card-news__content-title"><a href="{{route('job.detail', [$suggestedJob->slug])}}" title="{{$suggestedJob->title}}">{{$suggestedJob->title}}</a></h6>
                          <p class="card-news__content-detail"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></p>
                          <div class="card-news__content-footer">
                            <div class="card-news__content-footer__location">
                              <span class="badge rounded-pill pill pill-location">{{$suggestedJob->getCity('city')}}</span>
                              <span class="badge rounded-pill pill pill-worktime">{{$suggestedJob->getJobType('job_type')}}</span>
                            </div>
                            <div class="card-news__content-footer__salary">
                            {{ $suggestedJob->salary_from }} - {{ $suggestedJob->salary_to }} ({{ $suggestedJob->salary_currency }})
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
