<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id',
        'company_name',
        'job_title',
        'job_description',
        'start_date',
        'end_date',
        'job_location',
        'job_type',
        'job_responsibilities',
        'job_technologies',
        'job_url',
    ];
}
