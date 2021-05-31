<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LocationActions extends Component
{
  public $_is_default;
  public $_location_id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($locationid = "", $isdefault = false)
    {
        $this->_is_default = $isdefault;
        $this->_location_id = $locationid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.location-actions');
    }
}
