<?php
namespace App;
use DB;
use App;
use Illuminate\Database\Eloquent\Model;
class JobApply extends Model
{
    //STATUS CV APPLY 
    const STATUS_RECEIVE = 1;
    const STATUS_REVIEW = 2;
    const STATUS_INTERVIEW = 3;
    const STATUS_SUGGEST = 4;
    const STATUS_CONFIRM = 5;
    const STATUS_REJECT = 6;

    protected $table = 'job_apply';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function getUser($field = '')
    {
        if (null !== $user = $this->user()->first()) {
            if (!empty($field)) {
                return $user->$field;
            } else {
                return $user;
            }
        }
    }
    public function job()
    {
        return $this->belongsTo('App\Job', 'job_id', 'id');
    }
    public function getJob($field = '')
    {
        if (null !== $job = $this->job()->first()) {
            if (!empty($field)) {
                return $job->$field;
            } else {
                return $job;
            }
        }
    }
    public function profileCv()
    {
        return $this->belongsTo('App\ProfileCv', 'cv_id', 'id');
    }
    public function getProfileCv($field = '')
    {
        if (null !== $profileCv = $this->profileCv()->first()) {
            if (!empty($field)) {
                return $profileCv->$field;
            } else {
                return $profileCv;
            }
        }
    }

    public static function getListStatus()
    {
        return
        [
            self::STATUS_RECEIVE => 'CV Receive',
            self::STATUS_REVIEW => 'Review',
            self::STATUS_INTERVIEW => 'Interview',
            self::STATUS_SUGGEST => 'Suggest',
            self::STATUS_CONFIRM => 'Confirm',
            self::STATUS_REJECT => 'Reject',
        ];
    }
}
