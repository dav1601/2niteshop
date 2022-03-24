<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiAdmin extends Model
{
    use HasFactory;
    protected $table = 'auth_api_admin';
    protected $fillable = [
    'users_id',
    'token_api',
    'security_code',
    'requested_at',
    ];
    
}
