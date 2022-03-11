<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedPosts extends Model
{
    use HasFactory;
    protected $table = 'related_posts';
    protected $fillable = [
        'posts',
        'product_id',
        'cat_id',
        'for',
    ];
}
