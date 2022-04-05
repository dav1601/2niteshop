<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPlc extends Model
{
    use HasFactory;
    protected $table = 'product_plc';
    protected $fillable = [
        'products_id',
        'plc_id',
    ];
}
