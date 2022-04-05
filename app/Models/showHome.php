<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class showHome extends Model
{
    use HasFactory;
    protected $table = 'show_home';
    protected $fillable = [
        'name',
        'main_link',
        'main_img',
        'use_link',
        'use_img',
        'instruct_link',
        'instruct_img',
        'access_link',
        'access_img',
        'fix_link',
        'fix_img',
        'cat_2',
        'cat',
        'cat_digital',
        'option',
        'color',
        'access_tab',
        'position',
        'active'
    ];
}
