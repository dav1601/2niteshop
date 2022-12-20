<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CatGame;
use App\Models\Producer;
use Illuminate\Http\Request;

/**
 * @group ProductsCategories
 *
 * APIs for managing Products
 */
class ProductCategoriesController extends Controller
{
    /**
     * Product category properties.
     * Các thuộc tính của danh mục sản phẩm.
     * @bodyParam name varchar(255) Tên danh mục
     * @bodyParam title mediumtext Tiêu đề danh mục
     * @bodyParam desc longtext Mô tả ngắn danh mục
     * @bodyParam keywords longtext Keywords SEO or Tag danh mục
     * @bodyParam parent_id int id danh mục cha (0: là danh mục gốc)
     * @bodyParam slug varchar Slug danh mục
     * @bodyParam img file Hình ảnh danh mục
     * @bodyParam icon varchar Icon danh mục
     * @bodyParam level int Level danh mục (danh mục gốc level = 0)
     * @bodyParam is_game int (2: không là danh mục game , 1: là danh mục game)
     * @response {"Đây là tất cả thuộc tính của bảng danh mục sản phẩm"}
     * */
    public function product_categories_properties()
    {
    }
    /**
     * List all product categories.
     * Cây Danh Mục sản phẩm.
     * @queryParam token_api string required Example: 19aIotXmkjH
     * @responseFile 200 responses/products/categories.json
     * */
    public function product_categories()
    {
        $reponses['categories'] = Category::tree();
        return response()->json($reponses, 200);
    }
    /**
     * List all Game Genre.
     * Lấy danh sách danh mục game của sản phẩm.
     * @queryParam token_api string required Example: 19aIotXOerK
     * @responseFile 200 responses/products/categories_game.json
     * */
    public function categories_game()
    {
        $reponses['categories_game'] = CatGame::all();
        return response()->json($reponses, 200);
    }
    /**
     * List all Producer.
     * Lấy danh sách nhà sản xuất.
     * @queryParam token_api string required Example: 19aIotXOerK
     * @responseFile 200 responses/products/producer.json
     * */
    public function categories_producer()
    {
        $reponses['categories_producer'] = Producer::all();
        return response()->json($reponses, 200);
    }
}
