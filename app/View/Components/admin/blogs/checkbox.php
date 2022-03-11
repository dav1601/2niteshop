<?php

namespace App\View\Components\admin\blogs;

use Illuminate\View\Component;

class checkbox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $blog;
    public $class;
    public $name;
    public $prefix;
    public $array;
    public function __construct($blog , $class ,$name ,$prefix , $array)
    {
        $this->blog = $blog;
        $this->class = $class;
        $this->name = $name;
        $this->prefix = $prefix;
        $this->array = $array;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.blogs.checkbox');
    }
}
