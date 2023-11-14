@extends('templates.vietstar.layouts.app')
@section('content')
    <!-- Header start -->
    @include('templates.employers.includes.header')
    <!-- Header end -->

    <div class="user-wrapper">
                 
                @include('templates.employers.includes.mobile_dashboard_menu')
                <div class="content">
                    <div class="card">
                        <div class="posted-job-tab">
                            <ul class="nav nav-tabs" id="postedJob" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="posted-job-1" data-toggle="tab" data-target="#posted-job-1-pane" type="button" role="tab" aria-controls="posted-job-1-pane" aria-selected="true">{{__('Candidates')}}
                                        <span class="count"></span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="posted-job-2" data-toggle="tab" data-target="#posted-job-2-pane" type="button" role="tab" aria-controls="posted-job-2-pane" aria-selected="false">{{__('Short listed')}}<span class="count"></span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="posted-job-3" data-toggle="tab" data-target="#posted-job-3-pane" type="button" role="tab" aria-controls="posted-job-3-pane" aria-selected="false">{{__('Interview candidates')}}<span class="count"></span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="posted-job-4" data-toggle="tab" data-target="#posted-job-4-pane" type="button" role="tab" aria-controls="posted-job-4-pane" aria-selected="false">{{__('Hired candidates')}}
                                        <span class="count"></span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="posted-job-5" data-toggle="tab" data-target="#posted-job-5-pane" type="button" role="tab" aria-controls="posted-job-5-pane" aria-selected="false">{{__('Rejected candidates')}}
                                        <span class="count"></span></button>
                                </li>
                            </ul>
                            <div class="tab-content" id="postedJobContent">
                                @include('templates.employers.job.job_applications')
                                @include('templates.employers.job.job_favorite_applications')
                                @include('templates.employers.job.job_interview_applications')
                                @include('templates.employers.job.hired_applications')
                                @include('templates.employers.job.job_rejected_users',['data-target'=>"#posted-job-5-pane"])
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    @include('templates.employers.includes.footer')

    <div class="modal fade" id="modalScheduleInterview" tabindex="-1" aria-labelledby="modalScheduleInterviewLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('Schedule an interview')}}</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span class="iconmoon icon-close"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="form-schedule-interview">
                        <div class="form-group">
                            <label for="Job_title">Job title</label>
                            <input type="text" class="form-control" id="Job_title" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="Candidate">Candidate</label>
                            <input type="text" class="form-control" id="Candidate" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="Interview_date">Interview date</label>
                            <input type="date" class="form-control" id="Interview_date" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="Interview_time">Interview time</label>
                            <select class="form-select form-control" id="Interview_time">
                                <option selected="">{{__('Please select')}}/option>
                                <option value="1">8:00</option>
                                <option value="2">8:30</option>
                            </select>
                        </div>
                        <div class="form-group form-group-submit">
                            <div class="group-button">
                                <button type="submit" class="btn btn-primary">{{__('Schedule this interview')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            var url = window.location.href;
            var tabActive = url.substring(url.lastIndexOf('/')  + 1);
            if(tabActive){
                $('.nav-link').removeClass('active');
                $('.tab-pane').removeClass('active');
                $('.nav-link[id="'+tabActive+'"]').addClass('active');
                $('.tab-pane[id="'+tabActive+'-pane"]').addClass('active').addClass('show');
                $(tabActive).addClass('active');
            }

        });
        $(document).ready(function(){
            $('button[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('data-target'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if(activeTab){
                $('#nav-tab a[href="' + activeTab + '"]').tab('show');
            }
        });

    </script>
@endpush
