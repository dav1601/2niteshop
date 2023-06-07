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
use PHPUnit\Framework\Constraint\FileExists;

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
    public function a_storage($link)
    {
        return config('app.app_storage') . "/" . $link . "?a_ver=" . Carbon::now()->timestamp;
    }
    public function ver_img($link = "")
    {
        if (!$link) {
            return "";
        }
        switch ($this->driver) {
            case 'local':
                $json = json_decode($link, true);
                if ($json !== null) {
                    $link = "admin" . explode("admin", $json['path'])[1];
                }
                $path = "storage" . "/" . $link;
                $link =  config('app.url') . "/" . $path . '?ver=' . Carbon::now('Asia/Ho_Chi_Minh')->timestamp;

                return File::exists($path) ? $link : $this->noImage();
            case 'cloudinary':
                $data = json_decode($link);
                $path = $link;
                if ($data !== null) {
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
    public function pathMedia($link)
    {
        if (!$link) {
            return "";
        }
        return Storage::disk('media')->url($link);
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

        if ($last_path !== "/") {
            $path = $path . "/";
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
                    return $save;
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
    public function deleteFile($path): bool
    {

        if ($path) {
            switch ($this->driver) {
                case 'local':
                    $first_path = $path[0];
                    if ($first_path === "/") {
                        $path = substr($path, 1);
                    }
                    $path = "storage/" . $path;
                    if (File::exists($path)) {
                        return unlink($path);
                    }
                    break;
                default:
                    break;
            }
        }
        return false;
    }
    public function noImage()
    {
        return "https://res.cloudinary.com/vanh-tech/image/upload/v1684495435/logo/360_F_251955356_FAQH0U1y1TZw3ZcdPGybwUkH90a3VAhb-removebg-preview_jxhtqz.png";
    }
}
