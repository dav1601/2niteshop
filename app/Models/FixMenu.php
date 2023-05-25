<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FixMenu
 *
 * @property int $id
 * @property string $name
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FixMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FixMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FixMenu query()
 * @mixin \Eloquent
 */
class FixMenu extends Model
{
    use HasFactory;
    protected $table = 'fix_menu';
    protected $fillable = [
        'name',
        'link',
    ];
}
