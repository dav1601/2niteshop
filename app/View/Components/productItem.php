<?php

namespace App\View\Components;

use Illuminate\View\Component;

class productItem extends Component
{
    public $type;
    /**
     * The alert message.
     *
     * @var string
     */
    public $message;
    public $class;
    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($message , $class , $type)
    {
        $this->message = $message;
        $this->class = $class;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.productitem');
    }
}
