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
    public function __construct($m, $page, $selected, $p = "title", ModelInterface $model)
    {
        $this->m = $m;
        $this->p = $p;
        $this->page = $page;
        $model_name = '\\App\Models\\' . $m;
        $this->q = new $model_name;
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
