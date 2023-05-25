<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SectionHome
 *
 * @property int $id
 * @property int $show_id
 * @property int $section
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|SectionHome newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionHome newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionHome query()
 * @mixin \Eloquent
 */
class SectionHome extends Model
{
    use HasFactory;
    protected $table = 'section_home';
    protected $fillable = [
        'show_id',
        'section',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo("App\Models\Category", 'category_id');
    }
}
