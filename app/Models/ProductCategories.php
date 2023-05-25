<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductCategories
 *
 * @property int $id
 * @property int $products_id
 * @property int $category_id
 * @property string|null $category_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $cat
 * @property-read int|null $cat_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Products> $product
 * @property-read int|null $product_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategories query()
 * @mixin \Eloquent
 */
class ProductCategories extends Model
{
    use HasFactory;
    protected $table = 'product_categories';
    protected $fillable = [
        'products_id',
        'category_id',
        'category_name'
    ];
    public function cat()
    {
        return $this->belongsToMany('App\Models\Category', 'category_id', 'id');
    }
    public function product()
    {
        return $this->belongsToMany('App\Models\Products', 'products_id', 'id');
    }
}
