<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrdRelaBlock extends Model
{
    use HasFactory;
    protected $table = 'prd_rela_block';
    protected $fillable = [
        'products_id',
        'block_id'
    ];
    public function info()
    {
        return $this->belongsTo('App\Models\BlockProduct', 'block_id', 'id');
    }
    public function infoPrd()
    {
        return $this->belongsTo('App\Models\Products', 'products_id', 'id');
    }
    public function infoBlock()
    {
        return $this->belongsTo('App\Models\BlockProduct', 'block_id', 'id');
    }
}
