<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    use HasFactory;
    protected $table = 'options';
    protected $fillable = [
        "name", "group_id", "type", "price"
    ];
    function group()
    {
        return $this->belongsTo('App\Models\GroupOptions', "group_id");
    }
}
