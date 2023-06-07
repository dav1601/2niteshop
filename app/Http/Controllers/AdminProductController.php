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
use App\Models\gllProducts;
use App\Models\typeProduct;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Http\Traits\Product;
use App\Models\BlockProduct;
use Illuminate\Http\Request;
use App\Events\UpdateProduct;
use App\Http\Traits\Responser;
use Illuminate\Support\Carbon;
use App\Models\RelatedProducts;
use App\Http\Traits\Relationship;
use App\Models\ProductCategories;
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
    use Responser, Relationship, Product;
    public $handle_file;
    public $data;
    public $res;
    public $repoPrd;
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
        $product = Products::where('id', $id)->first();
        if ($product->banner) {
            $this->handle_file->deleteFile($product->banner);
        }
        $this->handle_file->deleteFile($product->main_img);
        $this->handle_file->deleteFile($product->sub_img);
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
        $producer = Producer::all()->pluck("name")->toArray();
        $cat_game = CatGame::all();
        $type = typeProduct::where('parent', '=', 0)->get();

        $crawler = Session::has('crawler') ? Session::get('crawler') : [];
        Session::forget("crawler");

        $url = route('add_product_view');
        return view('admin.products.add', compact('ins', 'policy', 'producer', 'cat_game', 'type',   'url', 'crawler'));
    }
    // //////////////////////////////////////// end view add
    public function product_view_edit($id, Request $request)
    {
        $product = $this->repoPrd->product($id);
        $producer = Producer::all()->pluck("name")->toArray();
        $cat_game = CatGame::all();
        $type = typeProduct::where('parent', '=', 0)->get();
        // $sub_type = typeProduct::where('parent', '=', typeProduct::where('name', '=', $product->type)->first()->id)->get();
        $product_categories = ProductCategories::where('products_id', $id)->get()->pluck('category_id')->toArray();
        $rela_blogs = implode(",", $product->related_blogs->pluck("id")->toArray());
        $rela_products =  implode(",", $product->bundled_products->pluck("id")->toArray());
        $policies = implode(",", $product->policies->pluck("id")->toArray());
        $ins =  implode(",", $product->ins->pluck("id")->toArray());
        $blocks =  implode(",", $product->blocks->pluck("id")->toArray());
        $gallery = collect($product->gll)->toArray();
        $url = route('product_view_edit', ['id' => $id]);
        return view('admin.products.edit', compact('id',   'producer', 'cat_game', 'type',  'product',   'url', 'product_categories', 'rela_blogs', 'rela_products', 'policies', 'ins', 'blocks', 'gallery'));
    }
    public function validateProduct($request, $id = null)
    {
        $ruleName = !$id  ? 'required|unique:products,name' : 'required|unique:products,name,' . $id;
        $img = "image|mimes:jpeg,png,jpg,tiff,svg|max:204800";
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
                'discount' => 'numeric|lte:price',
                'main_img' => $id ? $img : 'required|' . $img,
                'sub_img' => $img,
                'producer' => 'required',
                'category' => 'required',
                'date_sold' => "required"
            ],
            [
                'name.required' => "Bạn chưa nhập tên sản phẩm",
                'name.unique' => "Sản phẩm đã tồn tại",
                'des.required' => "Bạn chưa nhập mô tả ngắn cho sản phẩm",
                'keywords.required' => "Bạn chưa nhập keywords cho sản phẩm",
                'type.required' => "Bạn chưa chọn loại sản phẩm",
                'model.required' => "Bạn chưa nhập model sản phẩm",
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
        return $validator;
    }
    ////////////////////////////////////////

    // //////////////////////////////////////// end view edit
    public function product_handle_add(Request $request)
    {

        $data_create = array();
        $path = config('app.image_products');
        $validator = $this->validateProduct($request);
        if ($validator->fails()) {
            return $this->errorResponse("validator fail", 403, $validator->errors()->toArray());
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $producer = Producer::where('name', $request->producer)->first();
        $producer = $producer ? $producer : Producer::create([
            'name' => $request->producer,
            'slug' => Str::slug($request->producer)
        ]);
        $data_create['producer_id'] = $producer->id;
        $data_create['name'] = $request->name;
        $data_create['price'] = $request->price;
        $data_create['historical_cost'] = $request->historical_cost;
        $data_create['slug'] = Str::slug($request->name);
        $data_create['des'] = $request->des;
        $data_create['keywords'] = $request->keywords;
        $data_create['content'] = $request->content;
        $data_create['info'] = $request->info;
        $data_create['model'] = $request->model;
        $data_create['date_sold'] = $request->date_sold;
        $data_create['qty'] = (int) $request->qty;
        $data_create['discount'] = $request->discount;
        $data_create['type'] = (int) $request->type;
        $data_create['cat_game_id'] = $request->cat_game != 0 ? (int) $request->cat_game : NULL;
        $data_create['usage_stt'] = $request->usage_stt;
        $data_create['highlight'] = $request->highlight;
        $data_create['status'] = $this->statusProduct($request->date_sold, $data_create['qty']);
        $path = $path  . "/" . $data_create['type'] . "/";


        // /////////////////////////////////

        // //////////// background img

        // end bannerrrrrrrrrrrrrrrrrrrrrrrrrr
        $path_main_img = $path  . "main/";
        $data_create['main_img'] = $this->handle_file->storeFileImg($request->main_img, $path_main_img);
        // //////////////// end main
        if ($request->sub_img) {
            $path_sub_img = $path  . "sub/";
            $data_create['sub_img'] = $this->handle_file->storeFileImg($request->sub_img, $path_sub_img);
        }

        if ($request->bg) {
            $path_bg =  $path  .  "backgroud/";
            $data_create['bg'] = $this->handle_file->storeFileImg($request->bg, $path_bg);
        }
        // end backgroud
        try {
            $created = Products::create($data_create);
            // createdd end
            if ($created) {
                $galleries = $request->file('galleries');
                $galleries = $galleries ? $galleries : [];
                if (count($galleries) > 0) {
                    foreach ($galleries as $key =>  $gallery) {
                        $path_700 = $path . "700/";
                        $path_80 = $path . "80/";
                        $image_700 = $this->handle_file->storeFileImg($gallery[700], $path_700);
                        $image_80 = $this->handle_file->storeFileImg($gallery[80], $path_80);
                        gllProducts::create(['products_id' => $created->id, 'image_700' => $image_700, 'image_80' => $image_80, 'index' => $key]);
                    }
                }
                $created->categories()->attach($request->category);
                $created->ins()->attach(a_explode(",", $request->rela__ins));
                $created->policies()->attach(a_explode(",", $request->rela__plc));
                $created->bundled_products()->attach(a_explode(",", $request->rela__products));
                $created->blocks()->attach(a_explode(",", $request->rela__block));
                $created->related_blogs()->attach(a_explode(",", $request->rela__blogs));
                return $this->successResponse(['redirect_edit' => route('product_view_edit', ['id' => $created->id])]);
            }
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }

        // end else

    }

    //////////////////////////////////////// end add product
    public function product_handle_edit($id,  Request $request)
    {
        $validator = $this->validateProduct($request, $id);
        return "edit";
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data_update['name'] = $request->name;
        $data_update['des'] = $request->des;
        $data_update['keywords'] = $request->keywords;
        $data_update['price'] = $request->price;
        $data_update['historical_cost'] = $request->historical_cost;
        $data_update['content'] = $request->content;
        $data_update['slug'] = Str::slug($request->name);
        $data_update['info'] = $request->info;
        $data_update['model'] = $request->model;
        $data_update['date_sold'] = $request->date_sold;
        $data_update['qty'] = $request->qty;
        $data_update['discount'] = $request->discount;
        $data_update['usage_stt'] = $request->usage_stt;
        $data_update['highlight'] = $request->highlight;
        $data_update['type'] = (int) $request->type;
        $data_update['cat_game_id'] = $request->cat_game != 0 ? $request->cat_game : NULL;
        $data_update['status'] = $this->statusProduct($request->date_sold, $request->qty);
        // /////////////
        $request->request->add(['rela__category' => implode(',', $request->category)]);

        ////////////////
        $producer = Producer::where('name', $request->producer)->first();
        if (!$producer) {
            $producer = Producer::create([
                'name' => $request->producer,
                'slug' => Str::slug($request->producer)
            ]);
        }
        $data_update['producer_id'] = $producer->id;
        // /////////////////////////////////
        // end bannerrrrrrrrrrrrrrrrrrrrrrrrrr
        // update product
        $updated =  Products::where('id', $id)->update($data_update);
        if (!$updated) {
            return redirect()->back()->with('error', 'Updated Product Failed');
        }
        $product = Products::find($id);
        event(new UpdateProduct($id));
        // ///////// update pre order product
        if ($data_update['status'] >= 1) {
            PreOrder::where('products_id',  $id)->update([
                'status_product' => 0,
                'price' => NULL
            ]);
        } else {
            PreOrder::where('products_id',  $id)->update([
                'status_product' => 1,
                'price' => $request->price
            ]);
        }

        $product->categories()->sync($request->category);
        $product->ins()->sync(a_explode(",", $request->rela__ins));
        $product->policies()->sync(a_explode(",", $request->rela__plc));
        $product->bundled_products()->sync(a_explode(",", $request->rela__products));
        $product->blocks()->sync(a_explode(",", $request->rela__block));
        $product->related_blogs()->sync(a_explode(",", $request->rela__blogs));
        return redirect()->back()->with('success', 'Updated Product Success');
    }

    //////////////////////////////////////// end edit product

    public function show_product(Request $request, ModelInterface $repom)
    {
        $category = Category::where('parent_id', '=', 0)->get();
        $products = new Products();
        $products = $products->with(['producer']);
        $products = $repom->pagination($products, null, 1, 16, null);
        $minPrice = $products->data->min('price');
        $maxPrice = $products->data->max('price');
        return view('admin.products.show', compact('category',  'products', 'minPrice', 'maxPrice'));
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

        // $url = url("https://haloshop.vn/index.php?route=product/search&search=" . $res['page_title']);
        // $crawler_2 = \Goutte::request('GET', $url);
        // $img_first =  $crawler_2->filter(".img-first")->each(function ($node) {
        //     $array_2 = [];
        //     array_push($array_2, $node->image()->getUri());
        //     return $array_2;
        // });
        // $img_second =  $crawler_2->filter(".img-second")->each(function ($node) {
        //     $array_2 = [];
        //     array_push($array_2, $node->image()->getUri());
        //     return $array_2;
        // });
        $res['name'] = $crawler->filter('.page-title')->text("");
        $res['producer'] = $crawler->filter('.product-manufacturer a')->text("");
        $res['price'] = preg_replace('/\D/', '', $crawler->filter('.product-price')->text(0));
        $res["price_new"] = preg_replace('/\D/', '', $crawler->filter('.product-price-new')->text(0));
        $res["price_old"] = preg_replace('/\D/', '', $crawler->filter('.product-price-old')->text(0));
        $res['meta'] = va_get_meta($request->url);
        $res['spec'] = $crawler->filter('#tab-specification')->html("");
        $res["content"] = $crawler->filter(".tab-content .block-content")->html("");
        $res["model"] = $crawler->filter(".product-model span")->text("");

        // get all file names

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
        // for ($k = 0; $k < count($main_images); $k++) {
        //     $url = $main_images[$k][0];
        //     $info = pathinfo($url);
        //     $forder = 'E:/01/datatest/2nite/main/' . $info["basename"];
        //     file_put_contents($forder . $info["basename"], file_get_contents($url));
        // }
        for ($i = 0; $i < count($images); $i++) {
            $url = $images[$i][0];
            $info = pathinfo($url);
            $name = $i . "-" . $info["basename"];
            $forder = $i < count($images) / 2 ? 'E:/01/datatest/2nite/700/' . $name : 'E:/01/datatest/2nite/80/' . $name;
            file_put_contents($forder . $name, file_get_contents($url));
        }

        return redirect()->back()->with("resCrawl", $res);
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
