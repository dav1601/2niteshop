<?php

namespace App\View\Components\admin\form;

use Illuminate\View\Component;

class file extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $id;
    public $class;
    public $multiple;
    public $custom;
    public function __construct($multiple = false, $name = "", $id = "", $class = "", $custom = ["plh" => "Hình ảnh size không vượt quá 500kb , Các đuôi cho phép: jpeg,png,jpg,tiff,svg"])
    {
        $this->name = $name;
        $this->id = $id;
        $this->class = $class;
        $this->custom = $custom;
        $this->multiple = $multiple;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form.file');
    }
}
