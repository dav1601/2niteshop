<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Slides
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property string $link
 * @property int|null $index
 * @property int|null $status
 * @property int|null $users_id
 * @property string|null $author_post
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $author
 * @method static \Illuminate\Database\Eloquent\Builder|Slides newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slides newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slides query()
 * @mixin \Eloquent
 */
class Slides extends Model
{
    use HasFactory;
    protected $table = 'slides';
    protected $fillable = [
        'name',
        'img',
        'link',
        'index',
        'status',
        'users_id',
        'author_post',
    ];
    public function author()
    {
        return $this->belongsTo("App\Models\User", 'users_id');
    }
}
