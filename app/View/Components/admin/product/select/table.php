<?php

namespace App\View\Components\admin\product\select;

use App\Models\BlockProduct;
use App\Models\Blogs;
use App\Models\Products;
use App\Repositories\AdminPrdInterface;
use App\Repositories\AdminPrdRepo;
use App\Repositories\ModelInterface;
use Illuminate\View\Component;

class table extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $page;
    public $vadata;
    public $selected;
    public $p;
    public $m;
    public $q;
    public function __construct($m, $page, $selected, ModelInterface $model)
    {
        $this->m = $m;
        $this->page = $page;
        if ($this->m === "prd") {
            $this->p = "name";
            $this->q = new Products();
        }
        if ($this->m === "blog") {
            $this->p = "title";
            $this->q = new Blogs();
        }
        if ($this->m === "block") {
            $this->p = "title";
            $this->q = new BlockProduct();
        }
        $this->vadata = $model->pagination($this->q, null, $page, null, []);
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.product.select.table');
    }
}
