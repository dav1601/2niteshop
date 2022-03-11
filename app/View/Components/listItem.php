<?php

namespace App\View\Components;

use Illuminate\View\Component;

class listitem extends Component
{
    public $type;
    /**
     * The alert message.
     *
     * @var string
     */
    public $message;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.listitem');
    }
}
