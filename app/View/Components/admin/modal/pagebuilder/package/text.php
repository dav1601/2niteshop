<?php

namespace App\View\Components\admin\modal\pagebuilder\package;

use Illuminate\View\Component;

class text extends Component
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
        return view('components.admin.modal.pagebuilder.package.text');
    }
}
