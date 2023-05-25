<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CatBlog
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CatBlog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CatBlog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CatBlog query()
 * @mixin \Eloquent
 */
class CatBlog extends Model
{
    use HasFactory;
    protected $table = 'cat_blog';
    protected $fillable = [
        'name',
        'slug',
    ];
}
