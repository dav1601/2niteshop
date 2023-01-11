<?php

namespace App\View\Components\admin\relation;

use Illuminate\View\Component;

class rela extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $rela;
    public $title;
    public $relaid;
    public $model;
    public $modelRela;
    public $text;
    public $selected;
    public $name;
    public $relaId;
    public function __construct($rl = "product-products", $relaid = 0, $reverse = false, $selected = "")
    {
        // $arrela index 0 : relaName , index 1 : relaKey
        switch ($rl) {
            case 'products-ins':
                $arrm = ["Products", "Insurance"];
                $modelRela = "ProductIns";
                break;
            case 'product-products':
                $arrm = ["Products", "Products"];
                $modelRela = "RelatedProducts";
                break;
            case 'products-plc':
                $arrm = ["Products", "Policy"];
                $modelRela = "ProductPlc";
                break;
            case 'products-blogs':
                $arrm = ["Products", "Blogs"];
                $modelRela = "PrdRelaBlog";
                break;
            case 'products-block':
                $arrm = ["Products", "BlockProduct"];
                $modelRela = "PrdRelaBlock";
                break;
            default:
                abort(500, "Không tìm thấy relation");
                break;
        }
        $arrela = explode("-", $rl);
        if ($reverse) {
            $arrela = array_reverse($arrela);
            $arrm = array_reverse($arrm);
        }
        $rK = $arrela[1];
        switch ($rK) {
            case 'blogs':
                $title =  "Bài viết liên kết";
                break;
            case 'ins':
                $title =  "Chính sách bảo hành";
                break;
            case 'plc':
                $title =  "Chính sách của cửa hàng";
                break;
            case 'block':
                $title =  "Block đi kèm";
                break;
            default:
                $title = "Sản phẩm liên kết";
                break;
        }
        $this->rela = $arrela;
        $this->title = $title;
        $this->relaId = $relaid;
        $this->model = $arrm[1];
        $this->modelRela = $modelRela;
        $this->text = $relaid == 0 ? "Xem và thêm "  : "Xem và sửa ";
        $this->name = "rela__" . $rK;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.relation.rela');
    }
}
