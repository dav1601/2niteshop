<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gllCat extends Model
{
    use HasFactory;
    protected $table = 'gll_category';
    protected $fillable = [
        'path',
        'link',
        'cate_id',
        'index',
    ];
}
