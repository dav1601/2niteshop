<?php

namespace App\View\Components\pagebuilder;

use Illuminate\View\Component;

class render extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $payload;
    public function __construct($payload)
    {
        $this->payload = $payload;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pagebuilder.render');
    }
}
