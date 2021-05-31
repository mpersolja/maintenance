<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
  public $_columns;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($columns = [])
    {
        $this->_columns = $columns;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table');
    }
}
