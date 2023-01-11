<?php

namespace App\View\Components\client\home;

use Illuminate\View\Component;

class section extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $sections;
    public $homeItem;
    public function __construct($item)
    {
        $this->homeItem = $item;
        $this->sections = collect($item->sections)->groupBy('section');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.home.section');
    }
}
