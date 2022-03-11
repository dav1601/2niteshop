<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    use HasFactory;
    protected $table = 'todos';
    protected $fillable = [
        'name',
        'user_id',
        'time_add',
        'time_end',
        'done'
    ];
    public $timestamps = false;

}
