<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VnpConfig extends Model
{
    use HasFactory;
    protected $table = 'vnpay_config';
    protected $fillable = [
        'vnp_TmnCode',
        'vnp_HashSecret',
        'vnp_Url'
    ];
}
