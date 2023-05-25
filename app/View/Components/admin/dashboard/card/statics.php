<?php

namespace App\View\Components\admin\dashboard\card;

use Illuminate\View\Component;

class statics extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $header;
    public $icon;
    public $class;
    public $content;
    public function __construct($header = "", $icon = "", $class = "", $content = "")
    {
        $this->header = $header;
        $this->icon = $icon;
        $this->class = $class;
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.dashboard.card.statics');
    }
}
