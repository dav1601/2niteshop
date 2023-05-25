<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ward
 *
 * @property int $id
 * @property string $_name
 * @property string|null $_prefix
 * @property int|null $_province_id
 * @property int|null $_district_id
 * @method static \Illuminate\Database\Eloquent\Builder|Ward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ward query()
 * @mixin \Eloquent
 */
class Ward extends Model
{
    use HasFactory;
    protected $table = 'ward';
    protected $fillable = [
        '_name',
        '_prefix',
        '_province_id',
        '_district_id',
    ];
}
