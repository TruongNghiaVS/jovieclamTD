<?php

namespace App;

use DB;
use App;
use App\Traits\Active;
use App\Interview;
use App\Traits\Featured;
use App\Traits\JobTrait;
use App\Traits\CountryStateCity;
use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{

    protected $table = 'reset_passwords';
    public $timestamps = true;
    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
          'userId','type', 'code', "status",'created_at',

    ];


}
