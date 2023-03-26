<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockCategory extends Model
{
    use HasFactory;
    protected $table = 'block_category';
    protected $fillable = [
        'title',
        'content',
    ];
}
