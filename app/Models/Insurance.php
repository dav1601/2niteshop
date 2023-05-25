<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Insurance
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property int|null $group
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Insurance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Insurance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Insurance query()
 * @mixin \Eloquent
 */
class Insurance extends Model
{
    use HasFactory;
    protected $table = 'insurance';
    protected $fillable = [
        'name',
        'price',
        'group'
    ];
}
