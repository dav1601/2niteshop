<?php

namespace App\View\Components\admin\pagebuilder\edit;

use Illuminate\View\Component;

class package extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $package;
    public function __construct($type = "", $package = "")
    {
        $this->type = $type;
        $this->package = $package;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.pagebuilder.edit.package');
    }
}
