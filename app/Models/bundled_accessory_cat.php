<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\bundled_accessory_cat
 *
 * @property int $id
 * @property int $products_id
 * @property int $cat_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_accessory_cat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_accessory_cat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_accessory_cat query()
 * @mixin \Eloquent
 */
class bundled_accessory_cat extends Model
{
    use HasFactory;
    protected $table = 'bundled_accessory_cats';
    protected $fillable = [
        'products_id',
        'cat_id'
    ];
}
