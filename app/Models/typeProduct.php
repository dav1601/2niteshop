<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\typeProduct
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|typeProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|typeProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|typeProduct query()
 * @mixin \Eloquent
 */
class typeProduct extends Model
{
    use HasFactory;
    protected $table = 'type_product';
    protected $fillable = [
        'name',
        'parent'
    ];
}
