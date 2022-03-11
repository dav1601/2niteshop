<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'name',
        'cart',
        'users_id',
        'total',
        'email',
        'address',
        'prov',
        'dist',
        'ward',
        'payment',
        'note',
        'phone',
        'status',
        'paid',
        'd',
        'm',
        'y',
        'date_s',
        'd_s',
        'm_s',
        'y_s',
        'date_ship',
    ];
}
