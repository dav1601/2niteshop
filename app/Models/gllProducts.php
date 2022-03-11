<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gllProducts extends Model
{
    use HasFactory;
    protected $table = 'gallery_products';
    protected $fillable = [
        'link',
        'products_id',
        'size',
        'index'
    ];
    function product()
    {
        return $this->belongsTo('App\Models\Products') -> orderBy('index' , 'DESC');
    }
}
