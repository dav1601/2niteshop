<?php

namespace App\View\Components\pagebuilder\render;

use Illuminate\View\Component;

class banners extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pagebuilder.render.banners');
    }
}
