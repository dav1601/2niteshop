<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blogs;
use App\Models\Todos;
use App\Models\Config;
use App\Models\Orders;
use App\Models\Slides;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Products;
use App\Models\showHome;
use App\Models\Statistics;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserInterface;
use Symfony\Polyfill\Intl\Idn\Info;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Repositories\CustomerInterface;
use App\Repositories\FileInterface;
use Illuminate\Support\Facades\Validator;

class AdminDashBoardController extends Controller
{
    public function __construct(CustomerInterface $customer, FileInterface $file)
    {
        $this->customer = $customer;
        $this->middleware(function ($request, $next) {
            $this->customer->updateNameAuthor();
            session(['active' => 'dashboard']);
            return $next($request);
        });
        $this->file = $file;
    }
    public function index(UserInterface $daviUser)
    {
        $count = Todos::count();
        $page = 1;
        $item_page = 6;
        $start = ($page - 1) * $item_page;
        $number_page = ceil($count / $item_page);
        $tasks = User::find(Auth::id())->todos()->orderBy('id', 'DESC')->offset($start)->limit($item_page)->get();;
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $stats_users = User::where('role_id', '>', '3')->count();
        $stats_order = Orders::count();
        $stats_product = Products::count();
        $stats_blog = Blogs::count();
        $stats_comment = Comments::count();
        $revenueToday = Statistics::where('day', '=', $now->day)->where('month', '=', $now->month)->where('year', '=', $now->year)->first();
        if ($revenueToday) {
            $stats_revenueToday = $revenueToday->total_day;
            $stats_proFToday = $stats_revenueToday - $revenueToday->total_cost;
        } else {
            $stats_revenueToday = 0;
            $stats_proFToday = 0;
        }
        $revenueMonth = Statistics::where('month', '=', $now->month)->where('year', '=', $now->year)->get();
        $stats_revenueMonth = 0;
        $proFitMonth = 0;
        if (count($revenueMonth) > 0) {
            foreach ($revenueMonth as $rm) {
                $stats_revenueMonth  += $rm->total_day;
                $proFitMonth += $rm->total_cost;
            }
            $stats_proFMonth =   $stats_revenueMonth -  $proFitMonth;
        } else {
            $stats_revenueMonth = 0;
            $stats_proFMonth = 0;
        }
        $blogs = Blogs::orderBy('id', 'DESC')->limit(8)->get();
        $products = Products::orderBy('id', 'DESC')->limit(8)->get();
        return view('admin.dashboard.index', compact('tasks', 'now', 'number_page', 'page', 'stats_comment', 'stats_product', 'stats_order', 'stats_users', 'stats_blog', 'stats_revenueMonth', 'stats_proFMonth', 'stats_revenueToday', 'stats_proFToday', 'daviUser', 'blogs', 'products'));
    }
    ////////////////////////////////////////

    public function add_cofhome_view(Request $request)
    {
        $category = category_child(Category::all(), 0);
        $config = showHome::orderBy('position', 'ASC')->get();
        Carbon::setLocale('vi');
        $carbon = new Carbon();
        return view('admin.dashboard.config_home', compact('config', 'category', 'carbon'));
    }
    ////////////////////////////////////////
    public function edit_cofhome_view($id, Request $request)
    {
        $category = Category::where('parent_id', '=', 0)->get();
        $config = showHome::where('id', '=', $id)->first();
        $cat_1 = $config->cat;
        $cat_2 = $config->cat_2;
        Carbon::setLocale('vi');
        $carbon = new Carbon();
        $access =  Products::where(function ($query) use ($cat_1) {
            $query->where('cat_id', '=', $cat_1);
        });
        $access = $access->where('sub_type', 'LIKE', 'controller')->get();
        return view('admin.dashboard.config_home_edit', compact('config', 'category', 'carbon', 'access'));
    }
    ////////////////////////////////////////
    public function add_cofhome_handle(Request $request)
    {
        $data = array();
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:show_home',
                'main_img' => 'required|image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'use_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'instruct_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'access_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'fix_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'link_main' => 'required',
                'cat'  => 'required',
                'color'  => 'required',
                'position' => 'unique:show_home',
            ],
            [
                'name.required' => "Bạn chưa nhập tên config",
                'cat.required' => "Bạn chưa chọn danh mục config",
                'color.required' => "Bạn chưa nhập màu sắc config",
                'link_main.required' => "Bạn chưa nhập link",
                'link_use.required' => "Bạn chưa nhập link",
                'link_instruct.required' => "Bạn chưa nhập link",
                'link_fix.required' => "Bạn chưa nhập link",
                'link_access.required' => "Bạn chưa nhập link",
                'name.unique' => "Config này đã tồn tại",
                'position.unique' => "Vị trí này đã tồn tại",
                'main_img.required' => "Không được để trống file ảnh",
                'main_img.image' => "File không phải là file ảnh",
                'main_img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'main_img.max' => "File ảnh không vượt quá 500kb",
                'use_img.required' => "Không được để trống file ảnh",
                'use_img.image' => "File không phải là file ảnh",
                'use_img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'use_img.max' => "File ảnh không vượt quá 500kb",
                'instruct_img.required' => "Không được để trống file ảnh",
                'instruct_img.image' => "File không phải là file ảnh",
                'instruct_img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'instruct_img.max' => "File ảnh không vượt quá 500kb",
                'access_img.required' => "Không được để trống file ảnh",
                'access_img.image' => "File không phải là file ảnh",
                'access_img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'access_img.max' => "File ảnh không vượt quá 500kb",
                'fix_img.required' => "Không được để trống file ảnh",
                'fix_img.image' => "File không phải là file ảnh",
                'fix_img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'fix_img.max' => "File ảnh không vượt quá 500kb",

            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $data['name'] = $request->name;
            $data['main_link'] = $request->link_main;
            $data['use_link'] = $request->link_use;
            $data['fix_link'] = $request->link_fix;
            $data['instruct_link'] = $request->link_instruct;
            $data['access_link'] = $request->link_access;
            $data['cat'] = $request->cat;
            $data['cat_2'] = $request->cat_2;
            if ($request->has('access')) {
                $data['option'] = implode(",", $request->access);
            }
            if ($request->cat_digital != 0) {
                $data['cat_digital'] = $request->cat_digital;
            }
            $data['color'] = $request->color;
            $data['tab'] = $request->tab;
            $data['position'] = $request->position;
            // main img
            $path_main = "admin/images/show_home/" . $request->name . "/" . "main/";
            $data['main_img'] = $this->file->storeFileImg($request->main_img, $path_main);
            // end main img
            // use img
            if ($request->has('use_img')) {
                $path_use = "admin/images/show_home/" . $request->name . "/" . "use/";
                $data['use_img'] = $this->file->storeFileImg($request->use_img, $path_use);
            }
            // end use img
            // instruct img
            if ($request->has('instruct_img')) {
                $path_instruct = "admin/images/show_home/" . $request->name . "/" . "instruct/";
                $data['instruct_img'] = $this->file->storeFileImg($request->instruct_img,  $path_instruct);
            }
            // end instruct img
            // fix img
            if ($request->has('fix_img')) {
                $path_fix = "admin/images/show_home/" . $request->name . "/" . "fix/";
                $data['fix_img'] = $this->file->storeFileImg($request->fix_img, $path_fix);
            }
            // end fix img
            // access img
            if ($request->has('access_img')) {
                $path_access = "admin/images/show_home/" . $request->name . "/" . "access/";
                $data['access_img'] = $this->file->storeFileImg($request->access_img,  $path_access);
            }
            // end access img
            showHome::create($data);
            return redirect()->back()->with('ok', '1');
        }
    }

    //////////////////////////////////////// end add show_home
    public function edit_cofhome_handle($id, Request $request)
    {
        $data = array();
        $conf = showHome::where('id', '=', $id)->first();
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'main_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'use_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'instruct_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'access_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'fix_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'link_main' => 'required',
                'cat'  => 'required',
                'color'  => 'required',
            ],
            [
                'name.required' => "Bạn chưa nhập tên config",
                'cat.required' => "Bạn chưa chọn danh mục config",
                'color.required' => "Bạn chưa nhập màu sắc config",
                'link_main.required' => "Bạn chưa nhập link",
                'link_use.required' => "Bạn chưa nhập link",
                'link_instruct.required' => "Bạn chưa nhập link",
                'link_fix.required' => "Bạn chưa nhập link",
                'link_access.required' => "Bạn chưa nhập link",
                'name.unique' => "Config này đã tồn tại",
                'position.unique' => "Vị trí này đã tồn tại",
                'main_img.image' => "File không phải là file ảnh",
                'main_img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'main_img.max' => "File ảnh không vượt quá 500kb",
                'use_img.required' => "Không được để trống file ảnh",
                'use_img.image' => "File không phải là file ảnh",
                'use_img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'use_img.max' => "File ảnh không vượt quá 500kb",
                'instruct_img.required' => "Không được để trống file ảnh",
                'instruct_img.image' => "File không phải là file ảnh",
                'instruct_img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'instruct_img.max' => "File ảnh không vượt quá 500kb",
                'access_img.required' => "Không được để trống file ảnh",
                'access_img.image' => "File không phải là file ảnh",
                'access_img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'access_img.max' => "File ảnh không vượt quá 500kb",
                'fix_img.required' => "Không được để trống file ảnh",
                'fix_img.image' => "File không phải là file ảnh",
                'fix_img.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'fix_img.max' => "File ảnh không vượt quá 500kb",

            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $data['name'] = $request->name;
            $data['main_link'] = $request->link_main;
            $data['use_link'] = $request->link_use;
            $data['fix_link'] = $request->link_fix;
            $data['instruct_link'] = $request->link_instruct;
            $data['access_link'] = $request->link_access;
            $data['cat'] = $request->cat;
            $data['cat_2'] = $request->cat_2;
            if ($request->has('active')) {
                $data['active'] = 1;
            } else {
                $data['active'] = 0;
            }
            if ($request->has('access')) {
                $data['option'] = implode(",", $request->access);
            }
            if ($request->cat_digital != 0) {
                $data['cat_digital'] = $request->cat_digital;
            } else {
                $data['cat_digital'] = NULL;
            }
            $data['color'] = $request->color;
            $data['tab'] = $request->tab;
            $data['position'] = $request->position;
            // main img
            if ($request->has('main_img')) {
                if ($conf->main_img != NULL)
                    $this->file->deleteFile($conf->main_img);
                $path_main = "admin/images/show_home/" . $request->name . "/" . "main/";
                $data['main_img'] = $this->file->storeFileImg($request->main_img, $path_main);
            }
            // end main img
            // use img
            if ($request->has('use_img')) {
                if ($conf->use_img != NULL)
                    $this->file->deleteFile($conf->use_img);
                $path_use = "admin/images/show_home/" . $request->name . "/" . "use/";
                $data['use_img'] = $this->file->storeFileImg($request->use_img, $path_use);
            }
            // end use img
            // instruct img
            if ($request->has('instruct_img')) {
                if ($conf->instruct_img != NULL)
                    $this->file->deleteFile($conf->instruct_img);
                $path_instruct = "admin/images/show_home/" . $request->name . "/" . "instruct/";
                $data['instruct_img'] = $this->file->storeFileImg($request->instruct_img,  $path_instruct);
            }
            // end instruct img
            // fix img
            if ($request->has('fix_img')) {
                if ($conf->fix_img != NULL)
                    $this->file->deleteFile($conf->fix_img);
                $path_fix = "admin/images/show_home/" . $request->name . "/" . "fix/";
                $data['fix_img'] = $this->file->storeFileImg($request->fix_img, $path_fix);
            }
            // end fix img
            // access img
            if ($request->has('access_img')) {
                if ($conf->access_img != NULL)
                    $this->file->deleteFile($conf->access_img);
                $path_access = "admin/images/show_home/" . $request->name . "/" . "access/";
                $data['access_img'] = $this->file->storeFileImg($request->access_img,  $path_access);
            }
            // end access img
            showHome::where('id', '=', $id)->update($data);;
            return redirect()->back()->with('ok', '1');
        }
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function add_cofinfo_view(Request $request)
    {
        $config_info = Config::all();
        return view('admin.dashboard.config_info', compact('config_info'));
    }

    ////////////////////////////////////////
    public function edit_info($id, Request $request)
    {
        $config = Config::where('id', '=', $id)->firstOrFail();
        return view('admin.dashboard.config_info_edit', compact('config'));
    }
    ////////////////////////////////////////
    public function delete_cofinfo_handle($id, Request $request)
    {
        if (Config::where('id', '=', $id)->delete()) {
            return redirect()->back()->with('delete', 1);
        } else {
            return redirect()->back()->with('error_delete', 1);
        }
    }

    // ////////////////////////////

    public function add_cofinfo_handle(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'type' => 'required',
                'value' => 'required_without:value_img',
                'value_img' => 'required_without:value|image|mimes:jpeg,png,jpg,tiff,svg|max:10000',
            ],
            [
                'name.required' => "Bạn chưa điền tên của config info",
                'type.required' => "Bạn chưa chọn type của config info",
                'value.required_without' => "Bạn chưa điền giá trị của config info",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data_create['name'] = $request->name;
            $data_create['type'] = $request->type;
            if ($request->has('value_img')) {
                $path = "admin/images/info/";
                $data_create['value'] = $this->file->storeFileImg($request->value_img, $path);
            } else {
                $data_create['value'] = $request->value;
            }

            if (Config::create($data_create)) {
                return redirect()->back()->with('success', 1);
            } else {
                return redirect()->back()->with('error', 1);
            }
        }
    }

    ////////////////////////////////////////
    public function edit_info_handle($id, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'type' => 'required',
                'value_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:10000',
                'value' => 'required_without:value_img',
            ],
            [
                'name.required' => "Bạn chưa điền tên của config info",
                'type.required' => "Bạn chưa chọn type của config info",
                'value.required_without' => "Bạn chưa điền giá trị của config info",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $config_info = Config::where('id', '=', $id)->first();
            $data_update['name'] = $request->name;
            $data_update['type'] = $request->type;
            if ($request->has('value_img')) {
                if ($config_info->value != NULL) {
                    $this->file->deleteFile($config_info->value);
                }
                $path = "admin/images/info/";
                $data_update['value'] = $this->file->storeFileImg($request->value_img, $path);
            } else {
                $data_update['value'] = $request->value;
            }
            if ($request->has('setNull')) {
                if ($config_info->value != NULL) {
                    $this->file->deleteFile($config_info->value);
                }
                $data_update['value'] = NULL;
            }
            if (Config::where('id', '=', $id)->update($data_update)) {
                return redirect()->back()->with('success', 1);
            } else {
                return redirect()->back()->with('error', 1);
            }
        }
    }
    // ////////////////////////////// API CONFIRMATION





    //////////////////////////////////////////
}
