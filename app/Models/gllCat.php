<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\gllCat
 *
 * @property int $id
 * @property string $path
 * @property string $link
 * @property int $cate_id
 * @property int $index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|gllCat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|gllCat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|gllCat query()
 * @mixin \Eloquent
 */
class gllCat extends Model
{
    use HasFactory;
    protected $table = 'gll_category';
    protected $fillable = [
        'path',
        'link',
        'cate_id',
        'index',
    ];
}
