<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\gllProducts
 *
 * @property int $id
 * @property string $link
 * @property int $products_id
 * @property int $size
 * @property int $index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Products $product
 * @method static \Illuminate\Database\Eloquent\Builder|gllProducts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|gllProducts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|gllProducts query()
 * @mixin \Eloquent
 */
class gllProducts extends Model
{
    use HasFactory;
    protected $table = 'gallery_products';
    protected $fillable = [
        'link',
        'products_id',
        'image_80',
        'image_700',
        'media_700',
        'media_80',
        'size',
        'index'
    ];
    function product()
    {
        return $this->belongsTo('App\Models\Products');
    }
    public function image_large()
    {
        return $this->belongsTo('App\Models\AMedia', 'media_700');
    }
    public function thumbnail()
    {
        return $this->belongsTo('App\Models\AMedia', 'media_80');
    }
    public function getPath700Attribute()
    {
        return $this->image_large ? $this->image_large->path : NULL;
    }
    public function getPath80Attribute()
    {
        return $this->thumbnail ? $this->thumbnail->path : NULL;
    }
}
