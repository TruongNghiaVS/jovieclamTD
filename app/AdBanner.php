<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdBanner extends Model
{
    use HasFactory;

    protected $table = 'ad_banners';
    protected $fillable = ['image'];
}
