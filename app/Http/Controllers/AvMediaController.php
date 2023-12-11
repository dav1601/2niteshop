<?php

namespace App\Http\Controllers;

use App\Http\Traits\AvFileManager;
use App\Models\AMedia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Traits\Responser;
use App\Repositories\FileInterface;
use App\Repositories\ModelInterface;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Validator;
use App\View\Components\admin\layout\response;

class AvMediaController extends Controller
{
    use Responser, AvFileManager;
    public $repoFile;
    public $disk;
    public $storage;
    public function __construct(FileInterface $repoFile)
    {
        $this->repoFile = $repoFile;
        $this->disk = "media";
        $this->storage = Storage::disk("media");
    }

    // ANCHOR index //////////////////////////////////////////////////////
    public function index(Request $request, ModelInterface $model)
    {
        $act = $request->act;
        $res = [];
        $res['media'] = "";
        $page = $request->has('page') ? (int) $request->get('page') : 1;
        $itemsPage = (int) $request->itemsPage;

        try {
            $collections = AMedia::select('collection')
                ->whereNotNull('collection')
                ->distinct()
                ->get()
                ->pluck('collection')
                ->toArray();
            $res['collections'] = $collections;
            switch ($act) {
                case 'detail':
                    $uuid =  $request->uuid;
                    $detail = "";
                    $file = AMedia::where('uuid', $uuid)->firstOrFail();
                    $detail .= view('components.admin.media.item.detail', ['file' => $file]);
                    $res['detail'] = $detail;
                    break;

                default:
                    $query = new AMedia();
                    $mediaModel = $request->model;
                    $collection = $request->collection;
                    $search = $request->search;

                    if ($mediaModel != "all") {
                        $query = $query->where("model", "LIKE", $mediaModel);
                    }
                    if ($collection != "all") {
                        $query = $query->where("collection", "LIKE", $collection);
                    }
                    if ($search) {
                        $query = $query->where("name", "LIKE", '%' . $search . '%')->orWhere("file_name", "LIKE", '%' . $search . '%');
                    }

                    $media = $model->pagination($query, ['id', 'desc'], $page,  $itemsPage, []);
                    $selected = collect(json_decode($request->selected, true))->pluck('id')->toArray();
                    $activeMedia = $request->activeMedia;
                    if (count($media->data) > 0) {
                        foreach ($media->data as  $file) {
                            $active = $file->uuid === $activeMedia;
                            $select = in_array($file->id, $selected);
                            $res['media'] .= view("components.admin.media.item.image", ['image' => $file, 'selected' => $select, 'active' => $active]);
                        }
                    }
                    $res['number_page'] = (int) $media->number_page;
                    $res['page'] = $page;
                    $res['all'] = $media->all;
                    $res['count'] = $res['page'] >= $res['number_page']   ? $res['all']  : (int) $media->count * $page;
                    break;
            }
            return $this->successResponse($res);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    // ANCHOR upload //////////////////////////////////////////////////////
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
            $model = $request->model ? $request->model : null;
            $collection = $request->collection ? $request->collection : null;
            $file = $request->file('file');
            $resFile = $this->saveFile($file, Str::lower($model), $this->disk);
            $create['model'] = $model;
            $create['collection'] = $collection;
            $create['name'] = $resFile['name'];
            $create['alt'] = $resFile['name'];
            $create['path'] = $resFile['path'];
            $create = array_merge($create, $resFile['meta']);
            $created = AMedia::create($create);
            $res['uploaded'] = true;
            $res['media'] = $created;
            $component .= view('components.admin.media.item.image', ['image' => $created]);
            $res['component'] = $component;
            $res['path'] = $created->full_path;
            return $this->successResponse($res);
        } catch (\Exception $e) {
            if ($resFile['path']) {
                Storage::disk($this->disk)->delete($resFile['path']);
            }
            return $this->errorResponse(['error' => $e->getMessage(), 'resFile' => $resFile]);
        }

        return response()->json(['success' => 'Successfully uploaded.']);
    }
    // ANCHOR meta //////////////////////////////////////////////////////

    // ANCHOR delete media //////////////////////////////////////////////////////

    function delete($uuid, Request $request)
    {
        try {
            $media = AMedia::where('uuid', $uuid)->firstOrFail();
            $deleted = $this->storage->delete($media->path);
            if ($deleted) {
                AMedia::where('uuid', $uuid)->delete();
            }
            return $this->successResponse([], "deleted success");
        } catch (\Exception $e) {
            $this->errorResponse($e->getMessage());
        }
    }
    // ANCHOR update media //////////////////////////////////////////////////////

    public function update($id, Request $request)

    {
        $res = [];
        $request->request->remove("_token");
        try {
            $updated = AMedia::where('uuid', $id)->update($request->all());
            $res['collect'] = $request->collection;
            $res['updated'] = $updated;
            return $this->successResponse($res);
        } catch (\Exception $e) {
            $this->errorResponse($e->getMessage());
        }
    }
    // ANCHOR download //////////////////////////////////////////////////////
    function download(Request $request)
    {
        $uuid = $request->uuid;
        $file = AMedia::where('uuid', $uuid)->first();
        $headers = [
            "Content-Type" => "image/" . $file->mime_type
        ];
        $path = Storage::disk("media")->path($file->path);

        return response()->download($path, $file->file_name, $headers);
    }
    // ANCHOR replace //////////////////////////////////////////////////////
    function replace($uuid, Request $request)
    {
        $res = [];
        try {
            $media = AMedia::where('uuid', $uuid)->firstOrFail();
            $deleted = $this->storage->delete($media->path);
            if ($deleted) {
                $resFile = $this->saveFile($request->file('file'), $media->model, $this->disk);
                $update['name'] = $resFile['name'];
                $update['alt'] = $resFile['name'];
                $update['path'] = $resFile['file'];
                $update = array_merge($update, $resFile['meta']);
                $media->update($update);
                $media = AMedia::where('uuid', $uuid)->first();
                $res['file'] = $resFile['file'];
                $res['full_path'] = $media->full_path;
            }
            return $this->successResponse($res);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }


    // ANCHOR close class //////////////////////////////////////////////////////
}
