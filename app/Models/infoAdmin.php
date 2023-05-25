<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\infoAdmin
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $biography
 * @property string|null $address_1
 * @property string|null $address_2
 * @property string|null $city
 * @property string|null $d
 * @property string|null $w
 * @property string|null $facebook
 * @property string|null $zalo
 * @property string|null $twitter
 * @property string|null $github
 * @property string|null $instagram
 * @property string|null $linkedIn
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|infoAdmin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|infoAdmin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|infoAdmin query()
 * @mixin \Eloquent
 */
class infoAdmin extends Model
{
    use HasFactory;
    protected $table = 'info_admin';
    protected $fillable = [
        'user_id',
        'avatar',
        'biography',
        'address_1',
        'address_2',
        'city',
        'd',
        'w',
        'facebook',
        'zalo',
        'twitter',
        'github',
        'instagram',
        'linkedln',
    ];
}
