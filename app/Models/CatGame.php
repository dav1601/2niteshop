<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatGame extends Model
{
    use HasFactory;
    protected $table = 'cat_game';
    protected $fillable = [
        'name',
    ];
}
