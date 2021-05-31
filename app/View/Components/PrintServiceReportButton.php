<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PrintServiceReportButton extends Component
{
  public $_report_id;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($reportid)
  {
    $this->_report_id = $reportid;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.print-service-report-button');
  }
}
