<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruiterSharedResume extends Model
{
    use HasFactory;

    const DRAFT_YES = 1;
    const DRAFT_NO = 0;


    protected $fillable = [
        'cv_id',
        'full_name',
        'job_title',
        'cover_photo',
        'summary',
        'gender',
        'marital_status',
        'country_id',
        'state_id',
        'city_id',
        'nationality_id',
        'address',
        'dob',
        'phone_number',
        'website',
        'path',
        'draft'
    ];
    protected $table = 'recruiter_shared_resumes';

    public function projects(){
        return $this->hasMany('App\ResumeProject', 'resume_id', 'id');
    }
    public function educations(){
        return $this->hasMany('App\ResumeEducation', 'resume_id', 'id');
    }
    public function experiences(){
        return $this->hasMany('App\ResumeExperience', 'resume_id', 'id');
    }
    public function skills(){
        return $this->hasMany('App\ResumeSkill', 'resume_id', 'id');
    }

    public function languages(){
        return $this->hasMany('App\ResumeLanguage', 'resume_id', 'id');
    }
}
