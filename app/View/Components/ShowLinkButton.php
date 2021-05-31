<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShowLinkButton extends Component
{
  public $_href;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href = '#')
    {
        $this->_href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.show-link-button');
    }
}
