<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PgbRelaCategory
 *
 * @property int $id
 * @property int $category_id
 * @property int $pgb_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PageBuilder $pgb_data
 * @method static \Illuminate\Database\Eloquent\Builder|PgbRelaCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PgbRelaCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PgbRelaCategory query()
 * @mixin \Eloquent
 */
class PgbRelaCategory extends Model
{
    use HasFactory;
    protected $table = "pgb_rela_category";
    protected $fillable = [
        'category_id',
        'pgb_id',
    ];

    public function pgb_data()
    {
        return $this->belongsTo("App\Models\PageBuilder", 'pgb_id', 'id');
    }
}
