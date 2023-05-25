<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FL
 *
 * @property int $id
 * @property int $user_id
 * @property int $fl_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FL newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FL newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FL query()
 * @mixin \Eloquent
 */
class FL extends Model
{
    use HasFactory;
    protected $table = 'fl';
    protected $fillable = [
        'user_id',
        'fl_id',
    ];
}
