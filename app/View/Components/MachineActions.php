<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MachineActions extends Component
{
  public $_machine;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($machine)
    {
        $this->_machine = $machine;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.machine-actions');
    }
}
