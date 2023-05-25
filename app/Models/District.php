<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\District
 *
 * @property int $id
 * @property string|null $_name
 * @property string|null $_prefix
 * @property int|null $_province_id
 * @method static \Illuminate\Database\Eloquent\Builder|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District query()
 * @mixin \Eloquent
 */
class District extends Model
{
    use HasFactory;
    protected $table = 'district';
    protected $fillable = [
        '_name',
        '_prefix',
        '_province_id',
    ];
}
