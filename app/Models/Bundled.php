<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundled extends Model
{
    use HasFactory;
    protected $table = 'bundled_cat';
    protected $fillable = [
        'bundled_skin',
        'bundled_accessory',
        'cat_id',
    ];
}
