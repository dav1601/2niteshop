<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\bundled_product
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_product query()
 * @mixin \Eloquent
 */
class bundled_product extends Model
{
    use HasFactory;
    protected $table = 'bundled_product';
    protected $fillable = [
        'name',
    ];
}
