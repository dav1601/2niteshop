<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\Products
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 * @property string $slug
 * @property string|null $des
 * @property string|null $keywords
 * @property int $price
 * @property int|null $discount
 * @property int|null $historical_cost
 * @property string $content
 * @property string|null $info
 * @property string|null $insurance
 * @property string $model
 * @property string|null $video
 * @property string|null $banner
 * @property string|null $banner_link
 * @property string $main_img
 * @property string $sub_img
 * @property string|null $bg
 * @property string $type
 * @property string|null $sub_type
 * @property int $producer_id
 * @property string $producer_slug
 * @property string|null $cat_game_id
 * @property int $stock
 * @property int $new
 * @property int|null $usage_stt
 * @property int|null $num_orders
 * @property int $highlight
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BlockProduct> $blocks
 * @property-read int|null $blocks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Products> $bundled_products
 * @property-read int|null $bundled_products_count
 * @property-read \App\Models\CatGame|null $cat_game
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\gllProducts> $gll
 * @property-read int|null $gll_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Insurance> $ins
 * @property-read int|null $ins_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Policy> $policies
 * @property-read int|null $policies_count
 * @property-read \App\Models\Producer $producer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Blogs> $related_blogs
 * @property-read int|null $related_blogs_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Products exclude($value = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Products newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Products query()
 * @method static \Illuminate\Database\Eloquent\Builder|Products withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Products withoutTrashed()
 * @mixin \Eloquent
 */
class Products extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'des',
        'keywords',
        'price',
        'qty',
        'discount',
        'historical_cost',
        'content',
        'info',
        'model',
        'main_img',
        'sub_img',
        'image_first',
        'image_second',
        'image_background',
        'bg',
        'type',
        'producer_id',
        'cat_game_id',
        'stock',
        'new',
        'status',
        'usage_stt',
        'num_orders',
        'highlight',
        'date_sold',

    ];
    // scope
    public function scopeExclude($query, $value = [])
    {
        $fillable = $this->fillable;
        // array_push($fillable, "deleted_at", "created_at", "updated_at");
        return $query->select(array_diff($fillable, (array) $value));
    }
    // end scope
    public function gallery()
    {
        return $this->hasMany('App\Models\gllProducts')->orderBy('index', 'ASC');
    }

    public function bundled_products()
    {
        return $this->belongsToMany('App\Models\Products', 'product_rela_product', 'product_id', 'products_id');
    }
    public function img_first()
    {
        return $this->belongsTo('App\Models\AMedia', 'image_first');
    }
    public function img_second()
    {
        return $this->belongsTo('App\Models\AMedia', 'image_second');
    }
    public function background()
    {
        return $this->belongsTo('App\Models\AMedia', 'image_background');
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
        return $this->belongsTo('App\Models\CatGame', 'cat_game_id');
    }
    public function type()
    {
        return $this->belongsTo('App\Models\typeProduct', 'type');
    }
    public function producer()
    {
        return $this->belongsTo('App\Models\Producer', 'producer_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany("App\Models\Category", 'product_categories', 'products_id', 'category_id');
    }
    public function blocks()
    {
        return $this->belongsToMany('App\Models\BlockProduct', 'prd_rela_block', 'products_id', 'block_id');
    }
    public function options()
    {
        return $this->belongsToMany('App\Models\Options', 'product_option', 'product_id', 'option_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function getPreOrderAttribute()
    {
        return strtotime($this->date_sold) >= strtotime(Carbon::now()) || $this->status === 3;
    }
    public function getPathFirstAttribute()
    {
        return $this->img_first ? $this->img_first->path : NULL;
    }
    public function getPathSecondAttribute()
    {
        return $this->img_second ? $this->img_second->path : NULL;
    }
    public function getPathBgAttribute()
    {
        return $this->background ? $this->background->path : NULL;
    }
}
