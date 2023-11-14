<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id',
        'language_id',
        'proficiency_id'
    ];
}
