<?php

namespace App\View\Components\admin\pagebuilder\edit\component\tab;

use Illuminate\View\Component;

class products extends Component
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
        return view('components.admin.pagebuilder.edit.component.tab.products');
    }
}
