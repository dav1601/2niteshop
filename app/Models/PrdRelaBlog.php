<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PrdRelaBlog
 *
 * @property int $products_id
 * @property int $blogs_id
 * @property-read \App\Models\Blogs $blogs
 * @property-read \App\Models\Products $products
 * @method static \Illuminate\Database\Eloquent\Builder|PrdRelaBlog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrdRelaBlog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrdRelaBlog query()
 * @mixin \Eloquent
 */
class PrdRelaBlog extends Model
{
    use HasFactory;
    protected $table = 'prd_rela_blog';
    protected $fillable = [
        'products_id',
        'blogs_id'
    ];
    public $timestamps = false;
    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products_id', 'id');
    }
    public function blogs()
    {
        return $this->belongsTo('App\Models\Blogs', 'blogs_id', 'id');
    }
}
