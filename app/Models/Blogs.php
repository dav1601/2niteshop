<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'title',
        'slug',
        'content',
        'desc',
        'img',
        'cat_id',
        'cat_sub_id',
        'users_id',
        'views',
        'author',
        'active',
    ];
}
