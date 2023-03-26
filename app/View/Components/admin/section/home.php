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
    public $show;
    public $idSection;
    public function __construct($selected = [], $index, $showid = 0, $show = false, $idSection = "")
    {
        $this->selected = $selected;
        $this->index = $index;
        $this->showid = $showid;
        $this->show = $show;
        $this->idSection = $idSection;
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
