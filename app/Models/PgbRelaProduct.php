<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PgbRelaProduct
 *
 * @property int $id
 * @property int $products_id
 * @property int $pgb_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PageBuilder $pgb_data
 * @method static \Illuminate\Database\Eloquent\Builder|PgbRelaProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PgbRelaProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PgbRelaProduct query()
 * @mixin \Eloquent
 */
class PgbRelaProduct extends Model
{
    use HasFactory;
    protected $table = "pgb_rela_product";
    protected $fillable = [
        'products_id',
        'pgb_id',
    ];

    public function pgb_data()
    {
        return $this->belongsTo("App\Models\PageBuilder", 'pgb_id', 'id');
    }
}
