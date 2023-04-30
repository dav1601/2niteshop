<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PgbBlog extends Model
{
    use HasFactory;
    protected $table = "pgb_blog";
    protected $fillable = [
        'blogs_id',
        'pgb_id',
    ];

    public function pgb_data()
    {
        return $this->belongsTo("App\Models\PageBuilder", 'pgb_id', 'id');
    }
}
