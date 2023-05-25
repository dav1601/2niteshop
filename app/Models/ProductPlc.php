<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductPlc
 *
 * @property int $id
 * @property int $products_id
 * @property int $plc_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Policy $plc
 * @property-read \App\Models\Products $products
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPlc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPlc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPlc query()
 * @mixin \Eloquent
 */
class ProductPlc extends Model
{
    use HasFactory;
    protected $table = 'product_plc';
    protected $fillable = [
        'products_id',
        'plc_id',
    ];
    public function plc()
    {
        return $this->belongsTo('App\Models\Policy', 'plc_id', 'id');
    }
    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products_id', 'id');
    }
}
