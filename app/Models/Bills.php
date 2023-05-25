<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Bills
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Bills newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bills newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bills query()
 * @mixin \Eloquent
 */
class Bills extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $fillable = [
        'user_id',
        'detail',
        'total',
        'name',
        'email',
        'address',
        'p',
        'd',
        'w',
        'payment',
        'note',
        'phone',
        'status',
        'paid',
        'time_order',
        'd_ord',
        'm_ord',
        'y_ord',
        'time_s',
        'd_s',
        'm_s',
        'y_s'
    ];
    public $timestamps = false;
}
