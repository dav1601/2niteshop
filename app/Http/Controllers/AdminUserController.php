<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Blogs;
use App\Models\Products;
use App\Models\infoAdmin;
use Illuminate\Support\Str;
use App\Models\Api\ApiAdmin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Repositories\FileInterface;
use App\Repositories\UserInterface;
use App\Repositories\ModelInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Repositories\CustomerInterface;
use App\Repositories\MailOrderInterface;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    public $handle_file;
    public $statusResSuccess;
    public $statusResErr;
    public $statusMessage;
    public $roles;
    public function __construct(FileInterface $handle_file)
    {
        $this->middleware(function ($request, $next) {
            session(['active' => 'users']);
            return $next($request);
        });
        $this->handle_file = $handle_file;
        $this->statusResSuccess = "success";
        $this->statusResErr = "error";
        $this->statusMessage = "";
        $this->roles = Role::where('id', "!=", 1)->get();
    }
    // ///////////////////
    public function add(UserInterface $user)
    {
        $roles = $this->roles;
        return view('admin.users.add', compact('roles'));
    }
    // /////////
    // ///////////////////
    public function edit($id)
    {

        $user = User::with('roles')->where('id', '=', $id)->firstOrFail();
        $roles = $this->roles;
        $userRole = $user->roles ? collect($user->roles)->pluck('name')->toArray() : [];

        return view('admin.users.edit', compact('user', 'id', 'roles', 'userRole'));
    }
    // /////////////////////////////////////
    ////////////////////////////////////////

    public function profile($id, Request $request, UserInterface $daviUser, ModelInterface $repom)
    {
        $output = "";
        $page = $request->has('page') ? $request->page : 1;
        $user = User::with('roles')->where('id', '=', $id)->firstOrFail();
        $profile = infoAdmin::where('user_id', '=', $id)->firstOrFail();
        $item_page = config('product.item_page') / 2;
        $blogs = $repom->pagination(Blogs::where('users_id', '=', $id), ['created_at', 'DESC'], $page, $item_page, []);
        $products = $repom->pagination(Products::where('author_id', '=', $id), ['created_at', 'DESC'], $page, $item_page, []);
        $merge = $products->data;
        $activities = $merge->merge($blogs->data);
        $count = $blogs->count + $products->count;
        $number_page = $blogs->number_page + $products->number_page;
        $sorted = $activities->sortByDesc('created_at');
        if ($request->isAjax) {
            $output .= view('components.admin.profile.itemactivities', compact('sorted'));
            $data['html'] = $output;
            return response()->json($data);
        }
        return view('admin.users.profile', compact('id', 'user', 'profile', 'daviUser', 'sorted', 'number_page'));
    }

    ////////////////////////////////////////
    //////////////////////////////////////



    ////////////////////////////////////////
    // ///////////////////
    public function show_user(ModelInterface $repom)
    {
        $users = $repom->pagination(User::with('roles')->where('id', '!=', Auth::id()), null, null, null, []);
        $roles = $this->roles;
        return view('admin.users.show_user', compact('users', 'roles'));
    }
    // /////////
    public function show_user_ajax(Request $request, ModelInterface $repom)
    {
        $output = '';
        $sort = $request->sort;
        $role = $request->role == 0 ? null : (string) $request->role;
        $user = new User();
        $user->where('id', '!=', Auth::id());
        if ($role) {
            $user = $user->whereHas('roles', function ($query) use ($role) {
                $query->where('name', '=', $role);
            });
        } else {
            $user = $user->with("roles");
        }
        if ($request->phone) {
            $user = $user->where('phone', 'LIKE', '%' . $request->phone . '%');
        }
        if ($request->nameId) {
            $nameId = $request->nameId;
            $user = $user->where(function ($query) use ($nameId) {
                $query->where('name', 'LIKE', '%' . $nameId . '%')
                    ->orWhere('id', '=', $nameId)
                    ->orWhere('email', 'LIKE', '%' . $nameId . '%');
            });;
        }
        if ($request->prov) {
            $user = $user->where('provider', 'LIKE', '%' . $request->prov . '%');
        }
        $page = $request->page;
        $repoRes = $repom->pagination($user, ['id', $sort], $page, null, []);
        $users = $repoRes->data;
        $number = $repoRes->number_page;
        if ($repoRes->count > 0) {
            $output .= view('components.admin.users.table.showusers', compact('users', 'page', 'number'));
        } else {
            $output .= view('components.empty.nodata');
        }
        $data['html'] = $output;
        $data['data'] = $users;
        return response()->json($data);
    }
    ////////////////////////////////////////

    public function handle_add(Request $request, UserInterface $dvi_user)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string'],
                'phone' => ['required', 'string', 'min:6', 'unique:users', 'numeric'],
                'role' => 'required'
            ],

        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone
        ]);
        if ($user) {
            $user->assignRole($request->role);
            infoAdmin::create(['user_id' => $user->id]);
            $token = $dvi_user->createApiToken($user->id);
            ApiAdmin::create([
                'users_id' => $user->id,
                'token_api' => $token
            ]);
            return redirect()->back()->with('success', "Thêm manager thành công");
        }
        return redirect()->back()->with('error', "Thêm manager thất bại");
    }

    ////////////////////////////////////////
    public function handle_edit($id, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required', 'string', 'max:255',
                'email' => 'required|string|email|unique:users,email,' . $id,
                'phone' => 'required|string|numeric|unique:users,phone,' . $id,
                'role' => 'required'
            ],

        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            if ($request->has('password')) {
                if ($request->get('password')) {
                    $data['password'] = Hash::make($request->password);
                }
            }
            $user =  User::where('id', '=', $id)->update($data);;
            if ($user) {
                $user = User::where('id',  $id)->first();
                $user->syncRoles($request->role);
                return redirect()->back()->with('success', "Edit manager thành công");
            }
            return redirect()->back()->with('error', "Edit manager thất bại");
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
        $profile = infoAdmin::where('user_id', '=', Auth::id())->firstOrFail();
        return view('admin.users.setting-profile', compact('user', 'profile', 'id'));
    }


    // /////////////////////////////////
    //////////////////////////////////////

    public function ajax__avatar(Request $request, FileInterface $file)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $ok = 0;
        $path = "admin/images/ajax/avatar/";
        $path_public = "admin/images/ajax/avatar/";
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
            $path = "client/avatar";
            $save_main = $file->storeFileImg($main_img, $path);
            // $n_main = $main_img->getClientOriginalName();
            // if (file_exists($path_public . $n_main)) {
            //     $filename = pathinfo($n_main, PATHINFO_FILENAME);
            //     $ext = $main_img->getClientOriginalExtension();
            //     $n_main = $filename . '(1)' . '.' . $ext;
            //     $i = 1;
            //     while (file_exists($path_public . $n_main)) {
            //         $n_main = $filename . '(' . $i . ')' . '.' . $ext;
            //         $i++;
            //     }
            // }
            // $save_main = url($path_public . $n_main);
            // $main_img->move($path_public, $n_main);
            $data['img'] = $save_main;
            $data['ok'] = 1;
            $data['unlink'] = $save_main;
            return response()->json($data);
        }
    }

    ////////////////////////////////////////
    public function ajax__delete__avatar(Request $request, FileInterface $file)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $file->deleteFile($request->path);
        $data['pong'] = $request->path;
        return response()->json($data);
    }

    //  //////////////////////////////////


    ////////////////////////////////////////

    public function save_setting_profile($id, Request $request, FileInterface $file)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'phone' => 'required|numeric|unique:users,phone,' . $id,
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
            $user = User::where('id', '=', $id)->first();
            if ($request->has('avatar')) {
                if ($user->avatar != NULL)
                    $file->deleteFile("" . $user->avatar);
                $path = "admin/images/avatar/";
                $data_update_user['avatar'] = $file->storeFileImg($request->avatar, $path);
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
            Products::where('id', '=', $id)->update(['author' => $data_update_user['name']]);
            Blogs::where('id', '=', $id)->update(['author' => $data_update_user['name']]);
            infoAdmin::where('user_id', '=', $id)->update($data_update);
            return redirect()->back()->with('ok', 1);
        }
    }

    ////////////////////////////////////////
    //////////////////////////////////////

    public function get_security_code(Request $request, UserInterface $user, MailOrderInterface $mailer)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $ok = 1;
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|exists:users,email',
                'password' => 'required',
            ],
            [
                'email.required' => "Email không được để trống",
                'email.email' => "Không phải định dạng email",
                'email.exists' => "Email không tồn tại",
            ]
        );
        if ($validator->fails()) {
            $data['errors'] = $validator->errors();
            $data['ok'] = 0;
            return response()->json($data);
        } else {
            if (!Hash::check($request->password, Auth::user()->password)) {
                $error['errors'] = "Passowrd Không Chính Xác";
                $data['errors'] = collect($error);
                $data['ok'] = 0;
                return response()->json($data);
            }
            $code =  $user->generateSecurityCode();
            $created_security_code = ApiAdmin::where('users_id', Auth::id())->update(['security_code' => $code]);
            if ($created_security_code) {
                $subject = "MÃ BẢO VỆ CỦA BẠN TỪ HỆ THỐNG 2NITE SHOP";
                $to = Auth::user()->email;
                $template = 'admin.api.mail.send_security_code';
                $data_email['code'] = $code;
                $data_email['type'] = 1;
                $mailer->send_code($to, $subject, $template, $data_email);
            }
        }
        $data['ok'] = $ok;
        return response()->json($data);
    }

    ////////////////////////////////////////
    public function get_api_token(Request $request, UserInterface $user, MailOrderInterface $mailer)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $ok = 1;
        $validator = Validator::make(
            $request->all(),
            [
                'secode' => 'required|exists:auth_api_admin,security_code',
            ],
            [
                'secode.required' => "MÃ BẢO VỆ KHÔNG ĐƯỢC ĐỂ TRỐNG",
                'secode.exists' => "MÃ BẢO VỆ KHÔNG TỒN TẠI",
            ]
        );
        if ($validator->fails()) {
            $data['errors'] = $validator->errors();
            $data['ok'] = 0;
            return response()->json($data);
        } else {
            $user = ApiAdmin::where('users_id', Auth::id())->where('security_code', $request->secode)->first();
            if ($user) {
                $subject = "YÊU CẦU TRUY CẬP API TOKEN CỦA BẠN TỪ HỆ THỐNG 2NITE SHOP";
                $to = Auth::user()->email;
                $template = 'admin.api.mail.send_security_code';
                $data_email['code'] = $user->token_api;
                $data_email['type'] = 2;
                $data_email['token_api'] = Crypt::encrypt($user->token_api);
                $data_email['security_code'] = Crypt::encrypt($user->security_code);
                $mailer->send_code($to, $subject, $template, $data_email);
            } else {
                $data['errors'] = "Mã BẢO VỆ KHÔNG CHÍNH XÁC";
                $data['ok'] = 0;
                return response()->json($data);
            }
        }
        $data['ok'] = $ok;
        return response()->json($data);
    }
    ////////////////////////////////////////

    public function identity_confirmation(Request $request)
    {
        if ($request->has('token_api')) {
            $token = Crypt::decrypt($request->token_api);
        } else {
            $token = '';
        }
        if ($request->has('security_code')) {
            $secode = Crypt::decrypt($request->security_code);
        } else {
            $secode = '';
        }
        return view('admin.api.confirmation', compact('secode', 'token'));
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function handle_identity_confirmation(Request $request)
    {
        $token = $request->api_token;
        $secode = $request->seocode;
        if (ApiAdmin::where('token_api', $token)->where('security_code', $secode)->first()) {
            ApiAdmin::where('token_api', $token)->where('security_code', $secode)->update(['requested_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
            $requested_at = ApiAdmin::where('token_api', $token)->where('security_code', $secode)->first()->requested_at;
            return redirect()->route('scribe', ['token_api' => Crypt::encrypt($token), 'security_code' => Crypt::encrypt($secode), 'rq_at' => $requested_at]);
        } else {
            return redirect()->back()->with('error', 1);
        }
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function add_permissions(Request $request)
    {
        $permissions = Permission::with('roles')->get();
        return view('admin.users.decentralization.add_permissons', compact('permissions'));
    }

    ////////////////////////////////////////
    public function add_roles(Request $request)
    {
        $roles = Role::with('permissions')->where('id', '!=', 1)->get();
        $permissions = Permission::where('name', "!=", "root")->get();
        return view('admin.users.decentralization.add_roles', compact('roles', 'permissions'));
    }
    ////////////////////////////////////////
    public function edit_roles($id, Request $request)
    {
        $roles = Role::with('permissions')->whereNotIn('id', [1, $id])->get();
        $currRole = Role::with('permissions')->where('id', $id)->first();
        $permissions = Permission::where('name', "!=", "root")->get();
        $selected = collect($currRole->permissions)->pluck("name")->toArray();
        return view('admin.users.decentralization.edit_roles', compact('roles', 'permissions', 'currRole', 'selected'));
    }
    public function handle_permissions(Request $request)
    {
        $type = $request->type;
        switch ($type) {
            case 'create':
                $validator = Validator::make(
                    $request->all(),
                    [
                        'permissons' => 'required',
                    ],

                );
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator);
                }
                $permissions = explode(',', $request->permissons);
                foreach ($permissions as $permission) {
                    Permission::firstOrCreate(['name' => trim($permission)]);
                }
                return redirect()->back()->with($this->statusResSuccess, "Tạo quyền thành công");
            case "delete":
                $id = (int) $request->id;
                $deleted = Permission::where('id', $id)->delete();
                return redirect()->back()->with($deleted ? $this->statusResSuccess : $this->statusResErr, $deleted ? "Xoa quyen thành công" : "Xoa quyen that bai");


            default:
                return redirect()->back();
                break;
        }
    }

    ////////////////////////////////////////
    public function handle_roles(Request $request)
    {
        $type = $request->type;
        switch ($type) {
            case 'create':
                $validator = Validator::make(
                    $request->all(),
                    [
                        'role' => 'required|unique:roles,name',
                    ],

                );
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator);
                }
                $permissions = $request->permissions;
                $role = Role::create(['name' => trim($request->role)]);
                $role->syncPermissions($permissions);
                return redirect()->back()->with($this->statusResSuccess, "Tạo quyền thành công");

            case "edit":
                $permissions = $request->permissions;
                $role = Role::where('id', $request->id)->first();
                $role->syncPermissions($permissions);
                return redirect()->back()->with($this->statusResSuccess, "Success Updated Permissions For Role");
                break;
            case "delete":
                $id = (int) $request->id;
                $deleted = Role::where('id', $id)->delete();
                return redirect()->back()->with($deleted ? $this->statusResSuccess : $this->statusResErr, $deleted ? "Xoa role thành công" : "Xoa role that bai");
            case "ajax-include-permissions":
                $renderPermissions = "";
                $permissions = Permission::where('name', "!=", "root")->get();
                $selected = $request->has('selected') ? $request->get('selected') : [];
                $renderPermissions .= view('components.admin.users.permissions', ['selected' => $selected, 'permissions' => $permissions]);
                $data['rPerm'] = $renderPermissions;
                return response()->json(['data' => $data], 200);
            default:
                return redirect()->back();
                break;
        }
    }
    ///////////////////////////////////////
}
