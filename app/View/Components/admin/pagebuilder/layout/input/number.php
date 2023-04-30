<?php

namespace App\View\Components\admin\pagebuilder\layout\input;

use Illuminate\View\Component;

class number extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $header;
    public $classes;
    public $appends;
    public $values;
    public function __construct($header = "", $classes = [], $appends = [], $values = [])
    {
        $this->header = $header;
        $this->classes = $classes;
        $this->appends = $appends;
        $this->values = $values;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.pagebuilder.layout.input.number');
    }
}
