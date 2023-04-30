<?php

namespace App\View\Components\admin\form\select;

use Illuminate\View\Component;

class option extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categories;
    public $selected;
    public $key;
    public function __construct($categories, $selected = "none", $key = "id")
    {
        $this->categories = $categories;
        $this->selected = $selected;
        $this->key = $key;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form.select.option');
    }
}
