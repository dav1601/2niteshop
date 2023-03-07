<?php

namespace App\View\Components\admin\slides\show;

use Illuminate\View\Component;

class item extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $slide;
    public function __construct($slide)
    {
        $this->slide = $slide;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.slides.show.item');
    }
}
