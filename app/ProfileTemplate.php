<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileTemplate extends Model
{
    use HasFactory;

    protected $table = 'profile_templates';
    protected $fillable = [
        'user_id',
        'font_size',
        'name_template',
        'lang',
    ];
}
