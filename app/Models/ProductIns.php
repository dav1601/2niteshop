<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductIns
 *
 * @property int $id
 * @property int $products_id
 * @property int $ins_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Insurance $ins
 * @property-read \App\Models\Products|null $products
 * @method static \Illuminate\Database\Eloquent\Builder|ProductIns newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductIns newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductIns query()
 * @mixin \Eloquent
 */
class ProductIns extends Model
{
    use HasFactory;
    protected $table = 'product_ins';
    protected $fillable = [
        'products_id',
        'ins_id',

    ];
    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products', 'id');
    }
    public function ins()
    {
        return $this->belongsTo('App\Models\Insurance', 'ins_id', 'id');
    }
}

