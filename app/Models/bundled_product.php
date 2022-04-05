<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bundled_product extends Model
{
    use HasFactory;
    protected $table = 'bundled_product';
    protected $fillable = [
        'name',
    ];
}
