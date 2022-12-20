<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedPosts extends Model
{
    use HasFactory;
    protected $table = 'blog_rela_cat';
    protected $fillable = [
        'posts',
        'cat_id',
    ];
    public function infoBlog()
    {
        return $this->belongsTo('App\Models\Blogs', 'posts', 'id');
    }
}
