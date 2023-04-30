<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageBuilder extends Model
{
    use HasFactory;
    protected $table = 'page_builder';
    protected $fillable = [
        'title',
        'slug',
        'type',
        'data'
    ];
}
