<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceReportRequest;
use App\Models\Machine;
use App\Models\ServiceReport;
use Illuminate\Http\Request;

class ServiceReportController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Machine $machine)
  {
    return view('service-reports.create')->with(compact('machine'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreServiceReportRequest $request)
  {
    $machine = Machine::find($request->machine_id);

    $next_service_date = (\Carbon\Carbon::now())
      ->addMonths($machine->service_interval);

    ServiceReport::create($request->validated());
    $machine->next_service = $next_service_date;
    $machine->save();

    return redirect()->route('client.show', $request->client_id)
      ->withSuccess(__('Service report successfully stored'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\ServiceReport  $serviceReport
   * @return \Illuminate\Http\Response
   */
  public function show(ServiceReport $serviceReport)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\ServiceReport  $serviceReport
   * @return \Illuminate\Http\Response
   */
  public function edit(ServiceReport $serviceReport)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\ServiceReport  $serviceReport
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, ServiceReport $serviceReport)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\ServiceReport  $serviceReport
   * @return \Illuminate\Http\Response
   */
  public function destroy(ServiceReport $serviceReport)
  {
    //
  }
}
