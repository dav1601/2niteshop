<?php

namespace App\Http\Controllers;

use App\Models\gllCat;
use App\Models\Policy;
use App\Models\Category;
use App\Models\gllProducts;
use App\Models\Insurance;
use App\Models\Products;
use GuzzleHttp\Middleware;
use Illuminate\Support\Arr;
use App\Models\RelatedPosts;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ClientProductsController extends Controller
{
    ////////////////////////////////////////

    public function index($slug, Request $request)
    {
        if ($slug == '' || !Category::where('slug', 'LIKE', $slug)->first()) {
            abort(404);
        }
        $view = $request->cookie('view');
        if ($request->has('page')) {
            $page = $request->page;
        } else {
            $page = 1;
        }
        $category =  Category::where('slug', 'LIKE',  $slug)->first();
        $list_banner = gllCat::where('cate_id', '=', $category->id)->get();
        $id = $category->id;
        if ($id != 129) {
            $products = Products::where(function ($query) use ($id) {
                $query->where('cat_id', '=', $id)
                    ->orWhere('cat_2_id', '=', $id)
                    ->orWhere('cat_2_sub', '=', $id)
                    ->orWhere('sub_1_cat_id', '=', $id)
                    ->orWhere('sub_2_cat_id', '=', $id)
                    ->orWhere('op_sub_1_id', '=', $id)
                    ->orWhere('op_sub_2_id', '=', $id);
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

        return view('client.product.index', compact('products', 'category', 'view', 'page', 'number_page', 'id', 'sort', 'ord', 'genres', 'list_banner'));
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
        if ($id != 129) {
            $products = Products::where(function ($query) use ($id) {
                $query->where('cat_id', '=', $id)
                    ->orWhere('cat_2_id', '=', $id)
                    ->orWhere('cat_2_sub', '=', $id)
                    ->orWhere('sub_1_cat_id', '=', $id)
                    ->orWhere('sub_2_cat_id', '=', $id)
                    ->orWhere('op_sub_1_id', '=', $id)
                    ->orWhere('op_sub_2_id', '=', $id);
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
            $pagination = navi_ajax_page($number_page, $page, $size = "pagination-sm", "justify-content-start", $mt = "mt-4");
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

    public function detail_product($slug, Request $request)
    {
        if ($slug == '' || !Products::where('slug', 'LIKE', $slug)->first()) {
            abort(404);
        }
        $fullset = 0;
        $policies = array();
        $product = Products::where('slug', 'LIKE', $slug)->firstOrFail();
        $banner = gllProducts::where('products_id', '=', $product->id)->where('index', '=', 1)->where('size', '=', 700)->first();
        $policy = explode(",", $product->policy);
        foreach ($policy as $item) {
            if (Policy::where('id', '=', $item)->first()->fullset == 1) {
                $fullset = $item;
            } else {
                $policies[] = Policy::where('id', '=', $item)->first();
            }
        }
        $policies = collect($policies);
        $policies = $policies->sortBy('position');
        $related_blog = RelatedPosts::where('cat_id', '=', $product->sub_1_cat_id)->first();
        if ($related_blog) {
            $related_blogs = explode(",", $related_blog->posts);
        } else {
            $related_blogs = [];
        }
        if ($product->insurance != NULL) {
            $group = Insurance::whereIn('id', explode(",", $product->insurance))->select('group')->distinct()->first()->group;
        } else {
            $group = 0;
        }
        return view('client.product.detail', compact('product', 'policies', 'fullset', 'related_blogs', 'banner', 'group'));
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

    // ///////////////////////////////////
}
