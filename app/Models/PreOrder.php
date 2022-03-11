<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreOrder extends Model
{
    use HasFactory;
    protected $table = 'pre_order';
    protected $fillable = [
        'name_cus',
        'phone',
        'products_id',
        'status',
        'status_product',
        'arrived_time',
        'deposit',
        'delivery_time',
        'delivery_status',
        'price',
        'price_deposit',
    ];
}
