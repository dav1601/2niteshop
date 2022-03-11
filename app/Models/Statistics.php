<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    use HasFactory;
    protected $table = 'statistics';
    protected $fillable = [
        'day',
        'month',
        'year',
        'total_day',
        'total_cost'
    ];
    public $timestamps = false;
}
