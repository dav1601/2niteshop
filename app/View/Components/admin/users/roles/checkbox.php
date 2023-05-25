<?php

namespace App\View\Components\admin\users\roles;

use Illuminate\View\Component;

class checkbox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $roles;
    public $permissions;
    public function __construct($roles = [], $permissions = [])
    {
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.users.roles.checkbox');
    }
}
