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
    public function __construct($btn, Request $req)

    {
        $this->elId = $req->has('relaId') ? $req->relaId : null;
        $this->model = $req->has('model') ? $req->model : "prd";
        $this->relaName = $req->has('relaName') ? $req->relaName : "block";
        $this->page = $req->has('s_page') ? $req->s_page : 1;
        $this->btn = $btn;
        $array = [];
        $this->selected = $req->selected ? explode(",", $req->selected) : [];
        if (count($this->selected) > 0) {
            switch ($this->model) {
                case 'blog':
                    foreach ($this->selected as  $value) {
                        $nameBlog = Blogs::select('title')->where('id', $value)->first()->title;
                        $array[$value] = $nameBlog;
                    }
                    $this->selected = $array;
                    break;
                    break;
                default:
                    foreach ($this->selected as  $value) {
                        $namePrd = Products::select('name')->where('id', $value)->first()->name;
                        $array[$value] = $namePrd;
                    }
                    $this->selected = $array;
                    break;
            }
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
