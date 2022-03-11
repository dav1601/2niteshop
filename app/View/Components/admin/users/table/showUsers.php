<?php

namespace App\View\Components\admin\users\table;

use Illuminate\View\Component;

class showusers extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $users;
    public $number;
    public $page;
    public function __construct($users, $number, $page)
    {
        $this->users = $users;
        $this->number = $number;
        $this->page = $page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.users.table.showusers');
    }
}
