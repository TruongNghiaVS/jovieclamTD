@extends('templates.employers.layouts.app')
@inject('carbon', 'Carbon\Carbon')
@section('content')

 
    <!-- Header start -->
    @include('templates.employers.includes.header')
    <!-- Header end -->
   

    
    @include('templates.employers.includes.company_dashboard_menu') 

    <div class="company-wrapper main-content">
      
        @include('templates.employers.includes.mobile_dashboard_menu')
                <div class="container company-content">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="posted-manager-header">
                                <h1 class="title-manage">{{__('Company\'s Posted Jobs')}}</h1>
                                <a href="{{route('post.job')}}" class="btn btn-primary text-white"><i class="bi bi-pen text-white"></i> Đăng tuyển</a>
                            </div>
                            <form action="{{ route('posted.jobs') }}" method="get" class="form-search pt-2">
                                <div class="row filter-job">
                                    <div class="col-md-5 col-lg-5 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Từ Khóa</label>
                                            <input type="text" name="title" placeholder="{{ __('Research Jobs') }}"
                                                class="form-control search-title"
                                                value="{{ isset($request['title']) ? $request['title'] : '' }}">

                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <select name="status" class="form-select" name="" id="">
                                                <option value="">{{ __('Select status') }}</option>
                                                @foreach (\App\Job::getListStatusJob() as $key => $value)
                                                    <option
                                                        {{ isset($request['status']) && $request['status'] == $key ? 'selected' : '' }}
                                                        value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                    <!-- <div class="col-md-4 col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <select name="city_id" class="form-select" name="" id="city_id">
                                                <option value="">{{ __('Select cities') }}</option>
                                                @foreach ($cities as $key => $value)
                                                    <option
                                                        {{ isset($request['city_id']) && $request['city_id'] == $key ? 'selected' : '' }}
                                                        value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="col-md-3 col-lg-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="find_day">Tìm Theo Ngày</label>
                                                <select class="form-select" id="find_day">
                                                    <option>Ngày Đăng</option>
                                                    <option>Ngày Hết Hạn</option>
                                                
                                                </select>
                                            </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-sm-12">
                                        <div class="form-group form-group-datepicker input-daterange"  style="max-width: 100%; margin-bottom: 10px;">
                                            <label for="from_to">Từ - đến</label>
                                            <input type="text" class="daterange form-control " name="date_range" id="from_to"
                                                placeholder="{{ __('Start date-End date') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-sm-12">
                                        <div class="form-group">
                                        <label for="city_id">{{ __('City') }}</label>
                                            <select name="city_id" class="form-select" name="" id="city_id">
                                                <option value="">{{ __('Select cities') }}</option>
                                                @foreach ($cities as $key => $value)
                                                    <option
                                                        {{ isset($request['city_id']) && $request['city_id'] == $key ? 'selected' : '' }}
                                                        value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-sm-12 d-flex">
                                      
                                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass text-white m-2"></i>{{ __('Search') }}</button>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-sm-12 d-flex">
                                      
                                      <button type="button" class="btn btn-primary"><i class="fa-solid fa-download text-white m-2"></i>{{ __('Export file') }}</button>
                                  </div>
                                </div>
                            </form>
                            <div class="row justify-content-center">
                                <a href="{{ route('posted.jobs', ['status' => '1']) }}" class="px-auto btn btn-outline-primary {{ Request::get('status') == 1 ? 'type-active' : '' }}">{{ __('Active job') }}</a>
                                <a href="{{ route('posted.jobs', ['status' => '2']) }}" class="px-auto btn btn-outline-primary {{ Request::get('status') == 2 ? 'type-active' : '' }}">{{ __('Pending job') }}</a>
                                <a href="{{ route('posted.jobs', ['status' => '3']) }}" class="px-auto btn btn-outline-primary {{ Request::get('status') == 3 ? 'type-active' : '' }}">{{ __('Inactive job') }}</a>
                                <a href="{{ route('posted.jobs', ['expired' => 'true']) }}" class="px-auto btn btn-outline-primary {{ Request::get('expired') == 'true' ? 'type-active' : '' }}">{{ __('Job is expired') }}</a>
                            </div>
                        </div>
                    </div>
                    @include('flash::message')
                    <!-- <div class="row">
                        @if (isset($jobs) && count($jobs))
                            @foreach ($jobs as $job)
                                <div class="col-md-6 col-lg-4">
                                    <div class="posted-job">
                                        <h3 class="job-title">
                                            <a href="{{ route('job.detail', [$job->slug]) }}" title="{{ $job->title }}">{{ $job->title }}</a>
                                            @php
                                                $disable = $job->status == \App\Job::POST_PENDING || $job->status == \App\Job::POST_INACTIVE ? true : false;
                                                if(!empty($job->refresh_at)){
                                                        $refreshEn = $job->status == \App\Job::POST_ACTIVE &&
                                                        $carbon->parse($job->refresh_at)->diffInMinutes($carbon->now()) > 240 &&
                                                        $carbon->parse($job->expiry_date) > $carbon->now()  && $job->is_featured == 1 ? '' : 'disabled';
                                                    } else {
                                                        $refreshEn = $job->status == \App\Job::POST_ACTIVE &&
                                                        $carbon->parse($job->updated_at)->diffInMinutes($carbon->now()) > 240 &&
                                                        $carbon->parse($job->expiry_date) > $carbon->now()  && $job->is_featured == 1 ? '' : 'disabled';
                                                    }
                                            @endphp

                                            <button class="btn btn-sm btn-refresh-job-feature btn-refresh float-right" data-id="{{ $job->id }}" {{$refreshEn}} title="Làm mới"><i class="iconmoon icon-level-icon"></i></button>

                                        </h3>
                                        <div class="desc">
                                            @if(Carbon\Carbon::parse($job->expiry_date)->format('Y-m-d') > Carbon\Carbon::now()->format('Y-m-d'))
                                                {{ __(\App\Job::getListStatusJob()[$job->status]) }}
                                            @else
                                                {{ __('Job is expired') }} <i class='fas fa-exclamation' style='color:#981b1e'></i>
                                            @endif
                                        </div>
                                        <div class="group-control">
                                            <div class="tags">
                                                <span class="tag location">{{ $job->getCity('city') }} </span>
                                                <span class="tag time">{{ $job->getJobShift('job_shift') }}</span>
                                            </div>
                                            <div class="salary">
                                                <span
                                                    class="iconmoon icon-attach_money"></span><span>
                                                    @php($from = round($job->salary_from/1000000,0))
                                                    @php($to = round($job->salary_to/1000000,0))
                                                    @if($job->salary_type == \App\Job::SALARY_TYPE_FROM)
                                                        <span class="fas fa-dollar-sign"></span> {{__('From: ')}} {{$from}} {{__('million')}} ({{$job->salary_currency}})
                                                    @elseif($job->salary_type == \App\Job::SALARY_TYPE_TO)
                                                        <span class="fas fa-dollar-sign"></span> {{__('Up To: ')}} {{$to}} {{__('million')}} ({{$job->salary_currency}})
                                                    @elseif($job->salary_type == \App\Job::SALARY_TYPE_RANGE)
                                                        <span class="fas fa-dollar-sign"></span> {{$from}} - {{$to}} {{__('million')}} ({{$job->salary_currency}})
                                                    @elseif($job->salary_type == \App\Job::SALARY_TYPE_NEGOTIABLE)
                                                        <span class="fas fa-money-bill"></span> {{__('Negotiable')}}
                                                    @else
                                                        <span class="fas fa-dollar-sign"></span> {{__('Salary Not provided')}}
                                                    @endif

                                                </span>
                                            </div>
                                        </div>
                                        <hr>
                                        <ul class="detail-jobs">
                                            <li>
                                                <i class="fa-regular fa-user mx-2"></i>
                                                {{-- <a href="{{route('list.applied.users', [$job->id])}}">{{__('List of Candidates')}}</a> --}}
                                                <a
                                                    href="{{ route('application.manager') }}">{{ __('List of Candidates') }}</a>
                                                <span class="count">{{ $job->appliedUsers->count() }}</span>
                                            </li>
                                            {{-- <li>
                                            <span class="iconmoon icon-recruiter-profile"></span>
                                            <a href="{{route('list.result-posted-job', [$job->id,'posted-job-2'])}}">{{__('Short-Listed Candidates')}}</a>
                                            <span class="count"></span>
                                        </li> --}}
                                            <li>
                                                <span class="iconmoon icon-recruiter-profile"></span>
                                                {{-- <a href="{{route('list.favourite.applied.users', [$job->id])}}">{{__('Short-Listed Candidates')}}</a> --}}
                                                <a
                                                    href="{{ route('interview.schedule.calendar', [$job->company_id]) }}">{{ __('Interview Candidates') }}</a>
                                                <span class="count">{{ $job->getStatusInterview()->count() }}</span>
                                            </li>
                                            <li>
                                                <span class="iconmoon icon-recruiter-check"></span>
                                                {{-- status == 3 Successful interview --}}
                                                <a
                                                    href="{{ route('interview.filter', ['interview_status' => '3']) }}">{{ __('List of Hired Candidates') }}</a>
                                                <span class="count">{{ $job->getStatusInterview(3)->count() }}</span>
                                            </li>
                                            <li>
                                                <span class="iconmoon icon-recruiter-uncheck"></span>
                                                {{-- status == 4 Successful interview --}}
                                                <a
                                                    href="{{ route('interview.filter', ['interview_status' => '4']) }}">{{ __('List of Rejected Candidates') }}</a>
                                                <span class="count">{{ $job->getStatusInterview(4)->count() }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div> -->
                    <div class="card">

                        <div class="card-body">
    
                            <div class="table-responsive">
                                <table class="table table-applican-manager table-hover mb-0 border-0">
                                    <thead>
                                        <tr>
                                            <th class="font-weight-bold p-2 fx-16px" colspan="2">{{ __('Positions') }}</th>
                                            <!-- <th class="font-weight-bold"></th> -->
                                            <th class="font-weight-bold p-2 fx-16px">{{ __('Timeline') }}</th>
                                            <th class="font-weight-bold p-2 fx-16px">{{ __('Status') }}</th>

                                            <th class="font-weight-bold p-2 fx-16px">{{ __('Location') }}</th>
                                            <th class="font-weight-bold p-2 fx-16px">{{ __('Salary') }}</th>
    
                                            <th class="font-weight-bold p-2 fx-16px">{{ __('List of Candidates') }}</th>
                                            <th class="font-weight-bold p-2 fx-16px">{{ __('Interview Candidates') }}</th>
                                            <th class="font-weight-bold p-2 fx-16px">{{ __('List of Hired Candidates') }}</th>
                                            <th class="font-weight-bold p-2 fx-16px">{{ __('List of Rejected Candidates') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if (isset($jobs) && count($jobs))
                                        @foreach ($jobs as $job)
                                    
                                        <tr class="posted-manager_tb_row">
                                            
                                            <td  colspan="2">
                                                <div class="d-flex align-items-center h-100">
                                                    <div class="fs-18px font-weight-bold text-primary">
                                                        {{ $job->title }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center h-100 fs-18px">
                                                    Trạng thái 
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center h-100 fs-18px">
                                                @if(Carbon\Carbon::parse($job->expiry_date)->format('Y-m-d') > Carbon\Carbon::now()->format('Y-m-d'))
                                                    {{ __(\App\Job::getListStatusJob()[$job->status]) }}
                                                @else
                                                    {{ __('Job is expired') }}
                                                @endif
                                                </div>
                                            </td>
                                          
                                            <td>
                                                <div class="tags h-100">
                                                    <span class="tag location fs-18px">{{ $job->getCity('city') }} </span>
                                                    <span class="tag time">{{ $job->getJobShift('job_shift') }}</span>
                                                </div>
                                            </td>

                                            <td>
                                            <div class="d-flex align-items-center h-100 fs-18px">
                                                    @php($from = round($job->salary_from/1000000,0))
                                                    @php($to = round($job->salary_to/1000000,0))
                                                    @if($job->salary_type == \App\Job::SALARY_TYPE_FROM)
                                                        <span class="fas fa-dollar-sign mx-2"></span> {{__('From: ')}} {{$from}} {{__('million')}} ({{$job->salary_currency}})
                                                    @elseif($job->salary_type == \App\Job::SALARY_TYPE_TO)
                                                        <span class="fas fa-dollar-sign mx-2"></span> {{__('Up To: ')}} {{$to}} {{__('million')}} ({{$job->salary_currency}})
                                                    @elseif($job->salary_type == \App\Job::SALARY_TYPE_RANGE)
                                                        <span class="fas fa-dollar-sign mx-2"></span> {{$from}} - {{$to}} {{__('million')}} ({{$job->salary_currency}})
                                                    @elseif($job->salary_type == \App\Job::SALARY_TYPE_NEGOTIABLE)
                                                        <span class="fas fa-money-bill mx-2"></span> {{__('Negotiable')}}
                                                    @else
                                                        <span class="fas fa-dollar-sign mx-2"></span> {{__('Salary Not provided')}}
                                                    @endif
                                            </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center h-100 fs-18px">
                                                    {{ $job->appliedUsers->count() }}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center justify-content-center h-100 fs-18px">
                                                    {{ $job->getStatusInterview()->count() }}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center justify-content-center h-100 fs-18px">
                                                    {{ $job->getStatusInterview(3)->count() }}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center justify-content-center h-100 fs-18px">
                                                {{ $job->getStatusInterview(4)->count() }}
                                                </div>
                                            </td>

                                        
                                        </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- job end -->
                    <!-- Pagination Start -->
                    <div class="pagiWrap">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="showreslt">
                                    {{ __('Showing Pages') }} : {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }}
                                    {{ __('Total') }} {{ $jobs->total() }}
                                </div>
                            </div>
                            <div class="col-md-7 text-right">
                                @if (isset($jobs) && count($jobs))
                                    {{ $jobs->appends(request()->query())->links() }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Pagination end -->
                </div>
            
        
    
    </div>
    @include('templates.employers.includes.footer')
@endsection
@push('styles')
<style type="text/css">
    input.form-control.search-title {
    
    }
    a.px-auto.btn.btn-outline-primary {
        width: 24%;
        margin-left: 8px;
    }
    .type-active {
        background: #981b1d;
        color: white;
    }
  
    .row.filter-job {
    
    }
    .fx-16px {
        font-size: 16px !important;
    }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>

    <script type="text/javascript">


        $(document).ready(function(){
            $(".chosen").chosen();

            function deleteJob(id) {
                var msg = 'Are you sure?';
                if (confirm(msg)) {
                    $.post("{{ route('delete.front.job') }}", {
                        id: id,
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}'
                    })
                        .done(function(response) {
                            if (response == 'ok') {
                                $('#job_li_' + id).remove();
                            } else {
                                alert('Request Failed!');
                            }
                        });
                }
            }

            $('.btn-refresh').on('click', function() {
                var id = $(this).data('id');
                var url = "{{ route('refresh.front.job',':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    method: 'get',
                    beforeSend: function() {
                       console.log(id);
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.success == true) {
                            alert("{{__('Refresh job success!')}}");
                            refreshPage();
                        } else {
                            alert("{{__('Refresh job failed!')}}");
                        }
                    }
                });
            });
        });

        function refreshPage() {
            location.reload(true);
        }
    </script>
@endpush
