<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedProducts extends Model
{
    use HasFactory;
    protected $table = 'product_rela_product';
    protected $fillable = [
        'products_id',
        'product_id',
    ];
    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products_id', 'id');
    }
}
