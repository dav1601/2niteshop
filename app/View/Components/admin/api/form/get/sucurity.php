<?php

namespace App\View\Components\admin\api\form\get;

use Illuminate\View\Component;

class sucurity extends Component
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
        return view('components.admin.api.form.get.sucurity');
    }
}
