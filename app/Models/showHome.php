<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\showHome
 *
 * @property int $id
 * @property string $name
 * @property string $main_link
 * @property string|null $main_img
 * @property string|null $use_link
 * @property string|null $use_img
 * @property string|null $instruct_link
 * @property string|null $instruct_img
 * @property string|null $access_link
 * @property string|null $access_img
 * @property string|null $fix_link
 * @property string|null $fix_img
 * @property int|null $cat_digital
 * @property string|null $color
 * @property string|null $tab
 * @property int|null $position
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SectionHome> $sections
 * @property-read int|null $sections_count
 * @method static \Illuminate\Database\Eloquent\Builder|showHome newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|showHome newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|showHome query()
 * @mixin \Eloquent
 */
class showHome extends Model
{
    use HasFactory;
    protected $table = 'show_home';
    protected $fillable = [
        'name',
        'main_link',
        'main_img',
        'use_link',
        'use_img',
        'instruct_link',
        'instruct_img',
        'access_link',
        'access_img',
        'fix_link',
        'fix_img',
        'cat_digital',
        'color',
        'access_tab',
        'position',
        'active'
    ];
    public function sections()
    {
        return $this->hasMany('App\Models\SectionHome', 'show_id', 'id');
    }
}
