<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class AdminAjaxBlogController extends Controller
{
    //////////////////////////////////////

    public function handle_related(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        if ($request->has('selected')) {
            $selected = $request->selected;
        } else {
            $selected = [];
        }
        if ($request->act == "click") {
            if (count($selected) > 0) {
                foreach ($selected as $select) {
                    $blog = Blogs::where('id', '=', $select)->first();
                    $array = $selected;
                    $class = "select__blog";
                    $name = "blogs";
                    $prefix = "blog";
                    $output .= view('components.admin.blogs.checkbox', compact('blog', 'class', 'name', 'prefix', 'array'));
                }
            }
        }
        if ($request->act == "keyup") {
            if ($request->kw != NULL) {
                $blogs = Blogs::where('title', 'LIKE', '%' . $request->kw . '%')->get();
                if (count($blogs) > 0) {
                    $array = $selected;
                    $class = "select__blog";
                    $name = "blogs_2";
                    $prefix = "blog_2";
                    foreach ($blogs as $blog) {
                        if (!in_array($blog->id, $selected)) {
                            $output .= view('components.admin.blogs.checkbox', compact('blog', 'class', 'name', 'prefix', 'array'));
                        }
                    }
                } else {
                    $output .= "Không có sản phẩm nào phù hợp từ khoá";
                }
            } else {
                $output .= "Nhập tên bài viết cần tìm";
            }
        }
        $data['html'] = $output;
        return response()->json($data);
    }


    public function handle_related_for(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $category = category_child(Category::all(), 0);
        $output_2 = '';
        if ($request->forR != NULL) {
            if ($request->forR == "category") {
                $output .= '
                <label for="realatedForCat">Chọn Danh Mục</label>
                        <select class="custom-select mb-3" name="rFCat" id="realatedForCat">';
                foreach ($category as $cat) {
                    $output .= '<option value="' . $cat->id . '">' . str_repeat('--', $cat->level) . '' . $cat->name . '</option>';
                }
                $output .= '</select>';
            } else {
                $output .= '
                <label for="">Chọn Sản Phẩm</label>
                <select class="custom-select mb-3" name="rFPrd" id="realatedForPrd">';
                $output .= '<option value="">Nhập Sản Phẩm Muốn Tìm Vào Ô bên dưới</option>';
                $output .= '</select>';
                $output .= '<input type="text" name="" class="form-control" id="search__product" placeholder="Nhập tên sản phẩm muốn tìm vào đây">
                ';
            }
        }
        if ($request->act == "search") {
            if ($request->kw != NULL) {
                $products = Products::where('name', 'LIKE', '%' . $request->kw . '%')->get();
                if (count($products) > 0) {
                    foreach ($products as $prd) {
                        $output_2 .= '<option value="' . $prd->id . '">' . $prd->name . '</option>';
                    }
                } else {
                    $output_2 .= '<option value="">Không có sản phẩm nào thuộc từ khoá (' . $request->kw . ')</option>';
                }
            } else {
                $output_2 .= '<option value="">Nhập Sản Phẩm Muốn Tìm Vào Ô bên dưới</option>';
            }
        }

        $data['html'] = $output;
        $data['html_2'] = $output_2;
        return response()->json($data);
    }


}
