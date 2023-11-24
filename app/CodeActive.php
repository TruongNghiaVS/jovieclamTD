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

class CodeActive extends Model
{

    protected $table = 'codeActives';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [

        'userId', 'code', 'created_at',

    ];


}
