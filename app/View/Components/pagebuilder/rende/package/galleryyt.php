<?php

namespace App\View\Components\pagebuilder\rende\package;

use Illuminate\View\Component;

class galleryyt extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pagebuilder.rende.package.galleryyt');
    }
}
