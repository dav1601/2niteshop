<?php

namespace App\View\Components\admin\form\file\upload;

use Illuminate\View\Component;

class lfm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $class;
    public $id;
    public $images;
    public $attr;
    public $name;
    public $mutiple;
    public function __construct($class = "", $id = "", $images = "", $attr = "", $name = "", $mutiple = "false")
    {
        $this->class = $class;
        $this->id = $id;
        $this->attr = $attr;
        $this->images = $images;
        $this->name = $name;
        $this->mutiple = $mutiple;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form.file.upload.lfm');
    }
}
