<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Policy
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $icon
 * @property int|null $position
 * @property int|null $fullset
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Policy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Policy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Policy query()
 * @mixin \Eloquent
 */
class Policy extends Model
{
    use HasFactory;
    protected $table = 'policy';
    protected $fillable = [
        'title',
        'content',
        'icon',
        'position',
        'fullset'
    ];
}
