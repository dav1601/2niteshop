<?php

namespace App\View\Components\admin\dashboard;

use Illuminate\View\Component;

class todos extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $tasks;
    public function __construct($tasks = [])
    {
        $this->tasks = $tasks;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.dashboard.todos');
    }
}
