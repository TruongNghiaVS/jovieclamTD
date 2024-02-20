@php
                                            function checksalary( $from, $to)
                                            {
                                                    $salaryTextFrom = 0;
                                                    $salaryTextTo =  0;
                                                    $textSalary ='';
                                                    if($from > 0 &&  $to > 0) 
                                                    {
                                                        $salaryTextFrom = number_format($from, 0, '', '.');
                                                        $salaryTextTo = number_format($to, 0, '', '.');
                                                        return  $salaryTextFrom."-".$salaryTextTo. "  VNĐ";

                                                    }
                                                    if($from < 1 && $to < 1)
                                                    {
                                                    return  'Thương lượng';

                                                    }
                                                    if($from >0)
                                                    {
                                                        $salaryTextFrom = number_format($from, 0, '', '.');
                                                        return "Từ ".$salaryTextFrom." VNĐ";
                                                    }
                                                    if($to >0)
                                                    {
                                                        $salaryTextTo = number_format($to, 0, '', '.');
                                                        return "Đến ".$salaryTextTo." VNĐ";
                                                    }
                                                
                                            }

                                            
@endphp
@extends('templates.employers.layouts.app')
@section('content') 
<!-- Header start --> 
    <!-- Header start -->
    @include('templates.employers.includes.header')
    <!-- Header end -->
   
<!-- Inner Page Title start --> 
@include('templates.employers.includes.company_dashboard_menu') 
<!-- Inner Page Title end -->
<div class="company-wrapper">

           @include('templates.employers.includes.mobile_dashboard_menu')

            <div class="container company-content"> 
            @include('flash::message') 
                <div class="myads">
                    <h3>{{__('Company Followers')}} </h3>
                    <div class="searchList jobs-apply-list">
                        <!-- job start --> 
                        @if(isset($users) && count($users))
                        @foreach($users as $user)

                        @php
                            $salaryText  = checksalary($user->current_salary, $user->expected_salary);
                        @endphp
                        <div class="item-job">
                            <div class="card-news card-news-applied-jobs gap-16 mb-2">
                                <div class="card-news__icon">
                                    {{$user->printUserImage(100, 100)}}
                                </div>
                                <div class="card-news__content">
                                    
                                    <div class="card-news__content-footer card-news__content-footer-applied-jobs">
                                        <div class="applied-jobs-information">
                                            <h6 class="card-news__content-title"><a href="javascript:void(0)" 
                                            onclick="showModal_candidate('{{ $user->id }}', '{{ $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name }}');"
                                            
                                            >{{$user->getName()}}</a></h6>
                                                @if($user->phone)<p class="card-news__content-detail mb-1"><span class="iconmoon icon-recruiter-phone-call"></span> {{$user->phone}} </p>@endif
                                                @if($user->email)<p class="card-news__content-detail mb-1"><span class="iconmoon icon-recruiter-email"></span> {{$user->email}}  </p>@endif
                                                @if($user->getLocation()) <p class="card-news__content-detail mb-1"> <span class="iconmoon icon-recruiter-location"></span> {{$user->getLocation()}} @if($user->street_address)  - {{$user->street_address}}@endif</p>@endif
                                        </div>
                                        
                                        <div class="card-news__content-footer__salary">
                                            <p class="card-news__content-detail mb-2">
                                                @if($user->gender_id == 2)
                                                {{_('Male')}}
                                                @endif
                                                @if($user->gender_id == 1)
                                                {{_('Female')}}
                                                @endif
                                            </p>
                                            
                                            <div class="rank-salary">

                                                {{$salaryText}}
                                              
                                            </div>
                                           <div>
                                                    <a role="button" href="javascript:void(0)" class="dropdown-item public-profile-toggle"
                                                    onclick="showModal_candidate('{{ $user->id }}', '{{ $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name }}');">
                                                    <!-- Rest of your code here -->Xem cv
                                                    </a>
                                           </div>
                                           
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        <!-- job end --> 
                        @endforeach
                        @endif
                    </div>
                </div>
            </div> 
</div>

<div class="modal modal-review-application fade" id="candidate-profile-modal" tabindex="-1"
     aria-labelledby="modalReviewApplicationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="candidate-profile-modal-title">{{__('Candidate public profile')}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="iconmoon icon-recruiter-close"></span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("Close")}}</button>
            </div>
        </div>
    </div>
</div>

@include('templates.employers.includes.footer')
@endsection

<!-- End Job Modal -->
@push('styles')
<style type="text/css">
    .image-candidate img {
        vertical-align: middle;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    #candidate-profile-modal .modal-body iframe{
            width: 100%;
            height: 100%;
    }
    #candidate-profile-modal .modal-dialog {
        max-height: 100vh;
        height: 100vh;
    }
    #candidate-profile-modal .modal-dialog  .modal-content{
        max-height: 90%;
        height: 90%;
    }
</style>
@endpush
@push('scripts')

@endpush
@push('scripts')
<script>
    $(document).ready(function(){
       

        $('.job-details').on('click',function(e){
            e.preventDefault();
            var job_slug= $(this).attr('data-job-slug');
            var job_name= $(this).attr('data-job-name');
            if(job_slug != '' && job_slug != undefined){
                var url = "{{ route('job.detail.popup', [':job_slug']) }}";
                url = url.replace(':job_slug',job_slug);
                $.ajax({
                    url: url,
                    method: 'get',
                    beforeSend: function(){
                    },
                    success: function(response){
                        $('#job-detail-modal-title').html($('#job-detail-modal-title').html() + ' - ' + job_name);
                        $('#job-detail-modal .modal-body').html(response);
                        $('#job-detail-modal').modal('show').trigger('focus');
                    }
                });
            }
        });
    });
</script>
@endpush