<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoverLetter extends Model
{
    const ACTIVE = 1;
    const INACTIVE = 0;
    
    protected $table = 'cover_letter';
    protected $fillable = ['name', 'image_main', 'image_thumbnail', 'file_path', 'status'];
}
