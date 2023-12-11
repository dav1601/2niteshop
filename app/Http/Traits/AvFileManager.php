<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use App\Models\AMedia;
use Illuminate\Support\Facades\Storage;


trait AvFileManager
{
    protected  function meta($file): array
    {
        $meta = [];
        if ($file) {
            $meta['size'] = $file->getSize();
            $meta['file_name'] = $file->getClientOriginalName();
            $meta['mime_type'] = $file->getClientOriginalExtension();
        }
        return $meta;
    }
    protected function avDeleteFile($path, $disk = "storage"): bool
    {
        return  Storage::disk($disk)->delete($path);
    }
    protected function saveFile($file, $path, $disk = "storage"): array
    {
        if (!$file) {
            return [];
        }
        if (!$path) {
            $path = "all";
        }
        $last_path = substr($path, -1);
        if ($last_path !== "/") {
            $path = $path . "/";
        }
        $meta = $this->meta($file);
        $file_name = $meta['file_name'];
        $full_path = $path  . $file_name;
        $i = 1;
        $name = pathinfo($file_name, PATHINFO_FILENAME);
        while (Storage::disk($disk)->exists($full_path)) {
            $name = $name . "-" . $i;
            $file_name = $name . "." . $meta['mime_type'];
            $full_path = $path  . $file_name;
            $i++;
        }
        $resFile =  Storage::disk($disk)->putFileAs(
            $path,
            $file,
            $file_name
        );
        return [
            'path' => $resFile,
            'meta' => $meta,
            'name' => $name
        ];
    }
}
