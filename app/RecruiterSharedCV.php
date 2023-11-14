<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruiterSharedCV extends Model
{
    use HasFactory;

    protected $table = 'recruiter_shared_cvs';
    protected $fillable = [
        'recruiter_id',
        'name',
        'code',
        'word_path',
        'photo_path'
    ];

    public function resume(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\RecruiterSharedResume', 'cv_id', 'id');
    }
}
