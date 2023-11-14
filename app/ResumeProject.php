<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeProject extends Model
{
    use HasFactory;

    protected $table = 'resume_projects';

    protected $fillable = [
        'resume_id',
        'project_name',
        'project_description',
        'project_start_date',
        'project_end_date',
        'project_role',
        'project_responsibilities',
        'project_technologies',
        'project_url',
    ];
}
