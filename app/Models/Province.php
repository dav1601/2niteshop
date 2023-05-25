<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Province
 *
 * @property int $id
 * @property string|null $_name
 * @property string|null $_code
 * @method static \Illuminate\Database\Eloquent\Builder|Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province query()
 * @mixin \Eloquent
 */
class Province extends Model
{
    use HasFactory;
    protected $table = 'province';
    protected $fillable = [
        '_name',
        '_code',
    ];
}
