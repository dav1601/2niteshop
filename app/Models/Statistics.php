<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * App\Models\Statistics
 *
 * @property int $id
 * @property int $day
 * @property int $month
 * @property int $year
 * @property int $total_day
 * @property int|null $total_cost
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Statistics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistics onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistics query()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistics withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistics withoutTrashed()
 * @mixin \Eloquent
 */
class Statistics extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'statistics';
    protected $fillable = [
        'day',
        'month',
        'year',
        'total_day',
        'total_cost'
    ];

}
