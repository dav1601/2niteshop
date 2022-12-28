<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'des',
        'keywords',
        'price',
        'historical_cost',
        'content',
        'info',
        'insurance',
        'model',
        'video',
        'banner',
        'banner_link',
        'main_img',
        'sub_img',
        'bg',
        'type',
        'sub_type',
        'producer_id',
        'producer_slug',
        'cat_game_id',
        'stock',
        'new',
        'usage_stt',
        'num_orders',
        'highlight',
        'author',
        'author_id'
    ];
    public function gll()
    {
        return $this->hasMany('App\Models\gllProducts')->orderBy('index', 'ASC');
    }
    public function related_products()
    {
        return $this->hasMany('App\Models\RelatedProducts', 'product_id');
    }
    public function related_blogs()
    {
        return $this->hasMany('App\Models\PrdRelaBlog', 'products_id')->orderBy('blogs_id', 'DESC');
    }
    public function policies()
    {
        return $this->hasMany('App\Models\ProductPlc', 'products_id');
    }
    public function ins()
    {
        return $this->hasMany('App\Models\ProductIns', 'products_id');
    }
    public function cat_game()
    {
        return $this->belongsTo('App\Models\CatGame', 'cat_game_id', 'name');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'product_categories', 'products_id', 'category_id');
    }

    public function blocks()
    {
        return $this->hasMany('App\Models\PrdRelaBlock', 'products_id');
    }
}
