<?php

namespace App\View\Components\admin\modal\auth;

use Illuminate\View\Component;

class reg extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $isModal;
    public function __construct($isModal = false)
    {
        $this->isModal = $isModal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modal.auth.reg');
    }
}
