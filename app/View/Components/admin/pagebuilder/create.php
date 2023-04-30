<?php

namespace App\View\Components\admin\pagebuilder;

use Illuminate\View\Component;

class create extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $page;
    public function __construct($type = "create", $page = [])
    {
        $this->type = $type;
        $this->page = $page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.pagebuilder.create');
    }
}
