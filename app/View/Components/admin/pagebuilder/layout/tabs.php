<?php

namespace App\View\Components\admin\pagebuilder\layout;

use Illuminate\View\Component;

class tabs extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $isPack;
    public $adv;
    public function __construct($isPack = false,  $adv = [])
    {
        $this->isPack = $isPack;
        $this->adv = $adv;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.pagebuilder.layout.tabs');
    }
}
