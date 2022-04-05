<?php

use App\Models\Category;
use App\Models\Config;
use App\Models\Products;
use App\Models\Insurance;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

if (!function_exists('show_array')) {
    function show_array($arr)
    {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
}
if (!function_exists('category_child')) {
    function category_child($data , $parent_id = 0)
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
if (!function_exists('navi_ajax_page')) {
    function navi_ajax_page($number_pages, $page, $size = "", $position = "justify-content-center", $mt = "mt-4")
    {
        $output = '';
        $output .= " <nav aria-label='Page navigation example' class='$mt  mr-3'>";
        $output .= "  <ul class='pagination  $position   $size '>";
        if ($page > 1) {
            $page_prev = $page - 1;
            $output .= " <li class='page-item'>
            <a class='page-link' data-page='" . $page_prev . "'><i class='fas fa-chevron-left'></i></a>
        </li>";
        }
        if ($page > 3) {
            $output .= " <li class='page-item '><a class='page-link' data-page='1'>1</a></li>";
            $output .= " <li class='page-item '><a class='page-link' >...</a></li>";
        }
        for ($i = 1; $i <= $number_pages; $i++) {
            if ($i < $page + 2 && $i > $page - 2) {
                if ($i == $page) {
                    $output .= "<li class='page-item active'><a class='page-link' data-page='" . $i . "'>" . $i . "</a></li>";
                } else {
                    $output .= " <li class='page-item '><a class='page-link' data-page='" . $i . "'>" . $i . "</a></li>";
                }
            }
            unset($active);
        }
        if ($page < $number_pages - 2) {
            $output .= " <li class='page-item '><a class='page-link' data-page='" . $number_pages . "' >...</a></li>";
            $output .= " <li class='page-item '><a class='page-link' data-page='" . $number_pages . "'> " . $number_pages . "</a></li>";
        }
        if ($page <  $number_pages) {
            $p_next = $page + 1;
            $output .= "<li class='page-item'>
            <a class='page-link' data-page='" . $p_next . "'><i class='fas fa-chevron-right'></i></a>
        </li>";
        }
        $output .= "</ul>";
        $output .= " </nav>";
        return $output;
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
    if ($stt == 1) {
        $output = "Còn hàng";
    } elseif ($stt == 2) {
        $output = "Sắp có hàng";
    } elseif ($stt == 3) {
        $output = "Tạm hết hàng";
    }
    return $output;
}
function highlight_stt($stt)
{
    if ($stt == 2) {
        $output = "HOT";
    } else {
        $output = "Bình thường";
    }
    return $output;
}
function usage_stt($stt)
{
    if ($stt == 1) {
        $output = "Chưa qua sử dụng";
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
    return Config::select('value')->where('name', 'LIKE' , $key )->first();
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
