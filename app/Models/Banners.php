<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Banners
 *
 * @property int $id
 * @property string $name
 * @property string $link
 * @property string $img
 * @property int $index
 * @property string $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Banners newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banners newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banners query()
 * @mixin \Eloquent
 */
class Banners extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = [
        'name',
        'link',
        'img',
        'index',
        'position',
    ];
}
