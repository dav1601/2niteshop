<?php

namespace App\View\Components\admin\table;

use Illuminate\View\Component;

class blog extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $blogs;
    public $number;
    public $page;
    public function __construct($blogs , $number , $page)
    {
        $this->blogs = $blogs;
        $this->number = $number;
        $this->page = $page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.table.blog');
    }
}
