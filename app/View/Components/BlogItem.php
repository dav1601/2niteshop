<?php

namespace App\View\Components;

use Illuminate\View\Component;

class blogitem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $blog;
    public $cat;
    public function __construct($blog , $cat = 0)
    {
        $this->blog = $blog;
        $this->cat = $cat;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blogitem');
    }
}
