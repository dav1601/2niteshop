<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Traits\Responser;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Repositories\FileInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminAjaxCategoryController extends Controller
{
    use Responser;
    public function handleImage(Request $request, FileInterface $file)
    {
        $id = $request->id;
        $type = $request->type;
        $act = $request->act;
        $message = "";
        $res = [];
        try {
            $query = Category::where('id', $id);
            $category = Category::select($type)->where('id', $id)->firstOrFail();
            $update[$type] = NUll;
            switch ($act) {
                case 'clear':
                    $deleted = $file->deleteFile($category[$type], "public");
                    if ($deleted) {
                        $query->update($update);
                        $res['image'] = config('app.no_image');
                        $res['deleted'] = true;
                        $message = "deleted successly";
                    }

                    break;
                case 'upload':
                    $image = $request->image;
                    $path = "category/" . $type;
                    $save = $file->storeFileImg($image, $path, "public");
                    if ($save) {
                        $update[$type] = $save['path'];
                        $query->update($update);
                        $res['image'] = urlImg($save);
                        $res['uploaded'] = true;
                        $message = "uploaded image successly";
                    } else {
                        $message = "uploaded image failed";
                        $res['image'] = config('app.no_image');
                    }
                    break;
                default:
                    return   $this->errorResponse("No found action");
            }
            return $this->successResponse($res, $message);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
