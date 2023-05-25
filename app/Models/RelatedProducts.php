<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RelatedProducts
 *
 * @property int $id
 * @property int|null $products_id
 * @property int|null $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Products|null $products
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedProducts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedProducts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedProducts query()
 * @mixin \Eloquent
 */
class RelatedProducts extends Model
{
    use HasFactory;
    protected $table = 'product_rela_product';
    protected $fillable = [
        'products_id',
        'product_id',
    ];
    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products_id', 'id');
    }
}
