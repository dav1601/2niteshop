<?php

namespace App\Http\Controllers;

use App\Models\BlockProduct;
use App\Models\Blogs;
use App\Models\bundled_accessory_cat;
use App\Models\Category;
use App\Models\CatGame;
use App\Models\gllProducts;
use App\Models\Insurance;
use App\Models\Policy;
use App\Models\PrdRelaBlock;
use App\Models\PrdRelaBlog;
use App\Models\Producer;
use App\Models\Products;
use App\Models\RelatedPosts;
use App\Models\RelatedProducts;
use App\Models\typeProduct;
use App\Models\User;
use App\Repositories\AdminPrdRepo;
use App\Repositories\ModelInterface;
use Illuminate\Http\Request;
use stdClass;

class AdminAjaxProductController extends Controller
{
    //////////////////////////////////////
    private $error = 0;
    private $data = array();
    private $html = '';
    public function __construct(AdminPrdRepo $repo_prd)
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

    public function handle_load(Request $request)
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
        if ($request->action == "update_new") {
            Products::where('id', '=', $id)->update([
                'new' => $request->val
            ]);
        }
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
        if ($request->cat_s2 != null) {
            $cat_2 = $request->cat_s2;
            $product =  $product->where(function ($query) use ($cat_2) {
                $query->where('sub_2_cat_id', '=', $cat_2)
                    ->orWhere('cat_2_sub', '=', $cat_2);
            });
        }
        if ($request->model != null) {
            $product = $product->where('model',  'LIKE', '%' . $request->model . '%');
        }
        if ($request->cat != 0) {
            $product = $product->where('cat_id', '=', $request->cat);
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
        $products = $this->repoPrd->pagination($product, [$request->val_sort, $request->sort], $page, null);
        if (count($products)) {
            foreach ($products as $prd) {
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

    public function handle_delete_gll(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $output_2 = '';
        $data_create = array();
        $data_update = array();
        $error = 0;
        $id = $request->id;
        $prd_id = gllProducts::where('id', '=', $id)->first()->products_id;
        $gll = gllProducts::where('index', '=', gllProducts::where('id', '=', $id)->first()->index)->where('products_id', '=', $prd_id)->get();
        foreach ($gll as $g) {
            unlink("public/" . $g->link);
        }
        gllProducts::where('index', '=', gllProducts::where('id', '=', $id)->first()->index)->where('products_id', '=', $prd_id)->delete();
        $gall = Products::find($prd_id)->gll()->orderBy('index', 'ASC')->get();
        foreach ($gall as $gl) {
            if ($gl->size == 700) {
                $output .= '
                <tr>
    <th scope="row">' . $gl->id . '</th>
    <td>
        <img src="' . asset($gl->link) . '" width="200" class=" va-radius-fb "
            alt="">
    </td>
    <td>' . Products::where('id', '=', $gl->products_id)->first()->cat_name . '</td>
    <td>' . $gl->size . '</td>
    <td>' . $gl->index . '</td>
    <td>
        <i class="fas fa-trash delete_gll" data-id="' . $gl->id . '"></i>
    </td>
</tr>
                ';
            } else {
                $output_2 .= '
                <tr>
    <th scope="row">' . $gl->id . '</th>
    <td>
        <img src="' . asset($gl->link) . '" width="" class=" va-radius-fb "
            alt="">
    </td>
    <td>' . Products::where('id', '=', $gl->products_id)->first()->cat_name . '</td>
    <td>' . $gl->size . '</td>
    <td>' . $gl->index . '</td>
    <td>
        <i class="fas fa-trash delete_gll" data-id="' . $gl->id . '"></i>
    </td>
</tr>
                ';
            }
        }
        $data['html1'] = $output;
        $data['html2'] = $output_2;
        $data['error'] = $error;
        return response()->json($data);
    }

    ////////////////////////////////////////
    ////////////////////////////////////////
    public function handle_related_product(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        if ($request->has('selected')) {
            $selected = $request->selected;
        } else {
            $selected = [];
        }
        if ($request->act == "click") {
            if (count($selected) > 0) {
                foreach ($selected as $select) {
                    $product = Products::where('id', '=', $select)->first();
                    $array = $selected;
                    $class = "select__product";
                    $name = "products";
                    $prefix = "product";
                    $output .= view('components.admin.product.checkbox', compact('product', 'class', 'name', 'prefix', 'array'));
                }
            }
        }
        if ($request->act == "keyup") {
            if ($request->kw != NULL) {
                $products = Products::where('name', 'LIKE', '%' . $request->kw . '%')->get();
                if (count($products) > 0) {
                    $array = $selected;
                    $class = "select__product";
                    $name = "products_2";
                    $prefix = "product_2";
                    foreach ($products as $product) {
                        if (!in_array($product->id, $selected)) {
                            $output .= view('components.admin.product.checkbox', compact('product', 'class', 'name', 'prefix', 'array'));
                        }
                    }
                } else {
                    $output .= "Không có sản phẩm nào phù hợp từ khoá";
                }
            } else {
                $output .= "Nhập tên sản phẩm cần tìm";
            }
        }
        $data['html'] = $output;
        return response()->json($data);
    }
    //////////////////////////////////////
    ////////////////////////////////////////
    public function handle_related_prd_for(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $category = category_child(Category::all(), 0);
        $output_2 = '';
        if ($request->forR != NULL) {
            if ($request->forR == "blog") {
                $output .= '
                <label for="">Chọn Bài Viết</label>
                <select class="custom-select mb-3" name="rFBlog" id="realatedForBlog">';
                $output .= '<option value="">Nhập Bài Viết Muốn Tìm Vào Ô bên dưới</option>';
                $output .= '</select>';
                $output .= '<input type="text" name="" class="form-control" id="search__blog" placeholder="Nhập tên bài viết muốn tìm vào đây">
                ';
            } else {
                $output .= '
             <label for="">Chọn Sản Phẩm</label>
             <select class="custom-select mb-3" name="rFPrd" id="realatedForPrd">';
                $output .= '<option value="">Nhập Sản Phẩm Muốn Tìm Vào Ô bên dưới</option>';
                $output .= '</select>';
                $output .= '<input type="text" name="" class="form-control" id="search__product" placeholder="Nhập tên sản phẩm muốn tìm vào đây">
             ';
            }
        }
        if ($request->act == "search") {
            if ($request->kw != NULL) {
                $products = Products::where('name', 'LIKE', '%' . $request->kw . '%')->get();
                if (count($products) > 0) {
                    foreach ($products as $prd) {
                        $output_2 .= '<option value="' . $prd->id . '">' . $prd->name . '</option>';
                    }
                } else {
                    $output_2 .= '<option value="">Không có sản phẩm nào thuộc từ khoá (' . $request->kw . ')</option>';
                }
            } else {
                $output_2 .= '<option value="">Nhập Sản Phẩm Muốn Tìm Vào Ô bên dưới</option>';
            }
        }
        if ($request->act == "search_blog") {
            if ($request->kw != NULL) {
                $blogs = Blogs::where('title', 'LIKE', '%' . $request->kw . '%')->get();
                if (count($blogs) > 0) {
                    foreach ($blogs as   $blog) {
                        $output_2 .= '<option value="' . $blog->id . '">' . $blog->title . '</option>';
                    }
                } else {
                    $output_2 .= '<option value="">Không có bài viết nào thuộc từ khoá (' . $request->kw . ')</option>';
                }
            } else {
                $output_2 .= '<option value="">Nhập Bài viết Muốn Tìm Vào Ô bên dưới</option>';
            }
        }

        $data['html'] = $output;
        $data['html_2'] = $output_2;
        $data['test'] = $request->forR;
        return response()->json($data);
    }

    ///////////////////////////////////////
    ////////////////////////////////////////
    public function handle_related_all(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $output_2 = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        if ($request->has('selected')) {
            $selected = $request->selected;
        } else {
            $selected = [];
        }
        if ($request->has('selected_blog')) {
            $selected_blog = $request->selected_blog;
        } else {
            $selected_blog = [];
        }
        if ($request->act == "click") {
            if ($request->type == "product") {
                if (count($selected) > 0) {
                    foreach ($selected as $select) {
                        $product = Products::where('id', '=', $select)->first();
                        $array = $selected;
                        $class = "select__product";
                        $name = "products";
                        $prefix = "product";
                        $output .= view('components.admin.product.checkbox', compact('product', 'class', 'name', 'prefix', 'array'));
                    }
                }
            } else {
                if (count($selected_blog) > 0) {
                    foreach ($selected_blog as $select_blog) {
                        $blog = Blogs::where('id', '=', $select_blog)->first();
                        $array = $selected_blog;
                        $class = "select__blog";
                        $name = "blogs";
                        $prefix = "blog";
                        $output .= view('components.admin.blogs.checkbox', compact('blog', 'class', 'name', 'prefix', 'array'));
                    }
                }
            }
        }
        if ($request->act == "keyup") {
            if ($request->type == "product") {
                if ($request->kw != NULL) {
                    $kw = $request->kw;
                    $products = Products::where(function ($q) use ($kw) {
                        $q->where('name', 'LIKE', '%' . $kw . '%')
                            ->orWhere('id', $kw);
                    })->get();
                    if (count($products) > 0) {
                        $array = $selected;
                        $class = "select__product";
                        $name = "products_2";
                        $prefix = "product_2";
                        foreach ($products as $product) {
                            if (!in_array($product->id, $selected)) {
                                $output .= view('components.admin.product.checkbox', compact('product', 'class', 'name', 'prefix', 'array'));
                            }
                        }
                    } else {
                        $output .= "Không có sản phẩm nào phù hợp từ khoá";
                    }
                } else {
                    $output .= "Nhập tên sản phẩm cần tìm";
                }
            } else {
                if ($request->kw_blog != NULL) {
                    $blogs = Blogs::where('title', 'LIKE', '%' . $request->kw_blog . '%')->get();
                    if (count($blogs) > 0) {
                        $array = $selected_blog;
                        $class = "select__blog";
                        $name = "blogs_2";
                        $prefix = "blog_2";
                        foreach ($blogs as $blog) {
                            if (!in_array($blog->id, $selected_blog)) {
                                $output .= view('components.admin.blogs.checkbox', compact('blog', 'class', 'name', 'prefix', 'array'));
                            }
                        }
                    } else {
                        $output .= "Không có bài viết nào phù hợp từ khoá";
                    }
                } else {
                    $output .= "Nhập tên bài viết cần tìm";
                }
            }
        }
        if ($request->type == "all") {
            if (count($selected) > 0) {
                foreach ($selected as $select) {
                    $product = Products::where('id', '=', $select)->first();
                    $array = $selected;
                    $class = "select__product";
                    $name = "products";
                    $prefix = "product";
                    $output .= view('components.admin.product.checkbox', compact('product', 'class', 'name', 'prefix', 'array'));
                }
            }
            if (count($selected_blog) > 0) {
                foreach ($selected_blog as $select_blog) {
                    $blog = Blogs::where('id', '=', $select_blog)->first();
                    $array = $selected_blog;
                    $class = "select__blog";
                    $name = "blogs";
                    $prefix = "blog";
                    $output_2 .= view('components.admin.blogs.checkbox', compact('blog', 'class', 'name', 'prefix', 'array'));
                }
            }
        }
        $data['html'] = $output;
        $data['html_2'] = $output_2;
        return response()->json($data);
    }
    //////////////////////////////////////

    // //////////// end delete gll edit product
    //////////////////////////////////////

    public function handle_related_delete(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $id = $request->id;
        $type = $request->type;
        $product_id = $request->product_id;
        if ($type == "prd") {
            RelatedProducts::where('product_id', $request->product_id)->where('products_id', $id)->delete();
            bundled_accessory_cat::where('products_id', $id)->where('cat_id', $product_id)->delete();
        }
        if ($type == "blog") {
            RelatedPosts::where(function ($query) use ($product_id) {
                $query->where('product_id', $product_id)
                    ->orWhere('cat_id', $product_id);
            })->where('posts', $id)->delete();
        }
        $data['html'] = $output;
        return response()->json($data);
    }
    //////////////////////////////////////
    public function loadBlock($relaId, $relaName, $model = "prd")
    {
        $selected = [];

        switch ($model) {
            case 'prd':
                switch ($relaName) {
                    case 'block':
                        $getRela = PrdRelaBlock::where('block_id', $relaId)
                            ->with(['infoPrd' => function ($query) {
                                $query->select('id');
                            }])
                            ->get();
                        if ($getRela) {
                            foreach ($getRela as $rela) {
                                $selected[] = $rela->infoPrd->id;
                            }
                        }
                        break;
                    case 'product':
                        $getRela = RelatedProducts::where('product_id', $relaId)
                            ->with(['infoPrd' => function ($query) {
                                $query->select('id');
                            }])
                            ->get();
                        if ($getRela) {
                            foreach ($getRela as $rela) {
                                $selected[] = $rela->infoPrd->id;
                            }
                        }
                        break;
                    default:
                        # code...
                        break;
                }
                break;
            case 'blog':
                switch ($relaName) {
                    case 'product':
                        $getRela = PrdRelaBlog::where('products_id', $relaId)
                            ->with(['infoBlog' => function ($query) {
                                $query->select('id');
                            }])
                            ->get();
                        if ($getRela) {
                            foreach ($getRela as $rela) {
                                $selected[] = $rela->infoBlog->id;
                            }
                        }
                        break;
                    default:
                        # code...
                        break;
                }
            case 'block':
                switch ($relaName) {
                    case 'product':
                        $getRela = PrdRelaBlock::where('products_id', $relaId)
                            ->with(['infoBlock' => function ($query) {
                                $query->select('id');
                            }])
                            ->get();
                        if ($getRela) {
                            foreach ($getRela as $rela) {
                                $selected[] = $rela->infoBlock->id;
                            }
                        }
                        break;
                    default:
                        # code...
                        break;
                }
            default:
                break;
        }

        return $selected;
    }
    public function handle_model_rela(Request $request, ModelInterface $vam)
    {
        $relaId = (int) $request->relaId;
        $selected = !empty($request->selected) ? array_map('intval', $request->selected) : [];
        $model = $request->model ? $request->model : "prd";
        $act = $request->act;
        $page = $request->page;
        $relaName = $request->relaName;
        $option = json_decode($request->option);
        $html_tags = "";
        $selectedId = [];
        $queryPrd = new Products();
        $queryBlock = new BlockProduct();
        $queryBlog = new Blogs();
        $query = null;
        $m = $model;
        $p = "name";
        if ($model === "prd") {
            switch ($act) {
                case "load":
                    $selected = $this->loadBlock($relaId, $relaName, $model);
                    break;
                case  "save":
                    switch ($relaName) {
                        case 'block':
                            try {
                                if (count($selected) > 0) {
                                    PrdRelaBlock::whereNotIn('products_id', $selected)->where('block_id', $relaId)->delete();
                                    foreach ($selected as $prdId) {
                                        $has = PrdRelaBlock::where('block_id',  $relaId)->where('products_id', $prdId)->first();
                                        if (!$has) {
                                            PrdRelaBlock::create([
                                                'block_id' => $relaId,
                                                'products_id' => $prdId
                                            ]);
                                        }
                                    }
                                } else {
                                    PrdRelaBlock::where('block_id', $relaId)->delete();
                                }
                                $selected = $this->loadBlock($relaId, $relaName, $model);
                            } catch (\Exception $e) {
                                $this->error = 1;
                                $this->html = $e->getMessage();
                            }
                            break;
                        case 'product':
                            try {
                                if (count($selected) > 0) {
                                    RelatedProducts::whereNotIn('products_id', $selected)->where('product_id', $relaId)->delete();
                                    foreach ($selected as $prdId) {
                                        $has = RelatedProducts::where('product_id',  $relaId)->where('products_id', $prdId)->first();
                                        if (!$has) {
                                            RelatedProducts::create([
                                                'product_id' => $relaId,
                                                'products_id' => $prdId
                                            ]);
                                        }
                                    }
                                } else {
                                    RelatedProducts::where('product_id', $relaId)->delete();
                                }
                                $selected = $this->loadBlock($relaId, $relaName, $model);
                            } catch (\Exception $e) {
                                $this->error = 1;
                                $this->html = $e->getMessage();
                            }
                            break;
                    }
                    break;
                case "search":
                    if ($option->keyword) {
                        $queryPrd = $queryPrd->where('name', 'LIKE', '%' . $option->keyword . '%');
                        $page = 1;
                    }
                    break;
                default:
                    break;
            }
            $vadata = $vam->pagination($queryPrd, null, $page, null,  []);
            $selectedId = $selected;
            $array = [];
            foreach ($selected as $id) {
                $prd = Products::select('name')->where('id', $id)->first();
                if ($prd) {
                    $array[$id] = $prd->name;
                }
                unset($prd);
            }

            $selected = $array;
        }
        // end model prd
        if ($model === "block") {
            $p = "title";
            switch ($act) {
                case "load":
                    $selected = $this->loadBlock($relaId, $relaName, $model);
                    break;
                case  "save":
                    try {
                        if (count($selected) > 0) {
                            PrdRelaBlock::whereNotIn('block_id', $selected)->where('products_id', $relaId)->delete();
                            foreach ($selected as $block_id) {
                                $has = PrdRelaBlock::where('products_id',  $relaId)->where('block_id', $block_id)->first();
                                if (!$has) {
                                    PrdRelaBlock::create([
                                        'products_id' => $relaId,
                                        'block_id' => $block_id
                                    ]);
                                }
                            }
                        } else {
                            PrdRelaBlock::where('products_id', $relaId)->delete();
                        }
                        $selected = $this->loadBlock($relaId, $relaName, $model);
                    } catch (\Exception $e) {
                        $this->error = 1;
                        $this->html = $e->getMessage();
                    }
                    break;
                case "search":

                    break;
                default:
                    break;
            }
            $vadata = $vam->pagination($queryBlock, null, $page, null, []);
            $selectedId = $selected;
            $array = [];
            foreach ($selected as $id) {
                $block = BlockProduct::select('title')->where('id', $id)->first();
                if ($block) {
                    $array[$id] = $block->title;
                }
                unset($block);
            }

            $selected = $array;
        }
        // end block
        if ($model === "blog") {
            $p = "title";
            switch ($act) {
                case "load":
                    $selected = $this->loadBlock($relaId, $relaName, $model);
                    break;
                case  "save":
                    switch ($relaName) {
                        case 'product':
                            try {
                                if (count($selected) > 0) {
                                    PrdRelaBlog::whereNotIn('blogs_id', $selected)->where('products_id', $relaId)->delete();
                                    foreach ($selected as $blogId) {
                                        $has = PrdRelaBlog::where('blogs_id', $blogId)->where('products_id', $relaId)->first();
                                        if (!$has) {
                                            PrdRelaBlog::create([
                                                'products_id' => $relaId,
                                                'blogs_id' => $blogId
                                            ]);
                                        }
                                    }
                                } else {
                                    PrdRelaBlog::where('products_id', $relaId)->delete();
                                }
                                $selected = $this->loadBlock($relaId, $relaName, $model);
                            } catch (\Exception $e) {
                                $this->error = 1;
                                $this->html = $e->getMessage();
                            }
                            break;

                        default:
                            # code...
                            break;
                    }

                    break;
                case "search":
                    $page = 1;
                    if ($option->keyword) {
                        $queryBlog =  $queryBlog->where('title', 'LIKE', '%' . $option->keyword . '%');
                    }
                    break;
                default:
                    break;
            }
            $vadata = $vam->pagination($queryBlog, null, $page, null, []);
            $selectedId = $selected;
            $array = [];
            foreach ($selected as $id) {
                $blog = Blogs::select('title')->where('id', $id)->first();
                if ($blog) {
                    $array[$id] = $blog->title;
                }
                unset($blog);
            }

            $selected = $array;
        }
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
