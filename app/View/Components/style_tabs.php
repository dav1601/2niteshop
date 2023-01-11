<?php

namespace App\View\Components;

use Illuminate\View\Component;

class styletabs extends Component
{
    /**
     * The alert message.
     *
     * @var string
     */
    public $color;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($color)
    {
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.styletabs');
    }
}
