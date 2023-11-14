<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;

    const JOB_POLICY_INSURANCE = 1;
    const JOB_POLICY_TRAVEL = 2;
    const JOB_POLICY_REWARD = 3;
    const JOB_POLICY_HEALTHCARE = 4;
    const JOB_POLICY_TRAINING = 5;
    const JOB_POLICY_LAPTOP = 6;
    const JOB_POLICY_ALLOWANCE = 7;
    const JOB_POLICY_PICKUP = 8;
    const JOB_POLICY_HOLIDAY = 9;
    const JOB_POLICY_UNIFORM = 10;
    const JOB_POLICY_PAYRISE = 11;
    const JOB_POLICY_LEAVE = 12;
    const JOB_POLICY_SENIOR = 13;
    const JOB_POLICY_CLUB = 14;

    protected $fillable = ['code', 'name'];
    protected $table = 'job_benefits';
}
