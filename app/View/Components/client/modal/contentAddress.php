<?php

namespace App\View\Components\client\modal;

use Illuminate\View\Component;

class contentAddress extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $data_edit;
    public function __construct($data_edit)
    {
        $this->data_eidt = $data_edit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.modal.contentaddress');
    }
}
