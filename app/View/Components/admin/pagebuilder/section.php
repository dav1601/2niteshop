<?php

namespace App\View\Components\admin\pagebuilder;

use Illuminate\View\Component;

class section extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ord;
    public $sections;
    public $column;
    public function __construct($ord = 0, $sections = [], $column = [])
    {
        $this->ord = $ord;
        $this->sections = $sections;
        $this->column = $column;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.pagebuilder.section');
    }
}
