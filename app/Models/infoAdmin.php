<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infoAdmin extends Model
{
    use HasFactory;
    protected $table = 'info_admin';
    protected $fillable = [
        'user_id',
        'avatar',
        'biography',
        'address_1',
        'address_2',
        'city',
        'd',
        'w',
        'facebook',
        'zalo',
        'twitter',
        'github',
        'instagram',
        'linkedln',
    ];
}
