<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextInput extends Component
{
  public $_id;
  public $_placeholder;
  public $_label;
  public $_required;
  public $_value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
  public function __construct(
    $id = 'name',
    $label = 'Name',
    $placeholder = 'Placeholder text',
    $required = false,
    $value = ''
  )
    {
      $this->_id = $id;
      $this->_label = $label;
      $this->_placeholder = $placeholder;
      $this->_required = $required;
      $this->_value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.text-input');
    }
}
