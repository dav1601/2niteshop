<?php

namespace App\View\Components\category;

use Illuminate\View\Component;

class arcord extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $category;
    public $id;
    public $level;
    public function __construct($category, $id, $level)
    {
        $this->category = $category;
        $this->id = $id;
        $this->level = $level;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category.arcord');
    }
}
