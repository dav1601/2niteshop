<?php

namespace App\View\Components;

use Illuminate\View\Component;

class pagination extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $number_page;
    public $page;
    public $size;
    public $position;
    public $mt;
    public $class;
    public $id;
    public function __construct($number_page, $page, $size = "", $position = "justify-content-center", $mt = "mt-4", $class = "", $id = "")
    {
        $this->$number_page = $number_page;
        $this->$page = $page;
        $this->$size = $size;
        $this->$position = $position;
        $this->$mt = $mt;
        $this->$class = $class;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pagination');
    }
}
