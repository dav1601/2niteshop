<?php

namespace App\View\Components\admin\profile;

use Illuminate\View\Component;

class itemactivities extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $sorted;
    public function __construct($sorted)
    {
        $this->sorted = $sorted;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.profile.itemactivities');
    }
}
