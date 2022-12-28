<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Policy;
use App\Models\CatGame;
use App\Models\Category;
use App\Models\PreOrder;
use App\Models\Producer;
use App\Models\Products;
use App\Models\Insurance;
use App\Models\ProductIns;
use App\Models\ProductPlc;
use App\Models\gllProducts;
use App\Models\typeProduct;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\BlockProduct;
use App\Models\PrdRelaBlock;
use App\Models\RelatedPosts;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\RelatedProducts;
use App\Models\ProductCategories;
use App\Repositories\AdminPrdRepo;
use Illuminate\Support\Facades\DB;
use App\Repositories\FileInterface;
use App\Repositories\ModelInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use App\Repositories\AdminPrdInterface;
use App\Repositories\CustomerInterface;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Spatie\ResponseCache\Facades\ResponseCache;

class AdminProductController extends Controller
{
    public function __construct(FileInterface $handle_file, AdminPrdInterface $repo_prd)
    {
        $this->middleware(function ($request, $next) {
            session(['active' => 'prd']);
            return $next($request);
        });
        $this->handle_file =  $handle_file;
        $this->data = new stdClass();
        $this->res = [];
        $this->res['html'] = "";
        $this->repoPrd = $repo_prd;
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
        $ins = Insurance::all();
        $policy = Policy::all();
        $producer = Producer::all();
        $cat_game = CatGame::all();
        $type = typeProduct::where('parent', '=', 0)->get();
        // Session::forget("crawler");
        dd(Session::all());
        $crawler = Session::has('crawler') ? Session::get('crawler') : [];

        if (count($crawler) > 0) {
            dd($crawler);
        }
        $url = route('add_product_view');
        return view('admin.products.add', compact('ins', 'policy', 'producer', 'cat_game', 'type',   'url', 'crawler'));
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
        $product_categories = Products::find($id)->categories()->select('category_id')->get()->toArray();
        $array_pc = array();
        foreach ($product_categories as $pc) {
            $array_pc[] = $pc['category_id'];
        }
        $url = route('product_view_edit', ['id' => $id]);
        return view('admin.products.edit', compact('id', 'category', 'ins', 'policy', 'producer', 'cat_game', 'type', 'cat_s2', 'product', 'sub_type',  'url', 'array_products', 'array_blogs', 'product_policies', 'product_ins', 'array_pc'));
    }
    public function validateProduct($request, $id = null)
    {
        $ruleName = $id !== null ? 'required|unique:products' : 'required|unique:products,name,' . $id;
        $validator = Validator::make(
            $request->all(),
            [
                'name' => $ruleName,
                'model' => 'required',
                'des' => 'required',
                'keywords' => 'required',
                'type' => 'required',
                'price' => 'required|required_with:historical_cost|numeric',
                'historical_cost' => 'required|required_with:price|numeric|lte:price',
                'main_img' => 'required|image|mimes:jpeg,png,jpg,tiff,svg|max:204800',
                'sub_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:204800',
                'bg' => 'image|mimes:jpeg,png,jpg,tiff,svg',
                'gll700.*' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:204800',
                'gll80.*' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:204800',
                'cat' => 'required',
                'producer' => 'required',
                'categories' => 'required'
            ],
            [
                'name.required' => "Bạn chưa nhập tên sản phẩm",
                'name.unique' => "Sản phẩm đã tồn tại",
                'des.required' => "Bạn chưa nhập mô tả ngắn cho sản phẩm",
                'keywords.required' => "Bạn chưa nhập keywords cho sản phẩm",
                'type.required' => "Bạn chưa chọn loại sản phẩm",
                'model.required' => "Bạn chưa nhập tên sản phẩm",
                'cat.required' => "Bạn chưa chọn danh mục chính",
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
                'main_img.max' => "File ảnh không vượt quá 200mb",
                'sub_img.image' => "File không phải là file ảnh",
                'sub_img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'sub_img.max' => "File ảnh không vượt quá 200mb",
                'gll700.*.image' => "Có File Không Phải Là File Ảnh",
                'gll700.*.mimes' => "Có File Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'gll700.*.max' => "Có File ảnh vượt quá 200mb",
                'gll80.*.image' => "Có File Không Phải Là File Ảnh",
                'gll80.*.mimes' => "Có File Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'gll80.*.max' => "Có File ảnh vượt quá 200mb",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
    // //////////////////////////////////////// end view edit
    public function product_handle_add(Request $request)
    {
        $data_create = array();
        $path = "admin/images/products/";
        $this->validateProduct($request);
        $data_create['name'] = $request->name;
        $data_create['price'] = $request->price;
        $data_create['historical_cost'] = $request->historical_cost;
        $data_create['slug'] = Str::slug($request->name);
        $data_create['des'] = $request->des;
        $data_create['keywords'] = $request->keywords;
        $data_create['content'] = $request->content;
        $data_create['info'] = $request->info;
        $data_create['model'] = $request->model;
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
        // /////////////////////////////////
        if ($request->has('banner')) {
            $path_banner = $path . Str::slug($data_create['slug']) . "/"  . "banner/";
            $data_create['banner'] = $this->handle_file->storeFileImg($request->banner, $path_banner);
            $data_create['banner_link'] = $request->banner_link;
        }
        // //////////// background img

        // end bannerrrrrrrrrrrrrrrrrrrrrrrrrr
        $path_main_img = $path . Str::slug($data_create['slug']) . "/"  . "main/";
        $data_create['main_img'] = $this->handle_file->storeFileImg($request->main_img, $path_main_img);
        // //////////////// end main
        if ($request->has('sub_img')) {
            $path_sub_img = $path .  Str::slug($data_create['slug']) . "/"  . "sub/";
            $data_create['sub_img'] = $this->handle_file->storeFileImg($request->sub_img, $path_sub_img);
        }
        // end subbbbbbbbbbbbbb
        // start backgroud
        if ($request->has('bg')) {
            $path_bg =  $path . Str::slug($data_create['slug']) . "/"  . "backgroud/";
            $data_create['bg'] = $this->handle_file->storeFileImg($request->bg, $path_bg);
        }
        // end backgroud
        $created = Products::create($data_create);
        // createdd end
        if ($created) {
            foreach ($request->categories as $cate_id) {
                ProductCategories::create(['products_id' => $created->id, 'category_id' => $cate_id]);
            }
            if ($request->has('rela__block')) {
                $rb = explode(",", $request->rela__block);
                foreach ($rb as $bid) {
                    PrdRelaBlock::create([
                        'products_id' => $created->id,
                        'block_id' => $bid
                    ]);
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
                    $path_g7 = $path . Str::slug($created->slug) . "/"  . "images_700x700/";
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
                    $path_g8 = $path . Str::slug($created->slug) . "/"  . "images_80x80/";
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
            if ($request->has('rela__products')) {
                $request->rela__products = explode(",", $request->rela__products);
                if (count($request->rela__products) > 0) {
                    foreach ($request->rela__products as $products_id) {
                        RelatedProducts::create([
                            'products_id' => $products_id,
                            'product_id' => $created->id,

                        ]);
                    }
                }
            }
            // ///////////////
            if ($request->has('rela__blogs')) {
                $request->rela__blogs = explode(",", $request->rela__blogs);
                if (count($request->rela__blogs) > 0) {
                    foreach ($request->rela__blogs as $post) {
                        PrdRelaBlog::create([
                            'blogs_id' => $post,
                            'products_id' => $created->id,
                        ]);
                    }
                }
            }
            // end handle related blogs
        }
        return redirect()->back()->with('ok', '1');
        // end else

    }

    //////////////////////////////////////// end add product
    public function product_handle_edit($id, FileInterface $handle_file, Request $request)
    {
        $data_create = array();
        $product = Products::where('id', '=', $id)->firstOrFail();
        $path = "admin/images/products/";
        $this->validateProduct($request, $id);
        $data_update['name'] = $request->name;
        $data_update['des'] = $request->des;
        $data_update['keywords'] = $request->keywords;
        $data_update['price'] = $request->price;
        $data_update['historical_cost'] = $request->historical_cost;
        $data_update['content'] = $request->content;
        $data_update['slug'] = Str::slug($request->name);
        $data_update['info'] = $request->info;
        $data_update['model'] = $request->model;
        ProductCategories::where('products_id', $id)->whereNotIn('category_id', $request->categories)->delete();
        foreach ($request->categories as $cate_id) {
            if (!ProductCategories::where('products_id', $id)->where('category_id', $cate_id)->first()) {
                ProductCategories::create(['products_id' => $id, 'category_id' => $cate_id]);
            }
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
                $this->file->deleteFile($product->banner);
            }
            $path_banner = $path . Str::slug($data_update['cat_name']) . "/"  . "banner/";
            $data_update['banner'] = $this->handle_file->storeFileImg($request->banner, $path_banner);
            $data_update['banner_link'] = $request->banner_link;
        }

        // end bannerrrrrrrrrrrrrrrrrrrrrrrrrr
        if ($request->has('main_img')) {
            if ($product->main_img != NULL) {
                $this->file->deleteFile($product->main_img);
            }
            $main_path = $path . Str::slug($data_update['cat_name']) . "/"  . "main/";
            $data_update['main_img'] = $this->handle_file->storeFileImg($request->main_img, $main_path);
        }

        // //////////////// end main
        if ($request->has('sub_img')) {
            if ($product->sub_img != NULL) {
                $this->file->deleteFile($product->sub_img);
            }
            $path_sub_img = $path .  Str::slug($data_update['cat_name']) . "/"  . "sub/";
            $data_update['sub_img'] = $this->handle_file->storeFileImg($request->sub_img, $path_sub_img);
        }
        // end subbbbbbbbbbbbbb
        // start backgroup img
        if ($request->has('bg')) {
            if ($product->bg != NULL && $product->bg != '') {
                $this->file->deleteFile($product->bg);
            }
            $path_bg =  $path . Str::slug($data_update['cat_name']) . "/"  . "backgroud/";
            $data_update['bg'] = $this->handle_file->storeFileImg($request->bg, $path_bg);
        }
        // update product
        Products::where('id', $id)->update($data_update);
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

    //////////////////////////////////////// end edit product

    public function show_product(Request $request, ModelInterface $repom)
    {
        $category = Category::where('parent_id', '=', 0)->get();
        $products = $repom->pagination(new Products(), null, 1, null, null);
        return view('admin.products.show', compact('category',  'products'));
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
    public function block__prodcut__view(Request $request, ModelInterface $repom)
    {
        $type = $request->type;
        if ($type == "add") {
            $data = new stdClass();
            $blocks = $repom->pagination(new BlockProduct(), null, null, null, null);
            $data->blocks = $blocks->data;
            $data->number_page = $blocks->number_page;
            return view('admin.products.block.add', compact('data'));
        }
        $block = BlockProduct::where('id', $request->block_id)->firstOrFail();
        return view('admin.products.block.edit', compact('block'));
    }
    //    ///////////////////////////////////////
    public function crawler(Request $request)
    {
        $res = [];
        $crawler = \Goutte::request('GET', $request->url);
        $images =  $crawler->filter('.product-image .swiper-slide img')->each(function ($node) {
            $array = [];
            array_push($array, $node->image()->getUri());
            return $array;
        });

        $images =  $crawler->filter('.product-image .swiper-slide img')->each(function ($node) {
            $array = [];
            array_push($array, $node->image()->getUri());
            return $array;
        });
        $res['page_title'] = $crawler->filter('.page-title')->text("");
        $url = url("https://game.haloshop.vn/index.php?route=product/search&search=" . $res['page_title']);
        $crawler_2 = \Goutte::request('GET', $url);
        $main_images =  $crawler_2->filter(".product-img div img")->each(function ($node) {
            $array_2 = [];
            array_push($array_2, $node->image()->getUri());
            return $array_2;
        });
        $res['price'] = preg_replace('/\D/', '', $crawler->filter('.product-price')->text(0));
        $res["price_new"] = preg_replace('/\D/', '', $crawler->filter('.product-price-new')->text(0));
        $res["price_old"] = preg_replace('/\D/', '', $crawler->filter('.product-price-old')->text(0));
        $res['meta'] = va_get_meta("https://game.haloshop.vn/may-nintendo-switch/new-nintendo-switch-gray-bh-3-thang");
        $res['spec'] = $crawler->filter('#tab-specification')->html("");
        $res["content"] = $crawler->filter(".tab-content .block-content")->html("");
        $res["model"] = $crawler->filter(".product-model span")->text("");
        $files_main = glob('E:/01/datatest/2nite/main/*'); // get all file names
        foreach ($files_main as $fm) { // iterate files
            if (is_file($fm)) {
                unlink($fm); // delete file
            }
        }
        $files = glob('E:/01/datatest/2nite/700/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file)) {
                unlink($file); // delete file
            }
        }
        $files = glob('E:/01/datatest/2nite/80/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file)) {
                unlink($file); // delete file
            }
        }
        for ($k = 0; $k < count($main_images); $k++) {
            $url = $main_images[$k][0];
            $info = pathinfo($url);
            $forder = 'E:/01/datatest/2nite/main/' . $info["basename"];
            file_put_contents($forder . $info["basename"], file_get_contents($url));
        }
        for ($i = 0; $i < count($images); $i++) {
            $url = $images[$i][0];
            $info = pathinfo($url);
            $name = $i . "-" . $info["basename"];
            $forder = $i < count($images) / 2 ? 'E:/01/datatest/2nite/700/' . $name : 'E:/01/datatest/2nite/80/' . $name;
            file_put_contents($forder . $name, file_get_contents($url));
        }
        Session::flash("crawler", $res);
        return redirect()->back();
    }
    //  //////////////////////////////////////// end crawler
    public function block__product__handle(Request $request, ModelInterface $repom)
    {
        $type = $request->type;
        $isAjax = $request->has('ajax') ? true : false;
        $succes = 2;
        $isList = false;
        $msg = "";
        if ($type == "prev") {
            $id = $request->block_id;
            $block = BlockProduct::where('id', $id)->first();
            $data['block'] = $block;
            return response()->json($data);
        }
        if (!$isAjax) {
            $validator = Validator::make(
                $request->all(),
                [
                    'title' => 'required',
                    'text' => 'required',
                ],
                [
                    'title.required' => "Không được để trống title",
                    'text.required' => "Không được để trống text",

                ]
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
        if ($request->has('isList')) {
            $isList = true;
        }
        if ($type == "add") {
            $created = BlockProduct::create(['title' => $request->title, 'text' => $request->text, 'is_list' =>  $isList]);
            if ($created) {
                $succes = 1;
                $msg = "Thêm block sản phẩm thành công";
            } else {
                $msg = "Thêm block sản phẩm không thành công";
            }
        }
        if ($type == "edit") {
            if (BlockProduct::where('id', $request->block_id)->update(['title' => $request->title, 'text' => $request->text, 'is_list' =>  $isList])) {
                $succes = 1;
                $msg = "Cập nhật block sản phẩm thành công";
            } else {
                $msg = "Cập nhật block sản phẩm không thành công";
            }
        }
        if ($type == "delete") {
            $page = $request->page;
            $id = $request->id;
            if (BlockProduct::where('id', $id)->delete()) {
                $blocks = $repom->pagination(new BlockProduct(), null, $page, null, null);
                $this->data->blocks = $blocks->data;
                $this->data->number_page = $blocks->number_page;
                $vadata = $this->data;
                $this->res['test'] = $vadata->blocks;
                $this->res['html'] .= view('components.admin.table.product.block', compact('vadata'));
                $this->res['succes'] = 1;
            } else {
                $this->res['succes'] = 2;
            }
            return response()->json($this->res);
        }
        return redirect()->back()->with('succes', $succes)->with('msg', $msg);
    }
}
