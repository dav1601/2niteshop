<?php

use Carbon\Carbon;
use App\Models\Config;
use App\Models\Category;
use App\Models\District;
use App\Models\Products;
use App\Models\Province;
use App\Models\Insurance;
use App\Models\Ward;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;
use Gloudemans\Shoppingcart\Facades\Cart;

function getCacheAddress($t = "province")
{
    switch ($t) {
        case 'province':
            return Province::all();
        case 'district':
            return District::all();
        case 'ward':
            return Ward::all();
    }
    return [];
}

function findCacheAddress($parent_id = 0, $t = "district")
{

    $list = collect(getCacheAddress($t));
    switch ($t) {
        case 'district':
            $key = "_province_id";
            break;
        case 'ward':
            $key = "_district_id";
            break;
        default:
            return [];
    }

    return $list->filter(function ($item) use ($key, $parent_id) {
        return $item[$key] == $parent_id;
    });
}


function urlImg($path, $disk = "storage", $time = true)
{
    $no_image = asset("app/images/no-image.svg");
    if (!$path || !Storage::disk($disk)->exists($path)) {
        return $no_image;
    }
    $url = Storage::disk($disk)->url($path);
    // if ($time) {
    //     $url = $url . '?time=' . Carbon::now()->timestamp;
    // }
    return $time ? $url . '?time=' . Carbon::now()->timestamp : $url;
}
function randCodeOrder($id)
{
    return "" . mt_rand(10000, 99999) . $id . mt_rand(10000, 99999);
}
function badges($array, $key = null, $type = "primary")
{
    $html = "";
    if (count($array) > 0) {
        foreach ($array as $item) {
            if ($key) {
                $html .= '<span class="badge m-1 badge-' . $type . '">' . $item[$key] . '</span>';
            } else {
                $html .= '<span class="badge m-1 badge-' . $type . '">' . $item . '</span>';
            }
        }
    }
    return $html;
}
function meta($file): array
{
    $meta = [];
    if ($file) {
        $meta['size'] = $file->getSize();
        $meta['file_name'] = $file->getClientOriginalName();
        $meta['mime_type'] = $file->getClientOriginalExtension();
    }
    return $meta;
}
function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }

    return $bytes;
}
function getTrait($name = "")
{
    return "App\\Http\\Traits\\"  . $name;
}
function getSizeMedia($path)
{
    $imageData = Storage::disk("media")->get($path);
    $width = Image::make($imageData)->width(); // getting the image width
    $height = Image::make($imageData)->height(); // getting the image height
    return [
        'width' => $width,
        'height' => $height,
    ];
}
function a_explode($s, $str)
{
    if (strlen($str)) {
        return explode($s, $str);
    }
    return [];
}
function renderROP($r_o_p = [])
{
    $html = "";
    if (count($r_o_p) > 0) {
        foreach ($r_o_p as $item) {
            if (isset($item->name)) {
                $html .= '<span class="badge m-1 badge-primary">' . $item->name . '</span>';
            } else {
                if ($item) {
                    $html .= '<span class="badge m-1 badge-primary">' . $item . '</span>';
                }
            }
        }
    } else {
        $html .= '<span class="badge m-1 badge-primary">User</span>';
    }
    return $html;
}
function getDescByHtml($content = "", $length = 240)
{
    $content = preg_replace('/\s+/', ' ', strip_tags($content));
    // $content = ltrim(Str::limit($content, $length, '..'), ' &nbsp;');
    return ltrim(Str::limit($content, $length, '..'), ' &nbsp;');
}

function isJson($string)
{
    json_decode($string);
    return json_last_error() === JSON_ERROR_NONE;
}
function get_drive_id_from_url($url)
{
    preg_match('~/d/\K[^/]+(?=/)~', $url, $result);
    return $result[0];
}
function price_product_cost($cart)
{
    $qty = (int) $cart->qty;
    $price = (int) ($cart->options->cost);
    $arrIns = explode(",", $cart->options->ins);
    if (count($arrIns) > 0) {
        foreach ($arrIns as  $ins_id) {
            $item = Insurance::where('id', $ins_id)->first();
            if ($item) {
                $price += (int) $item->price;
            }
        }
    }
    return (int)$price * $qty;
}
function array_search_key($needle_key, $array)
{
    foreach ($array as $key => $value) {
        if ($key == $needle_key) return $value;
        if (is_array($value)) {
            if (($result = array_search_key($needle_key, $value)) !== false)
                return $result;
        }
    }
    return false;
}
function get_crawl_data_category($key = "")
{
    if (!session("crawler")) return "";
    return array_search_key($key, session("crawler"));
}
function get_crawler($key = null)
{

    $crawler =  session()->get('resCrawl');
    if (!$crawler) {
        return "";
    }
    return array_search_key($key, $crawler);
}
function is_product_new($created_at)
{
    $date1 = Carbon::create($created_at);
    $date2 = Carbon::now()->subDays(7);
    return $date1->gt($date2);
}
function is_product_hot($num_orders)
{
    return (int) $num_orders >= 25;
}

if (!function_exists('va_get_meta')) {
    function va_get_meta($url)
    {
        $data = [];
        // Extract HTML using curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $res = curl_exec($ch);
        curl_close($ch);

        // Load HTML to DOM object
        $dom = new DOMDocument();
        @$dom->loadHTML($res);

        // Parse DOM to get Title data
        $nodes = $dom->getElementsByTagName('title');
        $data['title'] = $nodes->item(0)->nodeValue;
        // Parse DOM to get meta data
        $metas = $dom->getElementsByTagName('meta');
        $data['desc'] = $data['kws'] = $data['ogimg'] = '';
        for ($i = 0; $i < $metas->length; $i++) {
            $meta = $metas->item($i);

            if ($meta->getAttribute('name') == 'description') {
                $data['desc'] = $meta->getAttribute('content');
            }

            if ($meta->getAttribute('name') == 'keywords') {
                $data['kws']  = $meta->getAttribute('content');
            }
            if ($meta->getAttribute('property') == 'og:image') {
                $data['ogimg'] = $meta->getAttribute('content');
            }
        }

        return $data;
    }
}
if (!function_exists('category_child')) {
    function category_child($data, $parent_id = 0)
    {
        $result = array();
        foreach ($data  as $item) {
            if ($item->parent_id == $parent_id) {
                $result[] = $item;
                $child = category_child($data, $item->id);
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }
}
if (!function_exists('timeDiff')) {
    function timeDiff($firstTime, $lastTime): string
    {
        $firstTime = strtotime($firstTime);
        $lastTime = strtotime($lastTime);

        $difference = $lastTime - $firstTime;

        $data['years'] = abs(floor($difference / 31536000));
        $data['months'] = abs(floor(($difference - ($data['years'] * 31536000)) / 2629800));
        $data['days'] = abs(floor(($difference - ($data['years'] * 31536000) - ($data['months'] * 2629800)) / 86400));
        $data['hours'] = abs(floor(($difference - ($data['years'] * 31536000) -  ($data['months'] * 2629800) - ($data['days'] * 86400)) / 3600));
        $data['minutes'] = abs(floor(($difference - ($data['years'] * 31536000) - ($data['months'] * 2629800) - ($data['days'] * 86400) - ($data['hours'] * 3600)) / 60));
        $data['seconds'] = abs(floor(($difference - ($data['years'] * 31536000) - ($data['months'] * 2629800) - ($data['days'] * 86400) - ($data['hours'] * 3600) - ($data['minutes'] * 60))));

        $timeString = '';

        if ($data['years'] > 0) {
            $timeString .= $data['years'] . " Năm ";
        }
        if ($data['months'] > 0) {
            $timeString .= $data['months'] . " Tháng ";
        }
        if ($data['days'] > 0) {
            $timeString .= $data['days'] . " Ngày ";
        }

        if ($data['hours'] > 0) {
            $timeString .= $data['hours'] . " Giờ ";
        }

        if ($data['minutes'] > 0) {
            $timeString .= $data['minutes'] . " Phút ";
        }
        if ($data['seconds'] > 0) {
            $timeString .= $data['seconds'] . " Giây ";
        }

        return $timeString;
    }
}


function new_stt($stt)
{
    if ($stt == 1) {
        $output = "Mới";
    } else {
        $output = "Đăng lâu";
    }
    return $output;
}
function stock_stt($stt)
{
    switch ($stt) {
        case 2:
            $status = "Tạm hết hàng";
            break;
        case 3:
            $status = "Hàng đang về";
            break;
        default:
            $status = "Còn hàng";
            break;
    }
    return $status;
}
function highlight_stt($stt)
{
    $name = "";
    switch ($stt) {
        case 1:
            $name =  "HOT";
            break;
        case 2:
            $name =  "Bình Thường";
            break;
        default:
            break;
    }
    return $name;
}
function usage_stt($stt)
{
    if ($stt == 1) {
        $output = "Hàng mới";
    } else {
        $output = "Đã qua sử dụng";
    }
    return $output;
}
function slide_stt($stt)
{
    if ($stt == 1) {
        $output = "Đang hiển thị";
    } else {
        $output = "Chờ hiển thị";
    }
    return $output;
}
function getVal($key = "")
{
    $data = Config::select('value')->where('name', 'LIKE', $key)->first();
    if (!$data) {
        $result = new stdClass();
        $result->value = "";
        return $result;
    }
    return $data;
}
function total()
{
    $total = 0;
    foreach (Cart::instance('shopping')->content() as $cart) {
        $total += $cart->options->sub_total;
    }
    return $total;
}
function empty_cart()
{
    if (Cart::instance('shopping')->count() > 0) {
        return false;
    }
    return true;
}
function status_order($stt)
{
    foreach (config('orders.status') as $key => $status) {
        if ($key == $stt) {
            return $status;
        }
    }
}
function paid_order($stt)
{
    foreach (config('orders.paid') as $key => $status) {
        if ($key == $stt) {
            return $status;
        }
    }
}
