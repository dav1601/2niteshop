<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixMenu extends Model
{
    use HasFactory;
    protected $table = 'fix_menu';
    protected $fillable = [
        'name',
        'link',
    ];
}
