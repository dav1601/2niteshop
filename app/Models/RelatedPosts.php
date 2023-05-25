<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RelatedPosts
 *
 * @property int $id
 * @property string $posts
 * @property int|null $cat_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Blogs|null $infoBlog
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedPosts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedPosts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedPosts query()
 * @mixin \Eloquent
 */
class RelatedPosts extends Model
{
    use HasFactory;
    protected $table = 'blog_rela_cat';
    protected $fillable = [
        'posts',
        'cat_id',
    ];
    public function infoBlog()
    {
        return $this->belongsTo('App\Models\Blogs', 'posts', 'id');
    }
}
