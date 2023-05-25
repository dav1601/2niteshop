<?php

namespace App\View\Components\admin\product;

use Illuminate\View\Component;

class categories extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $selected;
    public $show;
    public $name;
    public $class;
    public $id;
    public $customattr;
    public $idard;
    public $classbtn;
    public $classcoll;
    public function __construct($selected = [], $show = false, $name = "category[]", $class = "check_ins", $id = "category__",  $idard = "accordionCateogries", $classbtn = "", $classcoll = "")
    {
        $this->selected = $selected;
        $this->show = $show;
        $this->name = $name;
        $this->class = $class;
        $this->id = $id;
        $this->idard = $idard;
        $this->classbtn = $classbtn;
        $this->classcoll = $classcoll;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.product.categories');
    }
}
