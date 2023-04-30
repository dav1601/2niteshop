<?php

namespace App\View\Components\product;

use Illuminate\View\Component;

class itemgrid extends Component
{
    /**
     * The alert message.
     *
     * @var string
     */

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public $message;
    public $class;
    public function __construct($message, $class = "")
    {
        $this->message = $message;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product.itemgrid');
    }
}
