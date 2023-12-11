<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupOptions extends Model
{
    use HasFactory;
    protected $table = 'group_options';
    protected $fillable = [
        "name"
    ];
}
