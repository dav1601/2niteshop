<?php

namespace App\Http\Controllers;

use App\Http\Traits\Responser;
use stdClass;
use App\Models\User;
use App\Models\Blogs;
use App\Models\Policy;
use App\Models\CatGame;
use App\Models\Category;
use App\Models\Producer;
use App\Models\Products;
use App\Models\Insurance;
use App\Models\gllProducts;
use App\Models\PrdRelaBlog;
use App\Models\typeProduct;
use App\Models\PrdRelaBlock;
use App\Models\RelatedPosts;
use Illuminate\Http\Request;
use App\Models\RelatedProducts;
use App\Repositories\AdminPrdRepo;
use App\Repositories\ModelInterface;
use App\Models\bundled_accessory_cat;
use App\Repositories\AdminPrdInterface;
use App\Repositories\FileInterface;


class AdminAjaxProductController extends Controller
{
    use Responser;
    //////////////////////////////////////
    private $error = 0;
    private $data = array();
    private $html = '';
    public $repoPrd;
    public $resCode = 200;
    public $query;
    public function __construct(AdminPrdInterface $repo_prd)
    {
        $this->repoPrd = $repo_prd;
        $this->query = new Products();
    }

    ////////////////////////////////////////

    //////////////////////////////////////

    public function handle_load(Request $request, ModelInterface $repom)
    {

        $pagination = '';
        $output = '';
        $res = $this->repoPrd->getAll($request->all(), [], ["img_second", "img_first"]);

        if ($res['status'] === 0) {
            return $this->errorResponse($res['message']);
        }
        $products = $res['data'];

        if ($products->count > 0) {
            foreach ($products->data as $prd) {
                $output .= view('components.admin.product.item', compact('prd'));
            }
        } else {
            $output .= view('components.empty.nodata');
        }
        $pagination .= view('components.pagination', ['page' => $products->page, 'number_page' => $products->number_page, 'classWp' => "justify-content-center mt-2"]);

        $data['html'] = $output;
        $data['page'] = $pagination;
        return $this->successResponse($data, null);
    }

    ////////////////////////////////////////

    // ////////////////////////////////////// end load product

    // ANCHOR handle gallery //////////////////////////////////////////////////////
    public function handle_gallery(Request $request, FileInterface $file)
    {
        $res = [];
        $res['image'] = "";
        $act = $request->act;
        $type = $request->type;
        $res['deleted'] = false;
        $res['updated'] = false;
        $productId = (int) $request->productId;
        $index = $request->has("index") ? (int) $request->index : null;
        $product = Products::where('id', $productId);
        $gallery = gllProducts::where("products_id", $productId)->where("index", $index);
        try {
            switch ($act) {

                case 'delete-gallery':
                    try {
                        gllProducts::where('index', $request->index)->where('products_id', $request->id)->delete();
                        $res['deleted'] = true;
                    } catch (\Exception $e) {
                        $this->resCode = 500;
                    }
                    break;
                case 'add-gallery':
                    $item = collect(json_decode($request->item))->toArray();
                    $index = (int) $request->index;
                    $id = (int) $request->id;
                    $isEdit = $request->isEdit === "true";
                    if ($isEdit) {
                        $created = gllProducts::create(['products_id' => $id, "media_80" => null, 'media_700' => null, 'index' => $index]);
                        $item['id'] = $created->id;
                        $props['id'] = $created->id;
                    }
                    $res['html'] = "";
                    $props['key'] = $index;
                    $props["productact"] = $isEdit ? "edit"  : 'add';
                    $props['large'] = "";
                    $props['thumb']  = "";
                    $res['html'] .= view('components.admin.product.gallery.item', $props);

                    break;
                case 'sort':
                    foreach (explode(",", $request->sort) as $index => $id) {
                        gllProducts::where('id', (int) $id)->update(['index' => $index]);
                    }
                    break;
                case "delete":
                    switch ($type) {

                        case "single":
                            $res['deleted'] =  $product->update([$request->get("name") => NULL]);
                            break;
                        case "gallery":
                            $res['deleted'] = $gallery->update([$request->get("name"), NULL]);

                            break;
                        default:
                            # code...
                            break;
                    }
                    break;
                case "update":
                    $media = $request->media ? explode(",", $request->media) : [];
                    $media_id = count($media) > 0 ? $media[0] : NULL;
                    switch ($type) {

                        case "single":
                            $res['updated'] =  $product->update([$request->get("name") => $media_id]);
                            break;
                        case "gallery":
                            $res['updated'] = $gallery->update([$request->get("name") => $media_id]);
                            break;
                        default:
                            # code...
                            break;
                    }
                    break;
                default:
                    # code...
                    break;
            }
            return $this->successResponse($res);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    ////////////////////////////////////////

    ////////////////////////////////////////

    //////////////////////////////////////


    //////////////////////////////////////
    public function loadBlock($relaId = 0, $relaName = "", $relaKey = "", $modelRela = "")
    {
        $selected = [];
        $relaKey = str_replace("_id", "", $relaKey);
        $getRela = $modelRela::where($relaName, $relaId)
            ->with([$relaKey => function ($query) {
                $query->select('id');
            }])
            ->get();
        if ($getRela) {
            foreach ($getRela as $rela) {
                $selected[] = collect($rela)->get($relaKey)->id;
            }
        }

        return $selected;
    }
    public function handle_model_rela(Request $request, ModelInterface $vam)
    {
        $relaId = (int) $request->relaId;
        $selected = !empty($request->selected) ? array_map('intval', $request->selected) : [];
        $model = $request->model ? $request->model : "Products";
        $modelRela = $request->relaModel ? $request->relaModel : "RelatedProducts";
        $act = $request->act;
        $page = (int) $request->page;
        $relaKey = $request->relaKey . "_id";
        $relaName = $request->relaName . "_id";
        $option = json_decode($request->option);
        $html_tags = "";
        $selectedId = [];
        $m  = $model;
        $model_name = '\\App\Models\\' . $model;
        $modelRela = '\\App\Models\\' . $modelRela;
        $model = new $model_name;
        $p = "title";
        $arrayKeyName = ["Products",  "Insurance", 'Options'];
        if (in_array($m, $arrayKeyName)) {
            $p = "name";
        }

        switch ($act) {
            case  "save":
                try {
                    if (count($selected) > 0) {
                        $modelRela::whereNotIn($relaKey, $selected)->where($relaName, $relaId)->delete();
                        foreach ($selected as $item) {
                            $has = $modelRela::where($relaName,  $relaId)->where($relaKey, $item)->first();
                            if (!$has) {
                                $modelRela::create([
                                    $relaName => $relaId,
                                    $relaKey => $item
                                ]);
                            }
                        }
                    } else {
                        $modelRela::where($relaName, $relaId)->delete();
                    }
                    $selected = $this->loadBlock($relaId, $relaName, $relaKey, $model);
                } catch (\Exception $e) {
                    $this->error = 1;
                    $this->html = $e->getMessage();
                }
                break;
                break;
            case "search":
                $page = 1;
                break;

            default:
                break;
        }
        if ($relaName == "product_id" && $relaId != 0) {
            $model = $model->where('id', '!=', $relaId);
        }
        if ($option->keyword) {
            $model = $model->where($p, 'LIKE', '%' . $option->keyword . '%');
        }
        $vadata = $vam->pagination($model, ['id', 'desc'], $page, 16);
        $selectedId = $selected;
        $array = [];
        foreach ($selected as $id) {
            $item = $model_name::select($p)->where('id', $id)->first();
            if ($item) {
                $array[$id] = collect($item)->get($p);
            }
            unset($item);
        }
        $selected = $array;
        // end model prd
        //  //////////////////////////////////////// endrework

        $this->html .= view('components.admin.product.select.table', compact('m',  'selected', 'page', 'vadata', 'p'));
        $html_tags .= view('components.admin.tags.select', compact('selected'));
        $this->data['error'] = $this->error;
        $this->data['html'] = $this->html;
        $this->data['selected'] = $selectedId;
        $this->data['html_tags'] = $html_tags;
        return response()->json($this->data);
    }
    //////////////////////////////////////

    public function renderSelected(Request $request)
    {
        $m = $request->model;
        $selected = $request->selected ? $request->selected : [];
        $reloadTable = $request->reloadTable;
        $html_tags = '';
        try {
            switch ($m) {
                case 'prd':
                    if (count($selected) >= 0) {
                        $array = [];
                        foreach ($selected as $prdId) {
                            $array[$prdId] = Products::select('name')->where('id', $prdId)->first()->name;
                        }
                        $html_tags .= view('components.admin.tags.select', compact('selected'));
                    }
                    break;

                default:
                    $this->error = 1;
                    $this->html = "Không tồn tại model";
                    break;
            }
        } catch (\Exception $e) {
            $this->error = 1;
            $this->html = $e->getMessage();
        }
        $this->data['error'] = $this->error;
        $this->data['html'] = $this->html;
        $this->data['html_tags'] = $html_tags;
        return response()->json($this->data);
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    ////////////////////////////////////////
}
