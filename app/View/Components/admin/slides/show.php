<?php

namespace App\View\Components\admin\slides;

use Illuminate\View\Component;

class show extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $slides;
    public function __construct($slides)
    {
        $this->slides = $slides;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.slides.show');
    }
}
