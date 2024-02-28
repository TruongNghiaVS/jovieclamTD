
<?php
$company = Auth::guard('company')->user();

?>
<!-- Modal -->

@if (Auth::guard('company')->check())
<div class="modal fade" id="company_profile_modal" tabindex="-1" role="dialog" aria-labelledby="company_profile_modal_Label" aria-hidden="true">
  <div class="modal-dialog modal-company-profile-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="company_profile_modal_Label">Hồ Sơ Công Khai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <section class="main-content my-1" id="main-content">
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
                                    {{ !empty($company->industry)?$company->industry->industry : '' }}</p>
                                    <div class="company-info public">   
                                <div class="company-info__item" >
                                            <i class="fa-regular fa-user mx-2"></i>
                                            {{ $company->no_of_employees }}
                                    </div>
                                </div>
                                <div
                                    class="job-detail-banner__actions job-detail-banner_info_actions d-flex flex-row gap-16">
                                    <form
                                        action="{{ route('seeker.submit-message', ['message' => 'Xin chào!', 'company_id' => $company->id, 'new' => true]) }}"
                                        method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary"><span
                                                class="icon icon-recruiter-email"></span>{{__('Send message')}}</button>
                                    </form>
                                    @if(Auth::check() && Auth::user()->isFavouriteCompany($company->slug))
                                    <a href="{{ route('remove.from.favourite.company', ['company_slug' => $company->slug])}}"
                                        class="btn btn-outline-primary"><i class="fas fa-heart iconoutline"></i>
                                        {{__('Favourite company')}} </a>
                                    @else
                                    <a href="{{ route('add.to.favourite.company', ['company_slug' => $company->slug]) }}"
                                        class="btn btn-outline-primary"><i class="far fa-heart"></i>
                                        {{__('Follow company')}}</a>
                                    @endif

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 d-flex flex-column  justify-content-between align-items-start">
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
                            <a href="{{ $company->facebook }}" class="social" target="_blank"><i class="bi bi-facebook"></i></a>
                            <a href="{{ $company->twitter }}" class="social" target="_blank"><i class="bi bi-twitter"></i></a>
                            <a href="{{ $company->linkedin }}" class="social" target="_blank"><i class="bi bi-linkedin"></i></span></a>
                            <a href="{{ $company->google_plus }}" class="social" target="_blank"><i class="bi bi-google"></i></a>
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
                    <div class="widget-public-profile widget-about">
                        <h4 class="title">{{__('About Company')}}</h4>

                        <div class="about-company">
                            {!! $company->description !!}
                            <div class="d-flex justify-content-end">
                                <a class="btn-view-more" href="{{ route('company.detail', $company->slug) }}" target="_blank" rel="noopener noreferrer">Xem Thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
          
            </div>
        </section>
    </div>
</section>

      </div>
    </div>
  </div>
</div>
@endif

@push('styles')
<style type="text/css">
    .modal-company-profile-dialog{
        max-width: 80%;
        min-width: 80%;
    }
    .btn-view-more {
        padding: 12px 16px;
        border-radius: 10px;
        color: var(--bs-primary);
        text-decoration: underline;
        border: none;
        outline: none;
        background-color:unset !important;
        transition:unset !important;
    }
    .about-company div{
        overflow: hidden;
        display: -webkit-box;
        /* display 2 lines only */
        -webkit-line-clamp: 2;
        line-clamp: 2;
        -webkit-box-orient: vertical;
        width: 100%;
    }
</style>
@endpush