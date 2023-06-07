<?php

namespace App\Http\Controllers;

use App\Models\AMedia;
use Illuminate\Http\Request;
use App\Http\Traits\Responser;
use App\Repositories\FileInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AvMediaController extends Controller
{
    use Responser;
    public $repoFile;
    public function __construct(FileInterface $repoFile)
    {
        $this->repoFile = $repoFile;
        $this->disk = "media";
    }
    ////////////////////////////////////////

    public function index(Request $request)
    {
        $act = $request->act;
        $res = [];
        try {
            switch ($act) {
                case 'detail':
                    $id = (int) $request->id;
                    $detail = "";
                    $file = AMedia::where('id', $id)->firstOrFail();
                    $detail .= view('components.admin.media.item.detail', ['file' => $file]);
                    $res['detail'] = $detail;
                    break;

                default:
                    # code...
                    break;
            }
            return $this->successResponse($res);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    ////////////////////////////////////////
    public function upload(Request $request)
    {
        $component = '';
        $validator = Validator::make(
            $request->all(),
            [
                "file" => "required|max:10240|mimes:" . config("app.allow_ext"),
            ],
        );
        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 403);
        }
        try {
            $file = $request->file('file');
            $meta = $this->meta($file);
            $path = "test";
            $full_path = $path . "/" . $meta['file_name'];
            $i = 1;
            $name = pathinfo($meta['file_name'], PATHINFO_FILENAME);
            while (Storage::disk($this->disk)->exists($full_path)) {
                $name = $name . "-" . $i;
                $meta['file_name'] = $name . "." . $meta['mime_type'];
                $full_path = $path . "/" . $meta['file_name'];
                $i++;
            }
            $resFile =  Storage::disk($this->disk)->putFileAs(
                $path,
                $file,
                $meta['file_name']
            );
            $create['name'] = $name;
            $create['alt'] = $name;
            $create['path'] = $resFile;
            $create = array_merge($create, $meta);
            $created = AMedia::create($create);
            $res['uploaded'] = true;
            $res['media'] = $created;
            $component .= view('components.admin.media.item.image', ['image' => $created]);
            $res['component'] = $component;
            return $this->successResponse($res);
        } catch (\Exception $e) {
            if ($resFile) {
                Storage::disk($this->disk)->delete($resFile);
            }
            return $this->errorResponse($e->getMessage(), 500);
        }

        return response()->json(['success' => 'Successfully uploaded.']);
    }
    protected function meta($file): array
    {
        $meta = [];
        if ($file) {
            $meta['size'] = $file->getSize();
            $meta['file_name'] = $file->getClientOriginalName();
            $meta['mime_type'] = $file->getClientOriginalExtension();
        }
        return $meta;
    }
    ////////////////////////////////////////

    public function update(Request $request)
    {
        return $this->successResponse($request->all());
    }

    ////////////////////////////////////////
}
