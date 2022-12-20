<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
/**
 * @group User
 *
 * APIs for managing users
 */
class UserApiController extends Controller
{
    /**
     * GET USERS.
     * @queryParam token_api string required Example: 19aIotXOerK
     * @queryParam sort string ASC/DESC Default: DESC Example: DESC
     * @queryParam key_sort string  Default: id Example: id
     * @queryParam item_page int  Default: 10 Example: 10
     * @queryParam page int Default: all Example: 1
     * @response scenario=success
     * {
     *"page": "1",
     *"number_page": 52,
     *"count": 104,
     *"users": [
     *{
     *"id": 340,
     *"role_id": 5,
     *"name": "vuong anh 2",
     *"email": "laracast16@gmail.com",
     *"phone": "0858458464",
     *"email_verified_at": null,
     *"avatar": null,
     *"created_at": "2022-03-12T07:43:33.000000Z",
     *"updated_at": "2022-03-12T07:43:33.000000Z",
     *"provider_id": null,
     *"provider": null,
     *"ban": 0
     *},
     *{
     * "id": 339,
     *"role_id": 5,
     *"name": "vuonganh",
     *"email": "laracast@gmail.com",
     *"phone": "0868578690",
     *"email_verified_at": null,
     *"avatar": null,
     *"created_at": "2022-03-12T07:41:43.000000Z",
     *"updated_at": "2022-03-12T07:41:43.000000Z",
     *"provider_id": null,
     *"provider": null,
     *"ban": 0
     *}
     *]
     *}
     */
    public function index(Request $request)
    {
        $data = [];
        $except_role = array(1, 2, 3, 6);
        $sort =  $request->has('sort') && $request->sort != null ? $request->sort : "DESC";
        $key_sort =  $request->has('key_sort') && $request->key_sort != null ? $request->key_sort : "id";
        $item_page = $request->has('item_page') && $request->item_page != null ? $request->item_page : 10;
        if ($request->has('page') && $request->page != null) {
            $page = $request->page;
            $item_page = $item_page;
            $start = ($page - 1) * $item_page;
            $count = User::count();
            $number_page = ceil($count / $item_page);
            $data['page'] = $page;
            $data['number_page'] = $number_page;
            $data['count'] = $count;
            $users = User::whereNotIn('role_id', $except_role)->orderBy($key_sort, $sort)->offset($start)->limit($item_page)->get();
        } else {
            $users = User::whereNotIn('role_id', $except_role)->orderBy($key_sort, $sort)->get();
        }
        $data['users'] = $users;
        return response()->json($data);
    }




}
