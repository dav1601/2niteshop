<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PwRsSms
 *
 * @property string $phone
 * @property int $code
 * @property string $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|PwRsSms newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PwRsSms newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PwRsSms query()
 * @mixin \Eloquent
 */
class PwRsSms extends Model
{
    use HasFactory;
    protected $table = 'password_sms_resets';
    protected $fillable = [
        'phone',
        'code',
    ];
    public $timestamps = false;
}
