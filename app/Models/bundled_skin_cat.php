<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\bundled_skin_cat
 *
 * @property int $id
 * @property int $skin_cat_id
 * @property int $cat_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_skin_cat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_skin_cat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_skin_cat query()
 * @mixin \Eloquent
 */
class bundled_skin_cat extends Model
{
    use HasFactory;
    protected $table = 'bundled_skin_cats';
    protected $fillable = [
        'skin_cat_id',
        'cat_id'
    ];
}
