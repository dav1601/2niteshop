<?php

namespace App\Repositories;

use App\Models\Products;
use App\Models\Insurance;
use Illuminate\Support\Carbon;
use App\Repositories\FileInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use App\Repositories\DavjCartInterface;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class FileRepository implements FileInterface
{
    public $folder;
    public $driver;
    public function __construct()
    {
        $this->folder = config('2nitefile.forder');
        $this->driver = config('filesystems.va_driver');
    }
    public function import_css($file = "")
    {
        $link = asset('client/' . $this->folder . '/' . 'css/' . $file) . '?ver=' . filemtime('client/' . $this->folder . '/' . 'css/' . $file);
        return $link;
    }
    public function import_js($file = "")
    {
        $link = asset('client/' . $this->folder . '/' . 'js/' . $file) . '?ver=' . filemtime('client/' . $this->folder . '/' . 'js/' . $file);
        return $link;
    }
    public function ver($link = "")
    {
        $link = asset($link) . '?ver=' . filemtime('' . $link);
        return $link;
    }
    public function ver_img($link = "")
    {
        switch ($this->driver) {
            case 'local':
                $link =  config('app.url') . "/storage" . "/" . $link . '?ver=' . Carbon::now('Asia/Ho_Chi_Minh')->timestamp;
                return $link;
            case 'cloudinary':
                $data = json_decode($link);
                $path = "";
                if ($data) {
                    $path = $data->path ? $data->path . "?now=" . Carbon::now('Asia/Ho_Chi_Minh')->timestamp : "";
                }
                return $path;
            default:
                return "";
        }
    }
    public function ver_img_local($link = "")
    {
        $link =  asset($link) . '?ver=' . Carbon::now('Asia/Ho_Chi_Minh')->timestamp;
        return $link;
    }
    public function main_banner()
    {
        return  asset('client/images/banner_2nite.png') . '?ver=' . Carbon::now('Asia/Ho_Chi_Minh')->timestamp;
    }
    public function storeFileImg($file, $path)
    {
        if (!$path) {
            return "";
        }
        $last_path = substr($path, -1);
        $first_path = $path[0];
        if ($last_path !== "/") {
            $path = $path . "/";
        }
        if ($first_path !== "/") {
            $path = "/" . $path;
        }
        switch ($this->driver) {
            case 'local':
                $path_public = config('app.url') . "/storage" . "/" . $path;
                $name = $file->getClientOriginalName();
                if (file_exists($path_public .  $name)) {
                    $file_name = pathinfo($name, PATHINFO_FILENAME);
                    $ext = $file->getClientOriginalExtension();
                    $name = $file_name . '-1' . '.' . $ext;
                    $k = 1;
                    while (file_exists($path_public . $name)) {
                        $name = $file_name . '-' . $k  . '.' . $ext;
                        $k++;
                    }
                }
                $save = $path . $name;
                if (Storage::disk('public')->putFileAs(
                    $path,
                    $file,
                    $name
                )) {
                    return "storage" . $save;
                }
                break;
            case 'cloudinary':
                $upload =  $file->storeOnCloudinary($path);
                if ($upload) {
                    $id = $upload->getPublicId();
                    $url = $upload->getSecurePath();
                    $save = [];
                    $save["id"] = $id;
                    $save["path"] = $url;
                    return json_encode($save);
                }
                break;
            default:
                break;
        }
        return "";
    }
    public function deleteFile($path)
    {
        switch ($this->driver) {
            case 'local':
                $path = config("app.url" . "/storage" . "/" . $path);
                if (File::exists($path)) {
                    return unlink($path);
                }
                break;
            case 'cloudinary':
                $data = json_decode($path);
                return Cloudinary::destroy($data->id);
                break;
            default:
                break;
        }
        return;
    }
}
