<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PwRsSms extends Model
{
    use HasFactory;
    protected $table = 'password_sms_resets';
    protected $fillable = [
        'phone',
        'code',
    ];
    public $timestamps = false;
}
