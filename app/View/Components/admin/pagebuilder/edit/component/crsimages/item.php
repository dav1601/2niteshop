<?php

namespace App\View\Components\admin\pagebuilder\edit\component\crsimages;

use Illuminate\View\Component;

class item extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $pid;
    public $item;
    public $index;
    public function __construct($pid = "", $item = null, $index = 0)
    {
        $this->pid = $pid;
        $this->item = $item;
        $this->index = $index;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.pagebuilder.edit.component.crsimages.item');
    }
}
