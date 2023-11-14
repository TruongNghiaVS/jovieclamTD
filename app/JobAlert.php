<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobAlert extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'token', 'is_verified', 'is_subscribed'];
    protected $table = 'email_job_alerts';
}
