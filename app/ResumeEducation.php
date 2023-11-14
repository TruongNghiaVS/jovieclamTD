<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id',
        'school_name',
        'degree',
        'field_of_study',
        'grade',
        'start_date',
        'end_date',
        'description',
    ];
}
