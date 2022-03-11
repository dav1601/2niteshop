<?php

namespace App\View\Components;

use Illuminate\View\Component;

class styletabs extends Component
{
    public $type;
    /**
     * The alert message.
     *
     * @var string
     */
    public $cf;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($type , $cf)
    {
        $this->cf = $cf;
        $this->type = $type;
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
