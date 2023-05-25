<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Customers
 *
 * @property int $id
 * @property int|null $users_id
 * @property string $name
 * @property int|null $wallet
 * @property string|null $phone
 * @property string $email
 * @property int|null $vip
 * @property string|null $p
 * @property string|null $d
 * @property string|null $w
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Customers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customers onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Customers query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customers withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Customers withoutTrashed()
 * @mixin \Eloquent
 */
class Customers extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'customers';
    protected $fillable = [
        'users_id',
        'name',
        'wallet',
        'phone',
        'email',
        'vip',
        'p',
        'd',
        'w',
        'address'
    ];
}
