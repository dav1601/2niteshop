<?php

namespace App\View\Components\admin\modal\auth;

use Illuminate\View\Component;

class login extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $modal;
    public function __construct($modal = false)
    {
        $this->modal = $modal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modal.auth.login');
    }
}
