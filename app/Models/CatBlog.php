<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatBlog extends Model
{
    use HasFactory;
    protected $table = 'cat_blog';
    protected $fillable = [
        'name',
        'slug',
    ];
}
