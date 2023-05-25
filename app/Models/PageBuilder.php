<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\PageBuilder
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 * @property string $type full,template,component
 * @property string $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|PageBuilder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageBuilder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageBuilder onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PageBuilder query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageBuilder withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PageBuilder withoutTrashed()
 * @mixin \Eloquent
 */
class PageBuilder extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'page_builder';
    protected $fillable = [
        'title',
        'slug',
        'type',
        'data'
    ];
}
