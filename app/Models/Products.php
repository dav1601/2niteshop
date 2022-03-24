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
        'policy',
        'model',
        'video',
        'banner',
        'banner_link',
        'main_img',
        'sub_img',
        'bg',
        'type',
        'sub_type',
        'cat_id',
        'cat_name',
        'cat_2_id',
        'cat_2_sub',
        'sub_1_cat_id',
        'sub_1_cat_name',
        'sub_2_cat_id',
        'sub_2_cat_name',
        'op_sub_1_id',
        'op_sub_1_name',
        'op_sub_2_id',
        'op_sub_2_name',
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
    public function related_products(){
        return $this->hasMany('App\Models\RelatedProducts' , 'product_id');
    }
    public function related_blogs(){
        return $this->hasMany('App\Models\RelatedPosts' , 'product_id')->orderBy('posts', 'DESC');
    }
}
