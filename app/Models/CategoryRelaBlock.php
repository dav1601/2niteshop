<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryRelaBlock extends Model
{
    use HasFactory;
    protected $table = 'block_rela_cateogry';
    protected $fillable = [
        'block_id',
        'category_id',
    ];
    public function block()
    {
        return $this->belongsTo('App\Models\BlockCategory', 'block_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
}
