<?php

namespace App\Http\Controllers;

use App\FavouriteApplicant;
use App\Helpers\DataArrayHelper;
use App\Job;
use App\JobApply;
use App\Interview;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Form;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = auth::guard('company')->user();
        $data = $request->all();
        try {
            $data['company_id'] = $company->id;
            $data['interview_plan_date'] = Carbon::parse($request->interview_plan_date)->format('Y-m-d H:i:00');
            $data['interview_status'] = 1;
            $interview = Interview::create($data);
            flash(__('Update successful interview'))->success();
            return redirect()->route('interview.schedule.calendar', ['company_id'=> $interview->company_id]);
        } catch (\Throwable $th) {

            flash(__('Interview update failed'))->error();

            return redirect()->route('interview.schedule.calendar', ['company_id'=> $company->id]);
        }
        // $params = $request->all();
        // $strDate = strtotime($params['interview_plan_date'].' '.$params['interview_plan_time']. ':00');
        // $params['interview_plan_date'] = date('Y-m-d H:m:s', $strDate);
        // $params['short_listed_status'] = \App\Interview::STATUS_WAITING;
        // \App\Interview::Create($params);
        // return redirect()->route('list.result-posted-job', $params['job_id'])->with('success', __('Interview created successfully.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function show(Interview $interview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        try {
            $interview = Interview::findOrFail($request->id);

            return response()->json([
                'success' => true,
                'data' => $interview
            ]);
        } catch (\Throwable $th) {
            
            return response()->json([
                'success' => false,
                'message' => 'Service error'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $company = auth::guard('company')->user();
        $data = $request->all();

        try {
            $interview = Interview::findOrFail($request->id_interview);
            $data['interview_plan_date'] = Carbon::parse($request->interview_plan_date)->format('Y-m-d H:i:00');
            $interview->update($data);
            flash(__('Update successful interview'))->success();

            return redirect()->route('interview.schedule.calendar', ['company_id'=> $interview->company_id]);
        } catch (\Throwable $th) {

                flash(__('Interview update failed'))->error();

                return redirect()->route('interview.schedule.calendar', ['company_id'=> $company->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interview $interview
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interview $interview)
    {
        //
    }


    public function getInterviewList(Request $request, $company_id)
    {
        $query = Interview::with('job', 'applicant:id,name', 'company:id,name')
                    ->where('company_id', $company_id);

        $interviews = $query->get();

        return view(config('app.THEME_PATH').'.job.interview-calendar')
            ->with('interviews', $interviews);

    }

    public function getFilter(Request $request) {
        try {
            $company = Auth::guard('company')->user();
            $title = $request->title;
            $filterInterview = Interview::with('job', 'applicant:id,name', 'company:id,name')->where('company_id', $company->id);
                                
            if($request->date_range) {

                $date_range = explode('- ',$request->date_range);
                $start_date = Carbon::parse($date_range[0])->format('Y-m-d');
                $end_date = Carbon::parse($date_range[1])->format('Y-m-d');
                $filterInterview = $filterInterview->whereDate('interview_plan_date', '>=', $start_date)->whereDate('interview_plan_date', '<=', $end_date);
            }

            if($request->title) {
                $title = $request->title;
                $filterInterview = $filterInterview->whereHas('job', function($query) use ($title) {
                        $query->where('jobs.title', 'like', '%'.$title.'%');
                });
            }

            if($request->interview_status) {
                $filterInterview = $filterInterview->where('interview_status', $request->interview_status);
            }

            $filterInterview = $filterInterview->get();
                                
            $jobs = Job::active()->notExpire()->orderBy('id', 'desc')->pluck('title', 'id');

            return view(config('app.THEME_PATH').'.job.interview-calendar')
                    ->with('interviews', $filterInterview)
                    ->with('jobs', $jobs);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function listCandidate($job_id) {
        try {
            $job = Job::findOrFail($job_id);
            $users = User::whereIn('id', $job->getAppliedUserIdsArray())->pluck('name', 'id')->toArray();
            $dd = Form::select('user_id', ['' => __('Candidate')] + $users, null, ['class' => 'form-control']);
            echo $dd;
        
        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
            ]);
        }
    }
}
