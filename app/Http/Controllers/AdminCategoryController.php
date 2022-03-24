<?php

namespace App\Http\Controllers;

use App\Models\gllCat;
use App\Models\Policy;
use App\Models\CatGame;
use App\Models\Category;
use App\Models\Producer;
use App\Models\Insurance;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\RelatedPosts;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\bundled_skin_cat;
use Illuminate\Support\Facades\DB;
use App\Repositories\FileInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\bundled_accessory_cat;
use Illuminate\Support\Facades\Validator;

class AdminCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['active' => 'category']);
            return $next($request);
        });
    }
    public function index()
    {
    }
    public function cat(Request $request)
    {
        $categories = category_child(Category::all(), 0);
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

        $url = route('cat');
        return view('admin.products.category.prd.index', compact('categories', 'url', 'selected_blog', 'selected'));
    }
    ////////////////////////////////////////
    public function edit($id)
    {
        $array_blogs = array();
        $array_products =  array();
        $categories = category_child(Category::all(), 0);
        $cat = Category::where('id', '=', $id)->first();
        $bundled_skin = bundled_skin_cat::where('cat_id', '=', $id)->first();;
        $related = Category::find($id)->bundled_accessory()->get()->toArray();
        $related_blog = Category::find($id)->related_blogs()->get()->toArray();
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
        $url = route('edit_cat', ['id' => $id]);
        return view('admin.products.category.prd.edit', compact('categories', 'cat', 'id', 'url', 'selected_blog', 'selected_js_blog', 'array_blogs', 'selected_js_product', 'array_products', 'selected', 'bundled_skin'));
    }
    ////////////////////////////////////////
    public function handle_add(Request $request, FileInterface $file)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:category',
                'title' => 'required|unique:category',
                'slug' => 'unique:category',
                'desc' => 'required',
                'keywords' => 'required',
                'img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'icon' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'gll.*' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500'
            ],
            [
                'name.required' => "Không Được Để Trống Tên",
                'name.unique' => "Danh Mục Đã Tồn Tại",
                'title.required' => "Không Được Để Trống Title",
                'title.unique' => "Title Danh Mục Đã Tồn Tại",
                'desc.required' => "Bạn chưa nhập description",
                'keywords.required' => "Bạn chưa nhập keywords",
                'slug.required' => "Không Được Để Trống Slug",
                'slug.unique' => "Slug Đã Tồn Tại",
                'img.image' => "File không phải là file ảnh",
                'img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'img.max' => "File ảnh không vượt quá 500kb",
                'icon.image' => "File không phải là file ảnh",
                'icon.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg ",
                'icon.max' => "File ảnh không vượt quá 500kb",
                'gll.*.image' => "Có File Không Phải Là File Ảnh",
                'gll.*.mimes' => "Có File Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'gll.*.max' => "Có File ảnh vượt quá 500kb",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $data['name'] = $request->name;
            $data['title'] = $request->title;
            if ($request->slug == null) {
                $data['slug'] = Str::slug($request->name);
            } else {
                $data['slug'] = $request->slug;
            }
            $data['desc'] = $request->desc;
            $data['keywords'] = $request->keywords;
            if ($request->parent == 0) {
                $data['parent_id'] = 0;
                $data['level'] = 0;
            } else {
                $data['parent_id'] = $request->parent;
                $data['level'] = Category::where('id', '=', $request->parent)->first()->level + 1;
            }
            if ($request->has('img')) {
                $path = "admin/images/category/banner/";
                $data['img'] = $file->storeFileImg($request->img, $path);
            }
            if ($request->has('icon')) {
                if ($request->parent == 0) {
                    $path_icon = "admin/images/category/icon/";
                    $data['icon'] = $file->storeFileImg($request->icon, $path_icon);
                } else {
                    return redirect()->back()->with('error', '1');
                }
            }
            $created = Category::create($data);
            if ($created) {
                if ($request->has('gll')) {
                    $index = 0;
                    foreach ($request->gll as $gl) {
                        $index++;
                        $gl_name = $gl->getClientOriginalName();
                        $path_save_gl = "admin/images/category/banner/" .   $gl_name;
                        $gl->move("public/admin/images/category/banner",   $gl_name);
                        if ($index == 1) {
                            $data2['link'] = "psn-card";
                        }
                        if ($index == 2) {
                            $data2['link'] = "xbox-live-cards";
                        }
                        if ($index == 3) {
                            $data2['link'] = "nintendo-eshop-cards";
                        }
                        $data2['index'] = $index;
                        $data2['path'] = $path_save_gl;
                        $data2['cate_id'] = $created->id;
                        gllCat::create($data2);
                        unset($gl);
                    }
                }
                //  start handle related produts
                if ($request->bundled_skin != null) {
                    bundled_skin_cat::create([
                        'skin_cat_id' => $request->bundled_skin,
                        'cat_id' => $created->id,
                    ]);
                }
                // ///////////////
                if ($request->has('products')) {
                    if (count($request->products) > 0) {
                        foreach ($request->products as $products_id) {
                            bundled_accessory_cat::create([
                                'products_id' => $products_id,
                                'cat_id' => $created->id,
                            ]);
                        }
                    }
                }
                // //////////////
                if ($request->has('blogs')) {
                    if (count($request->blogs) > 0) {
                        foreach ($request->blogs as $posts) {
                            RelatedPosts::create([
                                'posts' => $posts,
                                'cat_id' => $created->id,
                                'for' => "category"
                            ]);
                        }
                    }
                }
                // end handle related blogs
            }
            return redirect()->back()->with('ok', '1');
        }
    }

    ////////////////////////////////////////
    public function handle_edit(Request $request, FileInterface $file)
    {
        $category = Category::where('id', $request->id)->firstOrFail();
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:category,name,' . $request->id,
                'title' => 'required|unique:category,title,' . $request->id,
                'slug' => 'unique:category,slug,' . $request->id,
                'desc' => 'required',
                'keywords' => 'required',
                'img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'icon' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'gll.*' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500'
            ],
            [
                'name.required' => "Không Được Để Trống Tên",
                'name.unique' => "Danh Mục Đã Tồn Tại",
                'title.required' => "Không Được Để Trống Title",
                'title.unique' => "Title Danh Mục Đã Tồn Tại",
                'desc.required' => "Bạn chưa nhập description",
                'keywords.required' => "Bạn chưa nhập keywords",
                'slug.required' => "Không Được Để Trống Slug",
                'slug.unique' => "Slug Đã Tồn Tại",
                'img.image' => "File không phải là file ảnh",
                'img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'img.max' => "File ảnh không vượt quá 500kb",
                'icon.image' => "File không phải là file ảnh",
                'icon.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg ",
                'icon.max' => "File ảnh không vượt quá 500kb",
                'gll.*.image' => "Có File Không Phải Là File Ảnh",
                'gll.*.mimes' => "Có File Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'gll.*.max' => "Có File ảnh vượt quá 500kb",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $data['name'] = $request->name;
            $data['title'] = $request->title;
            if ($request->slug == null) {
                $data['slug'] = Str::slug($request->name);
            } else {
                $data['slug'] = $request->slug;
            }
            $data['desc'] = $request->desc;
            $data['keywords'] = $request->keywords;
            if ($request->parent == 0) {
                $data['parent_id'] = 0;
                $data['level'] = 0;
            } else {
                $data['parent_id'] = $request->parent;
                $data['level'] = Category::where('id', '=', $request->parent)->first()->level + 1;
            }
            if ($request->has('img')) {
                if ($category->img != NULL)
                    unlink("public/" . $category->img);
                $path = "admin/images/category/banner/";
                $data['img'] = $file->storeFileImg($request->img, $path);
            }
            if ($request->has('icon')) {
                if ($request->parent == 0) {
                    if ($category->icon != NULL)
                        unlink("public/" . $category->icon);
                    $path_icon = "admin/images/category/icon/";
                    $data['icon'] = $file->storeFileImg($request->icon, $path_icon);
                } else {
                    return redirect()->back()->with('error', '1');
                }
            }
            Category::where('id', $request->id)->update($data);
            if ($request->bundled_skin != null) {
                if (bundled_skin_cat::where('cat_id',  $request->id)->first()) {
                    bundled_skin_cat::where('cat_id',  $request->id)->update(['skin_cat_id' => $request->bundled_skin]);
                } else {
                    bundled_skin_cat::where('cat_id',  $request->id)->create(['skin_cat_id' => $request->bundled_skin, 'cat_id' => $request->id]);
                }
            } else {
                bundled_skin_cat::where('cat_id', '=', $request->id)->delete();
            }
            if ($request->has('products')) {
                if (count($request->products) > 0) {
                    foreach ($request->products as $products_id) {
                        if (!bundled_accessory_cat::where('products_id', $products_id)->where('cat_id', $request->id)->first()) {
                            bundled_accessory_cat::create([
                                'products_id' => $products_id,
                                'cat_id' => $request->id,
                            ]);
                        }
                    }
                }
            }
            if ($request->has('blogs')) {
                if (count($request->blogs) > 0) {
                    foreach ($request->blogs as $posts) {
                        if (!RelatedPosts::where('cat_id', $request->id)->where('posts', $posts)->where('for', 'LIKE', "category")->first()) {
                            RelatedPosts::create([
                                'posts' => $posts,
                                'cat_id' => $request->id,
                                'for' => "category"
                            ]);
                        }
                    }
                }
            }
            return redirect()->back()->with('update', '1');
        }
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function handle_delete($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->back()->with('delete', '1');
    }

    //////////////////////////////////////// main cat

    public function prdcer(Request $request)
    {
        $producer = Producer::orderBy('id', 'ASC')->get();
        return view('admin.products.category.prducer.index', compact('producer'));
    }

    ////////////////////////////////////////

    public function handle_add_prdcer(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:producer',
                'slug' => 'required|unique:producer',
            ],
            [
                'name.required' => "Không Được Để Trống Tên Nhà Sản Xuất",
                'name.unique' => "Nhà Sản Xuất Đã Tồn Tại",
                'slug.required' => "Không Được Để Trống Slug Nhà Sản Xuất",
                'slug.unique' => "Slug Đã Tồn Tại",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            Producer::create([
                'name' => $request->name,
                'slug' => $request->slug
            ]);
            return redirect()->back()->with('ok', '1');
        }
    }
    ////////////////////////////////////////
    public function handle_delete_prdcer($id)
    {
        Producer::where('id', $id)->delete();
        return redirect()->back()->with('delete', '1');
    }
    ///////////////////////////////////////
    public function game(Request $request)
    {
        $games = CatGame::orderBy('id', 'ASC')->get();
        return view('admin.products.category.game.index', compact('games'));
    }

    //////////////////////////////////////// producer

    public function handle_add_game(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:cat_game',
            ],
            [
                'name.required' => "Không Được Để Trống Tên Thể Loại",
                'name.unique' => "Thể Loại Này Đã Tồn Tại",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            CatGame::create([
                'name' => $request->name,
            ]);
            return redirect()->back()->with('ok', '1');
        }
    }
    ////////////////////////////////////////
    public function handle_delete_game($id)
    {
        CatGame::where('id', $id)->delete();
        return redirect()->back()->with('delete', '1');
    }
    /////////////////////////////////////// game
    public function insurance(Request $request)
    {
        $insurances = Insurance::orderBy('id', 'ASC')->get();
        return view('admin.products.category.insurance.index', compact('insurances'));
    }

    ////////////////////////////////////////

    public function handle_add_insurance(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'price' =>  'required|regex:/^[0-9]+$/',
            ],
            [
                'name.required' => "Bạn Chưa Nhập Tên",
                'price.required' => "Bạn Chưa Nhập Giá",
                'price.regex' => "Giá bắt buộc phải là SỐ",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $check = Insurance::where('name', 'LIKE', $request->name)->where('price', '=', $request->price)->first();
            if ($check) {
                return redirect()->back()->with('error', '1');
            } else {
                Insurance::create([
                    'name' => $request->name,
                    'price' => $request->price,
                    'group' => $request->group,
                ]);
            }
            return redirect()->back()->with('ok', '1');
        }
    }
    ////////////////////////////////////////
    public function handle_delete_insurance($id)
    {
        Insurance::where('id', $id)->delete();
        return redirect()->back()->with('delete', '1');
    }
    /////////////////////////////////////// end ins

    public function plc(Request $request)
    {
        $policy = Policy::all();
        return view('admin.products.category.policy.index', compact('policy'));
    }
    ////////////////////////////////////////
    ////////////////////////////////////////

    public function handle_plc(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'icon' => 'required',
                'content' => 'required'
            ],
            [
                'name.required' => "Bạn chưa nhập tên chính sách",
                'icon.required' => "Bạn chưa nhập icon",
                'content.required' => "Bạn chưa nhập content",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            Policy::create([
                'title' => $request->name,
                'icon' => $request->icon,
                'content' => $request->content,
                'position' => $request->position,
                'fullset' => $request->fullset,
            ]);
            return redirect()->back()->with('ok', '1');
        }
    }

    ////////////////////////////////////////
    public function handle_edit_plc($id, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'icon' => 'required',
                'content' => 'required'
            ],
            [
                'name.required' => "Bạn chưa nhập tên chính sách",
                'icon.required' => "Bạn chưa nhập icon",
                'content.required' => "Bạn chưa nhập content",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            Policy::where('id', '=', $id)->update([
                'title' => $request->name,
                'icon' => $request->icon,
                'content' => $request->content,
                'position' => $request->position,
                'fullset' => $request->fullset,
            ]);
            return redirect()->back()->with('ok', '1');
        }
    }
    // //////////////////////////////////////////////

    public function plc_edit($id, Request $request)
    {
        $policy = Policy::where('id', '=', $id)->first();
        return view('admin.products.category.policy.edit', compact('policy'));
    }

    // /////////////////////////////////////// end policy
    ////////////////////////////////////////

    // public function bundled(Request $request)
    // {
    //     $bundled = Bundled::all();
    //     $category = Category::where('parent_id', '=', 0)->get();
    //     return view('admin.products.category.prd.bundled', compact('bundled', 'category'));
    // }

    ////////////////////////////////////////
    ////////////////////////////////////////

    // public function handle_add_bundled(Request $request)
    // {
    //     $data_create = array();
    //     if ($request->has('access')) {
    //         $data_create['bundled_accessory'] = implode(",", $request->access);
    //     }
    //     $data_create['bundled_skin'] = $request->bundled_skin;
    //     $data_create['cat_id'] = $request->cat_id;
    //     Bundled::create($data_create);
    //     return redirect()->back()->with('ok', '1');
    // }

    // ////////////////////////////////////////
    // public function handle_delete_bundled($id)
    // {
    //     Bundled::where('id', $id)->delete();
    //     return redirect()->back()->with('delete', '1');
    // }

    // ////////////////////////////////////////// end bundled

}
