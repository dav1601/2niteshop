<?php

namespace App\Http\Controllers\Api;

use App\Models\Blogs;
use App\Models\CatBlog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Blog properties.
     * Danh sách các thuộc tính của bài viết.
     * @group Blog Api
     * @bodyParam title varchar(255) Tiêu đề bài viết
     * @bodyParam slug longtext Slug bài viết
     * @bodyParam desc longtext Mô tả ngắn bài viết
     * @bodyParam img varchar Path hình ảnh bài viết
     * @bodyParam cat_id bigint Danh mục chính bài viết
     * @bodyParam cat_sub_id bigint Danh mục phụ bài viết
     * @bodyParam users_id bigint Id tác giả
     * @bodyParam views bigint Lượt xem bài viết
     * @bodyParam author varchar Tên tác giả
     * @bodyParam active int Trạng thái bài viết (1: được đăng , 2: đã gỡ)
     * @response {"Danh sách thuộc tính của bảng Blog"}
     * */
    public function blog_properties(){}
    /**
     * List all blog.
     * Lấy danh sách bài viết.
     * @group Blog Api
     * @queryParam token_api string required Example: 19aIotXmkjH
     * @queryParam category string Slug Danh Mục Example: tin-moi
     * @queryParam sort string ASC/DESC Default: DESC Example: DESC
     * @queryParam key_sort string Default: id Example: id
     * @queryParam per_page int  Default: 10 Example: 10
     * @queryParam page int Default: all Example: 1
     * @responseFile 200 responses/blogs/list.json
     * */
    public function index(Request $request)
    {
        $category = $request->has('category') && $request->category != null ? $request->category : 0;
        $sort =  $request->has('sort') && $request->sort != null ? $request->sort : "DESC";
        $key_sort =  $request->has('key_sort') && $request->key_sort != null ? $request->key_sort : "id";
        $per_page =  $request->has('per_page') && $request->per_page != null ? $request->per_page : 10;
        $page =  $request->has('page') && $request->page != null ? $request->page : 1;
        $blogs = new Blogs();
        if ($category != 0) {
            $cat_blog  = CatBlog::where('slug', 'LIKE', $category)->firstOrFail();
            $id = $cat_blog->id;
            $blogs = $blogs->where(function ($query) use ($id) {
                $query->where('cat_id', '=',  $id)
                    ->orWhere('cat_sub_id', '=',  $id);
            });
        }
        $count = $blogs->count();
        $start = ($page - 1) * $per_page;
        $number_page = ceil($count / $per_page);
        $blogs = $blogs->orderBy($key_sort, $sort)->offset($start)->limit($per_page)->get();
        $responses['category'] = $category;
        $responses['number_page'] = $number_page;
        $responses['count'] = $count;
        $responses['sort'] = $sort;
        $responses['key_sort'] = $key_sort;
        $responses['per_page'] = $per_page;
        $responses['page'] = $page;
        $responses['blogs'] = $blogs;
        return response()->json($responses);
    }
    /**
     * Retrieve a blog.
     * API này cho phép bạn truy xuất và xem một bài viết cụ thể bằng ID
     * @group Blog Api
     * @queryParam token_api string required Example: 19aIotXmkjH
     * @responseFile 200 responses/blogs/blog.json
     */
    public function retrieve_blog($id, Request $request)
    {
        $blogs = Blogs::where('active', '=', 1);
        $blog = $blogs->where('id',  $id)->firstOrFail();
        $involve = Blogs::where('active', '=', 1)->where('id', '!=', $blog->id);
        $cat_id = $blog->cat_id;
        $cat_sub_id = $blog->cat_sub_id;
        $involve = $involve->where(function ($query) use ($cat_id, $cat_sub_id) {
            $query->where('cat_id', '=', $cat_id)
                ->orWhere('cat_sub_id', '=', $cat_sub_id);
        });
        $involve = $involve->orderBy('id', 'ASC')->limit(6)->get();
        $responses['blog'] = $blog;
        $responses['involve'] = $involve;
        return response()->json($responses);
    }
    /**
     * Search Blogs.
     * API này cho phép bạn tìm kiếm bài viết theo từ khoá.
     * @group Blog Api
     * @queryParam token_api string required Example: 19aIotXmkjH
     * @queryParam kw string required Example: Sony công bố PlayStation VR 2 4K HDR và game Horizon Call of the Mountain mới
     * @queryParam per_page int  Default: 10 Example: 10
     * @queryParam page int Default: all Example: 1
     * @responseFile 200 responses/blogs/search.json
     */
    public function search_blog(Request $request)
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
        $blogs = new Blogs();
        $blogs =  $blogs->where('title', 'LIKE', '%' . $kw . '%');
        $count = $blogs->count();
        $start = ($page - 1) * $per_page;
        $number_page = ceil($count / $per_page);
        $blogs = $blogs->where('active', 1)->offset($start)->limit($per_page)->get();
        if (count($blogs) > 0) {
            $responses['blogs'] = $blogs;
        } else {
            $responses['blogs'] = 0;
        }
        $responses['number_page'] = $number_page;
        $responses['count'] = $count;
        $responses['per_page'] = $per_page;
        $responses['page'] = $page;
        $responses['keyword'] = $kw;
        return response()->json($responses);
    }
}
