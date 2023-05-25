<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Comments
 *
 * @property int $id
 * @property int $blog_id
 * @property string $name
 * @property int|null $id_cmt
 * @property int $level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Comments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comments query()
 * @mixin \Eloquent
 */
class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'blog_id',
        'name',
        'id_cmt',
        'level',
    ];
}
