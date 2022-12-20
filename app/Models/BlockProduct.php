<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockProduct extends Model
{
    use HasFactory;
    protected $table = 'block_product';
    protected $fillable = [
        'title',
        'text',
        'type',
        'is_list'
    ];
    public function relaPrd()
    {
        return $this->hasMany('App\Models\PrdRelaBlock', 'block_id', 'id');
    }
}
