<?php

namespace App\Http\Controllers;

use App\Http\Traits\AvFileManager;
use App\Http\Traits\Responser;
use App\Models\User;
use App\Models\Blogs;
use App\Models\Orders;
use App\Models\Address;
use App\Models\Products;
use App\Repositories\FileInterface;
use Illuminate\Http\Request;
use App\Repositories\UserInterface;
use App\Repositories\VaEventInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClientUserController extends Controller
{
    use Responser, AvFileManager;
    public $user;
    public $file;
    public function __construct(UserInterface $user, FileInterface $file)
    {
        $this->user = $user;
        $this->file = $file;
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

    public function ajax__order_search(Request $request, VaEventInterface $vaev)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $act = $request->act;
        $kw = $request->id ? $request->id : null;
        $type = $request->type ? $request->type : 0;
        if ($act == "cancel") {
            $id = (int) $request->ida;
            Orders::where('users_id', Auth::id())->where('id', $id)->update(['status' => 4]);
            $vaev->admin_update_order($id);
        }
        $output .= view('components.cart.purchase.content', compact('type', 'kw'));
        $data['kw'] = $kw;
        $data['html'] = $output;
        return response()->json($data);
    }

    ////////////////////////////////////////

    public function hanle_edit_profile($id, Request $request, FileInterface $file)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'phone' => 'required|numeric|unique:users,phone,' . $id,
                'avatar' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:1000',
            ],

        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $user = User::where('id', '=', $id)->first();
            $data['name'] = $request->name;
            $data['phone'] = $request->phone;
            if ($request->has('avatar')) {
                if ($user->avatar != NULL)
                    $file->deleteFile($user->avatar, "public");
                $data['avatar'] = $file->storeFileImg($request->avatar, "avatar", "public");
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



    //  //////////////////////////////////
    ////////////////////////////////////////

    public function address(Request $request)
    {
        $user_address =  User::find(Auth::id())->address;
        return view('client.user.address', compact('user_address'));
    }

    ////////////////////////////////////////
    //////////////////////////////////////
    // ANCHOR ajax address //////////////////////////////////////////////////////
    public function ajax__address(Request $request)
    {
        $output = '';
        $data_form = [];
        $html_content_address = '';
        $output_rs_form_addAddress = '';
        $action = $request->act;
        $fromRoute = $request->has("route") ? $request->route : "";
        if ($action == "data-address") {
            $address_data =  Address::where('id', '=', $request->id)->first();
            $html_content_address .= view('components.client.modal.contentaddress', ["address" => $address_data]);
        }
        if ($action == "delete") {
            try {
                Address::where('id', "=", $request->id)->delete();
            } catch (\Exception $e) {
                return $this->errorResponse($e->getMessage());
            }
        }
        if ($action == "set-def-address") {
            try {
                Address::where('user_id', '=',  Auth::id())->update(['def' => 0]);
                Address::where('id', '=',  $request->id)->update(['def' => 1]);
            } catch (\Exception $e) {
                return $this->errorResponse($e->getMessage());
            }
        }

        if ($action === "update" || $action === "add") {
            $validator = Validator::make($request->all(), [
                "name" => "required|string|max:255",
                "phone" => "required|numeric|digits_between:8,20",
                "detail" => "string|max:500",
                "prov" => "required",
                "dist" => "required"
            ]);
            if ($validator->fails()) {
                return $this->validatorFailResponse($validator);
            }
            $data_form['user_id'] = Auth::id();
            $data_form['name'] = $request->name;
            $data_form['phone'] = $request->phone;
            $data_form['prov'] = $request->prov;
            $data_form['prov_id'] = $request->prov_id;
            $data_form['dist'] = $request->dist;
            $data_form['dist_id'] = $request->dist_id;
            $data_form['ward'] = $request->ward;
            $data_form['ward_id'] = $request->ward_id;
            $data_form['detail'] = $request->detail;
            $data_form['type'] = $request->type;
            $data_create['def'] = $request->has("def");
            switch ($action) {
                case 'add':
                    try {
                        $created = Address::create($data_form);
                        if ($data_create['def']) {
                            Address::where('user_id', '=',  Auth::id())->where("id", "!=", $created->id)->update(['def' => 0]);
                        }
                    } catch (\Exception $e) {
                        return $this->errorResponse($e->getMessage());
                    }
                    break;
                case 'update':
                    try {
                        $id = $request->id;
                        Address::where("id", $id)->update($data_form);
                        if ($data_create['def']) {
                            Address::where('user_id', '=',  Auth::id())->where("id", "!=", $id)->update(['def' => 0]);
                        }
                    } catch (\Exception $e) {
                        return $this->errorResponse($e->getMessage());
                    }
                    break;
                default:
                    # code...
                    break;
            }
        }
        $user_address =  Auth::user()->address;
        if (count($user_address) > 0) {
            if ($fromRoute !== "checkout") {
                foreach ($user_address as $address) {
                    $output .= view('components.client.account.address.item', compact('address'));
                }
            } else {
                $output .= view("components.client.checkout.address.radio", ['user_address' => $user_address]);
            }
        } else {
            $output .= "Hiện bạn chưa có thêm địa chỉ nào!";
        }
        $response['list_item_address'] = $output;
        $response['html_content_address'] = $html_content_address;
        $request['form_clear'] = "" . view('components.client.modal.contentaddress');
        return $this->successResponse($response);
    }

    ////////////////////////////////////////
    // ANCHOR update_profile  //////////////////////////////////////////////////////
    public function update_profile(Request $request)
    {
        return $request->all();
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "phone" => "required|numeric|digits_between:8,20|unique:users,phone," . $request->id,
            "avatar" => "image|mimes:jpeg,png,jpg,tiff,svg|max:1000"

        ]);
        if ($validator->fails()) {
            return $this->validatorFailResponse($validator);
        }
        $data_form['name'] = $request->name;
        $data_form['phone'] = $request->phone;
        if ($request->has("avatar") && $request->avatar) {
        }
    }
    //////////////////////////////////////////////////////

    // //////////////////////////////////
}
