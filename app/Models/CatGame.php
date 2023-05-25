<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CatGame
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CatGame newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CatGame newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CatGame query()
 * @mixin \Eloquent
 */
class CatGame extends Model
{
    use HasFactory;
    protected $table = 'cat_game';
    protected $fillable = [
        'name',
    ];
}
