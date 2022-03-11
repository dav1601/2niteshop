<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FL extends Model
{
    use HasFactory;
    protected $table = 'fl';
    protected $fillable = [
        'user_id',
        'fl_id',
    ];
}
