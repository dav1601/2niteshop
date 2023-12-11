<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AMedia extends Model
{
    use HasFactory, Uuid;
    protected $table = 'a_media';
    protected $fillable = [
        'id',
        'uuid',
        'model',
        'path',
        'collection',
        'name',
        'file_name',
        'mime_type',
        'alt',
        'note',
        'size',
        'custom_properties',
        'responsive_images'
    ];
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
    public function getFullPathAttribute()
    {
        return Storage::disk('media')->url($this->path);
    }
}
