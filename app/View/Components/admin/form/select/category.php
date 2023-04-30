<?php

namespace App\View\Components\admin\form\select;

use Illuminate\View\Component;

class category extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $class;
    public $name;
    public $selected;
    public function __construct($id = "", $class = "", $name = "", $selected = 0)
    {
        $this->id = $id;
        $this->class = $class;
        $this->name = $name;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form.select.category');
    }
}
