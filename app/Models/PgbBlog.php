<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PgbBlog
 *
 * @property int $id
 * @property int $blogs_id
 * @property int $pgb_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PageBuilder $pgb_data
 * @method static \Illuminate\Database\Eloquent\Builder|PgbBlog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PgbBlog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PgbBlog query()
 * @mixin \Eloquent
 */
class PgbBlog extends Model
{
    use HasFactory;
    protected $table = "pgb_blog";
    protected $fillable = [
        'blogs_id',
        'pgb_id',
    ];

    public function pgb_data()
    {
        return $this->belongsTo("App\Models\PageBuilder", 'pgb_id', 'id');
    }
}
