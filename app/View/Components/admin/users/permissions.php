<?php

namespace App\View\Components\admin\users;

use Illuminate\View\Component;

class permissions extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $selected;
    public $permissions;
    public function __construct($permissions = [], $selected = [])
    {
        $this->selected = $selected;
        $this->permissions = $permissions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.users.permissions');
    }
}
