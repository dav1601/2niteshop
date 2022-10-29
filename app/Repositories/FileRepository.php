<?php

namespace App\Repositories;

use App\Models\Products;
use App\Models\Insurance;
use Illuminate\Support\Carbon;
use App\Repositories\FileInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Repositories\DavjCartInterface;
use Gloudemans\Shoppingcart\Facades\Cart;

class FileRepository implements FileInterface
{
    public function __construct()
    {
        $this->forder = config('2nitefile.forder');
    }
    public function import_css($file = "")
    {
        $link = asset('client/' . $this->forder . '/' . 'css/' . $file) . '?ver=' . filemtime('public/client/' . $this->forder . '/' . 'css/' . $file);
        return $link;
    }
    public function import_js($file = "")
    {
        $link = asset('client/' . $this->forder . '/' . 'js/' . $file) . '?ver=' . filemtime('public/client/' . $this->forder . '/' . 'js/' . $file);
        return $link;
    }
    public function ver($link = "")
    {
        $link = asset($link) . '?ver=' . filemtime('public/' . $link);
        return $link;
    }
    public function ver_img($link = "")
    {
        $link = asset($link) . '?ver=' . Carbon::now('Asia/Ho_Chi_Minh')->timestamp;
        return $link;
    }
    public function main_banner()
    {
        return  asset('client/images/banner_2nite.png') . '?ver=' . Carbon::now('Asia/Ho_Chi_Minh')->timestamp;
    }
    public function storeFileImg($file, $path)
    {
        $path_public = "public/" . $path;
        $name = $file->getClientOriginalName();
        if (file_exists($path_public .  $name)) {
            $file_name = pathinfo($name, PATHINFO_FILENAME);
            $ext = $file->getClientOriginalExtension();
            $name = $file_name . '(1)' . '.' . $ext;
            $k = 1;
            while (file_exists($path_public . $name)) {
                $name = $file_name . '(' . $k . ')' . '.' . $ext;
                $k++;
            }
        }
        $save = $path . $name;
        if ($file->move($path_public, $name))
            return $save;
        return NULL;
    }
    public function deleteFile($path)
    {
        if (file_exists($path)) {
            return  unlink($path);
        }
        return;
    }
}
