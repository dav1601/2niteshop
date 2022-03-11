<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeProduct extends Model
{
    use HasFactory;
    protected $table = 'type_product';
    protected $fillable = [
        'name',
        'parent'
    ];
}
