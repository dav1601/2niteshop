<?php

namespace App\View\Components\admin\pagebuilder\component\button;

use Illuminate\View\Component;

class add extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $class;
    public $t;
    public $customAttr;
    public function __construct($t = "addPackage", $class = "", $customAttr = "")
    {
        $this->class = $class;
        $this->t = $t;
        $this->customAttr = $customAttr;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.pagebuilder.component.button.add');
    }
}
