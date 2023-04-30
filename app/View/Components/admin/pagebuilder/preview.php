<?php

namespace App\View\Components\admin\pagebuilder;

use Illuminate\View\Component;

class preview extends Component
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
        return view('components.admin.pagebuilder.preview');
    }
}
