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
use App\Models\SectionHome;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Repositories\FileInterface;
use App\Repositories\UserInterface;
use Symfony\Polyfill\Intl\Idn\Info;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Repositories\CustomerInterface;
use App\Repositories\ModelInterface;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class AdminDashBoardController extends Controller
{
    public $customer;
    public $file;
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
    public function index(UserInterface $daviUser, ModelInterface $model)
    {
        $tasks = $model->pagination(User::find(Auth::id())->todos(), ['id', 'DESC'], 1, 6, null);
        $users = $model->pagination(new User(), ['id', 'DESC'], 1, 8, []);
        $blogs = $model->pagination(Blogs::exclude(['content']), ['id', 'DESC'], 1, 8, []);
        $products = $model->pagination(Products::exclude(['content', 'info'])->with(['producer', 'categories' => function ($q) {
            $q->select("name");
        }]), ['id', 'DESC'], 1, 8, null);
        $now = Carbon::now();
        $stats_users = User::count();
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

        return view('admin.dashboard.index', compact('tasks', 'now', 'stats_comment', 'stats_product', 'stats_order', 'stats_users', 'stats_blog', 'stats_revenueMonth', 'stats_proFMonth', 'stats_revenueToday', 'stats_proFToday', 'daviUser', 'blogs', 'products', 'users'));
    }
    ////////////////////////////////////////

    public function add_cofhome_view(Request $request)
    {

        $config = showHome::with(['sections'])->orderBy('position', 'asc')->get();
        Carbon::setLocale('vi');
        $carbon = new Carbon();
        return view('admin.dashboard.config_home', compact('config', 'carbon'));
    }
    ////////////////////////////////////////
    public function edit_cofhome_view($id, Request $request)
    {
        $config = showHome::where('id', '=', $id)->first();
        Carbon::setLocale('vi');
        $carbon = new Carbon();
        return view('admin.dashboard.config_home_edit', compact('config', 'carbon', 'id'));
    }
    //    ///////////////////////////////////////
    public function validatorCHome($request, $id = null)
    {
        $name = $id ? "," . $id : "";
        $rq = $id ? "" : "required|";
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:show_home,name' . $name,
                'main_img' => $rq . 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'use_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'instruct_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'access_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'fix_img' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:500',
                'link_main' => 'required',
                'color'  => 'required',
            ],

        );
        return $validator;
    }
    //  //////////////////////////////////////// end validatorCHome
    ////////////////////////////////////////


    //////////////////////////////////////// end add show_home


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
                $data_create['value'] = $this->file->storeFileImg($request->value_img, "info", "public");
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
                    $this->file->deleteFile($config_info->value, "public");
                }

                $data_update['value'] = $this->file->storeFileImg($request->value_img, "info", "public");
            } else {
                $data_update['value'] = $request->value;
            }
            if ($request->has('setNull')) {
                if ($config_info->value != NULL) {
                    $this->file->deleteFile($config_info->value, "public");
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
