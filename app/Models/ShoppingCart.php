<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShoppingCart
 *
 * @property string $identifier
 * @property string $instance
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart query()
 * @mixin \Eloquent
 */
class ShoppingCart extends Model
{
    use HasFactory;
    protected $table = 'shoppingcart';
    protected $fillable = [
        'identifier',
        'instance',
        'content',
    ];
}
