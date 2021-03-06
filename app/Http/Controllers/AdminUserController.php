<?php

namespace App\Http\Controllers;

use App\Models\Api\ApiAdmin;
use App\Models\User;
use App\Models\Blogs;
use App\Models\Products;
use App\Models\infoAdmin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repositories\UserInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Repositories\CustomerInterface;
use App\Repositories\FileInterface;
use App\Repositories\MailOrderInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    public function __construct(FileInterface $handle_file)
    {
        $this->middleware(function ($request, $next) {
            session(['active' => 'users']);
            return $next($request);
        });
        $this->handle_file = $handle_file;
    }
    // ///////////////////
    public function add(UserInterface $user)
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

    public function handle_add(Request $request, UserInterface $dvi_user)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string'],
                'phone' => ['required', 'string', 'min:6', 'unique:users', 'numeric'],

            ],
            [
                'name.required' => "B???n ch??a nh???p t??n",
                'name.string' => "T??n ph???i l?? 1 chu???i k?? t???",
                'name.max' => "????? d??i t???i ??a 255 k?? t???",
                'email.required' => "Kh??ng ???????c ????? tr???ng email",
                'email.string' => "Email ph???i l?? 1 chu???i k?? t???",
                'email.string' => "????? d??i email t???i ??a 255 k?? t???",
                'email.unique' => "Email ???? t???n t???i",
                'password.min' => "??t nh???t 8 k?? t???",
                'phone.numeric' => "S??? ??i???n tho???i ph???i l?? S???",
                'phone.unique' => "S??? ??i???n tho???i n??y ???? t???n t???i"

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
                if ($user->role_id <= 2) {
                    $token = $dvi_user->createApiToken($user->id);
                    $created_auth_api = ApiAdmin::create([
                        'users_id' => $user->id,
                        'token_api' => $token
                    ]);
                }
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
                'email' => 'required|string|email|unique:users,email,' . $id,
                'phone' => 'required|string|numeric|unique:users,phone,' . $id,
            ],
            [
                'name.required' => "B???n ch??a nh???p t??n",
                'name.string' => "T??n ph???i l?? 1 chu???i k?? t???",
                'name.max' => "????? d??i t???i ??a 255 k?? t???",
                'email.required' => "Kh??ng ???????c ????? tr???ng email",
                'email.string' => "Email ph???i l?? 1 chu???i k?? t???",
                'email.string' => "????? d??i email t???i ??a 255 k?? t???",
                'email.unique' => "Email ???? t???n t???i",
                'phone.numeric' => "S??? ??i???n tho???i ph???i l?? s???",
                'phone.unique' => "S??? ??i???n tho???i n??y ???? t???n t???i",
                'phone.unique' => "S??? ??i???n tho???i n??y ???? t???n t???i",
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
                'avatar.required' => "Kh??ng ???????c ????? tr???ng h??nh ???nh ch??nh",
                'avatar.image' => "File kh??ng ph???i l?? file ???nh",
                'avatar.mimes' => "???nh sai ?????nh d???ng c??c ??u??i ???nh cho ph??p : jpeg,png,jpg,tiff,svg",
                'avatar.max' => "File ???nh kh??ng v?????t qu?? 1MB",
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
                'phone' => 'required|numeric|unique:users,phone,' . $id,
                'address_1' => 'required',
                'city' => 'required',
                'dist' => 'required',
                'ward' => 'required',
            ],
            [
                'name.required' => "Kh??ng ???????c ????? tr???ng t??n",
                'address_1.required' => "Kh??ng ???????c ????? tr???ng ?????a ch??? ch??nh",
                'city.required' => "Ch??a ch???n th??nh ph???",
                'dist.required' => "Ch??a ch???n qu???n/huy???n",
                'ward.required' => "Ch??a ch???n ph?????ng/x??",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $user = User::where('id', '=', $id)->first();
            if ($request->has('avatar')) {
                if ($user->avatar != NULL)
                    unlink("public/" . $user->avatar);
                $path = "admin/images/avatar/";
                $data_update_user['avatar'] = $this->handle_file->storeFileImg($request->avatar, $path);
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
                'email.required' => "Email kh??ng ???????c ????? tr???ng",
                'email.email' => "Kh??ng ph???i ?????nh d???ng email",
                'email.exists' => "Email kh??ng t???n t???i",
            ]
        );
        if ($validator->fails()) {
            $data['errors'] = $validator->errors();
            $data['ok'] = 0;
            return response()->json($data);
        } else {
            if (!Hash::check($request->password, Auth::user()->password)) {
                $error['errors'] = "Passowrd Kh??ng Ch??nh X??c";
                $data['errors'] = collect($error);
                $data['ok'] = 0;
                return response()->json($data);
            }
            $code =  $user->generateSecurityCode();
            $created_security_code = ApiAdmin::where('users_id', Auth::id())->update(['security_code' => $code]);
            if ($created_security_code) {
                $subject = "M?? B???O V??? C???A B???N T??? H??? TH???NG 2NITE SHOP";
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
                'secode.required' => "M?? B???O V??? KH??NG ???????C ????? TR???NG",
                'secode.exists' => "M?? B???O V??? KH??NG T???N T???I",
            ]
        );
        if ($validator->fails()) {
            $data['errors'] = $validator->errors();
            $data['ok'] = 0;
            return response()->json($data);
        } else {
            $user = ApiAdmin::where('users_id', Auth::id())->where('security_code', $request->secode)->first();
            if ($user) {
                $subject = "Y??U C???U TRUY C???P API TOKEN C???A B???N T??? H??? TH???NG 2NITE SHOP";
                $to = Auth::user()->email;
                $template = 'admin.api.mail.send_security_code';
                $data_email['code'] = $user->token_api;
                $data_email['type'] = 2;
                $data_email['token_api'] = Crypt::encrypt($user->token_api);
                $data_email['security_code'] = Crypt::encrypt($user->security_code);
                $mailer->send_code($to, $subject, $template, $data_email);
            } else {
                $data['errors'] = "M?? B???O V??? KH??NG CH??NH X??C";
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
}
