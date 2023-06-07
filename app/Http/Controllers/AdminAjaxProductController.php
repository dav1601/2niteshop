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
    public function __construct(AdminPrdInterface $repo_prd)
    {
        $this->repoPrd = $repo_prd;
    }

    ////////////////////////////////////////

    //////////////////////////////////////

    public function handle_load(Request $request, ModelInterface $repom)
    {

        $pagination = '';
        $output = '';
        $product = new Products;
        $page = (int) $request->page;
        if ($request->action == "update_hl") {
            $id = (int) $request->id;
            $highlight = (int) $request->highlight;
            $updated = Products::where('id', '=', $id)->update([
                'highlight' => $highlight
            ]);
            return $this->successResponse(null, "Updated Hightlight Product");
        }
        if ($request->name) {
            $name = $request->name;
            $product = $product->where(function ($query) use ($name) {
                $query->where('id', '=', $name)
                    ->orWhere('name', 'LIKE', '%' . $name . '%');
            });
        }
        if ($request->usage) {
            $product = $product->where('usage_stt',  $request->usage);
        }
        if ($request->model) {
            $product = $product->where('model',  'LIKE', '%' . $request->model . '%');
        }
        if ($request->status) {
            $product = $product->where('status', (int) $request->status);
        }
        if ($request->producer) {
            $product = $product->where('producer_id', (int) $request->producer);
        }
        if ($request->categories) {
            $categories = $request->categories;
            $product = $product->whereHas('categories', function ($q) use ($categories) {
                $q->whereIn('category_id', $categories);
            });
        }
        if ($request->author) {
            $author = $request->author;
            $product = $product->whereHas('user', function ($q) use ($author) {
                $q->where('name', 'LIKE', "%" . $author . "%");
            });
        }
        $product = $product->whereBetween("price", [(int) $request->pMin, (int) $request->pMax]);
        $products = $repom->pagination($product, [$request->sort, $request->field], $page, 16, null);
        if ($products->count > 0) {
            foreach ($products->data as $prd) {
                $output .= view('components.admin.product.item', compact('prd'));
            }
        } else {
            $output .= view('components.empty.nodata');
        }
        $pagination .= view('components.pagination', ['page' => $page, 'number_page' => $products->number_page, 'classWp' => "justify-content-center mt-2"]);

        $data['html'] = $output;
        $data['page'] = $pagination;
        return $this->successResponse($data, null);
    }

    ////////////////////////////////////////

    // ////////////////////////////////////// end load product
    //////////////////////////////////////

    public function handle_gallery(Request $request, FileInterface $file)
    {
        $res = [];
        $res['image'] = "";
        $act = $request->act;
        $galleries = json_decode($request->gallery);
        $res['deleted'] = false;
        switch ($act) {
            case 'upload-image':
                $id = (int) $request->id;
                $index =  (int) $request->index;
                $size =   $request->size;
                $image = gllProducts::where('products_id', $id)->where('index', $index)->first();
                $type = Products::select("type")->where('id', $id)->first()->type;
                $path = config('app.image_products') . "/"  . $type . "/gallery" . "/" . $size;
                if ($image) {
                    try {
                        $file->deleteFile($image['image_' . $size]);
                        $save = $file->storeFileImg($request->file, $path);
                        $image->update(['image_' . $size =>  $save]);
                        $res['image'] = $file->ver_img($save);
                    } catch (\Exception $e) {
                        $this->resCode = 500;
                    }
                }
                break;
            case "delete-image":
                try {
                    $id = (int) $request->id;
                    $index = (int) $request->index;
                    $size = $request->size;
                    $image = gllProducts::where('products_id', $id)->where('index', $index)->first();
                    if ($image) {
                        $file->deleteFile($image['image_' . $size]);
                        $image->update(['image_' . $size => null]);
                        $res['image'] = config('app.no_image', "");
                    }
                } catch (\Exception $e) {
                    $this->resCode = 500;
                }
                break;
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
                    $created = gllProducts::create(['products_id' => $id, "image_80" => null, 'image_700' => null, 'index' => $index]);
                    $item['id'] = $created->id;
                }
                $res['html'] = "";
                $props["item"] = $item;
                $props['key'] = $index;
                $props["productact"] = $isEdit ? "edit"  : 'add';
                $res['html'] .= view('components.admin.product.gallery.item', $props);

                break;
            case 'sort':
                foreach (explode(",", $request->sort) as $index => $id) {
                    gllProducts::where('id', (int) $id)->update(['index' => $index]);
                }
                break;
            case "single-image-delete":
                $type = $request->type;
                $productId = $request->id;
                try {
                    $product = Products::select(['main_img', 'sub_img', 'bg'])->where('id', $productId)->first();
                    switch ($type) {
                        case 'img_sub':
                            $file->deleteFile($product->sub_img);
                            $product->update(['sub_img' => NULL]);
                            break;
                        case 'img_bg':
                            $file->deleteFile($product->bg);
                            $product->update(['bg' => NULL]);
                            break;
                        default:
                            break;
                    }
                    $res['deleted'] = true;
                    $res['image'] = config('app.no_image');
                } catch (\Exception $e) {

                    $this->resCode = 500;
                }

                break;
            case "single-image-upload":

                $type = $request->type;
                $id = $request->id;
                $path = config("app.image_products") . "/";
                $image = $request->image;
                try {
                    $product = Products::where('id', $id);
                    switch ($type) {
                        case 'img_sub':
                            $path = $path  . "sub/";
                            $save = $file->storeFileImg($image, $path);
                            $product->update(['sub_img' => $save]);
                            break;
                        case 'img_bg':
                            $path = $path . "background/";
                            $save = $file->storeFileImg($image, $path);
                            $product->update(['bg' => $save]);
                            break;
                        case 'img_main':
                            $path = $path . "main/";
                            $save = $file->storeFileImg($image, $path);
                            $product->update(['main_img' => $save]);
                            break;
                        default:
                            break;
                    }
                    $res['uploaded'] = true;
                    $res['image'] = $file->ver_img($save);
                } catch (\Exception $e) {
                    $this->resCode = 500;
                }
                break;
            default:
                # code...
                break;
        }

        return response()->json($res, $this->resCode);
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
        if ($m == "Products" || $m === "Insurance") {
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
        $vadata = $vam->pagination($model, null, $page, null,  []);
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
