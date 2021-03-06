<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\CatBlog;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\RelatedPosts;
use App\Repositories\CustomerInterface;
use App\Repositories\FileInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class AdminBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['active' => 'blog']);
            return $next($request);
        });
    }
    ////////////////////////////////////////
    //////////////////////////////////////

    public function ajaxData(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $blogs = new Blogs();
        if ($request->act == "update") {
            $id = $request->id;
            $val = $request->val;
            Blogs::where('id', '=', $id)->update(['active' => $val]);
        }
        if ($request->active != 0) {
            $blogs = $blogs->where('active', '=', $request->active);
        }
        if ($request->titleOrId != NULL) {
            $title = $request->titleOrId;
            $blogs = $blogs->where(function ($query) use ($title) {
                $query->where('title', 'LIKE', '%' . $title . '%')
                    ->orWhere('id', '=', $title);
            });
        }
        if ($request->cat != 0 && $request->cat_2 == 0) {
            $blogs = $blogs->where('cat_id', '=', $request->cat);
        } elseif ($request->cat == 0 && $request->cat_2 != 0) {
            $blogs = $blogs->where('cat_sub_id', '=', $request->cat_2);
        } elseif ($request->cat != 0 && $request->cat_2 != 0) {
            $cat = $request->cat;
            $cat_2 = $request->cat_2;
            $blogs = $blogs->where(function ($query) use ($cat, $cat_2) {
                $query->where('cat_id', '=', $cat)->where('cat_sub_id', '=', $cat_2);
            });
        }
        if ($request->auth != NULL) {
            $blogs =  $blogs->join('users', 'users.id', '=', 'blogs.users_id')->where('users.name', 'LIKE', '%' . $request->auth . '%');
        }
        if ($request->dP != null) {
            $blogs =  $blogs->where('created_at', '<=', $request->dP);
        }
        if ($request->dN != null) {
            $blogs =  $blogs->where('created_at', '>=', $request->dN);
        }
        $page = $request->page;
        $item_page = 10;
        $start = ($page - 1) * $item_page;
        $count = $blogs->count();
        $number = ceil($count / $item_page);
        $blogs = $blogs->orderBy('blogs.id', $request->sort)->offset($start)->limit($item_page)->get();
        if (count($blogs) > 0) {
            $output .= view('components.admin.table.blog', compact('blogs', 'number', 'page'));
        } else {
            $output .= view('components.empty.nodata');
        }


        $data['html'] = $output;
        return response()->json($data);
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function show(Request $request)
    {
        $page = 1;
        $item_page = 10;
        $start = ($page - 1) * $item_page;
        $count = Blogs::count();
        $number_page = ceil($count / $item_page);
        $blogs = Blogs::orderBy('id', 'ASC')->offset($start)->limit($item_page)->get();
        return view('admin.blogs.show', compact('blogs', 'number_page', 'page'));
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function add_related(Request $request)
    {
        if ($request->has('selected')) {
            $selected = $request->selected;
        } else {
            $selected = "";
        }
        $url = route('add_related_view');
        return view('admin.blogs.related.add', compact('selected', 'url'));
    }

    ////////////////////////////////////////
    public function edit_related($id, Request $request)
    {
        $related = RelatedPosts::where('id', '=', $id)->firstOrFail();
        $selected = $related->posts;
        $category = category_child(Category::all(), 0);
        $url = route('edit_related_view', ['id' => $id]);
        return view('admin.blogs.related.edit', compact('selected', 'related', 'category', 'url'));
    }
    ////////////////////////////////////////

    public function add_handle_realted(Request $request)
    {
        if ($request->has('blogs')) {
            if ($request->has('rFPrd') || $request->has('rFCat')) {
                $data['posts'] = implode(",", $request->blogs);
                if ($request->has('rFPrd')) {
                    $data['product_id'] = $request->rFPrd;
                } else {
                    $data['cat_id'] = $request->rFCat;
                }
                $data['for'] = $request->realatedFor;
                RelatedPosts::create($data);
                return redirect()->route('add_related_view')->with('ok', 1);
            } else {
                return redirect()->back()->with('er', 2);
            }
        } else {
            return redirect()->back()->with('er', 1);
        }
    }

    ////////////////////////////////////////
    public function edit_handle_realted($id, Request $request)
    {
        if ($request->has('blogs')) {
            if ($request->has('rFPrd') || $request->has('rFCat')) {
                $data['posts'] = implode(",", $request->blogs);
                if ($request->has('rFPrd')) {
                    $data['product_id'] = $request->rFPrd;
                } else {
                    $data['cat_id'] = $request->rFCat;
                }
                $data['for'] = $request->realatedFor;
                RelatedPosts::where('id', '=', $id)->update($data);;
                return redirect()->back()->with('ok', 1);
            } else {
                return redirect()->back()->with('er', 2);
            }
        } else {
            return redirect()->back()->with('er', 1);
        }
    }

    ////////////////////////////////////////
    public function edit($id, Request $request)
    {
        $blog = Blogs::where('id', '=', $id)->firstOrFail();
        if (Gate::allows('group-4')) {
        } else {
            $this->authorize('edit-blog', $blog);
        }
        $category_blog = CatBlog::all();
        return view('admin.blogs.edit', compact('blog', 'category_blog'));
    }
    ////////////////////////////////////////

    public function category(Request $request)
    {
        $category = CatBlog::all();
        return view('admin.blogs.category.index', compact('category'));
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function handle_add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:cat_blog',
            ],
            [
                'name.required' => "Kh??ng ???????c ????? tr???ng t??n danh m???c",
                'unique.required' => "Danh m???c n??y ???? t???n t???i",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            CatBlog::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);
            return redirect()->back()->with('ok', 1);
        }
    }
    // ////////////////////////////////////
    ////////////////////////////////////////

    public function add(Request $request)
    {

        $category_product = category_child(Category::all(), 0);
        $category_blog = CatBlog::all();
        return view('admin.blogs.add', compact('category_product',  'category_blog'));
    }

    ////////////////////////////////////////

    ////////////////////////////////////////
    public function handle_add_blog(Request $request, FileInterface $file)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|unique:blogs',
                'content' => 'required',
                'img' => 'required|image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'cat' => 'required'
            ],
            [
                'title.required' => "Kh??ng ???????c ????? tr???ng t??n blog",
                'cat.required' => "Kh??ng ???????c ????? tr???ng danh muc blog",
                'content.required' => "Kh??ng ???????c ????? tr???ng content blog",
                'desc.required' => "Kh??ng ???????c ????? tr???ng m?? t??? ng???n blog",
                'title.required' => "Blog n??y ???? t???n t???i",
                'img.required' => "Kh??ng ???????c ????? tr???ng h??nh ???nh ch??nh",
                'img.image' => "File kh??ng ph???i l?? file ???nh",
                'img.mimes' => "???nh sai ?????nh d???ng c??c ??u??i ???nh cho ph??p : jpeg,png,jpg,tiff,svg",
                'img.max' => "File ???nh kh??ng v?????t qu?? 500kb",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $path = "admin/images/blogs/";
            $cat_name = CatBlog::where('id', '=', $request->cat)->first()->name;
            $data['title'] = $request->title;
            $data['slug'] = Str::slug($request->title);
            $data['content'] = $request->content;
            $data['desc'] = $request->desc;
            $path_img = $path . Str::slug($cat_name) . "/"  . "main/";
            $data['img'] = $file->storeFileImg($request->img, $path_img);
            $data['category_id'] = $request->cat_product;
            $data['cat_id'] = $request->cat;
            $data['cat_sub_id'] = $request->cat_2;
            $data['users_id'] = Auth::id();
            $data['views'] = 0;
            $data['author'] = Auth::user()->name;
            $data['active'] = 1;
            Blogs::create($data);
            return redirect()->back()->with('ok', 1);
        }
    }
    // ///////////////////////////
    public function handle_edit_blog($id, Request $request , FileInterface $file)
    {
        $blog = Blogs::where('id', '=', $id)->firstOrFail();
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'content' => 'required',
                'img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'cat' => 'required'
            ],
            [
                'title.required' => "Kh??ng ???????c ????? tr???ng t??n blog",
                'cat.required' => "Kh??ng ???????c ????? tr???ng danh muc blog",
                'content.required' => "Kh??ng ???????c ????? tr???ng content blog",
                'desc.required' => "Kh??ng ???????c ????? tr???ng m?? t??? ng???n blog",
                'img.image' => "File kh??ng ph???i l?? file ???nh",
                'img.mimes' => "???nh sai ?????nh d???ng c??c ??u??i ???nh cho ph??p : jpeg,png,jpg,tiff,svg",
                'img.max' => "File ???nh kh??ng v?????t qu?? 500kb",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $path = "admin/images/blogs/";
            $cat_name = CatBlog::where('id', '=', $request->cat)->first()->name;
            $data['title'] = $request->title;
            $data['slug'] = Str::slug($request->title);
            $data['content'] = $request->content;
            $data['desc'] = $request->desc;
            if ($request->has('img')) {
                if ($blog->img != NULL)
                    unlink('public/' . $blog->img);
                $path_img = $path . Str::slug($cat_name) . "/"  . "main/";
                $data['img'] = $file->storeFileImg($request->img, $path_img);
            }
            $data['cat_id'] = $request->cat;
            $data['cat_sub_id'] = $request->cat_2;
            $data['users_id'] = Auth::id();
            $data['views'] = 0;
            $data['author'] = Auth::user()->name;
            $data['active'] = 1;
            Blogs::where('id', '=', $id)->update($data);
            return redirect()->back()->with('ok', 1);
        }
    }
    // //////////////////////////
}
