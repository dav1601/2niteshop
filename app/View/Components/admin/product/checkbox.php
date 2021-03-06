<?php

namespace App\View\Components\admin\product;

use Illuminate\View\Component;

class checkbox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $product;
    public $class;
    public $name;
    public $prefix;
    public $array;
    public $option;
    public function __construct($product , $class ,$name ,$prefix , $array)
    {
        $this->product = $product;
        $this->class = $class;
        $this->name = $name;
        $this->prefix = $prefix;
        $this->array = $array;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.product.checkbox');
    }
}
