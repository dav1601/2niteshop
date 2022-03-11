<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'users_id',
        'name',
        'wallet',
        'phone',
        'email',
        'vip',
        'p',
        'd',
        'w',
        'address'
    ];
}
