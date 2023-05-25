<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Api\ApiAdmin
 *
 * @property int $id
 * @property int $users_id
 * @property int|null $partner_id
 * @property string $token_api
 * @property int|null $security_code
 * @property string|null $requested_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ApiAdmin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiAdmin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiAdmin query()
 * @mixin \Eloquent
 */
class ApiAdmin extends Model
{
    use HasFactory;
    protected $table = 'auth_api_admin';
    protected $fillable = [
    'users_id',
    'token_api',
    'security_code',
    'requested_at',
    ];
    
}
