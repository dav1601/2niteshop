<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIns extends Model
{
    use HasFactory;
    protected $table = 'product_ins';
    protected $fillable = [
        'products_id',
        'ins_id',

    ];
    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products', 'id');
    }
    public function ins()
    {
        return $this->belongsTo('App\Models\Insurance', 'ins_id', 'id');
    }
}

