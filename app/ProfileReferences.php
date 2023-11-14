<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileReferences extends Model
{
    protected $table = 'profile_references';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];

}
