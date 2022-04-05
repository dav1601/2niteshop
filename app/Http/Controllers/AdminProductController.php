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
use App\Models\ProductCategories;
use App\Models\ProductIns;
use App\Models\ProductPlc;
use App\Models\RelatedPosts;
use App\Models\typeProduct;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\RelatedProducts;
use App\Repositories\CustomerInterface;
use App\Repositories\FileInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class AdminProductController extends Controller
{
    public function __construct(FileInterface $handle_file)
    {
        $this->middleware(function ($request, $next) {
            session(['active' => 'prd']);
            return $next($request);
        });
        $this->handle_file =  $handle_file;
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
        $array_products = array();
        $array_blogs = array();
        $product = Products::where('id', '=', $id)->firstOrFail();
        if (Gate::allows('group-4')) {
        } else {
            $this->authorize('edit-product', $product);
        }
        $product_policies = array();
        $product_ins = array();
        $link_policies = Products::find($id)->policies;
        $link_ins = Products::find($id)->ins;
        foreach ($link_policies as $lp) {
            array_push($product_policies, $lp->plc_id);
        }
        foreach ($link_ins as $li) {
            array_push($product_ins, $li->ins_id);
        }
        $category = Category::where('parent_id', '=', 0)->get();
        $ins = Insurance::all();
        $policy = Policy::all();
        $producer = Producer::all();
        $cat_game = CatGame::all();
        $cat_s2 = Category::where('parent_id', '=', $product->sub_1_cat_id);
        $type = typeProduct::where('parent', '=', 0)->get();
        $sub_type = typeProduct::where('parent', '=', typeProduct::where('name', '=', $product->type)->first()->id)->get();
        $related = Products::find($id)->related_products()->get()->toArray();
        $related_blog = Products::find($id)->related_blogs()->get()->toArray();
        $product_categories = Products::find($id)->categories()->select('category_id')->get()->toArray();
        $array_pc = array();
        foreach($product_categories as $pc) {
            $array_pc[] = $pc['category_id'];
        }
        if (count($related) > 0) {
            $selected = $related;
            foreach ($related as $item) {
                $array_products[] = $item['products_id'];
            }
            $selected_js_product = implode(",",  $array_products);
        } else {
            $selected = "";
            $selected_js_product = "";
        }
        if (count($related_blog) > 0) {
            $selected_blog = $related_blog;
            foreach ($related_blog as $item_2) {
                $array_blogs[] = $item_2['posts'];
            }
            $selected_js_blog = implode(",", $array_blogs);
        } else {
            $selected_blog = "";
            $selected_js_blog = "";
        }
        $url = route('product_view_edit', ['id' => $id]);
        return view('admin.products.edit', compact('id', 'category', 'ins', 'policy', 'producer', 'cat_game', 'type', 'cat_s2', 'product', 'sub_type', 'selected', 'selected_blog', 'url', 'selected_js_product', 'selected_js_blog', 'array_products', 'array_blogs', 'product_policies', 'product_ins' ,'array_pc'));
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

            // /////////////////////////////////
            if ($request->has('banner')) {
                $path_banner = $path . Str::slug($data_create['cat_name']) . "/"  . "banner/";
                $data_create['banner'] = $this->handle_file->storeFileImg($request->banner, $path_banner);
                $data_create['banner_link'] = $request->banner_link;
            }
            // //////////// background img

            // end bannerrrrrrrrrrrrrrrrrrrrrrrrrr
            $path_main_img = $path . Str::slug($data_create['cat_name']) . "/"  . "main/";
            $data_create['main_img'] = $this->handle_file->storeFileImg($request->main_img, $path_main_img);
            // //////////////// end main
            if ($request->has('sub_img')) {
                $path_sub_img = $path .  Str::slug($data_create['cat_name']) . "/"  . "sub/";
                $data_create['sub_img'] = $this->handle_file->storeFileImg($request->sub_img, $path_sub_img);
            }
            // end subbbbbbbbbbbbbb
            // start backgroud
            if ($request->has('bg')) {
                $path_bg =  $path . Str::slug($data_create['cat_name']) . "/"  . "backgroud/";
                $data_create['bg'] = $this->handle_file->storeFileImg($request->bg, $path_bg);
            }
            // end backgroud
            $created = Products::create($data_create);
            // createdd end
            if ($created) {
                if ($request->has('categories')) {
                    foreach ($request->categories as $cate_id) {
                        ProductCategories::create(['products_id' => $created->id, 'category_id' => $cate_id, 'category_name' => Category::where('id', '=', $cate_id)->first()->name]);
                    }
                }
                if ($request->has('plc')) {
                    foreach ($request->plc as $plc) {
                        ProductPlc::create([
                            'products_id' => $created->id,
                            'plc_id' => $plc
                        ]);
                    }
                }
                if ($request->has('ins')) {
                    foreach ($request->ins as $ins) {
                        ProductPlc::create([
                            'products_id' => $created->id,
                            'ins_id' => $ins,
                            'group_id' => Insurance::where('id', '=', $ins)->first()->group
                        ]);
                    }
                }
                if ($request->has('gll700')) {
                    $index = 0;
                    foreach ($request->gll700 as $g7) {
                        $index++;
                        $path_g7 = $path . Str::slug($created->cat_name) . "/"  . "images_700x700/";
                        $save_7 =  $this->handle_file->storeFileImg($g7, $path_g7);
                        gllProducts::create([
                            'link' => $save_7,
                            'products_id' => $created->id,
                            'size' => 700,
                            'index' => $index
                        ]);
                        unset($g7);
                    }
                }
                // end 750x750 img
                if ($request->has('gll80')) {
                    $index = 0;
                    foreach ($request->gll80 as $g8) {
                        $index++;
                        $path_g8 = $path . Str::slug($created->cat_name) . "/"  . "images_80x80/";
                        $save_8 = $this->handle_file->storeFileImg($g8, $path_g8);
                        gllProducts::create([
                            'link' => $save_8,
                            'products_id' => $created->id,
                            'size' => 80,
                            'index' => $index
                        ]);
                        unset($g8);
                    }
                }
                // end 80x80 img
                //  start handle related produts
                if ($request->has('products')) {
                    if (count($request->products) > 0) {
                        foreach ($request->products as $products_id) {
                            RelatedProducts::create([
                                'products_id' => $products_id,
                                'product_id' => $created->id,
                                'for' => "product"
                            ]);
                        }
                    }
                }
                // ///////////////
                if ($request->has('blogs')) {
                    if (count($request->blogs) > 0) {
                        foreach ($request->blogs as $posts) {
                            RelatedPosts::create([
                                'posts' => $posts,
                                'product_id' => $created->id,
                                'for' => "product"
                            ]);
                        }
                    }
                }
                // end handle related blogs
            }
            return redirect()->back()->with('ok', '1');
        }
    }

    //////////////////////////////////////// end add product
    public function product_handle_edit($id, FileInterface $handle_file, Request $request)
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
            $data_update['cat_2_id'] = $request->cat_2;
            $data_update['cat_2_sub'] = $request->cat_2_id;
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
            if ($request->has('categories')) {
                ProductCategories::where('products_id', $id)->whereNotIn('category_id', $request->categories)->delete();
                foreach ($request->categories as $cate_id) {
                    if (!ProductCategories::where('products_id', $id)->where('category_id', $cate_id)->first()) {
                        ProductCategories::create(['products_id' => $id, 'category_id' => $cate_id, 'category_name' => Category::where('id', '=', $cate_id)->first()->name]);
                    }
                }
            }
            if ($request->has('ins')) {
                ProductIns::where('products_id', $id)->whereNotIn('ins_id', $request->ins)->delete();
                foreach ($request->ins as $ins) {
                    if (!ProductIns::where('products_id', $id)->where('ins_id', $ins)->first()) {
                        ProductIns::create(['products_id' => $id, 'ins_id' => $ins, 'group_id' => Insurance::where('id', '=', $ins)->first()->group]);
                    }
                }
            } else {
                ProductIns::where('products_id', $id)->delete();
            }
            if ($request->has('plc')) {
                ProductPlc::where('products_id', $id)->whereNotIn('plc_id', $request->plc)->delete();
                foreach ($request->plc as $plc) {
                    if (!ProductPlc::where('products_id', $id)->where('plc_id', $plc)->first()) {
                        ProductPlc::create(['products_id' => $id, 'plc_id' => $plc]);
                    }
                }
            } else {
                ProductPlc::where('products_id', $id)->delete();
            }
            // /////////////////////////////////
            if ($request->has('banner')) {
                if ($product->banner != NULL) {
                    unlink("public/" . $product->banner);
                }
                $path_banner = $path . Str::slug($data_update['cat_name']) . "/"  . "banner/";
                $data_update['banner'] = $this->handle_file->storeFileImg($request->banner, $path_banner);
                $data_update['banner_link'] = $request->banner_link;
            }

            // end bannerrrrrrrrrrrrrrrrrrrrrrrrrr
            if ($request->has('main_img')) {
                $main_path = $path . Str::slug($data_update['cat_name']) . "/"  . "main/";
                $data_update['main_img'] = $this->handle_file->storeFileImg($request->main_img, $main_path);
            }

            // //////////////// end main
            if ($request->has('sub_img')) {
                $path_sub_img = $path .  Str::slug($data_update['cat_name']) . "/"  . "sub/";
                $data_update['sub_img'] = $this->handle_file->storeFileImg($request->sub_img, $path_sub_img);
            }
            // end subbbbbbbbbbbbbb
            // start backgroup img
            if ($request->has('bg')) {
                if ($product->bg != NULL && $product->bg != '') {
                    unlink("public/" . $product->bg);
                }
                $path_bg =  $path . Str::slug($data_update['cat_name']) . "/"  . "backgroud/";
                $data_update['bg'] = $this->handle_file->storeFileImg($request->bg, $path_bg);
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
                    foreach ($request->products as $products_id) {
                        if (!RelatedProducts::where('products_id', $products_id)->where('product_id', $id)->where('for', 'LIKE', "product")->first()) {
                            RelatedProducts::create([
                                'products_id' => $products_id,
                                'product_id' => $id,
                                'for' => "product"
                            ]);
                        }
                    }
                }
            }
            // end handle related products
            if ($request->has('blogs')) {
                if (count($request->blogs) > 0) {
                    foreach ($request->blogs as $posts) {
                        if (!RelatedPosts::where('product_id', $id)->where('posts', $posts)->where('for', 'LIKE', "product")->first()) {
                            RelatedPosts::create([
                                'posts' => $posts,
                                'product_id' => $id,
                                'for' => "product"
                            ]);
                        }
                    }
                }
            }
            // end handle related blogs
            if ($request->has('gll700')) {
                foreach ($request->gll700 as $g7) {
                    $index = 1;
                    while (gllProducts::where('products_id', '=', $id)->where('index', '=', $index)->where('size', '=', 700)->first()) {
                        $index++;
                    }
                    $path_g7 = $path . Str::slug($product->cat_name) . "/"  . "images_700x700/";
                    $save_7 =  $this->handle_file->storeFileImg($g7, $path_g7);
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
                    while (gllProducts::where('products_id', '=', $id)->where('index', '=', $index)->where('size', '=', 80)->first()) {
                        $index++;
                    }
                    $path_g8 = $path . Str::slug($product->cat_name) . "/"  . "images_80x80/";
                    $save_8 = $this->handle_file->storeFileImg($g8, $path_g8);
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
