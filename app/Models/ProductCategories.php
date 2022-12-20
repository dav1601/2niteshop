<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    use HasFactory;
    protected $table = 'product_categories';
    protected $fillable = [
        'products_id',
        'category_id',
        'category_name'
    ];
    public function cat()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Products', 'products_id', 'id');
    }
    
}
