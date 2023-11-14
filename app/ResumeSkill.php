<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id',
        'skill_name',
        'skill_level',
    ];
}
