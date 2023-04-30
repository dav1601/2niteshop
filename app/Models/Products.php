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
        'discount',
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
    public function scopeExclude($query, $value = [])
    {
        return $query->select(array_diff($this->fillable, (array) $value));
    }
    public function related_products()
    {
        return $this->hasMany('App\Models\RelatedProducts', 'product_id');
    }
    public function related_blogs()
    {
        return $this->belongsToMany('App\Models\Blogs', 'prd_rela_blog', 'products_id', 'blogs_id');
    }
    public function policies()
    {
        return $this->belongsToMany('App\Models\Policy', 'product_plc', 'products_id', 'plc_id');
    }
    public function ins()
    {
        return $this->belongsToMany('App\Models\Insurance', 'product_ins', 'products_id', 'ins_id');
    }
    public function cat_game()
    {
        return $this->belongsTo('App\Models\CatGame', 'cat_game_id', 'name');
    }
    public function producer()
    {
        return $this->belongsTo('App\Models\Producer', 'producer_id', 'id');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'product_categories', 'products_id', 'category_id');
    }

    public function blocks()
    {
        return $this->belongsToMany('App\Models\BlockProduct', 'prd_rela_block', 'products_id', 'block_id');
    }
}
