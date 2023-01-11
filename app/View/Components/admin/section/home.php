<?php

namespace App\View\Components\admin\section;

use Illuminate\View\Component;

class home extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $selected;
    public $index;
    public $showid;
    public function __construct($selected = [], $index, $showid = 0)
    {
        $this->selected = $selected;
        $this->index = $index;
        $this->showid = $showid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.section.home');
    }
}
