<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ads
 *
 * @property int $id
 * @property string $img
 * @property string $link
 * @property string $type
 * @property int|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ads newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ads newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ads query()
 * @mixin \Eloquent
 */
class Ads extends Model
{
    use HasFactory;
    protected $table = 'ads';
    protected $fillable = [
        'link',
        'img',
        'type',
    ];
}
