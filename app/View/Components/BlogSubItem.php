<?php

namespace App\View\Components;

use Illuminate\View\Component;

class blogsubitem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $blog;
    public function __construct($blog)
    {
        $this->blog = $blog;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blogsubitem');
    }
}
