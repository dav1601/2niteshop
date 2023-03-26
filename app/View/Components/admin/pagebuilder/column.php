<?php

namespace App\View\Components\admin\pagebuilder;

use Illuminate\View\Component;

class column extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ord;
    public $data;
    public $isCreate;
    public $section;
    public function __construct($ord = 0, $data = null, $isCreate = false, $section = null)
    {
        $this->ord = $ord;
        $this->data = $data;
        $this->isCreate = $isCreate;
        $this->section = $section;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.pagebuilder.column');
    }
}
