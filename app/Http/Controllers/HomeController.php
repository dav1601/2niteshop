<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Slides;
use App\Models\Banners;
use App\Models\FixMenu;
use App\Models\Category;
use App\Models\PreOrder;
use App\Models\Products;
use App\Models\showHome;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use MatthiasMullie\Minify\JS;
use Illuminate\Support\Carbon;
use MatthiasMullie\Minify\CSS;
use MatthiasMullie\Minify\Minify;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\View\Components\Modal\Product;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $config = showHome::all();
        $company = Config::all();
        $banners = Banners::where('index', '!=', 0)->get();
        $menu_fix = FixMenu::all();
        $banner = Banners::where('index', '=', 0)->first();
        $slides = Slides::where('status', '=', 1)->orderBy('index', 'ASC')->get();
        return view('home', compact('config', 'company', 'banner',  'slides', 'banners'));
    }
    //////////////////////////////////////
    ////////////////////////////////////////

    public function contact(Request $request)
    {
        return view('contact');
    }

    ////////////////////////////////////////
    public function search(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $kw = $request->kw;
        $products = new Products();
        $products = $products->where('name', 'LIKE', '%' . $kw . '%')->limit(10)->orderBy('id', 'ASC')->get();
        if (count($products) > 0) {
            foreach ($products as $prd) {
                $output .= '<li class="w-100">';
                $output .= view('components.searchitem', compact('prd'));
                $output .= '</li>';
            }
        } else {
            $output .= '
            <div id="empty_result" class="p-3 d-flex flex-column align-items-center">
            <span class="d-block text-uppercase text-bold" style="font-size: 16px">Không có kết quả nào phù hợp với từ khoá <b>' . $kw . '</b>!</span>
            <img src="' . asset('client/images/no_results.jpg') . '"  alt="" class="img-fluid">
        </div>
            ';
        }
        $data['html'] = $output;
        $data['kw'] = $request->kw;
        return response()->json($data);
    }

    ////////////////////////////////////////
    public function search_main(Request $request)
    {

        $view = $request->cookie('view');
        if ($request->has('page')) {
            $page = $request->page;
        } else {
            $page = 1;
        }
        $products = new Products();
        if ($request->has('keyword')) {
            $products =  $products->where('name', 'LIKE', '%' . $request->keyword . '%');
            $kw = $request->keyword;
        } else {
            $kw = '';
        }
        $count = $products->count();
        $item_page = 16;
        $start = ($page - 1) * $item_page;
        $number_page = ceil($count / $item_page);
        if ($request->has('sort')) {
            $products = $products->orderBy($request->sort, $request->ord);
            $sort = $request->sort;
            $ord = $request->ord;
        } else {
            $products = $products->orderBy('id', 'DESC');
            $sort = 0;
            $ord = "";
        }
        $products = $products->offset($start)->limit($item_page)->get();
        return view('search', compact('products',  'view', 'page', 'number_page',  'sort', 'ord', 'kw'));
    }
    // ////////////////////////////////////
    public function search_main_ajax(Request $request)
    {
        $data = array();
        $pagination = 0;
        $output = '';
        $output_2 = '';
        if ($request->has('page')) {
            $page = $request->page;
        } else {
            $page = 1;
        }
        if ($request->kw != '') {
        }
        $sort = $request->sort;
        $ord = $request->ord;
        $view = $request->view;
        $products = new Products();
        if ($request->has('kw')) {
            $products =  $products->where('name', 'LIKE', '%' . $request->kw . '%');
            $kw = $request->kw;
        }
        $count = $products->count();
        $item_page = 16;
        $start = ($page - 1) * $item_page;
        $number_page = ceil($count / $item_page);
        if ($request->has('sort')) {
            $products = $products->orderBy($request->sort, $request->ord);
        } else {
            $products = $products->orderBy('id', 'DESC');
        }
        $products = $products->offset($start)->limit($item_page)->get();
        $col = 'col-lg-3 col-md-4 col-12 col-sm-6';
        foreach ($products as $message) {
            $type = 1;
            $class = "prdcat";
            $output .= '<div class="' . $col . ' item w-100">';
            $output .= view('components.product.itemgrid', compact('message', 'type', 'class'));
            $output .= '</div>';
        }
        unset($message);
        foreach ($products as $prd) {
            $message = $prd;
            $output_2 .= ' <div class="item w-100">';
            $output_2 .= view('components.listitem', compact('message'));
            $output_2 .= '</div>';
        }
        if ($number_page > 1) {
            $pagination = navi_ajax_page($number_page, $page, "pagination-sm", "justify-content-start",  "mt-4");
        }

        $data['html'] = $output;
        $data['html_2'] = $output_2;
        $data['page'] = $pagination;
        $data['view'] = $view;
        return response()->json($data);
    }
    // /////////////////////////////////////////
    //////////////////////////////////////

    public function pre_order(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $ok = 0;
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'phone' => 'required|numeric',

            ],
            [
                'name.required' => "Không Được Để Trống Tên",
                'name.string' => "Tên phải là 1 chuỗi kí tự",
                'phone.required' => "Bạn chưa điền số điện thoại",
                'phone.numeric' => "Bạn đang nhập có ký tự không phải SỐ",
            ]
        );
        if ($validator->fails()) {
            $data['ok'] = $ok;
            $data['errors'] = $validator->errors();
            return response()->json($data);
        } else {
            $product = Products::where('id', '=', $request->id)->firstOrFail();
            $data_create['name_cus'] = $request->name;
            $data_create['phone'] = $request->phone;
            $data_create['products_id'] = $request->id;
            if ($product->price != NULL && $product->price != 0) {
                $data_create['price'] = $product->price;    
            }
            $data_create['products_name'] = Products::where('id', '=', $data_create['products_id'])->firstOrFail()->name;
            if (PreOrder::create($data_create)) {
                $ok = 1;
            }
            $data['created'] = $ok;
            return response()->json($data);
        }
    }

    ////////////////////////////////////////

    /////////////////////////////////////
    ////////////////////////////////////////

    public function minify(Request $request)
    {
        $file_js = [
            'app',
            'blog',
            'cart',
            'home',
            'product',
            'scrollReval',
            'slide',
            'user',
            'helper'
        ];
        $file_css = [
            '_component',
            '_footer',
            '_layout',
            '_naviteam',
            '_responsive',
            '_variables',
            'app'
        ];
        foreach ($file_js as $js) {
            $minifier = new JS();
            $minifier->add('public/client/app/js/' . $js . '.js');
            $minifier->minify('public/client/production/js/' . $js . '.js');
            unset($minifier);
        }
        foreach ($file_css as $css) {
            $minifier_css = new CSS();
            $minifier_css->add('public/client/app/css/' . $css . '.css');
            $minifier_css->minify('public/client/production/css/' . $css . '.css');
            unset($minifier_css);
        }
        return "Đã minified tất cả file";
    }

    ////////////////////////////////////////
}
