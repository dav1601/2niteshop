<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bundled_skin_cat extends Model
{
    use HasFactory;
    protected $table = 'bundled_skin_cats';
    protected $fillable = [
        'skin_cat_id',
        'cat_id'
    ];
}
