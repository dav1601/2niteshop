<?php

namespace App\View\Components\pagebuilder\render;

use Illuminate\View\Component;

class section extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $section;
    public function __construct($section)
    {
        $this->section = $section;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pagebuilder.render.section');
    }
}
