<?php

namespace App\View\Components\admin\modal\pagebuilder\tabs;

use Illuminate\View\Component;

class spacing extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $spacing;
    public function __construct($type = "m" , $spacing)
    {
        $this->type = $type;
        $this->spacing = $spacing;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modal.pagebuilder.tabs.spacing');
    }
}
