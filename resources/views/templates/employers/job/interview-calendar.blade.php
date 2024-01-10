@extends('templates.employers.layouts.app')
@section('content')
 
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
                    <div class="card">
                        <div class="card-body card-body-schedule-interview">
                            <div id='top' class="card-body-schedule-interview__top ">
                                <ul class="nav nav-change-schedule tabs nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="list-view-tab" data-toggle="tab" data-target="#list-view" type="button" role="tab" aria-controls="list-view" aria-selected="true">
                                            <i class="fa-solid fa-list iconmoon"></i>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link " id="month-view-tab" data-toggle="tab" data-target="#month-view" type="button" role="tab" aria-controls="month-view" aria-selected="false">
                                            <i class="fa-regular fa-calendar-days iconmoon"></i>
                                        </button>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-primary btn-schedule-interview"  data-toggle="modal" data-target="#modalScheduleInterview">{{ __('Schedule new interview') }}</button>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active" id="list-view" role="tabpanel" aria-labelledby="list-view-tab">
                                    @include('templates.employers.job/inc/list_schedule_interview')
                                </div>
                                <div class="tab-pane fade show active" id="month-view" role="tabpanel" aria-labelledby="month-view-tab">
                                    <h3 class="title-schedule-interview">{{ __('My Interview Schedule') }}</h3>
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        
    </div>

    <!-- Modal -->
    <div class="modal modal-review-application fade" id="modalScheduleInterview" tabindex="-1"
        aria-labelledby="modalScheduleInterviewLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('interview.schedule') }}" id="updateScheduleInterviewDate" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalScheduleInterviewLabel" >{{ __('Schedule interview') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="iconmoon icon-recruiter-close"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="load_review_cv">
                            <div class="form-group">
                                <label for="">{{ __('Job Title') }}</label>
                                {!! Form::select('job_id', ['' => __('Job title')]+ auth::guard('company')->user()->jobs->pluck('title', 'id')->toArray(), null, ['class' => 'form-control', 'id' => 'job-title']) !!}
                                {{-- <input type="text" class="form-control" placeholder="Job title"> --}}
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Candidate') }}</label>
                                <div id="get-candidate">
                                    {!! Form::select('user_id', ['' => __('Candidate')], null, ['class' => 'form-control']) !!}
                                </div>
                                {{-- <input type="text" class="form-control" placeholder="Candidate"> --}}
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Interview date') }}</label>
                                <input type="text" name="interview_plan_date" class="form-control bs-datetimepicker"
                                    placeholder="Ngày phỏng vấn">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Note') }}</label>
                                <textarea id="review-application-note" name="note" rows="5"
                                placeholder="Bạn có muốn thêm ghi chú cho sự thay đổi này không?"
                                class="form-control p-3"></textarea>
                            </div>
                            
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
                        <button type="submit" class="btn btn-primary" id="btnUpdateScheduleInterview">Cập nhật</button>
                    </div>
                </div>
            </form>

        </div>
    
    </div>

    @include('templates.employers.includes.footer')
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('employers/fullCalendar/main.min.css') }}">
    <style>

        .fc-widget-header{
            /*background-color:blue;*/
        }
        .fc-state-active, .fc-button-active {
            background-color: #981b1e !important;
        }
        .fc .fc-button-primary{
            background-color: #D1D1D1;
        }

        .fc, .fc-media-screen{
            width: 100% !important;
        }


    </style>
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ asset('employers/fullCalendar/main.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('employers/fullCalendar/locales-all.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var initialLocaleCode = "{{ App::getLocale() }}";
            var localeSelectorEl = document.getElementById('locale-selector');
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    right: 'prev,title,next',
                    left: ''
                },
                height: 'auto',
                defaultView: 'agendaWeek',
                initialDate: '{{\Carbon\Carbon::now()->format('Y-m-d')}}',
                locale: initialLocaleCode,
                buttonIcons: true, // show the prev/next text
                weekNumbers: false,
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [
                    @foreach($interviews as $interview){
                        title: '{{ ($interview->job) ? $interview->job->title : '' }}',
                        start: '{{ \Carbon\Carbon::parse($interview['interview_plan_date'])->format('Y-m-d') }}T{{ \Carbon\Carbon::parse($interview['interview_plan_date'])->format('H:i:s') }}',
                        //display: 'background',
                        color: '#981b1e'

                    },
                    @endforeach
                ]
            });

            calendar.render();

            // build the locale selector's options
            calendar.getAvailableLocaleCodes().forEach(function(localeCode) {
                var optionEl = document.createElement('option');
                optionEl.value = localeCode;
                optionEl.selected = localeCode == initialLocaleCode;
                optionEl.innerText = localeCode;
                localeSelectorEl.appendChild(optionEl);
            });

            // when the selected option changes, dynamically change the calendar option
            localeSelectorEl.addEventListener('change', function() {
                if (this.value) {
                    calendar.setOption('locale', this.value);
                }
            });

        });
        $(document).ready(function() {
            $('#month-view').hide();
            $('#job-title').on('change', function(e) {
                e.preventDefault();
                filterCandidate()
            })
            $('#month-view-tab').on('click', function(e) {
                $('#month-view').show();
            })
            $('#list-view-tab').on('click', function(e) {
                $('#month-view').hide();
            })
        })

        function filterCandidate(job_id) {
            var job_id = $('#job-title').val();
            console.log(job_id)
            if(job_id != '') {
                $.get("{{ route('filter.list.candidates', "") }}"+"/"+job_id)
                .done(function (response) {
                        $('#get-candidate').html(response)
                    });
            }
        }




    </script>
@endpush

