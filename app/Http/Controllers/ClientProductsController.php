<?php

namespace App\Http\Controllers;

use App\Models\gllCat;
use App\Models\Policy;
use App\Models\Category;
use App\Models\Products;
use App\Models\Insurance;
use GuzzleHttp\Middleware;
use App\Models\gllProducts;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\RelatedPosts;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\bundled_skin_cat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ClientProductsController extends Controller
{
    ////////////////////////////////////////

    public function index($slug, Request $request)
    {
        $bc =  explode("/", Str::replaceFirst('/', '', Str::replace(url('category/'), '', url()->current())));
        $slug = collect($bc)->last();
        $category =  Category::where('slug', 'LIKE', $slug)->firstOrFail();
        $view = $request->cookie('view');
        if ($request->has('page')) {
            $page = $request->page;
        } else {
            $page = 1;
        }
        $list_banner = gllCat::where('cate_id', '=', $category->id)->get();
        $id = $category->id;
        $list_products = array();
        foreach (Category::find($id)->products()->select('products_id')->get()->toArray() as $item) {
            $list_products[] = $item['products_id'];
        }
        if ($id != 129) {
            $products = Products::where(function ($query) use ($id, $list_products) {
                $query->where('cat_id', '=', $id)
                    ->orWhere('sub_1_cat_id', '=', $id)
                    ->orWhere('sub_2_cat_id', '=', $id)
                    ->orWhereIn('id', $list_products);
            });
        } else {
            $products = Products::where('usage_stt', '=', 2);
        }
        $count = $products->count();
        $item_page = 16;
        $start = ($page - 1) * $item_page;
        $number_page = ceil($count / $item_page);
        if ($request->has('genre')) {
            $genres = explode(",", $request->genre);
            $products = $products->whereIn('cat_game_id', $genres);
        } else {
            $genres = array();
        }
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

        return view('client.product.index', compact('products', 'category', 'view', 'page', 'number_page', 'id', 'sort', 'ord', 'genres', 'list_banner', 'bc' ,'list_products'));
    }
    //////////////////////////////////////

    public function index_ajax(Request $request)
    {
        $data = array();
        $pagination = 0;
        $output = '';
        $output_2 = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        if ($request->has('page')) {
            $page = $request->page;
        } else {
            $page = 1;
        }
        $id = $request->id;
        $sort = $request->sort;
        $ord = $request->ord;
        $view = $request->view;
        $list_products = array();
        foreach (Category::find($id)->products()->select('products_id')->get()->toArray() as $item) {
            $list_products[] = $item['products_id'];
        }
        if ($id != 129) {
            $products = Products::where(function ($query) use ($id, $list_products) {
                $query->where('cat_id', '=', $id)
                    ->orWhere('sub_1_cat_id', '=', $id)
                    ->orWhere('sub_2_cat_id', '=', $id)
                    ->orWhereIn('id', $list_products);
            });
        } else {
            $products = Products::where('usage_stt', '=', 2);
        }
        $count = $products->count();
        $item_page = 16;
        $start = ($page - 1) * $item_page;
        $number_page = ceil($count / $item_page);
        if ($request->genre != 0) {
            $products = $products->whereIn('cat_game_id', explode(",", $request->genre));
        }
        if ($request->has('sort')) {
            $products = $products->orderBy($request->sort, $request->ord);
        } else {
            $products = $products->orderBy('id', 'DESC');
        }
        $products = $products->offset($start)->limit($item_page)->get();
        if (Category::where('id', '=', $id)->first()->is_game == 1) {
            $col = "col-lg-3 col-md-4 col-12 col-sm-6";
        } else {
            $col = "col-lg-3 col-md-4 col-12 col-sm-6";
        }
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
            $pagination = navi_ajax_page($number_page, $page, $size = "pagination-sm", "justify-content-center", $mt = "mt-4");
        }

        $data['html'] = $output;
        $data['html_2'] = $output_2;
        $data['page'] = $pagination;
        $data['view'] = $view;
        return response()->json($data);
    }

    ////////////////////////////////////////
    ////////////////////////////////////////
    ////////////////////////////////////////
    public function detail_product(Request $request)
    {
        $bc =  explode("/", Str::replaceFirst('/', '', Str::replace(url('products/'), '', url()->current())));
        $slug = collect($bc)->last();
        $product = Products::where('slug',  $slug)->firstOrFail();
        $fullset = 0;
        $policies = array();
        $banner = gllProducts::where('products_id', '=', $product->id)->where('index', '=', 1)->where('size', '=', 700)->first();
        $policy = Products::find($product->id)->policies;
        foreach ($policy as $item) {
            if (Policy::where('id', '=', $item->plc_id)->first()->fullset == 1) {
                $fullset = $item->plc_id;
            } else {
                $policies[] = Policy::where('id', '=', $item->plc_id)->first();
            }
        }
        $policies = collect($policies);
        $policies = $policies->sortBy('position');
        $related_blog = Products::find($product->id)->related_blogs()->get();
        $related_cat = Category::find($product->sub_1_cat_id)->related_blogs()->get();
        $related_cat_blog  = $related_blog->merge($related_cat);
        $related_product = Products::find($product->id)->related_products()->get();
        $bundled_skin = bundled_skin_cat::where('cat_id', '=', $product->sub_1_cat_id)->first();
        $bundled_accessory = Category::find($product->sub_1_cat_id)->bundled_accessory()->get();
        $product_ins = collect(Products::find($product->id)->ins()->get()->toArray())->groupBy('group_id');
        return view('client.product.detail', compact('product', 'policies', 'fullset', 'related_blog', 'banner',  'related_product', 'related_cat_blog', 'bundled_skin', 'bundled_accessory', 'product_ins' , 'bc'));
    }

    ////////////////////////////////////////
    //////////////////////////////////////

    public function loadDataQuickView(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $id = $request->id;
        $product = Products::where('id', '=', $id)->first();
        $output .= view('components.modal.detail', compact('product'));
        $data['html'] = $output;
        return response()->json($data);
    }

    ////////////////////////////////////////
    //////////////////////////////////////

    public function format(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $output = crf($request->price);
        $data['price'] = $output;
    }
    ////////////////////////////////////////
    ////////////////////////////////////////

    public function render_skeleton(Request $request)
    {
        $output = '';
        $output_2 = '';
        for ($i = 1; $i <= 8; $i++) {
            $output .= '<div class="col-lg-3 col-md-4 col-12 col-sm-6 item w-100">';
            $output .= view('components.client.product.skeletion.grid');
            $output .= '</div>';
        }
        for ($i = 1; $i <= 5; $i++) {
            $output_2 .= '<div class="item w-100">';
            $output_2 = view('components.client.product.skeleton.listitem');
            $output_2 .= '</div>';
        }
        $data['html'] = $output;
        $data['html_2'] = $output_2;
        return response()->json($data);
    }

    ////////////////////////////////////////
    // ///////////////////////////////////
}
