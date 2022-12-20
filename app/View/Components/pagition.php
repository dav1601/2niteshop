<?php

namespace App\View\Components;

use Illuminate\View\Component;

class pagition extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $number_pages;
    public $page;
    public $size;
    public $position;
    public $mt;
    public $class;
    public $id;
    public function __construct($number_pages, $page, $size = "", $position = "justify-content-center", $mt = "mt-4", $class = "", $id = "")
    {
        $this->$number_pages = $number_pages;
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
        return view('components.pagition');
    }
}
