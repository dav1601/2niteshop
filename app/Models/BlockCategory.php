<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BlockCategory
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BlockCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockCategory query()
 * @mixin \Eloquent
 */
class BlockCategory extends Model
{
    use HasFactory;
    protected $table = 'block_category';
    protected $fillable = [
        'title',
        'content',
    ];
}
