<?php

namespace App\View\Components\admin\modal\product;

use App\Models\Blogs;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\View\Component;


class select extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $page;
    public $btn;
    public $selected;
    public $elId;
    public $relaName;
    public $model;
    public $enable;
    public $p;
    public $type_save;
    public function __construct($btn, $type_save = "temp", Request $req)

    {
        $this->elId = $req->relaId;
        $this->model = $req->model;
        $this->relaName =  $req->relaName;
        $this->page = $req->s_page;
        $this->relaKey = $req->relaKey;
        $this->relaModel = $req->relaModel;
        $this->btn = $btn;
        $this->type_save = $type_save;
        $this->enable = $req->has("enable_modal") ? true : false;
        $array = [];
        $this->p = "title";
        if ($this->model === "Products" || $this->model === "Insurance") {
            $this->p = "name";
        }
        $model_name = '\\App\Models\\' . $this->model;
        $this->selected = $req->selected ? explode(",", $req->selected) : [];
        if (count($this->selected) > 0) {
            foreach ($this->selected as  $value) {
                $namePrd =  $model_name::select($this->p)->where('id', $value)->first();
                $array[$value] = collect($namePrd)->get($this->p);
            }
            $this->selected = $array;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modal.product.select');
    }
}
