<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'address';
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'prov',
        'prov_id',
        'dist',
        'dist_id',
        'ward',
        'ward_id',
        'detail',
        'map',
        'def',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }


}
