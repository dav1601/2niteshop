<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CatBlog;
use Illuminate\Http\Request;

class BlogCategoriesController extends Controller
{
     /**
     * Blog category properties.
     * Các thuộc tính của danh mục bài viết.
     * @group Blog Categories
     * @bodyParam name varchar Tiêu đề danh mục
     * @bodyParam slug varchar Slug danh mục
     * @response {"Danh sách thuộc tính của bảng danh mục bài viết"}
     * */
    public function blog_categories_properties() {}
    /**
     * List all blog categories.
     * Danh mục bài viết.
     * @group Blog Categories
     * @queryParam token_api string required Example: 19aIotXmkjH
     * @responseFile 200 responses/blogs/categories.json
     * */
    public function blog_categories()
    {
        $reponses['categories'] = CatBlog::all();
        return response()->json($reponses, 200);
    }

}
