<?php

namespace App\Http\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait Uuid
{

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
