<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrdRelaBlog extends Model
{
    use HasFactory;
    protected $table = 'prd_rela_blog';
    protected $fillable = [
        'products_id',
        'blogs_id'
    ];
    public $timestamps = false;
    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products_id', 'id');
    }
    public function blogs()
    {
        return $this->belongsTo('App\Models\Blogs', 'blogs_id', 'id');
    }
}
