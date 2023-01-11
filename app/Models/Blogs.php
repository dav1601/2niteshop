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
    public function author()
    {
        return $this->belongsTo("App\Models\User", 'users_id');
    }
    public function category()
    {
        return $this->belongsTo("App\Models\CatBlog", 'cat_id');
    }
    public function category_sub()
    {
        return $this->belongsTo("App\Models\CatBlog", 'cat_sub_id');
    }
}
