<?php

namespace App\View\Components\admin\pagebuilder\edit\component\gllyt;

use Illuminate\View\Component;

class item extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $payload;
    public $index;
    public function __construct($payload = "", $index = 0)
    {
        $this->payload = $payload;
        $this->index = $index;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.pagebuilder.edit.component.gllyt.item');
    }
}
