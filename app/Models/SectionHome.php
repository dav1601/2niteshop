<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionHome extends Model
{
    use HasFactory;
    protected $table = 'section_home';
    protected $fillable = [
        'show_id',
        'section',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo("App\Models\Category", 'category_id');
    }
}
