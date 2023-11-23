<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailNotification extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'mail_notifications';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = [
         'email', 'status'

    ];
}
