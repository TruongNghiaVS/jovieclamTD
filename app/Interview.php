<?php

namespace App;

use App\Company;
use App\FavouriteApplicant;
use App\User;
use App\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    //SHORTLIST
    const STATUS_WAITING = 1;
    const STATUS_PROCESSING = 2;
    const STATUS_APPLICANT_REJECTED_INTERVIEW = 3;
    const STATUS_APPLICANT_RESCHEDULE_INTERVIEW = 4;
    const STATUS_COMPANY_REJECTED_INTERVIEW = 5;
    const STATUS_COMPANY_RESCHEDULE_INTERVIEW = 6;
    const STATUS_INTERVIEWED = 7;
    const STATUS_HIRED = 8;

    //INTERVIEWED
    const STATUS_PASSED = 3;
    const STATUS_FAILED = 4;

    //ROUND
    const INTERVIEW_ROUND_1 = 1;
    const INTERVIEW_ROUND_2 = 2;
    const INTERVIEW_ROUND_3 = 3;

    //INTERVIEW TYPE
    const INTERVIEW_TYPE_ONLINE = 1;
    const INTERVIEW_TYPE_OFFLINE = 2;
    const INTERVIEW_TYPE_VIDEO = 3;
    const INTERVIEW_TYPE_WRITING = 4;
    const INTERVIEW_TYPE_ORAL = 5;
    const INTERVIEW_TYPE_OTHER = 6;


    //OFFER
    const STATUS_APPLICANT_REVIEW_OFFER = 10;
    const STATUS_APPLICANT_REJECTED_OFFER = 11;
    const STATUS_APPLICANT_ACCEPTED_OFFER = 12;
    const STATUS_COMPANY_CANCELED_OFFER = 13;
    const STATUS_COMPANY_REDEAL_OFFER = 14;

    //OFFER TYPE
    const OFFER_TYPE_PERMANENT = 1;
    const OFFER_TYPE_TEMPORARY = 2;
    const OFFER_TYPE_OTHER = 3;

    //START DATE
    const STATUS_APPLICANT_SCHEDULED_TO_START_DATE = 15;
    const STATUS_APPLICANT_RESCHEDULED_TO_START_DATE = 16;
    const STATUS_APPLICANT_CANCEL_TO_START_DATE = 17;
    const STATUS_COMPANY_SCHEDULED_TO_START_DATE = 18;
    const STATUS_COMPANY_CANCEL_TO_START_DATE = 19;

    //PROBATION
    const STATUS_APPLICANT_STARTED_PROBATION = 20;
    const STATUS_APPLICANT_CANCELED_PROBATION = 21;
    const STATUS_APPLICANT_COMPLETED_PROBATION = 22;
    const STATUS_COMPANY_CANCELED_PROBATION = 23;

    //SIGN CONTRACT
    const STATUS_CONTRACTED = 24;
    const STATUS_APPLICANT_REJECTED_CONTRACT = 25;
    const STATUS_COMPANY_REJECTED_CONTRACT = 26;

    protected $table = 'interviews';
    protected $fillable = [
        'user_id',
        'company_id',
        'job_id',
        'functional_area_id',
        'person_in_charge',
        'short_listed_status',
        'interview_type',
        'interview_status',
        'interview_round',
        'interview_plan_date',
        'interview_actual_date',
        'offer_status',
        'offer_type',
        'start_date',
        'start_date_status',
        'start_date',
        'probation_status',
        'sign_contract_status',
        'note',
        'created_at',
        'updated_at'
    ];

    public function applicant()
    {
        return $this->belongsTo(User::Class, 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::Class, 'company_id');
    }

    public function job() {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function favoriteApplicant()
    {
        return $this->hasMany(FavouriteApplicant::Class, 'user_id');
    }

    public static function getShortListStatus()
    {
        return
        [
            self::STATUS_WAITING => 'Interview',
            self::STATUS_PROCESSING => 'Interview confirmation',
            self::STATUS_PASSED => 'Successful interview',
            self::STATUS_FAILED => 'Interview failed',
        ];
    }


}
