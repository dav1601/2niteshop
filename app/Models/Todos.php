<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Todos
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property int|null $done
 * @property string $deadline
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Todos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Todos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Todos query()
 * @mixin \Eloquent
 */
class Todos extends Model
{
    use HasFactory;
    protected $table = 'todos';
    protected $fillable = [
        'name',
        'user_id',
        'deadline',
        'done'
    ];
}
