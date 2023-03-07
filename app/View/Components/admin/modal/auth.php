<?php

namespace App\View\Components\admin\modal;

use Illuminate\View\Component;

class auth extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public function __construct($type = "login")
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modal.auth');
    }
}
