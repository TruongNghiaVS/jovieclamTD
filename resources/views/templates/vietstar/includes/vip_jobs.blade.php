@if(isset($VIPJobs) && count($VIPJobs))
<div class="r-news">
    <div class="row mb-3">
    @foreach($VIPJobs as $VIPJob)
    <?php $company = $VIPJob->getCompany(); ?>
    @if(null !== $company)
    
    <!--Job start-->
    <div class="col-md-6 col-lg-4 mb-3">
        <div class="card-news w-100">
          <div class="card-news__icon">
            <a href="{{route('job.detail', [$VIPJob->slug])}}" title="{{$VIPJob->title}}">
            <img width="45" height="45" src="{{asset('company_logos/'.$company->logo)}}" alt="vietstar">
            </a>
          </div>
          <div class="card-news__content">
            <h6 class="card-news__content-title"><a href="{{route('job.detail', [$VIPJob->slug])}}" title="{{$VIPJob->title}}">{{$VIPJob->title}}</a></h6>
            <p class="card-news__content-detail"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></p>
            <div class="card-news__content-footer">
              <div class="card-news__content-footer__location">
                <span class="badge rounded-pill pill pill-location">{{$VIPJob->getCity('city')}}</span>
                <span class="badge rounded-pill pill pill-worktime">{{$VIPJob->getJobType('job_type')}}</span>
              </div>
              <div class="card-news__content-footer__salary">
                  {{ $VIPJob->salary_from }} - {{ $VIPJob->salary_to }} ({{ $VIPJob->salary_currency }})
              </div>
            </div>
          </div>
        </div>
    </div>
    <!--Job end--> 
    @endif
    @endforeach
    </div>
</div>
<div class="d-flex justify-content-center mx-auto">
    {!! $VIPJobs->appends(Request::except(['page','_token','active_tab']))->render() !!}
</div>
{{--
{!! $VIPJobs->links() !!}
{{!! $VIPJobs->appends(['sort' => 'salary_from'])->links() !!} --}}
@endif

