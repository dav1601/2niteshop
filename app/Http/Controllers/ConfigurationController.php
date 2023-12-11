<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Traits\Responser;
use Illuminate\Support\Facades\Validator;

class ConfigurationController extends Controller
{
    use Responser;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['active' => 'configuration']);
            return $next($request);
        });
    }
    // ANCHOR general  //////////////////////////////////////////////////////
    public function general(Request $request)
    {
        $configuration = Config::all()->groupBy("type");
        return view("admin/configuration/general", compact("configuration"));
    }
    //////////////////////////////////////////////////////
    // ANCHOR general_actions  //////////////////////////////////////////////////////
    public function general_actions(Request $request)
    {
        $array = $request->all();
        $action = $request->action;
        unset($array['_token'], $array['action']);
        switch ($action) {
            case 'update':
                return $request->all();
                try {
                    foreach ($array as $key => $value) {
                        Config::where("name", $key)->update(['value' => $value]);
                    }
                    return $this->successResponse(["updated" => true]);
                } catch (\Exception $e) {
                    return $this->errorResponse("Configuration update failed", 500, ['err' => $e->getMessage()]);
                }
                break;
            case "create":
                return $request->all();
                $validator = Validator::make($request->all(), [
                    "name" => "required", "value" => 'required', "type" => "required"
                ]);
                if ($validator->fails()) {
                    return $this->validatorFailResponse($validator);
                }

                try {
                    $data["name"] = $request->name;
                    $data['value'] = $request->value;
                    $data['type'] = $request->type;
                    $created = Config::create($data);
                    return $this->successResponse(["created" => $created]);
                } catch (\Exception $e) {
                    return $this->errorResponse("created failed", 500, ['err' => $e->getMessage()]);
                }
                break;

            default:
                return $this->errorResponse("invalid action", 500);
                break;
        }
    }
    //////////////////////////////////////////////////////
}
