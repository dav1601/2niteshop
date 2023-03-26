<?php

namespace App\View\Components\admin\modal\category;

use Illuminate\View\Component;

class edit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $category;
    public $old;
    public function __construct($category, $old = [])
    {
        $this->category = $category;
        $this->old = $old;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modal.category.edit');
    }
}
