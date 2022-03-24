<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bundled_accessory_cat extends Model
{
    use HasFactory;
    protected $table = 'bundled_accessory_cats';
    protected $fillable = [
        'products_id',
        'cat_id'
    ];
}
