<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blogs;
use App\Models\infoAdmin;
use App\Models\Products;
use App\Repositories\CustomerInterface;
use Illuminate\Http\Request;
use App\Repositories\UserInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['active' => 'users']);
            return $next($request);
        });

    }
    // ///////////////////
    public function add()
    {
        $this->authorize('admin-action');
        return view('admin.users.add');
    }
    // /////////
    // ///////////////////
    public function edit($id)
    {
        $this->authorize('admin-action');
        $user = User::where('id', '=', $id)->firstOrFail();
        return view('admin.users.edit', compact('user', 'id'));
    }
    // /////////////////////////////////////
    ////////////////////////////////////////

    public function profile($id, Request $request, UserInterface $daviUser)
    {
        if (!Gate::allows('admin-action')) {
            $this->authorize('setting-profile', $id);
        }
        $user = User::where('id', '=', $id)->firstOrFail();
        $profile = infoAdmin::where('user_id', '=', $id)->firstOrFail();
        $page = 1;
        $item_page = 6;
        $start = ($page - 1) * $item_page;
        $blogs = Blogs::where('users_id', '=', $id)->offset($start)->limit($item_page)->orderBy('created_at', 'DESC')->get();
        $products = Products::where('author_id', '=', $id)->offset($start)->limit($item_page)->orderBy('created_at', 'DESC')->get();
        $count_blogs = Blogs::where('users_id', '=', $id)->count();
        $count_products = Products::where('author_id', '=', $id)->count();
        $activities = $products->merge($blogs);
        $count = $count_blogs + $count_products;
        $number_page = ceil($count / $item_page);
        $sorted = $activities->sortByDesc('created_at');
        return view('admin.users.profile', compact('id', 'user', 'profile', 'daviUser', 'sorted', 'number_page'));
    }

    ////////////////////////////////////////
    //////////////////////////////////////

    public function profile_ajax(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $page = $request->page;
        $id = $request->id;
        $item_page = 6;
        $start = ($page - 1) * $item_page;
        $blogs = Blogs::where('users_id', '=', $id)->offset($start)->limit($item_page)->orderBy('created_at', 'DESC')->get();
        $products = Products::where('author_id', '=', $id)->offset($start)->limit($item_page)->orderBy('created_at', 'DESC')->get();
        $activities = $products->merge($blogs);
        $sorted = $activities->sortByDesc('created_at');
        $output .= view('components.admin.profile.itemactivities', compact('sorted'));
        $data['html'] = $output;
        return response()->json($data);
    }

    ////////////////////////////////////////
    // ///////////////////
    public function show_user()
    {
        $this->authorize('group-4');
        $page = 1;
        $item_page = 10;
        $start = ($page - 1) * $item_page;
        $count =  User::where('id', '!=', Auth::id())->count();
        $number = ceil($count / $item_page);
        $users = User::where('id', '!=', Auth::id())->orderBy('id', 'DESC')->offset($start)->limit($item_page)->get();
        return view('admin.users.show_user', compact('users', 'page', 'number'));
    }
    // /////////
    public function show_user_ajax(Request $request)
    {
        $output = '';
        $sort = $request->sort;
        $role = $request->role;
        $user = new User();
        if ($role != 0) {
            $user = $user->where('role_id', '=', $role);
        }
        if ($request->phone != null) {
            $user = $user->where('phone', 'LIKE', '%' . $request->phone . '%');
        }
        if ($request->nameId != null) {
            $nameId = $request->nameId;
            $user = $user->where(function ($query) use ($nameId) {
                $query->where('name', 'LIKE', '%' . $nameId . '%')
                    ->orWhere('id', '=', $nameId);
            });;
        }
        if ($request->prov != null) {
            $user = $user->where('provider', 'LIKE', '%' . $request->prov . '%');
        }
        if ($request->provId != null) {
            $user = $user->where('provider_id', 'LIKE', '%' . $request->provId . '%');
        }
        $page = $request->page;
        $item_page = 10;
        $start = ($page - 1) * $item_page;
        $count =  $user->where('id', '!=', Auth::id())->count();
        $number = ceil($count / $item_page);
        $users = $user->where('id', '!=', Auth::id())->orderBy('id', $sort)->offset($start)->limit($item_page)->get();
        if (count($users) > 0) {
            $output .= view('components.admin.users.table.showusers', compact('users', 'number', 'page'));
        } else {
            $output .= view('components.empty.nodata');
        }
        $data['html'] = $output;
        return response()->json($data);
    }
    ////////////////////////////////////////

    public function handle_add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string'],
                'phone' => ['required', 'string', 'min:6', 'unique:users' ,'numeric'],

            ],
            [
                'name.required' => "Bạn chưa nhập tên",
                'name.string' => "Tên phải là 1 chuỗi kí tự",
                'name.max' => "Độ dài tối đa 255 ký tự",
                'email.required' => "Không được để trống email",
                'email.string' => "Email phải là 1 chuỗi kí tự",
                'email.string' => "Độ dài email tối đa 255 ký tự",
                'email.unique' => "Email đã tồn tại",
                'password.min' => "Ít nhất 8 ký tự",
                'phone.numeric' => "Số điện thoại phải là SỐ",
                'phone.unique' => "Số điện thoại này đã tồn tại"

            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user =  User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role,
                'phone' => $request->phone
            ]);
            if ($user) {
                infoAdmin::create(['user_id' => $user->id]);
                return redirect()->back()->with('ok', 1);
            } else {
                return redirect()->back()->with('not-ok', 1);
            }
        }
    }

    ////////////////////////////////////////
    public function handle_edit($id, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required', 'string', 'max:255',
                'email' => 'required|string|email|unique:users,email,'.$id,
                'phone' => 'required|string|numeric|unique:users,phone,'.$id,
            ],
            [
                'name.required' => "Bạn chưa nhập tên",
                'name.string' => "Tên phải là 1 chuỗi kí tự",
                'name.max' => "Độ dài tối đa 255 ký tự",
                'email.required' => "Không được để trống email",
                'email.string' => "Email phải là 1 chuỗi kí tự",
                'email.string' => "Độ dài email tối đa 255 ký tự",
                'email.unique' => "Email đã tồn tại",
                'phone.numeric' => "Số điện thoại phải là số",
                'phone.unique' => "Số điện thoại này đã tồn tại",
                'phone.unique' => "Số điện thoại này đã tồn tại",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['role_id'] = $request->role;
            $data['phone'] = $request->phone;
            if ($request->has('password')) {
                $data['password'] = Hash::make($request->password);
            }
            $user =  User::where('id', '=', $id)->update($data);;
            if ($user) {
                return redirect()->back()->with('ok', 1);
            } else {
                return redirect()->back()->with('not-ok', 1);
            }
        }
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function handle_delete($id, $action, Request $request)
    {
        $this->authorize('group-4');
        if ($action == "ban") {
            User::where('id', '=', $id)->update(['ban' => 1]);
            return redirect()->back()->with('ban', 1);
        } elseif ($action == "unban") {
            User::where('id', '=', $id)->update(['ban' => 0]);
            return redirect()->back()->with('unban', 1);
        }
    }

    ////////////////////////////////////////
    public function setting_profile($id, Request $request)
    {
        if (!Gate::allows('admin-action')) {
            $this->authorize('setting-profile', $id);
        }
        $user = User::where('id', '=', $id)->firstOrFail();
        $profile = infoAdmin::where('user_id', '=', $id)->firstOrFail();
        return view('admin.users.setting-profile', compact('user', 'profile', 'id'));
    }


    // /////////////////////////////////
    //////////////////////////////////////

    public function ajax__avatar(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $ok = 0;
        $path = "admin/images/ajax/avatar/";
        $path_public = "public/admin/images/ajax/avatar/";
        $validator = Validator::make(
            $request->all(),
            [
                'avatar' => 'required|image|mimes:jpeg,png,jpg,tiff,svg|max:1000',
            ],
            [
                'avatar.required' => "Không được để trống hình ảnh chính",
                'avatar.image' => "File không phải là file ảnh",
                'avatar.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'avatar.max' => "File ảnh không vượt quá 1MB",
            ]
        );
        if ($validator->fails()) {
            $data['errors'] =  $validator->errors();
            $data['ok'] = 0;
            return response()->json($data);
        } else {
            $main_img = $request->avatar;
            $n_main = $main_img->getClientOriginalName();
            if (file_exists($path_public . $n_main)) {
                $filename = pathinfo($n_main, PATHINFO_FILENAME);
                $ext = $main_img->getClientOriginalExtension();
                $n_main = $filename . '(1)' . '.' . $ext;
                $i = 1;
                while (file_exists($path_public . $n_main)) {
                    $n_main = $filename . '(' . $i . ')' . '.' . $ext;
                    $i++;
                }
            }
            $save_main = url($path_public . $n_main);
            $main_img->move($path_public, $n_main);
            $data['img'] = $save_main;
            $data['ok'] = 1;
            $data['unlink'] = $path_public . $n_main;
            return response()->json($data);
        }
    }

    ////////////////////////////////////////
    public function ajax__delete__avatar(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        unlink($request->path);
        $data['pong'] = $request->path;
        return response()->json($data);
    }

    //  //////////////////////////////////


    ////////////////////////////////////////

    public function save_setting_profile($id, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'phone' => 'required|numeric|unique:users,phone,'.$id,
                'address_1' => 'required',
                'city' => 'required',
                'dist' => 'required',
                'ward' => 'required',
            ],
            [
                'name.required' => "Không được để trống tên",
                'address_1.required' => "Không được để trống địa chỉ chính",
                'city.required' => "Chưa chọn thành phố",
                'dist.required' => "Chưa chọn quận/huyện",
                'ward.required' => "Chưa chọn phường/xã",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            if ($request->has('avatar')) {
                $path = "admin/images/avatar/";
                $path_public = "public/admin/images/avatar/";
                $sub_img = $request->avatar;
                $n_sub = $sub_img->getClientOriginalName();
                if (file_exists($path_public .  $n_sub)) {
                    $filename2 = pathinfo($n_sub, PATHINFO_FILENAME);
                    $ext2 = $sub_img->getClientOriginalExtension();
                    $n_sub = $filename2 . '(1)' . '.' . $ext2;
                    $k = 1;
                    while (file_exists($path_public . $n_sub)) {
                        $n_sub = $filename2 . '(' . $k . ')' . '.' . $ext2;
                        $k++;
                    }
                }
                $save_sub = $path . $n_sub;
                $sub_img->move($path_public, $n_sub);
                $data_update_user['avatar'] = $save_sub;
            }
            $data_update_user['name'] = $request->name;
            $data_update_user['phone'] = $request->phone;
            $data_update['address_1'] = $request->address_1;
            $data_update['city'] = $request->city;
            $data_update['d'] = $request->dist;
            $data_update['w'] = $request->ward;
            $data_update['facebook'] = $request->facebook;
            $data_update['zalo'] = $request->zalo;
            $data_update['linkedIn'] = $request->linkedIn;
            $data_update['instagram'] = $request->instagram;
            $data_update['github'] = $request->github;
            $data_update['twitter'] = $request->twitter;
            $data_update['biography'] = $request->biography;
            User::where('id', '=', $id)->update($data_update_user);
            Products::where('id' , '=' , $id)->update(['author' => $data_update_user['name']]);
            Blogs::where('id' , '=' , $id)->update(['author' => $data_update_user['name']]);
            infoAdmin::where('user_id', '=', $id)->update($data_update);
            return redirect()->back()->with('ok', 1);
        }
    }

    ////////////////////////////////////////
}
