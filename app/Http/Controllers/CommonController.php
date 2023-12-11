<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\Responser;

class CommonController extends Controller
{
    use Responser;
    public function __construct()
    {
    }
    // ANCHOR render_options_address  //////////////////////////////////////////////////////
    public function render_options_address(Request $request)
    {
        $type = $request->type;
        $parent_id = (int) $request->parent_id;
        $html = "";
        try {
            switch ($type) {
                case 'ward':
                    $list = findCacheAddress($parent_id, "ward");
                    $msg = "Chọn Phường/Xã";
                    break;
                case 'dist':
                    $list = findCacheAddress($parent_id, "district");
                    $msg = "Chọn Quận/Huyện";
                    break;
                default:
                    $list = [];
                    $msg = "No Select";
                    break;
            }
            if ($list) {
                $html .= ' <option value="{{ $item->_name }}" selected >' .  $msg .  '</option>';
                foreach ($list as $item) {
                    $html .= view("components.forms.address.option", ['item' => $item]);
                }
            }
            $this->response['html'] = $html;
            return $this->successResponse($this->response);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
    //////////////////////////////////////////////////////
}

