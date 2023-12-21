<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementBanner extends Model
{
    use HasFactory;
    protected $table = 'advertisement_banners';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = [
        'linkDesktop', 'linkMobile', 'postion', 'status','created_at'
    ];
}
