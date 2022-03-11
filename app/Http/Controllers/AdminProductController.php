<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\CatGame;
use App\Models\Category;
use App\Models\Producer;
use App\Models\Products;
use App\Models\Insurance;
use App\Models\gllProducts;
use App\Models\PreOrder;
use App\Models\RelatedPosts;
use App\Models\typeProduct;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\RelatedProducts;
use App\Repositories\CustomerInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['active' => 'prd']);
            return $next($request);
        });
    }
    public function index()
    {
    }
    ////////////////////////////////////////
    public function delete_product($id, Request $request)
    {
        $this->authorize('admin-action');
        if (Products::where('id', '=', $id)->delete()) {
            return redirect()->back()->with('delete-ok', 1);
        } else {
            return redirect()->back()->with('delete-notok', 1);
        }
    }
    // /////////////////////////////////////////////////////
    public function product_view_add(Request $request)
    {
        $category = Category::where('parent_id', '=', 0)->get();
        $ins = Insurance::all();
        $policy = Policy::all();
        $producer = Producer::all();
        $cat_game = CatGame::all();
        $type = typeProduct::where('parent', '=', 0)->get();
        if ($request->has('selected')) {
            $selected = $request->selected;
        } else {
            $selected = "";
        }
        if ($request->has('selected_blog')) {
            $selected_blog = $request->selected_blog;
        } else {
            $selected_blog = "";
        }
        $url = route('add_product_view');
        return view('admin.products.add', compact('category', 'ins', 'policy', 'producer', 'cat_game', 'type', 'selected', 'selected_blog', 'url'));
    }
    // //////////////////////////////////////// end view add
    public function product_view_edit($id, Request $request)
    {
        $product = Products::where('id', '=', $id)->firstOrFail();
        if (Gate::allows('group-4')) {
        } else {
            $this->authorize('edit-product', $product);
        }
        $category = Category::where('parent_id', '=', 0)->get();
        $ins = Insurance::all();
        $policy = Policy::all();
        $producer = Producer::all();
        $cat_game = CatGame::all();
        $cat_s2 = Category::where('parent_id', '=', $product->sub_1_cat_id);
        $type = typeProduct::where('parent', '=', 0)->get();
        $sub_type = typeProduct::where('parent', '=', typeProduct::where('name', '=', $product->type)->first()->id)->get();
        $related = RelatedProducts::where('product_id', '=', $id)->first();
        $related_blog = RelatedPosts::where('product_id', '=', $id)->first();
        if ($related) {
            $selected = $related->products;
        } else {
            $selected = "";
        }
        if ($related_blog) {
            $selected_blog = $related_blog->posts;
        } else {
            $selected_blog = "";
        }
        $url = route('product_view_edit', ['id' => $id]);
        return view('admin.products.edit', compact('category', 'ins', 'policy', 'producer', 'cat_game', 'type', 'cat_s2', 'product', 'sub_type', 'selected', 'selected_blog', 'url'));
    }
    // //////////////////////////////////////// end view edit
    public function product_handle_add(Request $request)
    {
        $data_create = array();
        $path = "admin/images/products/";
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:products',
                'model' => 'required',
                'des' => 'required',
                'keywords' => 'required',
                'type' => 'required',
                'price' => 'required|required_with:historical_cost|numeric',
                'historical_cost' => 'required|required_with:price|numeric|lte:price',
                'main_img' => 'required|image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'sub_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'bg' => 'image|mimes:jpeg,png,jpg,tiff,svg',
                'gll700.*' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'gll80.*' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'cat' => 'required',
                'producer' => 'required',
            ],
            [
                'name.required' => "Bạn chưa nhập tên sản phẩm",
                'name.unique' => "Sản phẩm đã tồn tại",
                'des.required' => "Bạn chưa nhập mô tả ngắn cho sản phẩm",
                'keywords.required' => "Bạn chưa nhập keywords cho sản phẩm",
                'type.required' => "Bạn chưa chọn loại sản phẩm",
                'model.required' => "Bạn chưa nhập tên sản phẩm",
                'cat.required' => "Bạn chưa chọn danh mục chính",
                'cat_1.required' => "Bạn chưa chọn danh mục phụ 1",
                'producer.required' => "Bạn chưa chọn nhà sản xuất",
                'price.required' => "Bạn chưa nhập giá sản phẩm",
                'price.numeric' => "Giá sản phẩm bắt buộc là SỐ",
                'price.required_with' => "Bạn không được để trống giá sản phẩm khi đã nhập giá gốc",
                'historical_cost.numeric' => "Giá gốc sản phẩm bắt buộc là SỐ",
                'historical_cost.required' => "Không được để trống giá gốc sản phẩm",
                'historical_cost.lte' => "Giá gốc phải bé hơn giá bán của sản phẩm",
                'historical_cost.required_with' => "Bạn không được để trống giá gốc khi đã nhập giá sản phẩm",
                'main_img.required' => "Không được để trống hình ảnh chính",
                'main_img.image' => "File không phải là file ảnh",
                'main_img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'main_img.max' => "File ảnh không vượt quá 500kb",
                'sub_img.image' => "File không phải là file ảnh",
                'sub_img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'sub_img.max' => "File ảnh không vượt quá 500kb",
                'gll700.*.image' => "Có File Không Phải Là File Ảnh",
                'gll700.*.mimes' => "Có File Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'gll700.*.max' => "Có File ảnh vượt quá 500kb",
                'gll80.*.image' => "Có File Không Phải Là File Ảnh",
                'gll80.*.mimes' => "Có File Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'gll80.*.max' => "Có File ảnh vượt quá 500kb",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data_create['name'] = $request->name;
            $data_create['price'] = $request->price;
            $data_create['historical_cost'] = $request->historical_cost;
            $data_create['slug'] = Str::slug($request->name);
            $data_create['des'] = $request->des;
            $data_create['keywords'] = $request->keywords;
            $data_create['content'] = $request->content;
            $data_create['info'] = $request->info;
            $data_create['model'] = $request->model;
            $data_create['cat_id'] = $request->cat;
            $data_create['cat_name'] = Category::where('id', '=', $request->cat)->first()->name;
            if ($request->cat_1 != null) {
                $data_create['sub_1_cat_id'] = $request->cat_1;
                $data_create['sub_1_cat_name'] = Category::where('id', '=', $request->cat_1)->first()->name;
            } else {
                $data_create['sub_1_cat_id'] = $request->cat;
                $data_create['sub_1_cat_name'] = Category::where('id', '=', $request->cat)->first()->name;
            }
            if ($request->op_sub_1 != "") {
                $data_create['op_sub_1_id'] = $request->op_sub_1;
                $data_create['op_sub_1_name'] = Category::where('id', '=', $request->op_sub_1)->first()->name;
            }
            if ($request->op_sub_2 != 0) {
                $data_create['op_sub_2_id'] = $request->op_sub_2;
                $data_create['op_sub_2_name'] = Category::where('id', '=', $request->op_sub_2)->first()->name;
            }
            if ($request->cat_2 != 0) {
                $data_create['sub_2_cat_id'] = $request->cat_2;
                $data_create['sub_2_cat_name'] = Category::where('id', '=', $request->cat_2)->first()->name;
            }
            if ($request->sub_type != 0) {
                $data_create['sub_type'] = typeProduct::where('id', '=', $request->sub_type)->first()->name;
            }
            $data_create['producer_id'] = $request->producer;
            $data_create['producer_slug'] = Producer::where('id', '=', $request->producer)->first()->slug;
            if ($request->cat_game != 0) {
                $data_create['cat_game_id'] = CatGame::where('id', '=', $request->cat_game)->first()->name;
            } else {
                $data_create['cat_game_id'] = NULL;
            }
            $data_create['stock'] = $request->stock;
            $data_create['usage_stt'] = $request->usage_stt;
            $data_create['highlight'] = $request->highlight;
            $data_create['author'] = Auth::user()->name;
            $data_create['author_id'] = Auth::id();
            $data_create['type'] = typeProduct::where('id', '=', $request->type)->first()->name;
            $data_create['video'] = $request->video;
            $data_create['cat_2_id'] = $request->cat_2;
            $data_create['cat_2_sub'] = $request->cat_2_id;
            if ($request->has('ins')) {
                $data_create['insurance'] = implode(",", $request->ins);
            }
            if ($request->has('plc')) {
                $data_create['policy'] = implode(",", $request->plc);
            }
            // /////////////////////////////////
            if ($request->has('banner')) {
                $banner = $request->banner;
                $n_b = $banner->getClientOriginalName();
                if (file_exists("public/" . $path . Str::slug($data_create['cat_name']) . "/"  . "banner/" .   $n_b)) {
                    $filename4 = pathinfo($n_b, PATHINFO_FILENAME);
                    $ext4 =  $banner->getClientOriginalExtension();
                    $n_b = $filename4 . '(1)' . '.' . $ext4;
                    $b = 1;
                    while (file_exists("public/" . $path .  Str::slug($data_create['cat_name']) . "/"  . "banner/" . $n_b)) {
                        $n_b = $filename4 . '(' . $b . ')' . '.' . $ext4;
                        $b++;
                    }
                }
                $save_banner = $path . Str::slug($data_create['cat_name']) . "/"  . "banner/" . $n_b;
                $banner->move("public/" . $path . Str::slug($data_create['cat_name']) . "/" . "banner", $n_b);
                $data_create['banner'] = $save_banner;
                $data_create['banner_link'] = $request->banner_link;
            }
            // //////////// background img
            if ($request->has('bg')) {
                $banner = $request->bg;
                $n_b = $banner->getClientOriginalName();
                if (file_exists("public/" . $path . Str::slug($data_create['cat_name']) . "/"  . "banner/" .   $n_b)) {
                    $filename4 = pathinfo($n_b, PATHINFO_FILENAME);
                    $ext4 =  $banner->getClientOriginalExtension();
                    $n_b = $filename4 . '(1)' . '.' . $ext4;
                    $b = 1;
                    while (file_exists("public/" . $path .  Str::slug($data_create['cat_name']) . "/"  . "banner/" . $n_b)) {
                        $n_b = $filename4 . '(' . $b . ')' . '.' . $ext4;
                        $b++;
                    }
                }
                $save_banner = $path . Str::slug($data_create['cat_name']) . "/"  . "banner/" . $n_b;
                $banner->move("public/" . $path . Str::slug($data_create['cat_name']) . "/" . "banner", $n_b);
                $data_create['banner'] = $save_banner;
                $data_create['banner_link'] = $request->banner_link;
            }


            // end bannerrrrrrrrrrrrrrrrrrrrrrrrrr
            $main_img = $request->main_img;
            $n_main = $main_img->getClientOriginalName();
            if (file_exists("public/" . $path . Str::slug($data_create['cat_name']) . "/"  . "main/" . $n_main)) {
                $filename = pathinfo($n_main, PATHINFO_FILENAME);
                $ext = $main_img->getClientOriginalExtension();
                $n_main = $filename . '(1)' . '.' . $ext;
                $i = 1;
                while (file_exists("public/" . $path .  Str::slug($data_create['cat_name']) . "/"  . "main/" . $n_main)) {
                    $n_main = $filename . '(' . $i . ')' . '.' . $ext;
                    $i++;
                }
            }
            $save_main = $path . Str::slug($data_create['cat_name']) . "/"  . "main/" . $n_main;
            $main_img->move("public/" . $path .  Str::slug($data_create['cat_name']) . "/" . "main", $n_main);
            $data_create['main_img'] = $save_main;
            // //////////////// end main
            if ($request->has('sub_img')) {
                $sub_img = $request->sub_img;
                $n_sub = $sub_img->getClientOriginalName();
                if (file_exists("public/" . $path . Str::slug($data_create['cat_name']) . "/"  . "sub/" .  $n_sub)) {
                    $filename2 = pathinfo($n_sub, PATHINFO_FILENAME);
                    $ext2 = $sub_img->getClientOriginalExtension();
                    $n_sub = $filename2 . '(1)' . '.' . $ext2;
                    $k = 1;
                    while (file_exists("public/" . $path .  Str::slug($data_create['cat_name']) . "/"  . "sub/" . $n_sub)) {
                        $n_sub = $filename2 . '(' . $k . ')' . '.' . $ext2;
                        $k++;
                    }
                }
                $save_sub = $path . Str::slug($data_create['cat_name']) . "/"  . "sub/" . $n_sub;
                $sub_img->move("public/" . $path . Str::slug($data_create['cat_name']) . "/" . "sub", $n_sub);
                $data_create['sub_img'] = $save_sub;
            }
            // end subbbbbbbbbbbbbb
            // start backgroud
            if ($request->has('bg')) {
                $bg = $request->bg;
                $n_bg = $bg->getClientOriginalName();
                if (file_exists("public/" . $path . Str::slug($data_create['cat_name']) . "/"  . "backgroud/" .  $n_bg)) {
                    $filename_bg = pathinfo($n_bg, PATHINFO_FILENAME);
                    $ext_bg = $bg->getClientOriginalExtension();
                    $n_bg = $filename_bg . '(1)' . '.' . $ext_bg;
                    $k = 1;
                    while (file_exists("public/" . $path .  Str::slug($data_create['cat_name']) . "/"  . "backgroud/" . $n_bg)) {
                        $n_bg = $filename_bg . '(' . $k . ')' . '.' . $ext_bg;
                        $k++;
                    }
                }
                $save_bg = $path . Str::slug($data_create['cat_name']) . "/"  . "backgroud/" . $n_bg;
                $bg->move("public/" . $path . Str::slug($data_create['cat_name']) . "/" . "backgroud", $n_bg);
                $data_create['bg'] = $save_bg;
            }

            // end backgroud
            $created = Products::create($data_create);
            if ($created) {
                if ($request->has('gll700')) {
                    $index = 0;
                    foreach ($request->gll700 as $g7) {
                        $index++;
                        $name = $g7->getClientOriginalName();
                        if (file_exists("public/" . $path . Str::slug($created->cat_name) . "/"  . "images_700x700/" .  $name)) {
                            $f7 = pathinfo($name, PATHINFO_FILENAME);
                            $ext7 = $g7->getClientOriginalExtension();
                            $name = $f7 . '(1)' . '.' . $ext7;
                            $j = 1;
                            while (file_exists("public/" . $path . Str::slug($created->cat_name) . "/"  . "images_700x700/" .  $name)) {
                                $name = $f7 . '(' . $j . ')' . '.' . $ext7;
                                $j++;
                            }
                        }
                        $save_7 =  $path . Str::slug($created->cat_name) . "/"  . "images_700x700/" . $name;
                        $g7->move("public/" . $path . Str::slug($created->cat_name) . "/"  . "images_700x700", $name);
                        gllProducts::create([
                            'link' => $save_7,
                            'products_id' => $created->id,
                            'size' => 700,
                            'index' => $index
                        ]);
                        unset($g7);
                    }
                }
                // end 70000000000000000000000000
                if ($request->has('gll80')) {
                    $index = 0;
                    foreach ($request->gll80 as $g8) {
                        $index++;
                        $name_8 = $g8->getClientOriginalName();
                        if (file_exists("public/" . $path . Str::slug($created->cat_name) . "/"  . "images_80x80/" . $name_8)) {
                            $f8 = pathinfo($name_8, PATHINFO_FILENAME);
                            $ext8 = $g8->getClientOriginalExtension();
                            $name_8 = $f8 . '(1)' . '.' . $ext8;
                            $h = 1;
                            while (file_exists("public/" . $path . Str::slug($created->cat_name) . "/"  . "images_80x80/" . $name_8)) {
                                $name_8 = $f8 . '(' . $h . ')' . '.' . $ext8;
                                $h++;
                            }
                        }
                        $save_8 =  $path . Str::slug($created->cat_name) . "/"  . "images_80x80/" . $name_8;
                        $g8->move("public/" . $path . Str::slug($created->cat_name) . "/" . "images_80x80", $name_8);
                        gllProducts::create([
                            'link' => $save_8,
                            'products_id' => $created->id,
                            'size' => 80,
                            'index' => $index
                        ]);
                        unset($g8);
                    }
                }
                // end 80000000000000000000000000000000
                //  start handle related produts
                if ($request->has('products')) {
                    if (count($request->products) > 0) {
                        $data_related['products'] = implode(",", $request->products);
                        $data_related['product_id'] = $created->id;
                        $data_related['for'] = "product";
                        RelatedProducts::create($data_related);
                    }
                }
                // ///////////////
                if ($request->has('blogs')) {
                    if (count($request->blogs) > 0) {
                        $data_related_blog['posts'] = implode(",", $request->blogs);
                        $data_related_blog['product_id'] = $created->id;
                        $data_related_blog['for'] = "product";
                        RelatedPosts::create($data_related_blog);
                    }
                }
                // end handle related blogs
            }
            return redirect()->back()->with('ok', '1');
        }
    }

    //////////////////////////////////////// end add product
    public function product_handle_edit($id, Request $request)
    {
        $data_create = array();
        $product = Products::where('id', '=', $id)->firstOrFail();
        $path = "admin/images/products/";
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'des' => 'required',
                'keywords' => 'required',
                'model' => 'required',
                'type' => 'required',
                'price' => 'required|required_with:historical_cost|numeric',
                'historical_cost' => 'required|required_with:price|numeric|lte:price',
                'main_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'sub_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'bg' => 'image|mimes:jpeg,png,jpg,tiff,svg',
                'gll700.*' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'gll80.*' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'cat' => 'required',
                'producer' => 'required',
            ],
            [
                'name.required' => "Bạn chưa nhập tên sản phẩm",
                'des.required' => "Bạn chưa nhập mô tả ngắn cho sản phẩm",
                'keywords.required' => "Bạn chưa nhập keywords cho sản phẩm",
                'type.required' => "Bạn chưa chọn loại sản phẩm",
                'model.required' => "Bạn chưa nhập tên sản phẩm",
                'cat.required' => "Bạn chưa chọn danh mục chính",
                'cat_1.required' => "Bạn chưa chọn danh mục phụ 1",
                'producer.required' => "Bạn chưa chọn nhà sản xuất",
                'price.required' => "Bạn chưa nhập giá sản phẩm",
                'price.required_with' => "Bạn không được để trống giá sản phẩm khi đã nhập giá gốc",
                'price.numeric' => "Giá sản phẩm bắt buộc là SỐ",
                'historical_cost.numeric' => "Giá gốc sản phẩm bắt buộc là SỐ",
                'historical_cost.required' => "Không được để trống giá gốc sản phẩm",
                'historical_cost.lte' => "Giá gốc phải bé hơn giá bán của sản phẩm",
                'historical_cost.required_with' => "Bạn không được để trống giá gốc khi đã nhập giá sản phẩm",
                'main_img.required' => "Không được để trống hình ảnh chính",
                'main_img.image' => "File không phải là file ảnh",
                'main_img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'main_img.max' => "File ảnh không vượt quá 500kb",
                'sub_img.image' => "File không phải là file ảnh",
                'sub_img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'sub_img.max' => "File ảnh không vượt quá 500kb",
                'gll700.*.image' => "Có File Không Phải Là File Ảnh",
                'gll700.*.mimes' => "Có File Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'gll700.*.max' => "Có File ảnh vượt quá 500kb",
                'gll80.*.image' => "Có File Không Phải Là File Ảnh",
                'gll80.*.mimes' => "Có File Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'gll80.*.max' => "Có File ảnh vượt quá 500kb",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data_update['name'] = $request->name;
            $data_update['des'] = $request->des;
            $data_update['keywords'] = $request->keywords;
            $data_update['price'] = $request->price;
            $data_update['historical_cost'] = $request->historical_cost;
            $data_update['content'] = $request->content;
            $data_update['slug'] = Str::slug($request->name);
            $data_update['info'] = $request->info;
            $data_update['model'] = $request->model;
            $data_update['cat_id'] = $request->cat;
            $data_update['cat_name'] = Category::where('id', '=', $request->cat)->first()->name;
            if ($request->cat_1 != null) {
                $data_update['sub_1_cat_id'] = $request->cat_1;
                $data_update['sub_1_cat_name'] = Category::where('id', '=', $request->cat_1)->first()->name;
            } else {
                $data_update['sub_1_cat_id'] = $request->cat;
                $data_update['sub_1_cat_name'] = Category::where('id', '=', $request->cat)->first()->name;
            }
            if ($request->cat_2 != 0) {
                $data_update['sub_2_cat_id'] = $request->cat_2;
                $data_update['sub_2_cat_name'] = Category::where('id', '=', $request->cat_2)->first()->name;
            }
            if ($request->op_sub_1 != "") {
                $data_update['op_sub_1_id'] = $request->op_sub_1;
                $data_update['op_sub_1_name'] = Category::where('id', '=', $request->op_sub_1)->first()->name;
            }
            if ($request->op_sub_2 != 0) {
                $data_update['op_sub_2_id'] = $request->op_sub_2;
                $data_update['op_sub_2_name'] = Category::where('id', '=', $request->op_sub_2)->first()->name;
            }
            if ($request->sub_type != 0) {
                $data_update['sub_type'] = typeProduct::where('id', '=', $request->sub_type)->first()->name;
            } else {
                $data_update['sub_type'] = NULL;
            }
            $data_update['producer_id'] = $request->producer;
            $data_update['producer_slug'] = Producer::where('id', '=', $request->producer)->first()->slug;
            if ($request->cat_game != 0) {
                $data_update['cat_game_id'] = CatGame::where('id', '=', $request->cat_game)->first()->name;
            } else {
                $data_update['cat_game_id'] = NULL;
            }
            $data_update['stock'] = $request->stock;
            $data_update['usage_stt'] = $request->usage_stt;
            $data_update['highlight'] = $request->highlight;
            $data_update['author'] = Auth::user()->name;
            $data_update['author_id'] = Auth::id();
            $data_update['type'] = typeProduct::where('id', '=', $request->type)->first()->name;
            $data_update['video'] = $request->video;
            $data_update['cat_2_id'] = $request->cat_2;
            $data_update['cat_2_sub'] = $request->cat_2_id;
            if ($request->has('ins')) {
                $data_update['insurance'] = implode(",", $request->ins);
            }
            if ($request->has('plc')) {
                $data_update['policy'] = implode(",", $request->plc);
            }
            // /////////////////////////////////


            // end bannerrrrrrrrrrrrrrrrrrrrrrrrrr
            if ($request->has('main_img')) {
                unlink("public/" . $product->main_img);
                $main_img = $request->main_img;
                $n_main = $main_img->getClientOriginalName();
                if (file_exists("public/" . $path . Str::slug($data_update['cat_name']) . "/"  . "main/" . $n_main)) {
                    $filename = pathinfo($n_main, PATHINFO_FILENAME);
                    $ext = $main_img->getClientOriginalExtension();
                    $n_main = $filename . '(1)' . '.' . $ext;
                    $i = 1;
                    while (file_exists("public/" . $path .  Str::slug($data_update['cat_name']) . "/"  . "main/" . $n_main)) {
                        $n_main = $filename . '(' . $i . ')' . '.' . $ext;
                        $i++;
                    }
                }
                $save_main = $path . Str::slug($data_update['cat_name']) . "/"  . "main/" . $n_main;
                $main_img->move("public/" . $path .  Str::slug($data_update['cat_name']) . "/" . "main", $n_main);
                $data_update['main_img'] = $save_main;
            }

            // //////////////// end main
            if ($request->has('sub_img')) {
                if ($product->sub_img != NULL && $product->sub_img != '') {
                    unlink("public/" . $product->sub_img);
                }
                $sub_img = $request->sub_img;
                $n_sub = $sub_img->getClientOriginalName();
                if (file_exists("public/" . $path . Str::slug($data_update['cat_name']) . "/"  . "sub/" .  $n_sub)) {
                    $filename2 = pathinfo($n_sub, PATHINFO_FILENAME);
                    $ext2 = $sub_img->getClientOriginalExtension();
                    $n_sub = $filename2 . '(1)' . '.' . $ext2;
                    $k = 1;
                    while (file_exists("public/" . $path .  Str::slug($data_update['cat_name']) . "/"  . "sub/" . $n_sub)) {
                        $n_sub = $filename2 . '(' . $k . ')' . '.' . $ext2;
                        $k++;
                    }
                }
                $save_sub = $path . Str::slug($data_update['cat_name']) . "/"  . "sub/" . $n_sub;
                $sub_img->move("public/" . $path . Str::slug($data_update['cat_name']) . "/" . "sub", $n_sub);
                $data_update['sub_img'] = $save_sub;
            }
            // end subbbbbbbbbbbbbb
            // start backgroup img
            if ($request->has('bg')) {
                if ($product->bg != NULL && $product->bg != '') {
                    unlink("public/" . $product->bg);
                }
                $bg = $request->bg;
                $n_bg = $bg->getClientOriginalName();
                if (file_exists("public/" . $path . Str::slug($data_update['cat_name']) . "/"  . "backgroud/" .  $n_bg)) {
                    $filename_bg = pathinfo($n_bg, PATHINFO_FILENAME);
                    $ext_bg = $bg->getClientOriginalExtension();
                    $n_bg = $filename_bg . '(1)' . '.' . $ext_bg;
                    $k = 1;
                    while (file_exists("public/" . $path .  Str::slug($data_update['cat_name']) . "/"  . "backgroud/" . $n_bg)) {
                        $n_bg = $filename_bg . '(' . $k . ')' . '.' . $ext_bg;
                        $k++;
                    }
                }
                $save_bg = $path . Str::slug($data_update['cat_name']) . "/"  . "backgroud/" . $n_bg;
                $bg->move("public/" . $path . Str::slug($data_update['cat_name']) . "/" . "backgroud", $n_bg);
                $data_update['bg'] = $save_bg;
            }
            // update product
            Products::where('id', '=', $id)->update($data_update);
            // ///////// update pre order product
            if ($request->stock == 1) {
                PreOrder::where('products_id', '=', $id)->update([
                    'status_product' => 1,
                    'price' => $request->price
                ]);
            } else {
                PreOrder::where('products_id', '=', $id)->update([
                    'status_product' => 0,
                    'price' => NULL
                ]);
            }
            // handle related products
            if ($request->has('products')) {
                if (count($request->products) > 0) {
                    $data_related['products'] = implode(",", $request->products);
                    RelatedProducts::where('product_id', '=',  $id)->update($data_related);
                }
            }
            // end handle related products
            if ($request->has('blogs')) {
                if (count($request->blogs) > 0) {
                    $data_related_blog['posts'] = implode(",", $request->blogs);
                    RelatedPosts::where('product_id', '=',  $id)->update($data_related_blog);
                }
            }
            // end handle related blogs
            if ($request->has('gll700')) {
                foreach ($request->gll700 as $g7) {
                    $index = 1;
                    $name = $g7->getClientOriginalName();
                    if (file_exists("public/" . $path . Str::slug($product->cat_name) . "/"  . "images_700x700/" .  $name)) {
                        $f7 = pathinfo($name, PATHINFO_FILENAME);
                        $ext7 = $g7->getClientOriginalExtension();
                        $name = $f7 . '(1)' . '.' . $ext7;
                        $j = 1;
                        while (file_exists("public/" . $path . Str::slug($product->cat_name) . "/"  . "images_700x700/" .  $name)) {
                            $name = $f7 . '(' . $j . ')' . '.' . $ext7;
                            $j++;
                        }
                    }
                    while (gllProducts::where('products_id', '=', $id)->where('index', '=', $index)->where('size', '=', 700)->first()) {
                        $index++;
                    }
                    $save_7 =  $path . Str::slug($product->cat_name) . "/"  . "images_700x700/" . $name;
                    $g7->move("public/" . $path . Str::slug($product->cat_name) . "/"  . "images_700x700", $name);
                    gllProducts::create([
                        'link' => $save_7,
                        'products_id' => $id,
                        'size' => 700,
                        'index' => $index
                    ]);
                    unset($g7);
                }
            }
            // end 70000000000000000000000000
            if ($request->has('gll80')) {
                foreach ($request->gll80 as $g8) {
                    $index = 1;
                    $name_8 = $g8->getClientOriginalName();
                    if (file_exists("public/" . $path . Str::slug($product->cat_name) . "/"  . "images_80x80/" . $name_8)) {
                        $f8 = pathinfo($name_8, PATHINFO_FILENAME);
                        $ext8 = $g8->getClientOriginalExtension();
                        $name_8 = $f8 . '(1)' . '.' . $ext8;
                        $h = 1;
                        while (file_exists("public/" . $path . Str::slug($product->cat_name) . "/"  . "images_80x80/" . $name_8)) {
                            $name_8 = $f8 . '(' . $h . ')' . '.' . $ext8;
                            $h++;
                        }
                    }
                    while (gllProducts::where('products_id', '=', $id)->where('index', '=', $index)->where('size', '=', 80)->first()) {
                        $index++;
                    }
                    $save_8 =  $path . Str::slug($product->cat_name) . "/"  . "images_80x80/" . $name_8;
                    $g8->move("public/" . $path . Str::slug($product->cat_name) . "/" . "images_80x80", $name_8);
                    gllProducts::create([
                        'link' => $save_8,
                        'products_id' => $id,
                        'size' => 80,
                        'index' => $index
                    ]);
                    unset($g8);
                }
            }
            // end 80000000000000000000000000000000

            return redirect()->back()->with('ok', '1');
        }
    }

    //////////////////////////////////////// end edit product

    public function show_product(Request $request)
    {
        $category = Category::where('parent_id', '=', 0)->get();
        $page = 1;
        $item_page = config('product.item_page');
        $start = ($page - 1) * $item_page;
        $count = Products::count();
        $number_page = ceil($count / $item_page);
        $products = Products::orderBy('id', 'DESC')->offset($start)->limit($item_page)->get();
        return view('admin.products.show', compact('category', 'number_page', 'products'));
    }

    //////////////////////////////////////// end show product
    public function prd_edit_related($id, Request $request)
    {
        $related = RelatedProducts::where('id', '=', $id)->firstOrFail();
        $selected = $related->products;
        $url = route('prd_edit_related_view', ['id' => $id]);
        return view('admin.products.related.edit', compact('selected', 'related',  'url'));
    }
    ////////////////////////////////////////
    public function prd_edit_handle_realted($id, Request $request)
    {
        if ($request->has('products')) {
            if ($request->has('rFPrd') || $request->has('rFBlog')) {
                $data['products'] = implode(",", $request->products);
                if ($request->has('rFPrd')) {
                    $data['product_id'] = $request->rFPrd;
                } else {
                    $data['blog_id'] = $request->rFBlog;
                }
                $data['for'] = $request->realatedFor;
                RelatedProducts::where('id', '=', $id)->update($data);;
                return redirect()->back()->with('ok', 1);
            } else {
                return redirect()->back()->with('er', 2);
            }
        } else {
            return redirect()->back()->with('er', 1);
        }
    }


    //   ////////////////////////////////////

    public function prd_add_related(Request $request)
    {
        if ($request->has('selected')) {
            $selected = $request->selected;
        } else {
            $selected = "";
        }
        $url = route('prd_add_related_view');
        return view('admin.products.related.add', compact('url', 'selected'));
    }

    ////////////////////////////////////////
    public function prd_add_handle_realted(Request $request)
    {
        if ($request->has('products')) {
            if ($request->has('rFPrd') || $request->has('rFBlog')) {
                $data['products'] = implode(",", $request->products);
                if ($request->has('rFPrd')) {
                    $data['product_id'] = $request->rFPrd;
                } else {
                    $data['blog_id'] = $request->rFBlog;
                }
                $data['for'] = $request->realatedFor;
                RelatedProducts::create($data);
                return redirect()->route('prd_add_related_view')->with('ok', 1);
            } else {
                return redirect()->back()->with('er', 2);
            }
        } else {
            return redirect()->back()->with('er', 1);
        }
    }


    //    ///////////////////////////////////////
}
