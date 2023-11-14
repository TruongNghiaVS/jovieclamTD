<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileActivity extends Model
{
    protected $table = 'profile_activities';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at', 'date_start', 'date_end'];

}
