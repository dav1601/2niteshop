<?php

namespace App\Http\Controllers;


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
use Mockery\Expectation;

class AdminAjaxProductController extends Controller
{
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
    public function handle_reload(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $pdc = new Producer;
        if ($request->type == 1) {
            if ($request->kw != null) {
                $pdc = $pdc->where('name', 'LIKE', '%' . $request->kw . '%');
            }
            $pdc = $pdc->get();
            if (count($pdc) > 0) {
                foreach ($pdc as $pc) {
                    $output .= '
                    <option value="' .  $pc->id . '">' . $pc->name . '</option>
                    ';
                }
            } else {
                $output .= '<option value="">Không có nhà sản xuất nào phù hợp với ' . $request->kw . '</option>';
            }
        }
        if ($request->type == 2) {
            $ins = Insurance::all();
            foreach ($ins as $in) {
                $output .= '
                <div class="mb-4 col-3 cis_item">
                <div class="va-checkbox d-flex align-items-center w-100">
                    <input type="checkbox" name="ins[]" value="' . $in->id . '" id="ci__' . $in->id . '"
                        class="check_ins ">
                    <label for="ci__' . $in->id . '" data-toggle="tooltip" data-placement="top"
                        title="Giá Bảo Hành: ' . crf($in->price) . ' ">
                        ' . $in->name . '
                    </label>
                </div>
            </div>
                    ';
            }
        }
        if ($request->type == 3) {
            $policy = Policy::all();
            foreach ($policy as $plc) {
                $output .= '
               <div class="mb-4 col-3 plc_item">
               <div class="va-checkbox d-flex align-items-center w-100">
                   <input type="checkbox" name="plc[]" value="' . $plc->id . '"
                       id="plc__' . $plc->id . '" class="check_plc">
                   <label for="plc__' . $plc->id . '" data-toggle="tooltip" data-html="true"
                       data-placement="top" title="' . htmlentities($plc->content) . '">
                       ' . $plc->title . ' (Pos: ' . $plc->position . ')
                   </label>
               </div>
           </div>
               ';
            }
        }
        $data['html'] = $output;
        return response()->json($data);
    }
    ////////////////////////////////////////
    public function handle_search(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $pdc = new Producer;
        if ($request->kw != null) {
            $pdc = $pdc->where('name', 'LIKE', '%' . $request->kw . '%');
        }
        $pdc = $pdc->get();
        if (count($pdc) > 0) {
            foreach ($pdc as $pc) {
                $output .= '
                <option value="' .  $pc->id . '">' . $pc->name . '</option>
                ';
            }
        } else {
            $output .= '<option value="">Không có nhà sản xuất nào phù hợp với ' . $request->kw . '</option>';
        }
        $data['html'] = $output;
        return response()->json($data);
    }

    ////////////////////////////////////////
    public function handle_cat(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $output_2 = '';
        $output_3 = '';
        $data_create = array();
        $data_update = array();
        $accesss = new Products;
        $error = array();
        if ($request->type == 1) {
            $id = $request->cat_id;
            $skin = category_child(Category::all(), $id);
            $cat_2 = Category::where('parent_id', '=', $id)->get();
            $access =  Products::where(function ($query) use ($id) {
                $query->where('cat_id', '=', $id);
            });
            if ($request->sub_type == 1) {
                $access = $access->where('sub_type', 'LIKE', 'controller');
            }
            $access = $access->where('type', 'LIKE', 'access')->get();
            $output .= '<option value="0">Chọn Danh Mục Skin</option>';
            foreach ($skin as $sk) {
                $output .= '
                <option value="' . $sk->id . '">' . $sk->name . '</option>
                ';
            }
            if (!empty($cat_2)) {
                $output_2 .= '<option value="">Chọn Danh Mục Phụ 1</option>';
                foreach ($cat_2 as $c2) {
                    $output_2 .= '
                   <option value="' . $c2->id . '">' . $c2->name . '</option>
                   ';
                }
            } else {
                $output_2 = '<option value="">Không Có Danh Mục Phụ 1</option>';
            }
            if (count($access) > 0) {
                foreach ($access as $as) {
                    $output_3 .= '
                    <div class="mb-4 col-3 acs_item">
                    <div class="va-checkbox d-flex align-items-center w-100">
                        <input type="checkbox" name="access[]" value="' . $as->id . '" id="acs__' . $as->id . '"
                            class="check_acs ">
                        <label for="acs__' .  $as->id . '">
                            ' . $as->name . '
                        </label>
                    </div>
                </div>
                    ';
                }
            } else {
                $output_3 = '<span>Chưa Có Phụ Kiện Nào Thuộc Danh Mục Này.....</span>';
            }
        }

        if ($request->type == 2) {
            $id = $request->cat_id;
            $cat_3 = Category::where('parent_id', '=', $id)->get();
            if (count($cat_3) > 0) {
                $output .= '<option value="0">Chọn Danh Mục Phụ 2</option>';
                foreach ($cat_3 as $c3) {
                    $output .= '
                   <option value="' . $c3->id . '">' . $c3->name . '</option>
                   ';
                }
            } else {
                $output = '<option value="">Không Có Danh Mục Phụ 2</option>';
            }
        }
        if ($request->type == 4) {
            $id = $request->tp;
            $type = typeProduct::where('parent', '=', $id)->get();
            if (count($type) > 0) {
                $output .= '<option value="0">Chọn loại sản phẩm phụ</option>';
                foreach ($type as $t) {
                    $output .= '
                   <option value="' . $t->id . '">' . $t->name . '</option>
                   ';
                }
            } else {
                $output = '<option value="0">Không Có loại sản phẩm phụ</option>';
            }
        }

        $data['html'] = $output;
        $data['html_2'] = $output_2;
        $data['html_3'] = $output_3;
        return response()->json($data);
    }

    ////////////////////////////////////////
    //////////////////////////////////////

    public function handle_load(Request $request, ModelInterface $repom)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $product = new Products;
        $error = array();
        $id = $request->id;
        $page = $request->page;
        if ($request->action == "update_stock") {
            Products::where('id', '=', $id)->update([
                'stock' => $request->val
            ]);
        }
        if ($request->action == "update_hl") {
            Products::where('id', '=', $id)->update([
                'highlight' => $request->val
            ]);
        }
        if ($request->nameOrId != null) {
            $nameOrId = $request->nameOrId;
            $product = $product->where(function ($query) use ($nameOrId) {
                $query->where('id', '=', $nameOrId)
                    ->orWhere('name', 'LIKE', '%' . $nameOrId . '%');
            });
        }
        if ($request->author != null) {
            $product = $product->where('author', 'LIKE',  '%' . $request->author . '%');
        }
        if ($request->model != null) {
            $product = $product->where('model',  'LIKE', '%' . $request->model . '%');
        }
        if ($request->stock != 0) {
            $product = $product->where('stock', '=', $request->stock);
        }
        if ($request->pdc != 0) {
            $product = $product->where('producer_id', '=', $request->pdc);
        }
        if ($request->cat_s1 != null) {
            $product = $product->where('sub_1_cat_id', '=', $request->cat_s1);
        }
        if ($request->pF != null && $request->pT == null) {
            $product = $product->whereBetween('price', [$request->pF, Products::max('price')]);
        }
        if ($request->pF == null && $request->pT != null) {
            $product = $product->whereBetween('price', [Products::min('price'), $request->pT]);
        }
        if ($request->pF != null && $request->pT != null) {
            if ($request->pT > $request->pF) {
                $product = $product->whereBetween('price', [$request->pF, $request->pT]);
            }
        }
        if ($request->has('categories')) {
            $categories = $request->categories;
            $product = $product->whereHas('categories', function ($q) use ($categories) {
                $q->whereIn('category_id', $categories);
            });
        }
        $products = $repom->pagination($product, [$request->val_sort, $request->sort], $page, 12, null);
        if ($products->count > 0) {
            foreach ($products->data as $prd) {
                $output .= view('components.admin.product.item', compact('prd'));
            }
        } else {
            $output .= view('components.empty.nodata');
        }
        if ($products->number_page > 0) {
            $pagination =  navi_ajax_page($products->number_page, $page, "", "justify-content-center", "mt-2");
        }

        $data['html'] = $output;
        $data['page'] = $pagination;
        $data['type'] = $request->type;
        return response()->json($data);
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
                    } catch (\Expectation $e) {
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
                $isEdit = $request->isEdit;
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

                break;
            case "single-image-upload":

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
        $page = $request->page;
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
