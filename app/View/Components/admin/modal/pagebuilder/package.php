<?php

namespace App\View\Components\admin\modal\pagebuilder;

use Illuminate\View\Component;

class package extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $package;
    public $data;
    public function __construct($package = null, $data = null)
    {
        $this->package = $package;
        $this->data = $data;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modal.pagebuilder.package');
    }
}
