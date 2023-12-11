<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Address
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $phone
 * @property string $prov
 * @property int $prov_id
 * @property string $dist
 * @property int $dist_id
 * @property string $ward
 * @property int $ward_id
 * @property string $detail
 * @property string|null $map
 * @property int $def 1: Default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @mixin \Eloquent
 */
class Address extends Model
{
    use HasFactory;
    protected $table = 'address';
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'prov',
        'prov_id',
        "dist_id",
        "ward_id",
        'dist',
        'ward',
        'detail',
        'map',
        'def',
        "type"
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User' , 'user_id' , "id");
    }
}
