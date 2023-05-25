<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pages
 *
 * @property int $id
 * @property string $title
 * @property string|null $slug
 * @property string $content
 * @property int $users_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Pages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pages query()
 * @mixin \Eloquent
 */
class Pages extends Model
{
    use HasFactory;
    protected $table = 'pages';
    protected $fillable = [
        'title',
        'slug',
        'content',
        'users_id'
    ];
}
