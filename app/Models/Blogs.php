<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Blogs
 *
 * @property int $id
 * @property string $title
 * @property string|null $slug
 * @property string|null $content
 * @property string $type_content text-editor and page builder
 * @property string $desc
 * @property string $img
 * @property int $cat_id
 * @property int|null $cat_sub_id
 * @property int $users_id
 * @property int $views
 * @property \App\Models\User $author
 * @property int|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\CatBlog|null $category
 * @property-read \App\Models\CatBlog|null $category_sub
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PgbBlog> $pgbs
 * @property-read int|null $pgbs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs exclude($value = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs withoutTrashed()
 * @mixin \Eloquent
 */
class Blogs extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'blogs';
    protected $fillable = [
        'id',
        'title',
        'slug',
        'content',
        'desc',
        'img',
        'cat_id',
        'cat_sub_id',
        'users_id',
        'views',
        'author',
        'active',
        'type_content'
    ];


    public function scopeExclude($query, $value = [])
    {
        return $query->select(array_diff($this->fillable, (array) $value));
    }
    public function author()
    {
        return $this->belongsTo("App\Models\User", 'users_id');
    }
    public function pgbs()
    {
        return $this->hasMany("App\Models\PgbBlog", "blogs_id", "id");
    }
    public function category()
    {
        return $this->belongsTo("App\Models\CatBlog", 'cat_id');
    }
    public function category_sub()
    {
        return $this->belongsTo("App\Models\CatBlog", 'cat_sub_id');
    }
}
