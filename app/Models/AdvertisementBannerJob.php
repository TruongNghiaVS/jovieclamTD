<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementBannerJob extends Model
{
    use HasFactory;
    protected $table = 'advertisement_banner_jobs';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = [
        'linkDesktop', 'linkMobile', 'priorities', 'status'
     ];
}
