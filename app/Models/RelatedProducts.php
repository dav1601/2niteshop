<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedProducts extends Model
{
    use HasFactory;
    protected $table = 'related_products';
    protected $fillable = [
        'products',
        'product_id',
        'blog_id',
        'for',
    ];
}
