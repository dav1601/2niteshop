<?php

namespace App\View\Components\admin\users\permissions;

use Illuminate\View\Component;

class badge extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $permissions;
    public function __construct($permissions = [])
    {
        $this->permissions = $permissions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.users.permissions.badge');
    }
}
