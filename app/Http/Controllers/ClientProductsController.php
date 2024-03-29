<?php

namespace App\Http\Controllers;

use App\Models\gllCat;
use App\Models\Policy;
use App\Models\CatGame;
use App\Models\Category;
use App\Models\Products;
use App\Models\Insurance;
use GuzzleHttp\Middleware;
use App\Models\gllProducts;
use App\Models\PrdRelaBlog;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\RelatedPosts;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\bundled_skin_cat;
use App\Models\ProductCategories;
use Illuminate\Support\Facades\DB;
use App\Repositories\ModelInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Repositories\AdminPrdInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class ClientProductsController extends Controller
{
    ////////////////////////////////////////

    public function index($slug, Request $request, ModelInterface $vam)
    {

        if (!$request->has('isAjax')) {
            $bc =  explode("/", Str::replaceFirst('/', '', Str::replace(url('category/'), '', url()->current())));
            $slug = collect($bc)->last();
        }

        $category =  Category::where('slug', 'LIKE', $slug)->firstOrFail();
        $is_game = (bool) $category->is_game;
        $view = $request->cookie('view');
        $page = $request->has('page') ? $request->page : 1;
        $list_banner = gllCat::where('cate_id', '=', $category->id)->get();
        $id = $category->id;
        // FIX CÁC RELATIONSHIP MANY-MANY
        $products = Products::whereHas(
            'categories',
            function ($q) use ($category) {
                $q->where('slug', 'LIKE', $category->slug);
            }

        );

        $genre = [];
        if ($category->is_game) {
            $genre = $products->with(['product', 'product.cat_game'])->get();
            $genre = collect($genre)->groupBy(function ($item) {
                return $item->product->cat_game;
            })->all();
            $newArr = [];
            foreach ($genre as $key => $value) {
                $newArr[] = json_decode($key);
            }
            $genre = $newArr;
        }
        $genres = [];
        if ($request->has('genre') && $request->genre) {
            $genres = explode(",", $request->genre);
            $products = $products->whereIn('cat_game_id', $genres);
        }
        $orderBy = [];
        $sort = $request->has('sort') && $request->sort ? $request->sort : "id";
        $ord = $request->has('ord') && $request->ord ? strtolower($request->ord) : "desc";
        $orderBy[] = $sort;
        $orderBy[] = $ord;
        $products = $products->with(['producer', 'img_first', 'img_second']);
        $products = $vam->pagination($products, $orderBy, $page, 16, null);
        dd($products);
        if ($request->has('isAjax')) {
            $data = array();
            $pagination = "";
            $grid = '';
            $list = '';
            if ($products->count > 0) {
                foreach ($products->data as $product) {
                    $grid .= view('components.product.itemgrid', [
                        'class' => "prdcat", "classWp" => "col-lg-3 col-md-4 col-12 col-sm-6 item",
                        "message" => $product
                    ]);
                    $list .= view('components.listitem', ['classWp' => "item w-100", 'message' => $product]);
                }
            }
            $pagination .= view('components.pagination', ['number_page' => $products->number_page, 'page' => $products->page, 'classWp' => "pagination-sm justify-content-center mt-4"]);

            $data['grid'] = $grid;
            $data['list'] = $list;
            $data['pagination'] = $pagination;
            $data['view'] = $view;
            return response()->json($data);
        }
        return view('client.product.index', compact('products',  'category', 'view', 'id', 'sort', 'ord', 'genres', 'list_banner', 'bc', 'genre', 'is_game'));
    }
    //////////////////////////////////////




    ////////////////////////////////////////
    // ANCHOR detail //////////////////////////////////////////////////////
    public function detail_product(AdminPrdInterface $rprd, Request $request)
    {
        $bc =  explode("/", Str::replaceFirst('/', '', Str::replace(url('products/'), '', url()->current())));
        $slug = collect($bc)->last();
        $product = $rprd->getProduct($slug);
        dd($product);
        $categories = $product->categories->pluck('id');
        $related_products = [];
        $is_game = collect($product->categories)->filter(function ($category) {
            return $category->is_game;
        })->pluck('id');
        if (count($is_game) > 0) {
            $related_products = Products::whereHas('categories', function ($q) use ($is_game) {
                $q->whereIn("category_id", $is_game);
            })->exclude(['content', 'info'])->where('id', '!=', $product->id)->orderBy('id', 'desc')->take(8)->get();
        } else {
            $related_products = Products::whereHas('categories', function ($q) use ($categories) {
                $q->whereIn("category_id", $categories)->where('is_game', "!=", 1)->where("level", "!=", 0);
            })->exclude(['content', 'info'])->where('id', '!=', $product->id)->orderBy('id', 'desc')->take(8)->get();
        }
        return view('client.product.detail', compact('product', 'related_products'));
    }

    ////////////////////////////////////////
    //////////////////////////////////////

    public function loadDataQuickView(Request $request, AdminPrdInterface $rprd)
    {
        $data = array();
        $output = '';
        $id = $request->id;
        $product = $rprd->getProduct($id);
        $output .= view('components.modal.detail', compact('product'));
        $data['html'] = $output;
        return response()->json($data);
    }

    ////////////////////////////////////////
    //////////////////////////////////////
    function getComponent(Request $request)
    {
        $type = $request->type;
        $id = $request->prdId;
        $product = Products::where('id', $id)->first();
        $output = '';
        if ($product) {
            if ($type == "grid") {
                $output .= view('components.product.itemgrid', ['message' => $product, 'type' => 1, 'class' => '']);
            } else {
                $output .= view('components.listitem', ['message' => $product]);
            }
        } else {
            $product = false;
        }
        $data['html'] = $output;
        $data['prd'] = $product;
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
