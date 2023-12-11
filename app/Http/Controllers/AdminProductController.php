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
use App\Http\Traits\AvFileManager;
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
    use Responser, Relationship, Product, AvFileManager;
    public $handle_file;
    public $data;
    public $res;
    public $repoPrd;
    public $diskMedia;
    public $folderMedia;
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
        $this->diskMedia = "media";
        $this->folderMedia = "products";
    }
    public function index()
    {
    }
    ////////////////////////////////////////
    public function delete_product(Request $request)
    {
        $id = (int) $request->prdId;
        $foc = (bool) $request->foc;
        $error = null;

        if ($foc) {
            if (Auth::user()->hasRole("super-admin")) {
                $error = Products::where("id", $id)->forceDelete() ? null : "focus delete failed";
            }
        } else {
            $error = Products::where("id", $id)->delete() ? null : "delete failed";
        }

        if ($error) {
            return $this->errorResponse($error);
        }
        return $this->successResponse(["deleted" => true, "rd" => route("show_product")]);
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
    // ANCHOR  product edit action //////////////////////////////////////////////////////
    public function product_view_edit($id, Request $request)
    {
        $product = $this->repoPrd->getProduct($id)['data'];
        if (!$product) {
            return abort(503);
        }
        $producer = Producer::all()->pluck("name")->toArray();
        $cat_game = CatGame::all();
        $type = typeProduct::where('parent', '=', 0)->get();
        $product_categories = ProductCategories::where('products_id', $id)->get()->pluck('category_id')->toArray();
        $rela_blogs = implode(",", $product->related_blogs->pluck("id")->toArray());
        $rela_products =  implode(",", $product->bundled_products->pluck("id")->toArray());
        $policies = implode(",", $product->policies->pluck("id")->toArray());
        $options =  implode(",", $product->options->pluck("id")->toArray());
        $blocks =  implode(",", $product->blocks->pluck("id")->toArray());
        $gallery = $product->gallery;
        $url = route('product_view_edit', ['id' => $id]);
        return view('admin.products.edit', compact('id',   'producer', 'cat_game', 'type',  'product',   'url', 'product_categories', 'rela_blogs', 'rela_products', 'policies', 'options', 'blocks', 'gallery'));
    }
    public function validateProduct($request, $id = null)
    {
        // $ruleName = !$id  ? 'required|unique:products,name' : 'required|unique:products,name,' . $id;
        $image_first = !$id ? "required" : "";
        $validator = Validator::make(
            $request->all(),
            [
                'name' => "required",
                'slug' => 'unique:products,slug,' . $id,
                'model' => 'required',
                'des' => 'required',
                'keywords' => 'required',
                'type' => 'required',
                'price' => 'required|required_with:historical_cost|numeric',
                'historical_cost' => 'required|required_with:price|numeric|lte:price',
                'discount' => 'numeric|lte:price',
                'image_first' => $image_first,
                'producer' => 'required',
                'category' => 'required',
                'date_sold' => "required",
                'qty' => "numeric"
            ],
            [
                'name.required' => "Bạn chưa nhập tên sản phẩm",
                'slug.unique' => "Slug này đã tồn tại , hãy đỔi slug khác cho sản phẩm",
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
    public function handleRelatioships($product, $request, $action = "attach")
    {
        $product->categories()->{$action}($request->category);
        $product->options()->{$action}(a_explode(",", $request->rela__options));
        $product->policies()->{$action}(a_explode(",", $request->rela__plc));
        $product->bundled_products()->{$action}(a_explode(",", $request->rela__products));
        $product->blocks()->{$action}(a_explode(",", $request->rela__block));
        $product->related_blogs()->{$action}(a_explode(",", $request->rela__blogs));
    }
    // ANCHOR REPLICATE //////////////////////////////////////////////////////

    public function replicate_product(Request $request)
    {
        $id = (int) $request->id;
        $product = $this->repoPrd->getProduct($id)['data'];
        if ($product['status'] != 1) {
            return $this->errorResponse("not found product", 404);
        }
        $newProduct = $product->replicate();
        $name = $newProduct->name;
        $k = 1;
        $newName = $name . " (copy-" . $k . ")";
        while (Products::where("name", "LIKE", $newName)->first()) {
            $newName = $name . " (copy-" . $k . ")";
            $k++;
        }
        $name = $newName;
        $newProduct->name = $name;
        $newProduct->slug = Str::slug($name);
        $newProduct->user_id = Auth::id();
        $newProduct->save();
        $newProduct->policies()->attach($newProduct->policies->pluck('id')->toArray());
        $newProduct->categories()->attach($newProduct->categories->pluck('id')->toArray());
        $newProduct->ins()->attach($newProduct->ins->pluck('id')->toArray());
        $newProduct->bundled_products()->attach($newProduct->bundled_products->pluck('id')->toArray());
        $newProduct->blocks()->attach($newProduct->blocks->pluck('id')->toArray());
        $newProduct->related_blogs()->attach($newProduct->related_blogs->pluck('id')->toArray());
        foreach ($newProduct->gallery as  $gll) {
            $dupg = $gll->replicate();
            $dupg->products_id = $newProduct->id;
            $dupg->save();
            unset($dupg);
        }
        return $this->successResponse(['redirect' => route("product_view_edit", ['id' => $newProduct->id])]);
    }

    // ANCHOR PRODUCT ADD LOGIC ////////////////////////////////////////
    public function product_handle_add(Request $request)
    {

        $path = config('app.image_products');
        $validator = $this->validateProduct($request);


        if ($validator->fails()) {
            return $this->errorResponse("validator fail", 403, $validator->errors()->toArray());
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
        $data_create['slug'] = $request->slug;
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

        // end bannerrrrrrrrrrrrrrrrrrrrrrrrrr
        $data_create['image_first'] = $request->image_first;
        // //////////////// end main
        if ($request->image_second) {
            $data_create['image_second'] = $request->image_second;
        }

        if ($request->image_background) {
            $data_create['image_background'] = $request->image_background;
        }
        // end backgroud
        try {
            $created = Products::create($data_create);
            // createdd end
            if ($created) {
                $this->handleRelatioships($created, $request);
                $gallery = $request->gallery;
                foreach ($gallery as $key => $item) {
                    $item = collect($item)->toArray();
                    gllProducts::create(['products_id' => $created->id, 'media_700' => $item[700], 'media_80' => $item[80], 'index' => $key]);
                }
                return $this->successResponse(['redirect_edit' => route('product_view_edit', ['id' => $created->id])]);
            }
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }

        // end else

    }

    //////////////////////////////////////// end add product
    // ANCHOR PRODUCT EIDT LOGIC //////////////////////////////////////////////////////
    public function product_handle_edit($id,  Request $request)
    {
        $validator = $this->validateProduct($request, $id);
        if ($validator->fails()) {
            return $this->errorResponse("validator fail", 403, $validator->errors()->toArray());
        }
        $data_update['name'] = $request->name;
        $data_update['des'] = $request->des;
        $data_update['keywords'] = $request->keywords;
        $data_update['price'] = $request->price;
        $data_update['historical_cost'] = $request->historical_cost;
        $data_update['content'] = $request->content;
        $data_update['slug'] = $request->slug;
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
            return $this->errorResponse("update product failed", 500);
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
        $this->handleRelatioships($product, $request, "sync");
        return $this->successResponse("update product success");
    }

    //////////////////////////////////////// end edit product

    public function show_product(Request $request, ModelInterface $repom)
    {
        $category = Category::where('parent_id', '=', 0)->get();
        $products = new Products();
        // $products = $products->with(['producer']);
        // $products = $repom->pagination($products, null, 1, 16, null);
        $minPrice = Products::min('price');
        $maxPrice = Products::max('price');
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
            $blocks = $repom->pagination(new BlockProduct());
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
        $url = $request->url;
        $crawler = \Goutte::request('GET', $url);
        $images =  $crawler->filter('.product-image .swiper-slide img')->each(function ($node) {
            $array = [];
            array_push($array, $node->image()->getUri());
            return $array;
        });
        $res['name'] = $crawler->filter('.page-title')->text("");
        $res['producer'] = $crawler->filter('.product-manufacturer a')->text("");
        $res['price'] = preg_replace('/\D/', '', $crawler->filter('.product-price')->text(0));
        $res["price_new"] = preg_replace('/\D/', '', $crawler->filter('.product-price-new')->text(0));
        $res["price_old"] = preg_replace('/\D/', '', $crawler->filter('.product-price-old')->text(0));
        $res['meta'] = va_get_meta($url);
        $res['spec'] = $crawler->filter('#tab-specification')->html("");
        $res["content"] = $crawler->filter(".block-content.expand-content.block-expanded")->html("");
        $res["model"] = $crawler->filter(".product-model span")->text("");
        $searchUrl = "https://haloshop.vn/index.php?route=product/search&search=" . $res['name'];
        $searchData = \Goutte::request("GET", $searchUrl);
        $images_search = $searchData->filter('.product-img img')->each(function ($node) {
            $array = [];
            array_push($array, $node->attr("data-src"));
            return $array;
        });

        // get all file names

        $files = glob('E:/01/datatest/2nite/700/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file)) {
                unlink($file); // delete file
            }
        }
        $files = glob('E:/01/datatest/2nite/main/*'); // get all file names
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
        for ($k = 0; $k < count($images_search); $k++) {
            $url = $images_search[$k][0];
            $info = pathinfo($url);
            $forder = 'E:/01/datatest/2nite/main/' . $info["basename"];
            file_put_contents($forder, file_get_contents($url));
        }
        for ($i = 0; $i < count($images); $i++) {
            $url = $images[$i][0];
            $info = pathinfo($url);
            $name = $i . "-" . $info["basename"];
            $forder = $i < count($images) / 2 ? 'E:/01/datatest/2nite/700/' . $name : 'E:/01/datatest/2nite/80/' . $name;
            file_put_contents($forder, file_get_contents($url));
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
    // ANCHOR name to slug  //////////////////////////////////////////////////////
    public function name_to_slug(Request $request)
    {
        return $this->successResponse(['slug' => Str::slug($request->name)]);
    }
}
