<?php

namespace App\Http\Controllers\Api;

use App\Models\Policy;
use App\Models\Category;
use App\Models\Products;
use App\Models\Insurance;
use App\Models\gllProducts;
use Illuminate\Http\Request;
use App\Models\bundled_skin_cat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{

    /**
     * Product properties.
     * Các thuộc tính của sản phẩm.
     * @group Product Properties
     * @bodyParam name varchar(255) Tên sản phẩm
     * @bodyParam slug longtext Slug sản phẩm
     * @bodyParam des longtext Mô tả ngắn sản phẩm
     * @bodyParam keywords longtext Keywords SEO or Tag sản phẩm
     * @bodyParam price bigint Giá bán của sản phẩm
     * @bodyParam historical_cost bigint Giá gốc của sản phẩm
     * @bodyParam content longtext Nội dung của sản phẩm
     * @bodyParam info longtext Thông tin của sản phẩm
     * @bodyParam insurance longtext Chính sách bảo hành,options đi kèm với của sản phẩm
     * @bodyParam policy longtext Chính sách của cửa hàng
     * @bodyParam model varchar Model của sản phẩm
     * @bodyParam video longtext Mã nhúng utube của sản phẩm
     * @bodyParam banner varchar Banner đi kèm với sản phẩm
     * @bodyParam banner_link varchar Link banner của sản phẩm
     * @bodyParam main_img varchar Hình ảnh chính của sản phẩm
     * @bodyParam sub_img varchar Hình ảnh phụ của sản phẩm
     * @bodyParam bg longtext Hình ảnh background của sản phẩm
     * @bodyParam type varchar Kiểu sản phẩm
     * @bodyParam sub_type varchar Kiểu phụ sản phẩm
     * @bodyParam cat_id bigint ID Danh mục chính sản phẩm
     * @bodyParam cat_name varchar Tên danh mục chính
     * @bodyParam sub_1_cat_id bigint ID danh mục phụ 1 của danh mục chính
     * @bodyParam sub_1_cat_name varchar Tên danh mục phụ 1 của danh mục chính
     * @bodyParam sub_2_cat_id bigint ID danh mục phụ 2 của danh mục chính
     * @bodyParam sub_2_cat_name varchar Tên danh mục phụ 2 của danh mục chính
     * @bodyParam cat_id_2 bigint  ID Danh mục chính 2 của sản phẩm
     * @bodyParam op_sub_1_id bigint ID option 1 của dạnh mục phụ 1 của danh mục chính
     * @bodyParam op_sub_1_name varchar Tên option 1 của dạnh mục phụ 1 của danh mục chính
     * @bodyParam op_sub_2_id bigint ID option 2 của dạnh mục phụ 1 của danh mục chính
     * @bodyParam op_sub_2_name varchar Tên option 2 của dạnh mục phụ 1 của danh mục chính
     * @bodyParam cat_2_sub bigint ID Danh mục phụ 1 của danh mục chính 2 sản phẩm
     * @bodyParam producer_id bigint ID nhà sản xuất sản phẩm
     * @bodyParam producer_slug varchar Slug nhà sản xuất sản phẩm
     * @bodyParam cat_game_id ID thể loại game của sản phẩm
     * @bodyParam stock int Tình trạng kho của sản phẩm (1: còn hàng , 2: hàng sắp về , 3:hết hàng)
     * @bodyParam new int Trạng thái mới của sản phẩm (1: mới đăng , 2: bình thường)
     * @bodyParam usage_stt int Trạng thái sử dụng sản phẩm (1: sản phẩm chưa qua sử dụng , 2: sản phẩm đã qua sử dụng)
     * @bodyParam num_orders bigint Số lượt mua sản phẩm
     * @bodyParam highlight int Sản Phẩm nổi bật (1: sp bình thương , 2: sp hot)
     * @bodyParam author_id bigint Id người đăng sản phẩm
     * @bodyParam author_name varchar Tên người đăng sản phẩm
     * @response {"Đây là tất cả thuộc tính của bảng sản phẩm"}
     * */
      public function product_properties(){}
    /**
     * List all products.
     * Lấy danh sách sản phẩm theo danh mục hoặc tất cả.
     * @group PRODUCTS API
     * @header access-control-allow-origin *
     * @header access-control-allow-methods *
     * @header access-control-allow-headers Content-Type, X-Auth-Token, Origin, Authorization, X-CSRF-Token
     * @queryParam token_api string required Example: 19aIotXOerK
     * @queryParam category string Default: null For All Cate Example: ps5
     * @queryParam genre string Default: null For All Genre Game Example: Action,Adventure
     * @queryParam sort string ASC/DESC Default: DESC Example: DESC
     * @queryParam key_sort string Default: id Example: id
     * @queryParam per_page int  Default: 10 Example: 10
     * @queryParam page int Default: all Example: 1
     * @responseFile 200 responses/products/list.json
     * */
    public function index(Request $request)
    {
        $category = $request->has('category') && $request->category != null ? $request->category : 0;
        $genre = $request->has('genre') && $request->genre != null ? $request->genre : 0;
        $sort =  $request->has('sort') && $request->sort != null ? $request->sort : "DESC";
        $key_sort =  $request->has('key_sort') && $request->key_sort != null ? $request->key_sort : "id";
        $per_page =  $request->has('per_page') && $request->per_page != null ? $request->per_page : 10;
        $page =  $request->has('page') && $request->page != null ? $request->page : 1;
        $products = new Products();
        if ($category != 0) {
            $category = Category::where('slug', $category)->firstOrFail()->id;
            if ($category != 129) {
                $list_products = array();
        foreach (Category::find(78)->products()->select('products_id')->get()->toArray() as $item) {
            $list_products[] = $item['products_id'];
        }
                $products = $products->where(function ($query) use ($category , $list_products) {
                    $query->where('cat_id',  $category)
                        ->orWhere('sub_1_cat_id', $category)
                        ->orWhere('sub_2_cat_id',  $category)
                        ->orWhereIn('id', $list_products);
                });
            } else {
                $products = Products::where('usage_stt', '=', 2);
            }
        }
        if ($genre != 0) {
            $genres = explode(",", $genre);
            $products = $products->whereIn('cat_game_id', explode(",", $genre));
        } else {
            $genres = array();
        }
        $count = $products->count();
        $start = ($page - 1) * $per_page;
        $number_page = ceil($count / $per_page);
        $products = $products->orderBy($key_sort, $sort)->offset($start)->limit($per_page)->get();
        $responses['category'] = $category;
        $responses['genres'] = $genres;
        $responses['number_page'] = $number_page;
        $responses['count'] = $count;
        $responses['genre'] = $genre;
        $responses['sort'] = $sort;
        $responses['key_sort'] = $key_sort;
        $responses['per_page'] = $per_page;
        $responses['page'] = $page;
        $responses['products'] = $products;
        return response()->json($responses);
    }
    /**
     * Retrieve a product.
     * API này cho phép bạn truy xuất và xem một sản phẩm cụ thể bằng SLUG
     * @group PRODUCTS API
     * @urlParam slug string required Example: nintendo-switch-oled-model-with-neon-red-blue-joycon
     * @queryParam token_api string required Example: 19aIotXOerK
     * @responseFile 200 responses/products/product.json
     */
    public function retrieve_product($slug, Request $request)
    {
        $product = Products::where('slug',  $slug)->firstOrFail();
        $id = $product->id;
        $policies = array();
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
        $related_blog = Products::find($product->id)->related_blogs()->get();
        $related_cat = Category::find($product->sub_1_cat_id)->related_blogs()->get();
        $related_cat_blog  = $related_blog->merge($related_cat);
        $related_product = Products::find($product->id)->related_products()->get();
        $bundled_skin = bundled_skin_cat::where('cat_id', '=', $product->sub_1_cat_id)->first();
        $bundled_accessory = Category::find($product->sub_1_cat_id)->bundled_accessory()->get();
        if ($product->insurance != NULL) {
            $group = Insurance::whereIn('id', explode(",", $product->insurance))->select('group')->distinct()->first()->group;
        } else {
            $group = 0;
        }
        $responses['gll80'] = Products::find($id)->gll()->where('size', 80)->get();
        $responses['gll700'] = Products::find($id)->gll()->where('size', 700)->get();
        $responses['gll'] = Products::find($id)->gll()->get();
        $responses['product'] = $product;
        $responses['policies'] = $policies;
        $responses['fullset'] = $fullset;
        $responses['related_blog'] = $related_blog;
        $responses['banner'] = $banner;
        $responses['group'] = $group;
        $responses['related_product'] = $related_product;
        $responses['related_cat_blog'] = $related_cat_blog;
        $responses['bundled_skin'] = $bundled_skin;
        $responses['bundled_accessory'] = $bundled_accessory;
        return response()->json($responses);
    }
    /**
     * Search Products.
     * API này cho phép bạn tìm kiếm sản phẩm theo từ khoá.
     * @group PRODUCTS API
     * @queryParam token_api string required Example: 19aIotXOerK
     * @queryParam kw string required Example: DualSense - PS5 Wireless Game Controller Chính Hãng
     * @queryParam per_page int  Default: 10 Example: 10
     * @queryParam page int Default: all Example: 1
     * @responseFile 200 responses/products/search.json
     */
    public function search_product(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'kw' => 'required',
            ],
            [
                'kw.required' => "Không Được Để Trống Keyword",
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'kw_empty' => true,
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ]);
        }
        $kw = $request->kw;
        $per_page =  $request->has('per_page') && $request->per_page != null ? $request->per_page : 10;
        $page =  $request->has('page') && $request->page != null ? $request->page : 1;
        $products = new Products();
        $products =  $products->where('name', 'LIKE', '%' . $kw . '%');
        $count = $products->count();
        $start = ($page - 1) * $per_page;
        $number_page = ceil($count / $per_page);
        $products = $products->offset($start)->limit($per_page)->get();
        if (count($products) > 0) {
            $responses['products'] = $products;
        } else {
            $responses['products'] = 0;
        }
        $responses['number_page'] = $number_page;
        $responses['count'] = $count;
        $responses['per_page'] = $per_page;
        $responses['page'] = $page;
        return response()->json($responses);
    }
}
