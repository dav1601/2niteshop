<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIns extends Model
{
    use HasFactory;
    protected $table = 'product_ins';
    protected $fillable = [
        'products_id',
        'ins_id',
        'group_id'
    ];
}
