<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    use HasFactory;
    protected $table = 'slides';
    protected $fillable = [
        'name',
        'img',
        'link',
        'index',
        'status',
        'users_id',
        'author_post',
    ];
    public function author()
    {
        return $this->belongsTo("App\Models\User", 'users_id');
    }
}
