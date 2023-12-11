<?php

namespace App\Http\Controllers;

use App\Http\Traits\Responser;
use App\Models\BlockCategory;
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
    use Responser;
    public $file;
    public function __construct(FileInterface $file)
    {
        $this->middleware(function ($request, $next) {
            session(['active' => 'category']);
            return $next($request);
        });
        $this->file = $file;
    }
    public function index()
    {
    }
    //    ///////////////////////////////////////
    public function crawler(Request $request)
    {
        $res = [];
        $crawler = \Goutte::request('GET', $request->url);
        $res['page_title'] = $crawler->filter('.page-title')->text("");
        $res['meta'] = va_get_meta($request->url);
        $parts = explode("/", $request->url);
        $res['slug'] =  end($parts);
        return redirect()->back()->with("crawler", $res);
    }
    //  //////////////////////////////////////// end crawler
    public function cat(Request $request)
    {
        $categories = Category::tree(false);
        $url = route('view-category.product');
        return view('admin.products.category.prd.index', compact('categories', 'url'));
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
                $last = (int) Category::where('parent_id', 0)->orderBy('position', 'DESC')->first()->position;
            } else {
                $data['parent_id'] = $request->parent;
                $data['level'] = Category::where('id', '=', $request->parent)->first()->level + 1;
                $last = (int) Category::where('parent_id', $request->parent)->where('level', '=', $data['level'])->orderBy('position', 'DESC')->first()->position;
            }
            if ($request->has('img')) {
                $data['img'] = $file->storeFileImg($request->img, "category/img", "public");
            }
            if ($request->has('icon')) {
                if ($request->parent == 0) {
                    $data['icon'] = $file->storeFileImg($request->icon, "category/icon", 'public');
                } else {
                    return redirect()->back()->with('error', '1');
                }
            }
            $data['position'] = $last + 1;
            $created = Category::create($data);
            if ($created) {

                return redirect()->back()->with('ok', '1');
            }
            return redirect()->back()->with('error', '1');
        }
    }

    ////////////////////////////////////////
    // public function handle_edit(Request $request, FileInterface $file)
    // {
    //     $res['errors'] = [];
    //     $res['s'] = true;
    //     $res['update_categories'] = false;
    //     $validator = Validator::make(
    //         $request->all(),
    //         [
    //             'name' => 'required|unique:category,name,' . $request->id,
    //             'title' => 'required|unique:category,title,' . $request->id,
    //             'slug' => 'unique:category,slug,' . $request->id,
    //             'desc' => 'required',
    //             'keywords' => 'required',
    //             'img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
    //             'icon' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
    //             'gll.*' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500'
    //         ],
    //         [
    //             'name.required' => "Không Được Để Trống Tên",
    //             'name.unique' => "Danh Mục Đã Tồn Tại",
    //             'title.required' => "Không Được Để Trống Title",
    //             'title.unique' => "Title Danh Mục Đã Tồn Tại",
    //             'desc.required' => "Bạn chưa nhập description",
    //             'keywords.required' => "Bạn chưa nhập keywords",
    //             'slug.required' => "Không Được Để Trống Slug",
    //             'slug.unique' => "Slug Đã Tồn Tại",
    //             'img.image' => "File không phải là file ảnh",
    //             'img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
    //             'img.max' => "File ảnh không vượt quá 500kb",
    //             'icon.image' => "File không phải là file ảnh",
    //             'icon.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg ",
    //             'icon.max' => "File ảnh không vượt quá 500kb",
    //             'gll.*.image' => "Có File Không Phải Là File Ảnh",
    //             'gll.*.mimes' => "Có File Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
    //             'gll.*.max' => "Có File ảnh vượt quá 500kb",
    //         ]
    //     );

    //     if ($validator->fails()) {
    //         $res['errors'] = $validator->errors();
    //     } else {
    //         $category = Category::where('id', $request->id)->firstOrFail();
    //         $data['name'] = $request->name;
    //         $data['title'] = $request->title;
    //         $data['parent_id'] = $request->parent;
    //         $data['active'] = $request->has("active-category") ? true : false;
    //         if ($request->slug == null) {
    //             $data['slug'] = Str::slug($request->name);
    //         } else {
    //             $data['slug'] = $request->slug;
    //         }
    //         $data['desc'] = $request->desc;
    //         $data['keywords'] = $request->keywords;
    //         if ($request->has('img')) {
    //             if ($category->img != NULL)
    //                 $this->file->deleteFile("" . $category->img);
    //             $path = "admin/images/category/banner/";
    //             $data['img'] = $file->storeFileImg($request->img, $path);
    //         }
    //         if ($request->has('icon')) {
    //             if ($request->parent == 0) {
    //                 if ($category->icon != NULL)
    //                     $this->file->deleteFile("" . $category->icon);
    //                 $path_icon = "admin/images/category/icon/";
    //                 $data['icon'] = $file->storeFileImg($request->icon, $path_icon);
    //             }
    //         }
    //         $updated =  Category::where('id', $request->id)->update($data);
    //         if ($category->parent_id != $request->parent) {
    //             $html_2 = "";
    //             $html_2 .= '<ul class="admin-cate admin-cate-connect row no-gutters lv-0" id="admin-cate-0"
    //             data-lv="0">';
    //             $html_2 .= view('components.admin.category.dd.item', ['categories' => Category::tree()]);
    //             $html_2 .= "</div>";
    //             $res['categories_html'] = $html_2;
    //             $res['update_categories'] = true;
    //         }
    //         $res['name'] = $request->name;
    //         if (!$updated) {
    //             $res['s'] = false;
    //         }
    //     }
    //     return response()->json($res);
    // }

    ////////////////////////////////////////
    function handle_edit(Request $req)
    {

        $field = $req->all();
        $id = (int) $field['id'];
        $field['active'] = $field['active-category'] == "on" ? 1 : 0;
        $currentParent = (int) Category::select("parent_id")->where("id", $id)->first()->parent_id;
        if ((int)$field['parent'] !== $currentParent) {
            $field['parent_id'] = (int) $field['parent'];
            if ($field['parent_id'] !== 0) {
                $field['level'] = (int) Category::select("level")->where("id", $field['parent_id'])->first()->level + 1;
                $field['position'] = (int) Category::select("position")->where("parent_id", $field['parent_id'])->where("level", $field['level'])->latest()->position + 1;
            } else {
                $field['parent_id'] = 0;
                $field['level'] = 0;
                $field['position'] = (int) Category::select("position")->where("parent_id", 0)->where("level", 0)->latest()->position + 1;
            }
        }
        $removeKeys = ["_token", "id", "img", "icon", "active-category", "parent"];
        $arrayUpdate = array_diff_key($field, array_flip($removeKeys));
        try {
            $updated =  Category::where("id", $id)->update($arrayUpdate);
            return $this->successResponse(['updated' => $updated]);
        } catch (\Exception $e) {
            return $this->errorResponse(['error' => $e->getMessage()]);
        }
    }
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

    //    ///////////////////////////////////////
    public function handle_category(Request $request)
    {
        $act = $request->act;
        $data['error'] = false;

        if ($act == "receive") {
            $idChild = $request->idChild;
            $idParent = $request->has('idParent') ? $request->idParent : null;
            $lv = $request->level;
            $updated =   Category::where('id',  $idChild)->update(['parent_id' => $idParent, 'level' => $lv]);
            if (!$updated) {
                $data['error'] = true;
            }
        }
        if ($act == "update") {
            $arraySort = $request->arraySort;
            foreach ($arraySort as $key => $id) {
                $updated = Category::where('id', $id)->update(['position' => $key]);
                if (!$updated) {
                    $data['error'] = true;
                }
            }
        }
        if ($act == "loadEdit") {
            $id = $request->id;
            $category = Category::where('id', $id)->first();
            $data['html_edit'] = '';
            $data['html_edit'] .= view('components.admin.modal.category.edit', ['category' => $category]);
        }
        return response()->json($data);
    }
    //  //////////////////////////////////////// end handle_category
    //    ///////////////////////////////////////
    public function category_block_view(Request $request)
    {
        $blockCategory = BlockCategory::all();
        $type = $request->has('type') ? $request->get('type') : "add";
        $isa = $type == "add";
        $compact = ['blockCategory', 'type', 'isa'];
        if (!$isa) {
            $id = $request->id;
            $block = BlockCategory::where('id', $id)->first();
            $compact[] = "block";
        }
        return view('admin.products.category.prd.block.index', compact($compact));
    }
    //  //////////////////////////////////////// end category_block_view
    //    ///////////////////////////////////////
    public function category_block_handle(Request $request)
    {
        $t = $request->has('type') ? $request->get('type') : 'add';
        $m = "No Content";
        $s = "success";
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'content' => 'required'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $data['title'] = $request->title;
            $data['content'] = $request->content;
            switch ($t) {
                case 'add':
                    if (!BlockCategory::create($data)) {
                        $m = "thêm block thất bại";
                        $s = "error";
                    } else {
                        $m = "thêm block thành công";
                    }
                    break;
                case 'update':
                    $id = $request->id;
                    if (!BlockCategory::ưhere('id', $id)->update($data)) {
                        $m = "update block thất bại";
                        $s = "error";
                    } else {
                        $m = "update block thành công";
                    }
                    break;
            }
        }
        return redirect()->back()->with($s, $m);
    }
    //  //////////////////////////////////////// end category_block_handle
}
