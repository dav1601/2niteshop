<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Blogs;
use App\Models\Orders;
use App\Models\Address;
use App\Models\Products;
use App\Repositories\FileInterface;
use Illuminate\Http\Request;
use App\Repositories\UserInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClientUserController extends Controller
{
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    ////////////////////////////////////////

    public function profile(Request $request)
    {
        return view('client.user.profile');
    }

    ////////////////////////////////////////
    public function purchase(Request $request)
    {
        if ($request->has('type')) {
            $type = $request->type;
        } else {
            $type = 0;
        }

        $origin = route('purchase');
        return view('client.user.purchase', compact('type', 'origin'));
    }
    ////////////////////////////////////////
    //////////////////////////////////////

    public function ajax__order(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $act = $request->act;
        $ok = 1;
        $type = $request->type;
        if ($act == "cancel") {
            $id = $request->id;
            Orders::where('id', '=', $id)->update([
                'status' => 4
            ]);
            $ok = 2;
        }
        $output .= view('components.client.account.purchase.layout', compact('type'));
        $data['html'] = $output;
        $data['ok'] = $ok;
        return response()->json($data);
    }

    ////////////////////////////////////////


    //////////////////////////////////////

    public function ajax__order_search(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $kw = $request->kw;
        $orders_all = new Orders();
        if ($kw != null) {
            $orders_all = $orders_all->where('id', '=', $kw);
        }
        $orders_all = $orders_all->orderBy('id', 'DESC')->where('users_id', '=', Auth::id())->get();
        if (count($orders_all) > 0) {
            $type = 0;
            foreach ($orders_all as $item) {
                $output .= view('components.client.account.purchase.item', compact('item', 'type'));
            }
        } else {
            $output .= view('components.empty.nodata');
        }
        $data['html'] = $output;
        return response()->json($data);
    }

    ////////////////////////////////////////

    public function hanle_edit_profile($id, Request $request , FileInterface $file )
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'phone' => 'required|numeric|unique:users,phone,' . $id,
                'avatar' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:1000',
            ],
            [
                'name.required' => "Kh??ng ???????c ????? Tr???ng T??n",
                'name.string' => "T??n ph???i l?? 1 chu???i k?? t???",
                'phone.unique' => "S??? ??i???n tho???i n??y ???? t???n t???i",
                'phone.required' => "B???n ch??a ??i???n s??? ??i???n tho???i",
                'phone.numeric' => "B???t bu???c l?? 1 chu???i c??c S???",
                'avatar.image' => "File kh??ng ph???i l?? file ???nh",
                'avatar.mimes' => "???nh sai ?????nh d???ng c??c ??u??i ???nh cho ph??p : jpeg,png,jpg,tiff,svg",
                'avatar.max' => "File ???nh kh??ng v?????t qu?? 1000kb",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $user = User::where('id', '=' , $id)->first();
            $data['name'] = $request->name;
            $data['phone'] = $request->phone;
            if ($request->has('avatar')) {
                if($user->avatar != NULL)
                unlink("public/".$user->avatar);
                $path = "admin/images/avatar/";
                $data['avatar'] = $file->storeFileImg($request->avatar, $path);
            }
            User::where('id', '=', $id)->update($data);
            if (Auth::user()->role_id <= 3) {
                Products::where('id', '=', $id)->update(['author' => $data['name']]);
                Blogs::where('id', '=', $id)->update(['author' => $data['name']]);
            }
            return redirect()->back()->with('ok', "1");
        }
    }

    ////////////////////////////////////////
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

    public function address(Request $request)
    {
        $user_address =  User::find(Auth::id())->address;
        return view('client.user.address', compact('user_address'));
    }

    ////////////////////////////////////////
    //////////////////////////////////////

    public function ajax__address(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $ok = 0;
        $output_2 = '';
        $output_rs_form_addAddress = '';
        if ($request->act == "delete") {
            if (Address::where('id', '=',  $request->id)->delete()) {
                $ok = 1;
            }
        }
        if ($request->act == "setDef") {
            Address::where('user_id', '=',  Auth::id())->update(['def' => 0]);
            Address::where('id', '=',  $request->id)->update(['def' => 1]);
            $ok = 1;
        }
        if ($request->act == "add") {
            $data_create['user_id'] = Auth::id();
            $data_create['name'] = $request->name;
            $data_create['phone'] = $request->phone;
            $data_create['prov'] = $request->prov;
            $data_create['prov_id'] = $request->prov_id;
            $data_create['dist'] = $request->dist;
            $data_create['dist_id'] = $request->dist_id;
            $data_create['ward'] = $request->ward;
            $data_create['ward_id'] = $request->ward_id;
            $data_create['detail'] = $request->detail;
            $data_create['type'] = $request->type;
            if ($request->has('def')) {
                Address::where('user_id', '=',  Auth::id())->update(['def' => 0]);
                $data_create['def'] = 1;
            }
            if (Address::create($data_create)) {
                $ok = 1;
                $output_rs_form_addAddress .= view('components.client.modal.contaddress');
                $data['rs_form'] = $output_rs_form_addAddress;
            }
        }
        if ($request->act == "update") {
            $data_update['user_id'] = Auth::id();
            $data_update['name'] = $request->name;
            $data_update['phone'] = $request->phone;
            $data_update['prov'] = $request->prov;
            $data_update['prov_id'] = $request->prov_id;
            $data_update['dist'] = $request->dist;
            $data_update['dist_id'] = $request->dist_id;
            $data_update['ward'] = $request->ward;
            $data_update['ward_id'] = $request->ward_id;
            $data_update['detail'] = $request->detail;
            $data_update['type'] = $request->type;
            if ($request->has('def')) {
                Address::where('user_id', '=',  Auth::id())->update(['def' => 0]);
                $data_update['def'] = 1;
            } else {
                $data_update['def'] = 0;
            }
            if (Address::where('id', '=', $request->id)->update($data_update)) {
                $ok = 1;
            }
        }
        if ($request->act == "data") {
            $data_edit =  Address::where('id', '=', $request->id)->first();
            $output_2 .= view('components.client.modal.contentaddress', compact('data_edit'));
        }
        $user_address =  User::find(Auth::id())->address;
        if (count($user_address) > 0) {
            foreach ($user_address as $address) {
                $output .= view('components.client.account.address.item', compact('address'));
            }
        } else {
            $output .= "Hi???n b???n ch??a c?? th??m ?????a ch??? n??o!";
        }
        $data['html'] = $output;
        $data['ok'] = $ok;
        $data['html_2']  = $output_2;
        return response()->json($data);
    }

    ////////////////////////////////////////

    // //////////////////////////////////
}
