<?php

namespace App\Repositories;

use App\Models\Products;
use App\Models\Insurance;
use Illuminate\Support\Carbon;
use App\Repositories\FileInterface;
use Illuminate\Support\Facades\Auth;
use App\Repositories\DavjCartInterface;
use Gloudemans\Shoppingcart\Facades\Cart;

class FileRepository implements FileInterface
{
    public function import_css($file = "", $forder = "production/")
    {
        $link = asset('client/' . $forder . 'css/' . $file) . '?ver=' . filemtime('public/client/' . $forder . 'css/' . $file);
        return $link;
    }
    public function import_js($file = "", $forder = "production/")
    {
        $link = asset('client/' . $forder . 'js/' . $file) . '?ver=' . filemtime('public/client/' . $forder . 'js/' . $file);
        return $link;
    }
    public function ver($link = "")
    {
        $link = asset($link) . '?ver=' . filemtime('public/'.$link);
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
}
