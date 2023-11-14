<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactJob extends Model
{
    protected $table = 'contact_jobs';
    protected $fillable = ['email', 'status'];
}
