<div class="modal fade" id="updateInterviewModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(['route' => 'interview.schedule', 'method' => 'POST', 'id' => 'interview_schedule']) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="interview_Schedul_title">{{__('Interview Schedule')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" class="form-control" id="job_id" name="job_id" value="{{$job->id}}" >
                            <input type="hidden" class="form-control" name="user_id" value="{{$user->id}}">
                            <input type="hidden" class="form-control" name="company_id" value="{{$company->id}}">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="interview_actual_date">{{__('Interview Actual Date')}}</label>
                                    <input type="text" class="form-control" id="interview_actual_date" name="interview_actual_date"
                                           placeholder="{{__('Interview Actual Date')}}" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="interview_actual_time">{{__('Interview Actual Time')}}</label>
                                    <input type="time" class="form-control" id="interview_actual_time" name="interview_actual_time"
                                           placeholder="{{__('Interview Actual Time')}}" value="">
                                </div>
                            </div>
                            @if($interview->interview_actual_date != $interview->interview_plan_date)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="reschedule_by">{{__('Re')}}</label>
                                        {!! Form::select('functional_area_id', ['' => __('Select functional area')]+$functionalAreas, null, array('class'=>'form-control form-select', 'id'=>'functional_area_id')) !!}
                                        {!! APFrmErrHelp::showErrors($errors, 'functional_area_id') !!}
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Functional Area">{{__('Functional Area')}}</label>
                                    {!! Form::select('functional_area_id', ['' => __('Select functional area')]+$functionalAreas, null, array('class'=>'form-control form-select', 'id'=>'functional_area_id')) !!}
                                    {!! APFrmErrHelp::showErrors($errors, 'functional_area_id') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="person_in_charge">{{__('Interview Person')}}</label>
                                    <input type="text" class="form-control" id="person_in_charge" name="person_in_charge" placeholder="{{__('Interview Person')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                <button type="submit" class="btn btn-primary">{{__('Schedule')}}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>