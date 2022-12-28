<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPlc extends Model
{
    use HasFactory;
    protected $table = 'product_plc';
    protected $fillable = [
        'products_id',
        'plc_id',
    ];
    public function plc()
    {
        return $this->belongsTo('App\Models\Policy', 'plc_id', 'id');
    }
    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products_id', 'id');
    }
}
