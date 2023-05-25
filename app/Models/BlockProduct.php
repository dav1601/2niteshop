<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BlockProduct
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $is_list
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PrdRelaBlock> $relaPrd
 * @property-read int|null $rela_prd_count
 * @method static \Illuminate\Database\Eloquent\Builder|BlockProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockProduct query()
 * @mixin \Eloquent
 */
class BlockProduct extends Model
{
    use HasFactory;
    protected $table = 'block_product';
    protected $fillable = [
        'title',
        'text',
        'type',
        'is_list'
    ];
    public function relaPrd()
    {
        return $this->hasMany('App\Models\PrdRelaBlock', 'block_id', 'id');
    }
}
