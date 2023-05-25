<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PrdRelaBlock
 *
 * @property int $id
 * @property int $products_id
 * @property int $block_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BlockProduct $block
 * @property-read \App\Models\Products $products
 * @method static \Illuminate\Database\Eloquent\Builder|PrdRelaBlock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrdRelaBlock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrdRelaBlock query()
 * @mixin \Eloquent
 */
class PrdRelaBlock extends Model
{
    use HasFactory;
    protected $table = 'prd_rela_block';
    protected $fillable = [
        'products_id',
        'block_id'
    ];
    // public function info()
    // {
    //     return $this->belongsTo('App\Models\BlockProduct', 'block_id', 'id');
    // }
    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products_id', 'id');
    }
    public function block()
    {
        return $this->belongsTo('App\Models\BlockProduct', 'block_id', 'id');
    }
}
