<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Orders
 *
 * @property int $id
 * @property string $name
 * @property string $cart
 * @property int|null $users_id
 * @property int $total
 * @property string $email
 * @property string $address
 * @property string $prov
 * @property string $dist
 * @property string|null $ward
 * @property string $payment
 * @property string|null $note
 * @property string $phone
 * @property int|null $status
 * @property int|null $paid
 * @property int $d
 * @property int $m
 * @property int $y
 * @property string|null $date_s
 * @property int|null $d_s
 * @property int|null $m_s
 * @property int|null $y_s
 * @property string|null $date_ship
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\OrdersFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Orders newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Orders newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Orders onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Orders query()
 * @method static \Illuminate\Database\Eloquent\Builder|Orders withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Orders withoutTrashed()
 * @mixin \Eloquent
 */
class Orders extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'orders';
    protected $fillable = [
        'name',
        'code',
        'cart',
        'users_id',
        'total',
        'email',
        'address',
        'prov',
        'dist',
        'ward',
        'payment',
        'note',
        'phone',
        'status',
        'paid',
        'date_s',
        'date_ship',
    ];
    protected static function booted()
    {
        static::created(function ($model) {
            $model->code = "" . mt_rand(1000000000, 9999999999) . $model->id;
        });
    }
}
