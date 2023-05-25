<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CategoryRelaBlock
 *
 * @property int $id
 * @property int $category_id
 * @property int $block_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BlockCategory $block
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryRelaBlock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryRelaBlock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryRelaBlock query()
 * @mixin \Eloquent
 */
class CategoryRelaBlock extends Model
{
    use HasFactory;
    protected $table = 'block_rela_cateogry';
    protected $fillable = [
        'block_id',
        'category_id',
    ];
    public function block()
    {
        return $this->belongsTo('App\Models\BlockCategory', 'block_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
}
